<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->model('M_user');
		$this->load->model('M_tipe_produk');
		$this->load->model('M_kurir');
		$this->load->model('M_status_produk');
		$this->load->model('M_transaksi');

	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataProduk'] = $this->M_produk->select_all();
		$data['dataUser'] = $this->M_user->select_all();
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_all();
		$data['dataStatus_produk'] = $this->M_status_produk->select_all();
		$data['page'] = "Produk";
		$data['judul'] = "Data E-Commodity";
		$data['deskripsi'] = "Manage Data E-Commodity";
		$data["alamat"] = "Alamat";

		$this->template->views('produk/home', $data);
	}



	public function tampil() {
		$data['dataProduk'] = $this->M_produk->select_all();
		$this->load->view('produk/list_data', $data);
	}


	public function update() {
		$id = trim($_POST['id']);

		$data['dataProduk'] = $this->M_produk->select_by_id($id);
		$data['dataUser'] = $this->M_user->select_all();
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_all();
		$data['dataStatus_produk'] = $this->M_status_produk->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_produk', 'update-produk', $data);
	}

	public function penjemputan(){
		$id = trim($_POST['id']);
		$produk = $this->M_produk->select_by_id($id);
		$data['dataProduk'] = $produk;
		$data['dataUser'] = $this->M_user->select_by_id($produk->id_user);
		$data['dataTipe_produk'] = $this->M_tipe_produk->select_all();
		$data['dataKurir'] = $this->M_kurir->select_all();
		$data['dataStatus_produk'] = $this->M_status_produk->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_penjemputan', 'penjemputan', $data);
	}

	public function prosesPenjemputan() {
		$this->form_validation->set_rules('id', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('id_kurir', 'Berat Panen', 'trim|required');
		$this->form_validation->set_rules('date','Tanggal Penjemputan','trim|required');
		$this->form_validation->set_rules('harga','Harga','trim|required');
		$this->form_validation->set_rules('jam_penjemputan','Jam Penjemputan', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$id_produk = $this->input->post('id');
			$id_kurir = $this->input->post('id_kurir');
			$date = $this->input->post('date');
			$jam = $this->input->post('jam_penjemputan');
			$harga = $this->input->post('harga');
			$result = $this->M_transaksi->create_transaction($id_produk,$id_kurir,$date,$jam,$harga);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Penjemputan Berhasil dibuat', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Penjemputan Gagal dibuat', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}


	  public function detail() {
	  	$data['userdata'] 	= $this->userdata;

	  	$id 				= trim($_POST['id']);
	  	$data['produk'] = $this->M_produk->select_by_id($id);
	  	echo show_my_modal('modals/modal_detail_produk', 'detail-produk', $data, 'lg');
	  }



	public function prosesUpdate() {
		$this->form_validation->set_rules('id_user', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('berat_panen', 'Berat Panen', 'trim|required');
		$this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|required');
		$this->form_validation->set_rules('id_tipe_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('id_status_produk', 'Status', 'trim|required');	
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_produk->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data E-Commodity Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data E-Commodity Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
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
	// 					$id = md5(DATE('ymdhms').rand());
	// 					$check = $this->M_produk->check_NIK($value['B']);

	// 					if ($check != 1) {
	// 						$resultData[$index]['id'] = $id;
	// 						$resultData[$index]['NIK'] = ucwords($value['B']);
	// 						$resultData[$index]['foto_produk'] = $value['C'];
	// 						$resultData[$index]['jenis_produk'] = $value['D'];
	// 						$resultData[$index]['tgl_tanam'] = $value['E'];
	// 						$resultData[$index]['tgl_panen'] = $value['F'];
	// 						$resultData[$index]['berat_bersih'] = $value['G'];
	// 						$resultData[$index]['id_tipe_produk'] = $value['H'];
	// 					}
	// 				}
	// 				$index++;
	// 			}

	// 			unlink('./assets/excel/' .$data['file_name']);

	// 			if (count($resultData) != 0) {
	// 				$result = $this->M_produk->insert_batch($resultData);
	// 				if ($result > 0) {
	// 					$this->session->set_flashdata('msg', show_succ_msg('Data produk Berhasil diimport ke database'));
	// 					redirect('produk');
	// 				}
	// 			} else {
	// 				$this->session->set_flashdata('msg', show_msg('Data produk Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
	// 				redirect('produk');
	// 			}

	// 		}
	// 	}
	// }
	public function load_status()
	{
	  $status_produk = $_GET['id_status_produk'];
	  if ($status_produk == 0) {
		$data = $this->M_produk->select_all();
	  }
	  else
	  {
		$data = $this->M_produk->select_by_status($status_produk);
	  }
	  if (!empty($data)) 
	  {
		function rupiah ($harga) {
		  $hasil = 'Rp ' . number_format($harga, 2, ",", ".");
		  return $hasil;
		}
		$no=1; foreach ($data as $row): ?>
		<tr>
      <td style="text-align: center;"><?php echo $no; ?></td>
      <td><?php echo $row->user_nik; ?></td>
      <td><?php echo $row->user_nama; ?></td>
      <td><?php echo $row->tipe_produk_nama; ?></td>
      <td><?php echo $row->tgl_tanam; ?></td>
      <td><?php echo $row->tgl_panen; ?></td>
      <td><h><?php echo $row->berat_panen; ?>kg</h></td>
      <td><?php echo rupiah ($row->tipe_produk_harga); ?></td>
      <td><h><?php echo $row->luas_lahan; ?> m2</h></td>
      <td><?php echo $row->alamat; ?></td>
      <td><?php echo $row->status_produk_nama; ?></td>

      <td class="text-center" style="min-width:110px;">
      <button class="btn btn-info detail-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> </button>
      <button class="btn btn-warning update-dataProduk" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-edit"></i></button>
      <?php  if($row->status_produk_id == 3)
      {
        ?>
         <button class="btn btn-success penjemputan" data-id="<?php echo $row->id; ?>"><i class="glyphicon glyphicon-plane"></i></button>
        <?php
      }
      ?>
      </td>
    </tr>

		<?php endforeach ?> <?php
	  }
	  else
	  {
		?>
		  <tr><td align="center">Tidak ada data</td></tr>
		<?php
	  }
	  
	}
}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */