<?php 

class Admin_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
	}
	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(isset($data) && $data == true){
			redirect("admin");
		}
	}

	function index(){
		$data = array(
			'title' => 'Admin Login'
		);

		$this->load->view('admin/login', $data);
	}

	function post_login(){
		$this->form_validation->set_rules('username', 'Username', 'trim | xss_clean');

		if($this->form_validation->run() == TRUE){
			$value = $this->admin_model->login_validate();
			if($value === true){
				$data = array(
					'admin' => $this->input->post('username'),
					'admin_logged_in' => true
				);

				$this->session->set_userdata($data);
				redirect('admin');
			}
			else{
				$this->session->set_flashdata('feedback_admin_login', 'Please!! provide valid login details.');
				redirect('admin_login');
			}
		}
	}

}