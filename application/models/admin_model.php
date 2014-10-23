<?php 


class Admin_model extends CI_Model {

	function login_validate(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1){
			return true;
		}
		return "Username and password does no match.";
	}

	function change_username(){
		$id=$this->input->post('hidden_id');
		$result=$this->db->select('password')->where('id',$id)->get('admin')->result();
		$match=$result[0]->password;
		if(strcmp($match,sha1($this->input->post('password')))==0){
			$data = array(
				'username' => $this->input->post('new_username')
			);
			$this->session->unset_userdata('admin');
			$userdata=array(
					'admin'=>$this->input->post('new_username')
				);
			$this->session->set_userdata($userdata);
			$this->db->where('id', $id);
			$update = $this->db->update('admin', $data);

			if($update){
				return true;
			}
			return false;
		}
		return 0;
	}

	function change_password(){
		$id=$this->input->post('hidden_id');
		$result=$this->db->select('password')->where('id',$id)->get('admin')->result();
		$match=$result[0]->password;
		if(strcmp($match, sha1($this->input->post('current_password')))==0){
			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('id', $id);
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return 0;
	}

	function change_email(){
		$id=$this->input->post('hidden_id');
		$result=$this->db->select('password')->where('id',$id)->get('admin')->result();
		$match=$result[0]->password;
		if(strcmp($match, sha1($this->input->post('password')))==0){
			$data['email'] = $this->input->post('new_email');

			$this->db->where('id', $id);
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return 0;
	}
		function search_user($search_content){
		$row = $this->db->select('id')->like('username', $search_content, 'both')->get('user')->num_rows();
		if($row!=0){
			$res=$this->db->like('username', $search_content, 'both')->get('user')->result();
			
			return $res;
		}
		else{
			$res1 = new stdClass();
			return $res1;
		}
	}
	function search_user_num($search_content){
		$row = $this->db->select('id')->like('username', $search_content, 'both')->get('user')->num_rows();
		if($row!=0){
			$res=$this->db->like('username', $search_content, 'both')->get('user')->num_rows();
			
			return $res;
		}
		else{
			return $row;
		}
	}
}