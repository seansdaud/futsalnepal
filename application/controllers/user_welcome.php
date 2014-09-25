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
			if ($this->form_validation->run() == FALSE)
				{
					redirect('user_welcome/user_setting');
			}
			else{
				$result=$this->user_model->change_psw();
				if($result==1){
					$this->session->set_flashdata('feedback', 'Your password have been changed');
					redirect('user_welcome');
				}
				else if($result==2){
					$this->session->set_flashdata('feedback', 'Could not update! please try again!');
					redirect('user_welcome');
				}

				else if($result==0){
					$this->session->set_flashdata('feedback', 'Your current password do not matched! Provide valid password');
					redirect('user_welcome');
				}
			}
			
		}

		public function user_setting(){
			$data = array(
					'title' => 'user setting',
					'content' => 'users/user_settings'
				);

				$this->load->view('users/includes/template', $data);
		}

		function do_upload()
		{
			$data=array(
					'image_name'=>$_FILES['file']['name'],
					'size'=>$_FILES['file']['size'],
					'type'=>$_FILES['file']['type'],
					
					'temp_name'=>$_FILES['file']['tmp_name'],
					'error'=>$_FILES['file']['error']
				);	
			if(isset($data) && !empty($data)){
				$loc='./images/' ;
				if(move_uploaded_file($data['temp_name'], $loc.$data['image_name'])){
					$this->gallery_model->do_upload($data);
				}
				else{
					echo "upload failed";
				}
			}
			else{
				echo "choose a file";
			}

			$this->load->view('gallery_view');
		}

		function delete_image(){
			$this->gallery_model->delete_image();
		}

}