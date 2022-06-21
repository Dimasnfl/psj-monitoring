<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_kurir');
		$this->load->model('M_user');
		$this->load->model('M_produk');
		$this->load->model('M_status_transaksi');
		$this->load->model('M_logs');

	}

	public function index() {
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $data['dataTransaksi'] = $this->M_transaksi->select_all();  // Panggil fungsi select_all yang ada di M_transaksi
            $data['url_cetak']  = 'transaksi/cetak';
            $data['label']  = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $data['dataTransaksi'] = $this->M_transaksi->view_by_date($tgl_awal, $tgl_akhir);
			$data['url_cetak'] = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $data['label'] = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		// $data['dataTransaksi'] 	= $this->M_transaksi->select_all();
	    // $data['dataKurir'] 	= $this->M_kurir->select_all();
		// $data['dataUser'] 	= $this->M_user->select_all();
	    // $data['dataProduk'] 	= $this->M_produk->select_all();
		// $data['dataStatus_transaksi'] 	= $this->M_status_transaksi->select_all();
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "Transaksi";
		$data['judul'] 		= "Data transaksi";
		$data['deskripsi'] 	= "Manage Data transaksi";

		$data['modal_tambah_transaksi'] = show_my_modal('modals/modal_tambah_transaksi', 'tambah-transaksi', $data);

		$this->template->views('transaksi/home', $data);
	}

	public function cetak(){
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $data['dataTransaksi']  = $this->M_transaksi->select_all();  // Panggil fungsi select_all yang ada di M_transaksi
            $label = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $data['dataTransaksi']  = $this->M_transaksi->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di M_transaksi
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $data['label'] = $label;

		ob_start();
		$this->load->view('print', $data);
		$html = ob_get_contents();
        ob_end_clean();

		require './assets/html2pdf/autoload.php'; // Load plugin html2pdfnya

		$pdf = new Spipu\Html2Pdf\Html2Pdf('L','A4','en');  // Settingan PDFnya
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'D');
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
		$id = trim($_POST['id']);

		$data['dataTransaksi'] = $this->M_transaksi->select_by_id($id);
		$data['dataUser'] = $this->M_user->select_all();
		$data['dataProduk'] = $this->M_produk->select_all();
		$data['dataStatus_transaksi'] = $this->M_status_transaksi->select_all();
		$data['dataKurir'] = $this->M_kurir->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_transaksi', 'update-transaksi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('no_resi', 'Nomor Resi', 'trim|required');
		// $this->form_validation->set_rules('tanggal_pengambilan', 'Tanggal Pengambilan', 'trim|required');
		// $this->form_validation->set_rules('tanggal_diambil', 'Tanggal Diambil', 'trim|required');
		$this->form_validation->set_rules('id_kurir', 'Kurir', 'trim|required');		
		$this->form_validation->set_rules('id_user', 'User', 'trim|required');	
		// $this->form_validation->set_rules('id_produk', 'Produk', 'trim|required');	
		$this->form_validation->set_rules('tanggal_sampai', 'Tanggal Sampai', 'trim|required');
		$this->form_validation->set_rules('biaya_angkut', 'Jumlah Biaya Angkut', 'trim|required|numeric');
		$this->form_validation->set_rules('id_status_transaksi', 'Status Transaksi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transaksi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Transaksi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Transaksi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];

		$hasil = $this->M_transaksi->batal_transaksi($id); 
		
		if ($hasil == 'success') {
			$transaksi = $this->M_transaksi->select_by_id($id);
			$this->M_logs->create($this->M_logs->BATAL_TRANSAKSI,"Transaksi dengan No Resi:{$transaksi->no_resi} diBatalkan oleh Admin:{$this->userdata->id}, Nama:{$this->userdata->nama}");
			echo show_succ_msg('Data transaksi Berhasil dibatalkan', '20px');
		} else {
			echo show_err_msg('Data transaksi Gagal dibatalkan', '20px');
		}
	}

	public function konfirmasi() {
		$id = $_POST['id'];

		$result = $this->M_transaksi->konfirmasi_transaksi($id); 

		if ($result == 'success') {
			$transaksi = $this->M_transaksi->select_by_id($id);
			$this->M_logs->create($this->M_logs->KONFIRMASI_TRANSAKSI,"Transaksi dengan No Resi:{$transaksi->no_resi} diKonfirmasi oleh Admin:{$this->userdata->id}, Nama:{$this->userdata->nama}");
			echo show_succ_msg('Data Transaksi Berhasil dikonfirmasi', '20px');
		} else {
			echo show_err_msg('Data Transaksi Gagal dikonfirmasi', '20px');
		}
	}

	

	// public function export() {
	// 	error_reporting(E_ALL);
    
	// 	include_once './assets/phpexcel/Classes/PHPExcel.php';
	// 	$objPHPExcel = new PHPExcel();

	// 	$data = $this->M_transaksi->select_all_transaksi();

	// 	$objPHPExcel = new PHPExcel(); 
	// 	$objPHPExcel->setActiveSheetIndex(0); 
	// 	$rowCount = 1; //judul
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No.");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "ID");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "No. Resi");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Tanggal Pengambilan");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Tanggal Diambil");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Nama Kurir");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Nama User");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "ID Produk");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "Tanggal Sampai");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Biaya Angkut");
	// 	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, "Status");
	// 	$rowCount++;

	// 	$column = 2;//untuk kolom start
	// 	foreach($data as $value){
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$column, ($column-1));
	// 	    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$column, $value->id); 
	// 	    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$column, $value->no_resi, PHPExcel_Cell_DataType::TYPE_STRING);
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$column, $value->tanggal_pengambilan); 
	// 	    $objPHPExcel->getActiveSheet()->setCellValue('E'.$column, $value->tanggal_diambil);
	// 	    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$column, $value->nama_kurir); 
	// 	    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$column, $value->nama_user);
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$column, $value->id_produk);  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$column, $value->tanggal_sampai);  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$column, $value->biaya_angkut);  
	// 		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$column, $value->nama_status);    
	// 	    $column++; 
	// 	} 

	// 	//set autosize
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
	// 	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

	// 	//style
	// 	$stil=array(
    //         'alignment' => array(
    //           'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	// 		),
	// 		'font'  => array(
	// 			'bold'  => true,
	// 			'color' => array('rgb' => '000000')
	// 		),
	// 		'fill' => array(
	// 			'type' => PHPExcel_Style_Fill::FILL_SOLID,
	// 			'color' => array('rgb' => '36FF94')
	// 		  )

    //     );
	// 	$stay=array(
	// 	'borders' => array(
	// 		'allborders' => array(
	// 		  'style' => PHPExcel_Style_Border::BORDER_THIN,
	// 		  'color' => array('rgb' => '000000')
			  
	// 		)
	// 		));
    //     $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($stil);
	// 	$objPHPExcel->getActiveSheet()->getStyle('A1:K'.($column-1))->applyFromArray($stay);

		
	// 	//save as .xlsx
	// 	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
	// 	$objWriter->save('./assets/excel/Data Transaksi.xlsx'); 

	// 	$this->load->helper('download');
	// 	force_download('./assets/excel/Data Transaksi.xlsx', NULL);
	// }


}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */