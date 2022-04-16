<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
	public function select_all_produk() {
		$this->db->from('produk');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_all() {
		$this->db->select('produk.id,user.nik as user_nik, user.nama as user_nama,status_produk.id as status_produk_id , tipe_produk.nama as tipe_produk_nama, produk.tgl_tanam, produk.tgl_panen, produk.berat_panen,  tipe_produk.harga as tipe_produk_harga, produk.luas_lahan, produk.alamat, status_produk.nama as status_produk_nama');
		$this->db->from('produk');
		$this->db->order_by('id', 'desc');
		$this->db->join('user', 'user.id = produk.id_user');
		$this->db->join('tipe_produk', 'tipe_produk.id = produk.id_tipe_produk');
		$this->db->join('status_produk', 'status_produk.id = produk.id_status_produk');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT produk.id AS id_produk,
		produk.id_user,
		produk.tgl_tanam AS tgl_tanam, 
		produk.tgl_panen AS tgl_panen, 
		produk.berat_panen AS berat_panen,
		produk.luas_lahan AS luas_lahan,
		produk.id_tipe_produk, produk.alamat AS alamat,
		produk.id_status_produk,
		produk.created_at, produk.updated_at,
		user.nama AS user, tipe_produk.nama AS tipe_produk, status_produk.nama AS status_produk FROM produk, user, 
		tipe_produk, status_produk WHERE produk.id_user = user.id AND produk.id_tipe_produk = tipe_produk.id AND produk.id_status_produk = status_produk.id AND produk.id = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}

	
	public function select_produk_by_user_id($id){
		$this->db->select("produk.id,tipe_produk.foto as foto,produk.alamat as alamat ,tipe_produk.nama,user.telp, produk.tgl_panen, produk.tgl_tanam, tipe_produk.harga, status_produk.nama AS status,status_produk.id AS status_id, produk.luas_lahan, produk.berat_panen, produk.created_at, produk.updated_at" );
		$this->db->from('produk');
		$this->db->join('user','user.id = produk.id_user');
		$this->db->join('tipe_produk','tipe_produk.id = produk.id_tipe_produk');
		$this->db->join('status_produk', 'produk.id_status_produk = status_produk.id');
		$this->db->where('produk.id_user', $id);
		$this->db->where('id_status_produk',1);
		$this->db->or_where('id_status_produk',2);
		$this->db->order_by('updated_at','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_produk_penjualan_by_user_id($id,$filter=null){
		$this->db->select("produk.id,tipe_produk.foto as foto, tipe_produk.nama,user.telp, produk.tgl_panen, produk.tgl_tanam, tipe_produk.harga, status_produk.nama AS status,status_produk.id AS status_id, produk.luas_lahan, produk.berat_panen, produk.created_at, produk.updated_at" );
		$this->db->from('produk');
		$this->db->join('user','user.id = produk.id_user');
		$this->db->join('tipe_produk','tipe_produk.id = produk.id_tipe_produk');
		$this->db->join('status_produk', 'produk.id_status_produk = status_produk.id');
		$this->db->where('produk.id_user', $id);
		if($filter != null){
			for($i = 0;$i<count($filter); $i++){
				if($i == 0){
					$this->db->where('id_status_produk',$filter[$i]);
				}else{
					$this->db->or_where('id_status_produk', $filter[$i]);
				}
			}	
		}else{
			$this->db->where('id_status_produk',4);
			$this->db->or_where('id_status_produk',5);
			$this->db->or_where('id_status_produk',3);
		}
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
	
	public function update($data) {
		$sql = "UPDATE produk SET id_user='" .$data['id_user'] ."', berat_panen='" .$data['berat_panen'] ."', luas_lahan='" .$data['luas_lahan'] ."', id_tipe_produk='" .$data['id_tipe_produk'] ."', id_status_produk='" .$data['id_status_produk'] ."', alamat='" .$data['alamat'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update2($data){
		$this->db->set($data);
		$this->db->where('id',$data['id']);
		$this->db->update('produk');
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
		$this->db->select('produk.id,user.nik as user_nik, user.nama as user_nama, tipe_produk.nama as tipe_produk_nama, produk.tgl_tanam, produk.tgl_panen, produk.berat_panen,  tipe_produk.harga as tipe_produk_harga, produk.luas_lahan, produk.alamat, status_produk.nama as status_produk_nama');
		$this->db->from('produk');
		$this->db->order_by('id', 'desc');
		$this->db->join('user', 'user.id = produk.id_user');
		$this->db->join('tipe_produk', 'tipe_produk.id = produk.id_tipe_produk');
		$this->db->join('status_produk', 'status_produk.id = produk.id_status_produk');
		$data = $this->db->get('');

		return $data->num_rows();
	}
}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */