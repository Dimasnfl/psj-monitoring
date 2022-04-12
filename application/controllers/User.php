<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_desa');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataUser'] = $this->M_user->select_all();
		$data['dataDesa'] = $this->M_desa->select_all();
		$data['page'] = "User";
		$data['judul'] = "Data User";
		$data['deskripsi'] = "Manage Data User";


		$this->template->views('user/home', $data);
	}

	public function tampil() {
		$data['dataUser'] = $this->M_user->select_all();
		$this->load->view('user/list_data', $data);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataUser'] = $this->M_user->select_by_id($id);
		$data['dataDesa'] = $this->M_desa->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_user', 'update-user', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nik', 'NIK Petani', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Petani', 'trim|required');
		$this->form_validation->set_rules('id_desa', 'Asal Dusun', 'trim|required');
		$this->form_validation->set_rules('telp', 'No.Telp Petani', 'trim|required');


		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_user->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Petani Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Petani Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_user->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data User Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data User Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_user->select_all_user();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; //judul
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No.");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "NIK");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Nama Petani");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "No.Telp");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "ID Desa");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Luas Lahan");
		$rowCount++;

		$column = 2;//untuk kolom start
		foreach($data as $value){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$column, ($column-1));
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$column, $value->id); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$column, $value->nik, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$column, $value->nama); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$column, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$column, $value->desa_nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$column, $value->total_luas_lahan);  
		    $column++; 
		} 

		//set autosize
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

		//style
		$stil=array(
            'alignment' => array(
              'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
			'font'  => array(
				'bold'  => true,
				'color' => array('rgb' => '000000')
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '36FF94')
			  )

        );
		$stay=array(
		'borders' => array(
			'allborders' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			  'color' => array('rgb' => '000000')
			  
			)
			));
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($stil);
		$objPHPExcel->getActiveSheet()->getStyle('A1:G'.($column-1))->applyFromArray($stay);

		
		//save as .xlsx
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data User.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data User.xlsx', NULL);
	}

	// public function import() {
	// 	$this->form_validation->set_rules('excel', 'File', 'trim|required');

	// 	if ($_FILES['excel']['name'] == '') {
	// 		$this->session->set_flashdata('msg', 'File harus diisi');
	// 	} else {
	// 		$config['upload_path'] = './assets/excel/';
	// 		$config['allowed_types'] = 'xls|xlsx';
			
	// 		$this->load->library('upload', $config);
			
	// 		if ( ! $this->upload->do_upload('excel')){
	// 			$error = array('error' => $this->upload->display_errors());
	// 		}
	// 		else{
	// 			$data = $this->upload->data();
				
	// 			error_reporting(E_ALL);
	// 			date_default_timezone_set('Asia/Jakarta');

	// 			include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

	// 			$inputFileName = './assets/excel/' .$data['file_name'];
	// 			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	// 			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

	// 			$index = 0;
	// 			foreach ($sheetData as $key => $value) {
	// 				if ($key != 1) {
	// 					$NIK = md5(DATE('ymdhms').rand());
	// 					$check = $this->M_user->check_nama($value['B']);

	// 					if ($check != 1) {
	// 						$resultData[$index]['NIK'] = $NIK;
	// 						$resultData[$index]['nama'] = ucwords($value['B']);
	// 						$resultData[$index]['telp'] = $value['C'];
	// 						$resultData[$index]['id_desa'] = $value['D'];
	// 						$resultData[$index]['jenis_sayuran'] = $value['E'];
	// 						$resultData[$index]['luas_lahan'] = $value['F'];
	// 						$resultData[$index]['foto'] = $value['G'];
	// 					}
	// 				}
	// 				$index++;
	// 			}

	// 			unlink('./assets/excel/' .$data['file_name']);

	// 			if (count($resultData) != 0) {
	// 				$result = $this->M_user->insert_batch($resultData);
	// 				if ($result > 0) {
	// 					$this->session->set_flashdata('msg', show_succ_msg('Data user Berhasil diimport ke database'));
	// 					redirect('user');
	// 				}
	// 			} else {
	// 				$this->session->set_flashdata('msg', show_msg('Data user Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
	// 				redirect('user');
	// 			}

	// 		}
	// 	}
	// }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */