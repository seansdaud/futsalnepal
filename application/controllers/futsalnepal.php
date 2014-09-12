<?php

class Futsalnepal extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Futsal Nepal',
			'content' => 'users/home'
		);

		$this->load->view('users/includes/template', $data);
	}

}