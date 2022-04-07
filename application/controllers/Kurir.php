<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kurir');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKurir'] 	= $this->M_kurir->select_all();

		$data['page'] 		= "Kurir";
		$data['judul'] 		= "Data Kurir";
		$data['deskripsi'] 	= "Manage Data Kurir";

		$data['modal_tambah_kurir'] = show_my_modal('modals/modal_tambah_kurir', 'tambah-kurir', $data);

		$this->template->views('kurir/home', $data);
	}

	public function tampil() {
		$data['dataKurir'] = $this->M_kurir->select_all();
		$this->load->view('kurir/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama Kurir', 'trim|required');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'trim|required');
		$this->form_validation->set_rules('plat_no', 'Plat Nomor Kendaraan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No.Telp Kurir', 'trim|required|numeric');
		$this->form_validation->set_rules('created_at', 'Tanggal Pembuatan Data', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kurir->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kurir Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data kurir Gagal ditambahkan', '20px');
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
		$data['dataKurir'] 	= $this->M_kurir->select_by_id($id);
		echo show_my_modal('modals/modal_update_kurir', 'update-kurir', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama Kurir', 'trim|required');
		$this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'trim|required');
		$this->form_validation->set_rules('plat_no', 'Plat Nomor Kendaraan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No.Telp Kurir', 'trim|required|numeric');
	    // $this->form_validation->set_rules('updated_at', 'Tanggal Update Data', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kurir->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kurir Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kurir Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kurir->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Kurir Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kurir Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id_kurir 				= trim($_POST['id']);
		$data['kurir'] = $this->M_kurir->select_by_id($id_kurir);
		$data['jumlahKurir'] = $this->M_kurir->total_rows();
		$data['dataKurir'] = $this->M_kurir->select_by_petani($id_kurir);

		echo show_my_modal('modals/modal_detail_kurir', 'detail-kurir', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kurir->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama kurir");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data kurir.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data kurir.xlsx', NULL);
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
						$check = $this->M_kurir->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kurir->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data kurir Berhasil diimport ke database'));
						redirect('kurir');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data kurir Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('kurir');
				}

			}
		}
	}
}

/* End of file kurir.php */
/* Location: ./application/controllers/kurir.php */