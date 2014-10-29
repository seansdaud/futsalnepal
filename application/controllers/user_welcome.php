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
			'content' => 'users/welcome'
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
				redirect('user_welcome');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'error occured. Please try again.');
				redirect('user_welcome');
			}
			else if($cofirm==0){
				$this->session->set_flashdata('feedback', 'Invalid current password.');
				redirect('user_welcome');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Minimum character for password is 6.');
			redirect('user_welcome');
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
				redirect('user_welcome');
			}
			$this->session->set_flashdata('feedback', 'Error Occurred. Please choose different file.');
			redirect('user_welcome');
		}
	}

}