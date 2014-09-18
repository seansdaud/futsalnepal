<?php
 class User_model extends CI_Model{
	 	function signup($data){
			$this->db->insert('user',$data);
			return 1;
	 	}

	 	function user_validate($data){
	 		$this->db->cache_on();
			$array = array('username' => $data['username'], 'password' => $data['password']);
			$this->db->where($array);
			$result=$this->db->get('user')->num_rows();
			return $result; 
	 	}

	 	function search_arena($search_value){
	 		if(empty($search_value)){
	 			return;
	 		}
	 		$this->db->select('*');
	        $this->db->from('futsal_arena');
	        $this->db->like('city',$search_value);
	        $result=$this->db->get()->result();
	        return $result;
	 	}

	 	function change_password(){
		$this->db->where('password', sha1($this->input->post('current_password')));
		if($this->db->get('user')->num_rows() == 1){

			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('username', $this->session->userdata('username'));
			if($this->db->update('user', $data)){
				echo "success;"; die();
			}
			return false;
		}
		return "Invalid current password.";
	}

}
