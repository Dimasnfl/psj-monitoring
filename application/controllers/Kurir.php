<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kurir');
		$this->load->model('M_desa');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKurir'] 	= $this->M_kurir->select_all();
		$data['dataDesa'] 	= $this->M_desa->select_all();

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
		$this->form_validation->set_rules('user_nik', 'NIK Kurir', 'trim|required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required');
		$this->form_validation->set_rules('id_desa', 'Dusun', 'trim|required');
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
				$out['msg'] = show_succ_msg('Data Kurir Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Kurir Gagal ditambahkan', '20px');
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
				$out['msg'] = show_succ_msg('Data Kurir Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kurir Gagal diupdate', '20px');
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

		$id 				= trim($_POST['id']);
		$data['kurir'] = $this->M_kurir->select_by_id($id);
		$data['jumlahKurir'] = $this->M_kurir->total_rows();
		$data['dataKurir'] = $this->M_kurir->select_by_transaksi($id);

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

}

/* End of file kurir.php */
/* Location: ./application/controllers/kurir.php */