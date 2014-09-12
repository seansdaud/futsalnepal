<?php 


class superadmin_model extends CI_Model {

	function validate_super_admin(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		$query = $this->db->get('superadmin');

		$num = $query->num_rows();
		if($num == 1){
			return true;
		}
		return false;
	}

	function create_new_admin($data){
		$query = $this->db->insert('admin', $data);
		if($query){
			return true;
		}
		return false;
	}

	function delete_admin(){
		$this->db->where('id', $this->uri->segment(3));
		if($this->db->delete('admin')){
			return true;
		}
		return false;
	}

	function change_username(){
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('superadmin')->num_rows() == 1 ){

			$data = array(
				'username' => $this->input->post('new_username')
			);

			$this->db->where('password', sha1($this->input->post('password')));
			$update = $this->db->update('superadmin', $data);

			if($update){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}

	function change_password(){
		$this->db->where('password', sha1($this->input->post('current_password')));
		if($this->db->get('superadmin')->num_rows() == 1){

			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('username', $this->session->userdata('superAdmin'));
			if($this->db->update('superadmin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid current password.";
	}

	function change_email(){
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('superadmin')->num_rows() == 1){

			$data['email'] = $this->input->post('new_email');

			$this->db->where('username', $this->session->userdata('superAdmin'));
			if($this->db->update('superadmin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}

}