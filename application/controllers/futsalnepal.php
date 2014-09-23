<?php

class Futsalnepal extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Futsal Nepal',
			'content' => 'users/home'
		);
		$data['admin']=$this->work_model->get_admin();
		$data['schedule']=$this->db->get('schedular')->result();
		$this->load->view('users/includes/template', $data);
	}
}