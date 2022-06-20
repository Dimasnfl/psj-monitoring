<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logs extends CI_Model {
    public $JEMPUT_KURIR = "operasi_jemput_kurir";
    public $BATAL_TRANSAKSI = "operasi_batal_transaksi";
    
	public function create($nama,$deskripsi) {
		$this->db->insert('logs',[
            "nama"=>$nama,
            "deskripsi" => $deskripsi
        ]);
	}
}