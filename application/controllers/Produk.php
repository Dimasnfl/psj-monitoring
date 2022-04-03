<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataProduk'] = $this->M_produk->select_all();
		$data['page'] = "Produk";
		$data['judul'] = "Data Produk";
		$data['deskripsi'] = "Manage Data Produk";
		$data["alamat"] = "Alamat";

		$this->template->views('produk/home', $data);
	}

	public function tampil() {
		$data['dataProduk'] = $this->M_produk->select_all();
		$this->load->view('produk/list_data', $data);
	}


	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_produk->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Produk Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Produk Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_produk->select_all_produk();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "NIK");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Foto produk");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Jenis produk");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Tanggal Tanam");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Tanggal Panen");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Berat Panen");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "ID tipe_produk");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->NIK); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->foto_produk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->jenis_produk); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->tgl_tanam); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->tgl_panen); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->berat_panen); 
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->id_tipe_produk); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data produk.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data produk.xlsx', NULL);
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
						$check = $this->M_produk->check_NIK($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['NIK'] = ucwords($value['B']);
							$resultData[$index]['foto_produk'] = $value['C'];
							$resultData[$index]['jenis_produk'] = $value['D'];
							$resultData[$index]['tgl_tanam'] = $value['E'];
							$resultData[$index]['tgl_panen'] = $value['F'];
							$resultData[$index]['berat_bersih'] = $value['G'];
							$resultData[$index]['id_tipe_produk'] = $value['H'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_produk->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data produk Berhasil diimport ke database'));
						redirect('produk');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data produk Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('produk');
				}

			}
		}
	}
}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */