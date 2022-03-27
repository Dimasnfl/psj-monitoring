<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sayuran extends CI_Model {
	public function select_all_sayuran() {
		$sql = "SELECT * FROM sayuran";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT sayuran.id AS id, sayuran.alamat, sayuran.NIK AS NIK, sayuran.foto_sayuran AS foto_sayuran, sayuran.jenis_sayuran AS jenis_sayuran, sayuran.tgl_tanam AS tanam, sayuran.tgl_panen AS panen, sayuran.berat_panen AS berat, harga.harga AS hrg 
		FROM sayuran, harga, petani WHERE sayuran.id_harga = harga.id AND sayuran.jenis_sayuran = petani.jenis_sayuran AND sayuran.NIK = petani.NIK";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT sayuran.id AS id_sayuran, sayuran.NIK AS NIK_petani, sayuran.foto_sayuran AS foto_sayuran, sayuran.jenis_sayuran AS jenis_sayuran, sayuran.id_harga, sayuran.tgl_tanam AS tgl_tanam, sayuran.tgl_panen AS tgl_panen, sayuran.berat_panen AS berat_panen, harga.harga AS hrg 
		FROM sayuran, harga, petani WHERE sayuran.id_harga = harga.id AND sayuran.NIK = petani.NIK AND sayuran.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_harga($id) {
		$sql = "SELECT COUNT(*) AS jml FROM sayuran WHERE id_harga = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function delete($id) {
		$sql = "DELETE FROM sayuran WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO sayuran VALUES('{$id}','" .$data['NIK'] ."','" .$data['foto_sayuran'] ."'," .$data['jenis_sayuran'] ."," .$data['tgl_tanam'] ."," .$data['tgl_panen'] ."," .$data['berat_panen'] ."," .$data['id_harga'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('sayuran', $data);
		
		return $this->db->affected_rows();
	}

	public function check_NIK($NIK) {
		$this->db->where('NIK', $NIK);
		$data = $this->db->get('sayuran');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('sayuran');

		return $data->num_rows();
	}
}

/* End of file M_sayuran.php */
/* Location: ./application/models/M_sayuran.php */