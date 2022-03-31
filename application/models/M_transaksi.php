<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('transaksi');

		$data = $this->db->get();

		return $data->result();
	}


	public function select_by_id($id) {
		$sql = "SELECT * FROM transaksi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function select_by_petani($id) {
	// 	$sql = " SELECT petani.id AS id, petani.NIK AS NIK, petani.nama AS petani, petani.telp AS telp, transaksi.nama AS transaksi, petani.luas_lahan AS luas_lahan
	// 	FROM petani, transaksi 
	// 	WHERE petani.id_transaksi = transaksi.id AND petani.id_transaksi={$id}";

	// 	$data = $this->db->query($sql);

	// 	return $data->result();
	// }

	public function insert($data) {
		$sql = "INSERT INTO transaksi VALUES('','" .$data['no_resi'] ."','" .$data['tanggal_pengambilan'] ."','" .$data['tanggal_diambil'] ."','','','','" .$data['tanggal_sampai'] ."','" .$data['biaya_angkut'] ."','','" .$data['created_at'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('transaksi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE transaksi SET no_resi='" .$data['no_resi'] ."',tanggal_pengambilan='" .$data['tanggal_pengambilan'] ."',tanggal_diambil='" .$data['tanggal_diambil'] ."',tanggal_sampai='" .$data['tanggal_sampai'] ."',biaya_angkut='" .$data['biaya_angkut'] ."',updated_at='" .$data['updated_at'] ."' WHERE id='" .$data['id'] ."'";

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