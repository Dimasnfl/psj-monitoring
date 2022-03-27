<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_harga extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('harga');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM harga WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_sayuran($id) {
		$sql = " SELECT sayuran.id AS id, sayuran.NIK AS NIK, sayuran.foto_sayuran AS foto_sayuran, sayuran.jenis_sayuran AS jenis_sayuran, sayuran.tgl_tanam AS tgl_tanam, sayuran.tgl_panen AS tgl_panen, sayuran.berat_panen AS berat_panen, harga.harga AS harga
		FROM sayuran, harga, petani WHERE sayuran.NIK = petani.NIK AND sayuran.id_harga = harga.id AND sayuran.id_harga={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO harga VALUES('','" .$data['jenis_sayuran'] ."','" .$data['harga'] ."','" .$data['tanggal'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('harga', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE harga SET jenis_sayuran='" .$data['jenis_sayuran'] ."',harga='" .$data['harga'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM harga WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_jenis_sayuran($jenis_sayuran) {
		$this->db->where('jenis_sayuran', $jenis_sayuran);
		$data = $this->db->get('harga');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('harga');

		return $data->num_rows();
	}
}

/* End of file M_harga.php */
/* Location: ./application/models/M_harga.php */