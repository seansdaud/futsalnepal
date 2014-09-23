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


		function change_password(){
			$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean | min_lenght[6]');

			if($this->form_validation->run() == true){
				$confirm = $this->user_model->change_password();
				if($confirm === true){
					$msg = "Password Successfully changed.";
				}
				else if($confirm === false){
					$msg = "Error occurred. Please try again.";
				}
				else{
					$msg = $confirm;
				}

				$data = array(
					'title' => 'User setting',
					'content' => 'users/user_settings',
					'global_message' => $msg
				);

				$this->load->view('users/includes/template', $data);
			}
			else{
				$data = array(
					'title' => 'user setting',
					'content' => 'users/user_settings'
				);

				$this->load->view('users/includes/template', $data);
			}
		}

		public function user_setting(){
			$data = array(
					'title' => 'user setting',
					'content' => 'users/user_settings'
				);

				$this->load->view('users/includes/template', $data);
		}

}