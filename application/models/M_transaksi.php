<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {


	public function select_all() {
		 $this->db->select('transaksi.*, kurir.nama as kurir_nama, user.nama as user_nama, status_transaksi.nama as status_transaksi_nama');
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
		$sql = "SELECT * FROM transaksi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}



	public function insert($data) {
		$sql = "INSERT INTO transaksi VALUES('','" .$data['no_resi'] ."','" .$data['tanggal_pengambilan'] ."','" .$data['tanggal_diambil'] ."','" .$data['tanggal_sampai'] ."','" .$data['biaya_angkut'] ."','','" .$data['created_at'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('transaksi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE transaksi SET no_resi='" .$data['no_resi'] ."',tanggal_pengambilan='" .$data['tanggal_pengambilan'] ."',tanggal_diambil='" .$data['tanggal_diambil'] ."',id_kurir='" .$data['id_kurir'] ."',id_user='" .$data['id_user'] ."',id_produk='" .$data['id_produk'] ."',tanggal_sampai='" .$data['tanggal_sampai'] ."',biaya_angkut='" .$data['biaya_angkut'] ."',id_status_transaksi='" .$data['id_status_transaksi'] ."' WHERE id='" .$data['id'] ."'";

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