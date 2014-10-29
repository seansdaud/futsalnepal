<?php
	class User_welcome extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->check_login();
		}

		function check_login(){
			$data = $this->session->userdata('user_logged_in');
			if(!isset($data) || $data != true){
				redirect("futsalnepal");
			}
		}

		public function index(){
			$data = array(
			'title' => 'welcome',
			'content' => 'users/home'
			);

			$data['admin']=$this->work_model->get_admin();
			$data['schedular']=$this->db->get('scheduler')->result();
			$this->load->view('users/includes/template', $data);
		}

		public function profile(){
			$data=array(
					'title'=>'profile',
					'content'=>'users/profile'
				);
			$this->load->view('users/includes/template', $data);

		}

		public function user_logout(){
			$this->session->unset_userdata('user_logged_in');
			redirect('futsalnepal');
		}


		function change_password(){
		$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean | min_lenght[6]');

		if($this->form_validation->run() == true){
			$confirm = $this->user_model->change_password();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'Password changed successfully.');
				redirect('user_welcome/profile');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'error occured. Please try again.');
				redirect('user_welcome/user_setting');
			}
			else if($cofirm==0){
				$this->session->set_flashdata('feedback', 'Invalid current password.');
				redirect('user_welcome/user_setting');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Provide valid details.');
			redirect('user_welcome/user_setting');
		}
	}

		public function user_setting(){
			$data = array(
					'title' => 'user setting',
					'content' => 'users/user_settings'
				);

				$this->load->view('users/includes/template', $data);
		}

		function changeProfilePicture(){
		if(!empty($_FILES['file'])){
			$id=$this->input->post('hidden_id');
			$result=$this->db->select('image')->where('id',$id)->get('user')->result();
			$link = "assets/images/profile/users/".$result[0]->image;
			unlink($link);
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= $id.'.'.$ext;
  			$path='assets/images/profile/users/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'image'=>$path1
				);
				$this->db->where('id',$id);
				$this->db->update('user', $data);
				$this->session->set_flashdata('feedback', 'profile picture changed successfully.');
				redirect('user_welcome/profile');
			}
			$this->session->set_flashdata('feedback', 'Error Occurred. Please choose different file.');
			redirect('user_welcome/profile');
		}
	}

	function change_username(){
		$username=$this->input->post('new_username');
		$row=$this->db->where('username',$username)->get('user')->num_rows();
		if($row==1){
			$this->session->set_flashdata('feedback', 'Username already taken. choose a different one!');
			redirect('user_welcome/user_setting');
		}

		else{
			$this->load->model('user_model');
			$confirm = $this->user_model->change_username();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'username changed.');
				redirect('user_welcome/profile');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'Error occured. Please try again.');
				redirect('user_welcome/user_setting');
			}
			else if($confirm==0){
				$this->session->set_flashdata('feedback', 'Invalid password.');
				redirect('user_welcome/user_setting');
			}
		}
	}

	function change_email() {
		$this->form_validation->set_message('valid_email', 'Email not valid.');
		$this->form_validation->set_rules('new_email', 'New Email', 'trim|xss_clean|valid_email');

		if($this->form_validation->run() == true){
			$confirm = $this->user_model->change_email();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'Email changed successfully.');
				redirect('user_welcome/profile');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'Error occured. Please try again.');
				$this->session->set_flashdata('new_email', $this->input->post('new_email'));
				redirect('user_welcome/user_setting');
			}
			else if($confirm==0){
				$this->session->set_flashdata('feedback', 'current password not matched.');
				$this->session->set_flashdata('new_email', $this->input->post('new_email'));
				redirect('user_welcome/user_setting');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Please provide valid details.');
			$this->session->set_flashdata('new_email', $this->input->post('new_email'));
			redirect('user_welcome/user_setting');
		}
	}

}