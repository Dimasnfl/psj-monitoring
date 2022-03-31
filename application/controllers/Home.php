<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_produk');
		$this->load->model('M_desa');
		$this->load->model('M_tipe_produk');
		$this->load->model('M_kurir');
		$this->load->model('M_transaksi');
	}

	public function index() {
		$data['jml_user'] 	= $this->M_user->total_rows();
		$data['jml_produk'] 	= $this->M_produk->total_rows();
		$data['jml_tipe_produk'] 	= $this->M_tipe_produk->total_rows();
		$data['jml_desa'] 	= $this->M_desa->total_rows();
		$data['jml_kurir'] 	= $this->M_desa->total_rows();
		$data['jml_transaksi'] 	= $this->M_desa->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'f', 'g', 'h');
		

		
		//diagram desa
		$desa 				= $this->M_desa->select_all();
		$index = 0;
		foreach ($desa as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$user_by_desa = $this->M_user->select_by_desa($value->id);

			$data_desa[$index]['value'] = $user_by_desa->jml;
			$data_desa[$index]['color'] = $color;
			$data_desa[$index]['highlight'] = $color;
			$data_desa[$index]['label'] = $value->nama;
			
			$index++;
		}

		//diagram tipe_produk
		$tipe_produk 				= $this->M_tipe_produk->select_all();
		$index = 0;
		foreach ($tipe_produk as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$produk_by_tipe_produk = $this->M_produk->select_by_tipe_produk($value->id);

			$data_tipe_produk[$index]['value'] = $produk_by_tipe_produk->jml;
			$data_tipe_produk[$index]['color'] = $color;
			$data_tipe_produk[$index]['highlight'] = $color;
			$data_tipe_produk[$index]['label'] = $value->nama;
			
			$index++;
		}

		$data['data_desa'] = json_encode($data_desa);
		$data['data_harga'] = json_encode($data_tipe_produk);

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */