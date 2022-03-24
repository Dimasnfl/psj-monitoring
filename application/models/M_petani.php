<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petani extends CI_Model {
	public function select_all_petani() {
		$sql = "SELECT * FROM petani";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT petani.NIK AS NIK, petani.nama AS petani, petani.telp AS telp, desa.nama AS desa, petani.jenis_sayuran AS jenis_sayuran, petani.luas_lahan AS luas_lahan, petani.foto AS foto 
		FROM petani, desa
		WHERE petani.id_desa = desa.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT petani.id AS id_petani, petani.NIK AS NIK_petani, petani.nama AS nama_petani, petani.id_desa, petani.telp AS telp, desa.nama AS desa, 
		FROM petani, desa
		WHERE petani.id_desa = desa.id AND petani.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function select_by_posisi($id) {
	// 	$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

	// 	$data = $this->db->query($sql);

	// 	return $data->row();
	// }

	public function select_by_desa($id) {
		$sql = "SELECT COUNT(*) AS jml FROM petani WHERE id_desa = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function update($data) {
	// 	$sql = "UPDATE pegawai SET nama='" .$data['nama'] ."', tgl_lahir='" .$data['tgl_lahir'] ."', jenis_sayuran=" .$data['jenis_sayuran'] .", luas_lahan=" .$data['luas_lahan'] .", foto=" .$data['foto'] ." WHERE NIK='" .$data['NIK'] ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	 public function delete($id) {
	 	$sql = "DELETE FROM petani WHERE id='" .$id ."'";

	 	$this->db->query($sql);

	 	return $this->db->affected_rows();
	 }






	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO petani VALUES('{$NIK}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['desa'] ."," .$data['jenis_sayuran'] ."," .$data['luas_lahan'] ."," .$data['foto'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('petani', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('petani');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('petani');

		return $data->num_rows();
	}
}

/* End of file M_petani.php */
/* Location: ./application/models/M_petani.php */