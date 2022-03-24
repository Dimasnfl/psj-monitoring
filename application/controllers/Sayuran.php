<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sayuran extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_sayuran');
		$this->load->model('M_harga');

	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataSayuran'] = $this->M_sayuran->select_all();
		$data['dataHarga'] = $this->M_harga->select_all();

		$data['page'] = "sayuran";
		$data['judul'] = "Data Sayuran";
		$data['deskripsi'] = "Manage Data Sayuran";

		// $data['modal_tambah_sayuran'] = show_my_modal('modals/modal_tambah_sayuran', 'tambah-sayuran', $data);

		$this->template->views('sayuran/home', $data);
	}

	public function tampil() {
		$data['dataSayuran'] = $this->M_sayuran->select_all();
		$this->load->view('sayuran/list_data', $data);
	}

	// public function prosesTambah() {
	// 	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	// 	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
	// 	$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
	// 	$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

	// 	$data = $this->input->post();
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$result = $this->M_pegawai->insert($data);

	// 		if ($result > 0) {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
	// 		} else {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
	// 		}
	// 	} else {
	// 		$out['status'] = 'form';
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 	}

	// 	echo json_encode($out);
	// }

	// public function update() {
	// 	$id = trim($_POST['id']);

	// 	$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
	// 	$data['dataPosisi'] = $this->M_posisi->select_all();
	// 	$data['dataKota'] = $this->M_kota->select_all();
	// 	$data['userdata'] = $this->userdata;

	// 	echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	// }

	// public function prosesUpdate() {
	// 	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	// 	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
	// 	$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
	// 	$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

	// 	$data = $this->input->post();
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$result = $this->M_pegawai->update($data);

	// 		if ($result > 0) {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
	// 		} else {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
	// 		}
	// 	} else {
	// 		$out['status'] = 'form';
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 	}

	// 	echo json_encode($out);
	// }

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_sayuran->select_all_sayuran();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NIK");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Foto Sayuran");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Jenis Sayuran");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Tanggal Tanam");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Tanggal Panen");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Berat Panen");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "ID Harga");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->NIK); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->foto_sayuran); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->jenis_sayuran); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->tgl_tanam); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->tgl_panen); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->berat_panen); 
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->id_harga); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Sayuran.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Sayuran.xlsx', NULL);
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
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_sayuran->check_NIK($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['NIK'] = ucwords($value['B']);
							$resultData[$index]['foto_sayuran'] = $value['C'];
							$resultData[$index]['jenis_sayuran'] = $value['D'];
							$resultData[$index]['tgl_tanam'] = $value['E'];
							$resultData[$index]['tgl_panen'] = $value['F'];
							$resultData[$index]['berat_bersih'] = $value['G'];
							$resultData[$index]['id_harga'] = $value['H'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_sayuran->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Sayuran Berhasil diimport ke database'));
						redirect('Sayuran');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Sayuran Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Sayuran');
				}

			}
		}
	}
}

/* End of file Sayuran.php */
/* Location: ./application/controllers/Sayuran.php */