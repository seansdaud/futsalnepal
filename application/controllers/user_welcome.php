<?php
	class User_welcome extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->check_login();
		}

		function check_login(){
			$data = $this->session->userdata('user_logged_in');
			if(!isset($data) || $data != true){
				redirect("user_controller");
			}
		}

		public function index(){
			$data = array(
			'title' => 'welcome',
			'content' => 'users/welcome'
			);

			$this->load->view('users/includes/template', $data);
		}

		public function user_logout(){
			$this->session->unset_userdata('user_logged_in');
			redirect('user_controller');
	}
	}