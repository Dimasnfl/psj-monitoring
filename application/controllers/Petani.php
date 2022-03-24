<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petani extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_petani');
		$this->load->model('M_desa');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPetani'] = $this->M_petani->select_all();
		$data['dataDesa'] = $this->M_desa->select_all();

		$data['page'] = "petani";
		$data['judul'] = "Data Petani";
		$data['deskripsi'] = "Manage Data Petani";

		//$data['modal_tambah_petani'] = show_my_modal('modals/modal_tambah_petani', 'tambah-petani', $data);

		$this->template->views('petani/home', $data);
	}

	public function tampil() {
		$data['dataPetani'] = $this->M_petani->select_all();
		$this->load->view('petani/list_data', $data);
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
	$NIK = $_POST['NIK'];
	$result = $this->M_petani->delete($NIK);

	if ($result > 0) {
	 		echo show_succ_msg('Data Petani Berhasil dihapus', '20px');
	 	} else {
	 		echo show_err_msg('Data Petani Gagal dihapus', '20px');
	 	}
	 }

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_petani->select_all_petani();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "NIK");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Desa");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Jenis Sayuran");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Luas Lahan");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Foto");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->NIK); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_desa); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->jenis_sayuran); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->luas_lahan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->foto); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Petani.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Petani.xlsx', NULL);
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
						$NIK = md5(DATE('ymdhms').rand());
						$check = $this->M_petani->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['NIK'] = $NIK;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_desa'] = $value['D'];
							$resultData[$index]['jenis_sayuran'] = $value['E'];
							$resultData[$index]['luas_lahan'] = $value['F'];
							$resultData[$index]['foto'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_petani->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Petani Berhasil diimport ke database'));
						redirect('Petani');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Petani Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Petani');
				}

			}
		}
	}
}

/* End of file Petani.php */
/* Location: ./application/controllers/Petani.php */