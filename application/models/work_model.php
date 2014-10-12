<?php 


class Work_model extends CI_Model {
	function get_admin(){
		$this->db->select('id,username'); 
	    $this->db->from('admin');   
	    return $this->db->get()->result();
	}
	function add_schedule($data){
	if($this->db->insert("scheduler",$data)){
			return true;
		}
		return false;
	}
	function delete_schedule($data){
	if($this->db->where("admin_id",$data)){
		$this->db->delete('scheduler');
	}
	}
	function update_schedule($data){
		if($this->db->where('id', $data['id'])->update('scheduler', $data)){
			return true;
		}

		return false;
	}
	function booking($data){
		if($this->db->insert("booking",$data)){
			return $this->db->insert_id();
		}
	}
}