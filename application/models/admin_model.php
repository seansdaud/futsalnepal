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
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1 ){

			$data = array(
				'username' => $this->input->post('new_username')
			);

			$this->db->where('password', sha1($this->input->post('password')));
			$update = $this->db->update('admin', $data);

			if($update){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}

	function change_password(){
		$this->db->where('password', sha1($this->input->post('current_password')));
		if($this->db->get('admin')->num_rows() == 1){

			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('username', $this->session->userdata('admin'));
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid current password.";
	}

	function change_email(){
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1){

			$data['email'] = $this->input->post('new_email');

			$this->db->where('username', $this->session->userdata('admin'));
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}
}