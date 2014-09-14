<?php

class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('user_logged_in');
		if(isset($data) && $data == true){
			redirect('user_welcome');
		}
	}

	function index(){
		$data = array(
			'title' => 'Futsal Nepal',
			'content' => 'users/user_signup_view'
		);

		$this->load->view('users/includes/template', $data);
	}

	 public function create(){
	 	$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|');
		$this->form_validation->set_rules('contactno', 'Contact Number', 'required|trim|integer|xss_clean|min_val[10]|is_unique[user.contactno]');
		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
			'title' => 'User signup',
			'content' => 'users/user_signup_view'
			);

			$this->load->view('users/includes/template', $data);
		}
		else
		{
				$data=array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password')),
					'contactno'=>$this->input->post('contactno'),
				);

			$this->load->model('user_model');
			$this->user_model->signup($data);
			$this->index();

		}
	}

	public function form_login(){
		$data = array(
			'title' => 'login form',
			'content' => 'users/user_login_view'
		);

		$this->load->view('users/includes/template', $data);
	}

	public function form_signup(){
		$data = array(
			'title' => 'signup form',
			'content' => 'users/user_signup_view'
		);

		$this->load->view('users/includes/template', $data);
	}

	public function user_login(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
			'title' => 'user login',
			'content' => 'users/user_login_view'
			);

			$this->load->view('users/includes/template', $data);
		}
		else{
			$data=array(
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password'))
				);
			$this->load->model('user_model');
			$result=$this->user_model->user_validate($data);

			if($result==1){
					$user_session = array(
						'user_logged_in' => true,
						'username' => $this->input->post('username')
					);

					$this->session->set_userdata($user_session);

				redirect('user_welcome');
			}
			else{
				$data = array(
					'title' => 'user login',
					'content' => 'users/user_login_view'
				);

				$this->load->view('users/includes/template', $data);
			}

		}

	}

}


