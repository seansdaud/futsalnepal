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

	 	
	}
