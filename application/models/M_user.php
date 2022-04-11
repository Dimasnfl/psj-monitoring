<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function select_all_user() {
		$this->db->select('user.*, desa.nama as desa_nama');
		$this->db->from('user');
		$this->db->order_by('nama', 'asc');
		$this->db->join('desa', 'desa.id = user.id_desa');
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
		$this->db->order_by('id', 'desc');
		$this->db->join('desa', 'desa.id = user.id_desa');
		$this->db->join('produk','produk.id_user = user.id');
		$this->db->group_by('produk.id_user');
		$query = $this->db->get();
		return $query->result();
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


	 public function delete($id) {
		$sql = "DELETE FROM user WHERE id ='" .$id ."'";

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