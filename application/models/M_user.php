<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function select_all_user() {
		$sql = "SELECT * FROM user";

		$data = $this->db->query($sql);

		return $data->result();
	}
	public function login($nik, $password){
		$md5Password = md5($password);
		$sql = "SELECT * FROM user WHERE password = '".$md5Password."' AND nik = '".$nik."'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function set_access_token($id,$access_token){
		$sql = "UPDATE user set access_token = '".$access_token."' WHERE id = ".$id."";
		$this->db->query($sql);
	}
	public function get_user_by_access_token($access_token){
		$sql = "SELECT * FROM user WHERE access_token = '".$access_token."'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function select_all() {
		$sql = " SELECT user.nik AS nik, user.nama AS nama, user.telp AS telp, desa.nama AS desa, user.foto AS foto 
		FROM user, desa
		WHERE user.id_desa = desa.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT user.id AS id_user, user.nik AS NIK_user, user.nama AS nama_user, user.id_desa, user.telp AS telp, desa.nama AS desa, 
		FROM user, desa
		WHERE user.id_desa = desa.id AND user.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function select_by_desa($id) {
		$sql = "SELECT COUNT(*) AS jml FROM user WHERE id_desa = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function update($data) {
	// 	$sql = "UPDATE user SET nama='" .$data['nama'] ."', tgl_lahir='" .$data['tgl_lahir'] ."', jenis_produk=" .$data['jenis_produk'] .", luas_lahan=" .$data['luas_lahan'] .", foto=" .$data['foto'] ." WHERE NIK='" .$data['NIK'] ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	 public function delete($id) {
	 	$sql = "DELETE FROM user WHERE nik='" .$id ."'";

	 	$this->db->query($sql);

	 	return $this->db->affected_rows();
	 }






	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO user VALUES('{$NIK}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['desa'] ."," .$data['foto'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function insert_data($data){
		$this->db->insert('user',$data);
		
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function insert_batch($data) {
		$this->db->insert_batch('user', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('user');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('user');

		return $data->num_rows();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */