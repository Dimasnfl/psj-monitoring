<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_produk extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_tipe_produk');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_all();

		$data['page'] 		= "Tipe Produk";
		$data['judul'] 		= "Data Harga Produk";
		$data['deskripsi'] 	= "Manage Data Harga Produk";

		$data['modal_tambah_tipe_produk'] = show_my_modal('modals/modal_tambah_tipe_produk', 'tambah-tipe_produk', $data);

		$this->template->views('tipe_produk/home', $data);
	}

	public function tampil() {
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_all();
		$this->load->view('tipe_produk/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');



		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_tipe_produk->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Produk Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Tipe Produk Gagal ditambahkan', '20px');
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
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_by_id($id);

		echo show_my_modal('modals/modal_update_tipe_produk', 'update-tipe_produk', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		


		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_tipe_produk->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Produk Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Tipe Produk Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_tipe_produk->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Tipe Produk Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Tipe Produk Gagal dihapus', '20px');
		}
	}

	// public function detail() {
	// 	$data['userdata'] 	= $this->userdata;

	// 	$id 				= trim($_POST['id']);
	// 	$data['tipe_produk'] = $this->M_tipe_produk->select_by_id($id);
	// 	$data['dataTipe_produk'] = $this->M_tipe_produk->select_by_sayuran($id);

	// 	echo show_my_modal('modals/modal_detail_tipe_produk', 'detail-tipe_produk', $data, 'lg');
	// }

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_tipe_produk->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Jenis Sayuran");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "tipe_produk Per Ton");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Tanggal Update");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->jenis_sayuran);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tipe_produk);  
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal);  
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data tipe_produk.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data tipe_produk.xlsx', NULL);
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
						$check = $this->M_tipe_produk->check_jenis_sayuran($value['B']);

						if ($check != 1) {
							$resultData[$index]['jenis_sayuran'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_tipe_produk->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data tipe_produk Berhasil diimport ke database'));
						redirect('tipe_produk');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data tipe_produk Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('tipe_produk');
				}

			}
		}
	}
}

/* End of file Tipe_produk.php */
/* Location: ./application/controllers/Tipe_produk.php */