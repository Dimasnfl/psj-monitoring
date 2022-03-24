<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('M_sayuran');
        $this->load->model('M_petani');
        $this->load->helper('string');
        header('Content-Type: application/json');
	}
    public function index(){
        if(!isset($this->input->request_headers()['access_token'])){
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'access token missing'
            );
            echo json_encode($data);
            return;
        }
        $token = $this->input->request_headers()['access_token'];
        $user = $this->M_petani->get_user_by_access_token($token);

        if($user){
            $sayuran_id = $this->input->get('sayuran_id');
            if($sayuran_id == "all"){
                $data = $this->M_sayuran->select_all();
            }else{
                $data = $this->M_sayuran->select_by_id($sayuran_id);
            }
            echo json_encode($data);
        }else{
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'you are not authorized to access this api'
            );
            echo json_encode($data);
        }
    
    }
    public function login(){
        
        $nik = $this->input->post("nik");
        $password = $this->input->post("password");

        $user = $this->M_petani->login($nik,$password);
        if($user){
            $user = $user[0];
            $access_token = random_string('alnum',200);
            $this->M_petani->set_access_token($user->id,$access_token);
            $user->access_token = $access_token;
            $data = array(
                "status"=> 'success',
                "code" => 200,
                "data" => $user,
            );
            echo json_encode($data);
        }else{
            $data = array(
                "status"=> 'error',
                "code" => 500,
                "errorMessage" => 'login error'
            );
            echo json_encode($data);
        }
    }
}