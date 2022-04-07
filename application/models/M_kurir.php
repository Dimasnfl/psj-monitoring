<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kurir extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('kurir');
		$this->db->order_by('id', 'desc');
		$data = $this->db->get();

		return $data->result();
	}


	public function select_by_id($id) {
		$sql = "SELECT * FROM kurir WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO kurir VALUES('','" .$data['nama'] ."','" .$data['jenis_kendaraan'] ."','" .$data['plat_no'] ."','" .$data['no_telp'] ."','" .$data['created_at'] ."','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kurir', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = " UPDATE kurir SET nama='" .$data['nama'] ."',jenis_kendaraan='" .$data['jenis_kendaraan'] ."',plat_no='" .$data['plat_no'] ."',no_telp='" .$data['no_telp'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function delete($id) {
		$sql = "DELETE FROM kurir WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kurir');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kurir');

		return $data->num_rows();
	}
}

/* End of file M_kurir.php */
/* Location: ./application/models/M_kurir.php */