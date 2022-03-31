<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
	public function select_all_produk() {
		$sql = "SELECT * FROM produk";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT produk.id AS id_petani, produk.alamat, user.nik AS NIK, produk.foto AS foto, produk.id_tipe_produk AS jenis, produk.tgl_tanam AS tanam, produk.tgl_panen AS panen, produk.berat_panen AS berat, tipe_produk.harga AS hrg 
		FROM produk, tipe_produk, user WHERE produk.id_tipe_produk = tipe_produk.id AND produk.id_user = user.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT produk.id AS id_petani, user.nik AS NIK_petani, produk.foto_produk AS foto, produk.id_tipe_produk AS jenis_produk, produk.id_tipe_produk, produk.tgl_tanam AS tgl_tanam, produk.tgl_panen AS tgl_panen, produk.berat_panen AS berat_panen, tipe_produk.nama AS hrg 
		FROM produk, tipe_produk, user WHERE produk.id_tipe_produk = tipe_produk.id AND produk.id_user = petani.id AND produk.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_user_id($id){
		$this->db->select("produk.id, tipe_produk.nama,user.telp, produk.tgl_panen, produk.tgl_tanam, tipe_produk.harga, status_produk.nama AS status,status_produk.id AS status_id, produk.luas_lahan, produk.berat_panen, produk.created_at, produk.updated_at" );
		$this->db->from('produk');
		$this->db->join('user','user.id = produk.id_user');
		$this->db->join('tipe_produk','tipe_produk.id = produk.id_tipe_produk');
		$this->db->join('status_produk', 'produk.id_status_produk = status_produk.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_tipe_produk($id) {
		$sql = "SELECT COUNT(*) AS jml FROM produk WHERE id_tipe_produk = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function delete($id) {
		$sql = "DELETE FROM produk WHERE id ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function insert_data($data){
		$this->db->insert('produk', $data);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO produk VALUES('{$id}','" .$data['NIK'] ."','" .$data['foto_produk'] ."'," .$data['jenis_produk'] ."," .$data['tgl_tanam'] ."," .$data['tgl_panen'] ."," .$data['berat_panen'] ."," .$data['id_tipe_produk'] .",1)";

		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('produk', $data);
		
		return $this->db->affected_rows();
	}

	public function check_NIK($NIK) {
		$this->db->where('NIK', $NIK);
		$data = $this->db->get('produk');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('produk');

		return $data->num_rows();
	}
}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */