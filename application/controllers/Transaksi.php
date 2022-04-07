<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_kurir');
		$this->load->model('M_user');
		// $this->load->model('M_produk');
		$this->load->model('M_status_transaksi');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTransaksi'] 	= $this->M_transaksi->select_all();
	    $data['dataKurir'] 	= $this->M_kurir->select_all();
		$data['dataUser'] 	= $this->M_user->select_all();
		// $data['dataProduk'] 	= $this->M_produk->select_all();
		$data['dataStatus_transaksi'] 	= $this->M_status_transaksi->select_all();

		$data['page'] 		= "Transaksi";
		$data['judul'] 		= "Data transaksi";
		$data['deskripsi'] 	= "Manage Data transaksi";

		$data['modal_tambah_transaksi'] = show_my_modal('modals/modal_tambah_transaksi', 'tambah-transaksi', $data);

		$this->template->views('transaksi/home', $data);
	}

	public function tampil() {
		$data['dataTransaksi'] = $this->M_transaksi->select_all();
		$this->load->view('transaksi/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('no_resi', 'Nomor Resi', 'trim|required');
		$this->form_validation->set_rules('tanggal_pengambilan', 'Tanggal Pengambilan', 'trim|required');
		$this->form_validation->set_rules('tanggal_diambil', 'Tanggal Diambil', 'trim|required');
		 $this->form_validation->set_rules('id_kurir', 'Kurir', 'trim|required');		
		 $this->form_validation->set_rules('id_user', 'Petani', 'trim|required');	
		$this->form_validation->set_rules('id_produk', 'Produk', 'trim|required');
		$this->form_validation->set_rules('tanggal_sampai', 'Tanggal Sampai', 'trim|required');
		$this->form_validation->set_rules('biaya_angkut', 'Jumlah Biaya Angkut', 'trim|required|numeric');
		$this->form_validation->set_rules('id_status_transaksi', 'Status Transaksi', 'trim|required');
		$this->form_validation->set_rules('created_at', 'Tanggal Data Dibuat', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data transaksi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data transaksi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataTransaksi'] 	= $this->M_transaksi->select_by_id($id);
		echo show_my_modal('modals/modal_update_transaksi', 'update-transaksi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('no_resi', 'Nomor Resi', 'trim|required');
		$this->form_validation->set_rules('tanggal_pengambilan', 'Tanggal Pengambilan', 'trim|required');
		$this->form_validation->set_rules('tanggal_diambil', 'Tanggal Diambil', 'trim|required');
		$this->form_validation->set_rules('id_kurir', 'Kurir', 'trim|required');		
		$this->form_validation->set_rules('id_user', 'User', 'trim|required');	
		$this->form_validation->set_rules('id_produk', 'Produk', 'trim|required');	
		$this->form_validation->set_rules('tanggal_sampai', 'Tanggal Sampai', 'trim|required');
		$this->form_validation->set_rules('biaya_angkut', 'Jumlah Biaya Angkut', 'trim|required|numeric');
		$this->form_validation->set_rules('id_status_transaksi', 'Status Transaksi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data transaksi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data transaksi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_transaksi->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data transaksi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data transaksi Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id_transaksi 				= trim($_POST['id']);
		$data['transaksi'] = $this->M_transaksi->select_by_id($id_transaksi);
		$data['jumlahTransaksi'] = $this->M_transaksi->total_rows();
		$data['dataTransaksi'] = $this->M_transaksi->select_by_petani($id_transaksi);

		echo show_my_modal('modals/modal_detail_transaksi', 'detail-transaksi', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_transaksi->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama transaksi");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data transaksi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data transaksi.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_transaksi->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_transaksi->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data transaksi Berhasil diimport ke database'));
						redirect('transaksi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data transaksi Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('transaksi');
				}

			}
		}
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */