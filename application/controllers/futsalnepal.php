<?php

class Futsalnepal extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Futsal Nepal',
			'content' => 'users/home'
		);
		$data['admin']=$this->work_model->get_admin();
		$data['schedular']=$this->db->get('scheduler')->result();
		$this->load->view('users/includes/template', $data);
	}
	function book(){
		$data = $this->session->userdata('user_logged_in');
		if(isset($data) && $data == true){
			// $this->work_model->book($this->ui->segment(3));
			redirect('futsalnepal');
		}
		else{
			redirect('user_controller');
		}
	}
}