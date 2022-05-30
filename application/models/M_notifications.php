<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifications extends CI_Model {
	public function create($from, $to, $type_id, $description) {
        $this->db->insert("notifications",
            [
                "from_id" => $from,
                "to_id" => $to,
                "type_id" => $type_id,
                "description" => $description
            ]);
	}
    
    public function get_new_order_notifications($user_id){
        $this->db->from('notifications');
        $this->db->where('type_id',1);
        $this->db->where('to_id',$user_id);
        $this->db->where('is_read',0);
        $data =  $this->db->get()->result();
        if(count($data) > 0){
            //update is_read
            $this->db->where('type_id',1);
            $this->db->where('to_id',$user_id);
            $this->db->set('is_read',1)->update('notifications');
            return $data;
        }else{
            return null;
        }
    }

    public function get_new_pickup_notification($user_id){
        $this->db->from('notifications');
        $this->db->where('type_id',3);
        $this->db->where('to_id',$user_id);
        $this->db->where('is_read',0);
        $data =  $this->db->get()->result();
        if(count($data) > 0){
            //update is_read
            $this->db->where('type_id',3);
            $this->db->where('to_id',$user_id);
            $this->db->set('is_read',1)->update('notifications');
            return $data;
        }else{
            return null;
        }
    }
}