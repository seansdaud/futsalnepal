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
	}
