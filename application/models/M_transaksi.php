<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function select_all_transaksi() {
		$this->db->select('transaksi.id, transaksi.no_resi, transaksi.tanggal_pengambilan, transaksi.tanggal_diambil, kurir.nama as nama_kurir, user.nama as nama_user, produk.id as id_produk, transaksi.tanggal_sampai, transaksi.biaya_angkut, status_transaksi.nama as nama_status, transaksi.created_at');
		$this->db->from('transaksi');
		$this->db->order_by('created_at', 'desc');
		$this->db->join('kurir', 'kurir.id = transaksi.id_kurir');
		$this->db->join('user', 'user.id = transaksi.id_user');
		$this->db->join('produk', 'produk.id = transaksi.id_produk');
		$this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');		
	   $query = $this->db->get();
	   return $query->result();
   }

   public function select_all_transaksi_by_user_id($user_id){
	$this->db->select('transaksi.id,tipe_produk.nama as nama_produk,
	transaksi.no_resi, transaksi.tanggal_pengambilan,
	transaksi.tanggal_diambil,
	kurir.nama as nama_kurir,
	kurir.jenis_kendaraan as kendaraan,
	kurir.plat_no as plat_nomor,
	kurir.no_telp as no_telp_kurir,
	user.telp as no_telp_user,
	produk.berat_panen as berat,
	produk.alamat as alamat,
	tipe_produk.harga as harga,
	produk.tgl_tanam as tgl_tanam,
	produk.tgl_panen as tgl_panen,
	user.nama as nama_user,
	produk.id as id_produk,
	transaksi.tanggal_sampai,
	transaksi.biaya_angkut,
	tipe_produk.foto as foto,
	status_produk.nama as status_produk,
	status_produk.id as status_produk_id,
	status_transaksi.id as status_transaksi_id,
	status_transaksi.nama as nama_status');
	$this->db->from('transaksi');
	$this->db->order_by('id', 'asc');
	$this->db->join('kurir', 'kurir.id = transaksi.id_kurir');
	$this->db->join('user', 'user.id = transaksi.id_user');
	$this->db->join('produk', 'produk.id = transaksi.id_produk');
	$this->db->join('tipe_produk','produk.id_tipe_produk = tipe_produk.id');
	$this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
	$this->db->join('status_produk', 'status_produk.id = produk.id_status_produk');		
	$this->db->where('user.id',$user_id);
	$query = $this->db->get();
	return $query->result();
   }

   public function select_all_transaksi_by_driver_id($id_kurir,$status_produk){
	$this->db->select('transaksi.id,tipe_produk.nama as nama_produk,
	transaksi.no_resi, transaksi.tanggal_pengambilan,
	transaksi.tanggal_diambil,
	kurir.nama as nama_kurir,
	kurir.jenis_kendaraan as kendaraan,
	kurir.plat_no as plat_nomor,
	kurir.no_telp as no_telp_kurir,
	user.telp as no_telp_user,
	produk.berat_panen as berat,
	produk.alamat as alamat,
	tipe_produk.harga as harga,
	produk.tgl_tanam as tgl_tanam,
	produk.tgl_panen as tgl_panen,
	user.nama as nama_user,
	produk.id as id_produk,
	transaksi.tanggal_sampai,
	transaksi.biaya_angkut,
	tipe_produk.foto as foto,
	status_produk.nama as status_produk,
	status_produk.id as status_produk_id,
	status_transaksi.id as status_transaksi_id,
	status_transaksi.nama as nama_status');
	$this->db->from('transaksi');
	$this->db->order_by('id', 'asc');
	$this->db->join('kurir', 'kurir.id = transaksi.id_kurir');
	$this->db->join('user', 'user.id = transaksi.id_user');
	$this->db->join('produk', 'produk.id = transaksi.id_produk');
	$this->db->join('tipe_produk','produk.id_tipe_produk = tipe_produk.id');
	$this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
	$this->db->join('status_produk', 'status_produk.id = produk.id_status_produk');		
	$this->db->where('transaksi.id_kurir',$id_kurir);
	$this->db->where('produk.id_status_produk',$status_produk);
	$query = $this->db->get();
	return $query->result();
   }

	public function select_all() {
		 $this->db->select('transaksi.id, transaksi.no_resi, transaksi.tanggal_pengambilan, transaksi.tanggal_diambil, kurir.nama as nama_kurir, user.nama as nama_user, produk.id as id_produk, transaksi.tanggal_sampai, transaksi.biaya_angkut, status_transaksi.nama as nama_status');
		 $this->db->from('transaksi');
		 $this->db->order_by('id', 'desc');
		 $this->db->join('kurir', 'kurir.id = transaksi.id_kurir');
		 $this->db->join('user', 'user.id = transaksi.id_user');
		 $this->db->join('produk', 'produk.id = transaksi.id_produk');
		 $this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');		
		$query = $this->db->get();
		return $query->result();
	}


	public function select_by_id($id) {
		$sql = "SELECT transaksi.id AS id_transaksi, transaksi.no_resi, transaksi.id_kurir, transaksi.id_user, transaksi.id_produk, transaksi.tanggal_sampai, transaksi.biaya_angkut, transaksi.id_status_transaksi, kurir.nama AS kurir, user.nama AS user, status_transaksi.nama AS status_transaksi 
		FROM transaksi, user, produk, status_transaksi, kurir 
		WHERE transaksi.id_kurir = kurir.id AND transaksi.id_user = user.id AND transaksi.id_status_transaksi = status_transaksi.id AND transaksi.id_produk = produk.id AND transaksi.id = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}

	public function create_transaction($id_produk,$id_kurir,$tanggal,$jam,$biaya_angkut){
		$this->load->helper('date');
		$produk = $this->db->from('produk')->where('id',$id_produk)->get()->row();
		$this->db->from('produk')->where('id',$id_produk)->set('id_status_produk',5)->update('produk');
		$kurir = $this->db->from('kurir')->where('id',$id_kurir)->get()->row();
		$dateAngkut = date_parse($tanggal);
		//rumus no resi
		//PSJ-TGL-BLN-THN-0ID_PRODUK0-0ID_KURIR0
		
		$tgl = new DateTime($tanggal);
		$dateString = $tgl->format("Y-m-d");//$jam:00
		$noResi = "PSJ-$dateString-0$produk->id-0$kurir->id";

		$insertData = array(
			"no_resi" => $noResi,
			"tanggal_pengambilan" => $dateString,
			"id_kurir" => $kurir->id,
			"id_user" => $produk->id_user,
			"id_produk" => $produk->id,
			"biaya_angkut" => $biaya_angkut,
			"id_status_transaksi" => 1
		);
		$this->db->insert('transaksi',$insertData);

		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}


	}



	public function insert($data) {
		$sql = "INSERT INTO transaksi VALUES('','" .$data['no_resi'] ."','" .$data['tanggal_pengambilan'] ."','" .$data['tanggal_diambil'] ."','" .$data['nama_kurir'] ."','" .$data['nama_user'] ."','" .$data['id_produk'] ."','" .$data['tanggal_sampai'] ."','" .$data['biaya_angkut'] ."','" .$data['id_status_transaksi'] ."','" .$data['created_at'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('transaksi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE transaksi SET no_resi='" .$data['no_resi'] ."',id_kurir='" .$data['id_kurir'] ."',id_user='" .$data['id_user'] ."',tanggal_sampai='" .$data['tanggal_sampai'] ."',biaya_angkut='" .$data['biaya_angkut'] ."',id_status_transaksi='" .$data['id_status_transaksi'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM transaksi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('transaksi');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('transaksi');

		return $data->num_rows();
	}
}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */