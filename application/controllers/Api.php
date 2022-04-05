<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    public $token;
    public $user;
    //GANTI DENGAN ABSOLUTE LOCATION
    private $uploaddir = '/home/afandiyu/domains/afandiyusuf.com/public_html/siduda-monitoring/assets/app_photo/';
	public function __construct() {
		parent::__construct();
        $this->load->model('M_tipe_produk');
        $this->load->model('M_user');
        $this->load->model('M_produk');
        $this->load->model('M_status_produk');
        header('Content-Type: application/json');
	}
    /*
    * this function will validate access_token at header, and assign it to $user variable and $token variable
    */
    public function validateAccessToken(){
        if($this->input->post('access_token') == null){
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'access token missing'
            );
            echo json_encode($data);
            return false;
        }
        $this->token = $this->input->post('access_token');
        $this->user = $this->M_user->get_user_by_access_token($this->token);
        if($this->user){
            $this->user = $this->user[0];
            return true;
        }else{
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'you are not authorized to access this api'
            );
            echo json_encode($data);
            return false;
        }
    }

    public function success($data){
        $return_data = array(
            "status"=> 'success',
            "code" => 200,
            "data" => $data,
        );
        return $return_data;
    }

    public function error($code,$message){
        $return_data = array(
            "status"=> $message,
            "code" => $code,
            "data" => null,
        );
        return $return_data;
    }
    public function process_foto($prefix){
        $filename = '';
        if(isset($_FILES['foto'])){
            $this->load->helper('string');
            //do upload operation
            
            $generated_prefix_file_name = $prefix.random_string('alnum',10);
            $uploadfile = $this->uploaddir . $generated_prefix_file_name.basename($_FILES['foto']['name']);
            $filename = $generated_prefix_file_name.basename($_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
        }
        return $filename;
    }
    //API - 1. AUTH
    public function login(){
        $this->load->helper('string');

        $nik = $this->input->post("nik");
        $password = $this->input->post("password");

        $user = $this->M_user->login($nik,$password);
        if($user){
            $user = $user[0];
            $access_token = random_string('alnum',200);
            $this->M_user->set_access_token($user->id,$access_token);
            $user->access_token = $access_token;
            echo json_encode($this->success($user));
        }else{
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'login error'
            );
            echo json_encode($data);
        }
    }
    public function register(){
        $this->load->helper('string');
        $insert_data = $this->input->post();
        $insert_data['password'] = md5($insert_data['password']);
        $insert_data['access_token'] = random_string('alnum',200);
        $insert_data['foto'] = $this->process_foto('user_photo'.random_string('alnum',10).$insert_data['nik']);
        $status = $this->M_user->insert_data($insert_data);
        
        if($status){
            $insert_data['id'] = "$status";
            $insert_data['password'] = '';
            echo json_encode($this->success($insert_data));   
        }else{
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'login error'
            );
            echo json_encode($data);
        }
    }
    //END API - 1. AUTH
    //API - 2. APP DATA
    //2.1 get all available harga
    public function harga(){
        if(!$this->validateAccessToken())return;
        
        $data = $this->M_tipe_produk->select_all();
        echo json_encode($this->success($data));
        
    }
    //2.2 get all available user produk
    public function produk(){
        if(!$this->validateAccessToken())return;
        $data = $this->M_produk->select_by_user_id($this->user->id);
        echo json_encode($this->success($data));
    }
    //2.3 get all available produk status
    public function status_produk(){
        if(!$this->validateAccessToken())return;

        $data =$this->M_tipe_produk->select_all();
        echo json_encode($this->success($data));
    }
    //2.4 create produk
    public function create_produk(){
        if(!$this->validateAccessToken())return;
    
        // $foto = $this->process_foto($this->user->id);
        $insert_data = $this->input->post();
        // $insert_data['foto'] = $foto;
        $insert_data['id_status_produk'] = 1;
        $insert_data['id_user'] = $this->user->id;
        unset($insert_data['access_token']);
        $success = $this->M_produk->insert_data($insert_data);
        if($success){
            $insert_data['id'] = $success;
            echo json_encode($this->success($insert_data));
        }else{
            echo json_encode($this->error(500, 'something went wrong'));
        }
        
    }
    //2.5 get dusun
    public function get_dusun(){
        $this->load->model('M_desa');
        $data = $this->M_desa->select_all();
        if($data){
            echo json_encode($this->success($data));
        }else{
            echo json_encode($this->error(500, 'something went wrong'));
        }

    }
    //END API - APP DATA

    //API - 3. USER DATA
    public function user(){
        if(!$this->validateAccessToken())return;
        echo json_encode($this->success($this->user));
    }
    
    //END API - 3. USER DATA
}