<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_petani');
		$this->load->model('M_sayuran');
		$this->load->model('M_desa');
		$this->load->model('M_harga');
	}

	public function index() {
		$data['jml_petani'] 	= $this->M_petani->total_rows();
		$data['jml_sayuran'] 	= $this->M_sayuran->total_rows();
		$data['jml_harga'] 	= $this->M_harga->total_rows();
		$data['jml_desa'] 	= $this->M_desa->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'f', 'g', 'h');
		

		
		//diagram desa
		$desa 				= $this->M_desa->select_all();
		$index = 0;
		foreach ($desa as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$petani_by_desa = $this->M_petani->select_by_desa($value->id);

			$data_desa[$index]['value'] = $petani_by_desa->jml;
			$data_desa[$index]['color'] = $color;
			$data_desa[$index]['highlight'] = $color;
			$data_desa[$index]['label'] = $value->nama;
			
			$index++;
		}

		//diagram harga
		$harga 				= $this->M_harga->select_all();
		$index = 0;
		foreach ($harga as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$sayuran_by_harga = $this->M_sayuran->select_by_harga($value->id);

			$data_harga[$index]['value'] = $sayuran_by_harga->jml;
			$data_harga[$index]['color'] = $color;
			$data_harga[$index]['highlight'] = $color;
			$data_harga[$index]['label'] = $value->jenis_sayuran;
			
			$index++;
		}

		$data['data_desa'] = json_encode($data_desa);
		$data['data_harga'] = json_encode($data_harga);

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */