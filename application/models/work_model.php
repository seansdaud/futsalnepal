<?php 


class Work_model extends CI_Model {

	function add_schedule($data){
	if($this->db->insert("schedular",$data)){
			return true;
		}
		return false;
	}
	function delete_schedule($data){
	if($this->db->where("admin_id",$data)){
		$this->db->delete('schedular');
	}
	}
	function update_schedule($data){
		// print_r($data);
		// die();
		if($this->db->where('id', $data['id'])->update('schedular', $data)){

			return true;
		}

		return false;
	}
}