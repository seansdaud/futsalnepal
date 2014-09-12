<?php 

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(!isset($data) || $data != true){
			redirect("admin_login");
		}
	}

	function index(){
		$data = array(
			'title' => 'Admin Home',
			'content' => 'admin/home'
		);

		$this->load->view('admin/includes/template', $data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin_login');
	}

	function settings(){
		$data = array(
			'title' => 'Admin Settings',
			'content' => 'admin/settings'
		);

		$this->load->view('includes/template', $data);
	}

	function change_username(){
		$this->form_validation->set_rules('new_username', 'New Username', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_username();
			if($confirm === true){
				$msg = "Username successfully changed";
			}
			else if($confirm === false){
				$msg = "Error occurred. Please try again.";
			}
			else{
				$msg = $confirm;
			}

			$data = array(
				'title' => 'Admin Settings',
				'content' => 'admin/settings',
				'global_message' => $msg
			);

			$this->load->view('includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Admin Settings',
				'content' => 'admin/settings'
			);

			$this->load->view('includes/template', $data);
		}
	}

	function change_password(){
		$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean | min_lenght[6]');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_password();
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
				'title' => 'Admin Settings',
				'content' => 'admin/settings',
				'global_message' => $msg
			);

			$this->load->view('includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Admin Settings',
				'content' => 'admin/settings'
			);

			$this->load->view('includes/template', $data);
		}
	}

	function change_email() {
		$this->form_validation->set_message('valid_email', 'Email not valid.');
		$this->form_validation->set_rules('new_email', 'New Email', 'trim|xss_clean|valid_email');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_email();
			if($confirm === true){
				$msg = "Email Successfully changed.";
			}
			else if($confirm === false){
				$msg = "Error occurred. Please try again.";
			}
			else{
				$msg = $confirm;
			}

			$data = array(
				'title' => 'Admin Settings',
				'content' => 'admin/settings',
				'global_message' => $msg
			);

			$this->load->view('includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Admin Settings',
				'content' => 'admin/settings'
			);

			$this->load->view('includes/template', $data);
		}
	}
}