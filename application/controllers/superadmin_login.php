<?php 


class SuperAdmin_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->userdata();
	}

	function userdata(){
		$data = $this->session->userdata('super_admin_logged_in');

		if(isset($data) && $data == true ){
			redirect('superadmin');
		}
	}

	function index(){
		$data = array(
			'title' => 'login Super Admin',
			'content' => 'superadmin/login'
		);

		$this->load->view('Superadmin/includes/template', $data);
	}

	function postlogin(){

		$this->load->model('superadmin_model');
		$validate = $this->superadmin_model->validate_super_admin();

		if($validate){
			$data = array(
				'superadmin' => $this->input->post('username'),
				'super_admin_logged_in' => true
			);

			$this->session->set_userdata($data);

			redirect('superadmin');
		}
		$data = array(
			'title' => 'admin Login',
			'content' => 'superadmin/login',
			'global_message' => 'Username and Password does not exists.'
		);

		$this->load->view('Admin/Includes/template', $data);
	}

}