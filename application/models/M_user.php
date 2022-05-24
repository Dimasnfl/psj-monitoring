<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function select_all_user() {
		$this->db->select('user.*, desa.nama as desa_nama');
		$this->db->from('user');
		$this->db->order_by('nama', 'asc');
		$this->db->join('desa', 'desa.id = user.id_desa');
		$this->db->where('user.id_kurir IS NULL');
		$query = $this->db->get();
		return $query->result();
	}

	public function login($nik, $password){
		$md5Password = md5($password);
		$this->db->select("user.*")->from("user")->where("password", $md5Password)->where("nik",$nik);
		$query = $this->db->get();
		return $query->result();
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
	 	$this->db->select('user.*, desa.nama as desa_nama, SUM(produk.luas_lahan) as total_luas_lahan');
	 	$this->db->from('user');
	 	$this->db->order_by('nama', 'asc');
	 	$this->db->join('desa', 'desa.id = user.id_desa');
	 	$this->db->join('produk','produk.id_user = user.id');
	 	$this->db->group_by('produk.id_user');
	 	$query = $this->db->get();
	 	return $query->result();
	 }
	 public function get_driver_id_by_user_id($user_id){
		 $this->db->select('user.*');
		 $this->db->from();
		 $user = $this->row();
		 return $user;

	 }

	public function select_by_id($id) {
		$sql = "SELECT user.id AS id_user, user.nik, user.nama as nama, desa.nama AS desa, user.id_desa, user.telp 
		FROM user, desa
		WHERE user.id_desa = desa.id AND user.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
	//detail
	public function select_by_produk($id) {
		$sql = " SELECT produk.id AS id, produk.id_user, user.nama AS user, produk.tgl_tanam, produk.tgl_panen, produk.berat_panen, produk.luas_lahan, produk.id_tipe_produk, tipe_produk.nama AS tipe_produk_nama, produk.alamat, produk.id_status_produk, status_produk.nama AS status_produk_nama 
		FROM produk, user, status_produk, tipe_produk  
		WHERE produk.id_user = user.id AND produk.id_tipe_produk = tipe_produk.id AND produk.id_status_produk = status_produk.id AND produk.id_user = {$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function select_by_desa($id) {
		$sql = "SELECT COUNT(*) AS jml FROM user WHERE id_desa = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}


	 public function delete($id) {
		$sql = "DELETE FROM user WHERE id ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE user SET nik='" .$data['nik'] ."', nama='" .$data['nama'] ."', id_desa='" .$data['id_desa'] ."', telp='" .$data['telp'] ."' WHERE id='" .$data['id'] ."'";

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
		$this->db->select('user.*, desa.nama as desa_nama, SUM(produk.luas_lahan) as total_luas_lahan');
	 	$this->db->from('user');
	 	$this->db->order_by('nama', 'asc');
	 	$this->db->join('desa', 'desa.id = user.id_desa');
	 	$this->db->join('produk','produk.id_user = user.id');
	 	$this->db->group_by('produk.id_user');
		$data = $this->db->get('');

		return $data->num_rows();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */