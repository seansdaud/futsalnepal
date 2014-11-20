<?php

class Futsalnepal extends CI_Controller {

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
		date_default_timezone_set("Asia/Katmandu"); 
		$date=date("Y-m-d"); 
		$this->db->where('booking_date <', $date);
		$book=$this->db->get('booking')->result();
		foreach ($book as $key ) {

			$dat=array('book_status'=>'0');
			$this->db->where('book_status',$key->id);
		
			$this->db->update('scheduler',$dat);
		}
		$data = array(
			'title' => 'Futsal Nepal',
			'content' => 'users/home'
		);
		$data['admin']=$this->work_model->get_admin();
		$data['schedular']=$this->db->get('scheduler')->result();
		$this->load->view('users/includes/template', $data);
	}

	public function create(){
	 	$username=$this->input->post('username');
		$row=$this->db->where('username',$username)->get('user')->num_rows();
		if ($row==1)
		{
			$this->session->set_flashdata('feedback_signup', 'Username not available! Choose a different one.');
			redirect('futsalnepal');
		}
		else
		{
				$data=array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'username'=>$username,
					'activation_code'=>random_string('alnum',50),
					'password'=>sha1($this->input->post('password')),
					'contactno'=>$this->input->post('contactno')
				);
			$message_sent=$this->sendVerificationEmail($data['email'],$data['activation_code']);
			if($message_sent==1){
				$this->load->model('user_model');
				$this->user_model->signup($data);
			}
			else{
				echo $message_sent;
			}
			$this->session->set_flashdata('feedback_signup', 'Thank-you for registration! Please check your email to confirm');
			redirect('futsalnepal');
		}
	}

	function sendVerificationEmail($email,$verificationText){
		 $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'slimshady320@gmail.com', 
		  'smtp_pass' => 'lastlife', 
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('Admin');
		$this->email->to($email);
		$this->email->subject("Email Verification");
		$this->email->message("Dear User,</br>Please click on below URL or paste into your browser to verify your Email Address</br> http://localhost/futsalnepal/futsalnepal/verify/".$verificationText."\n"."\n\n</br>Regards,\nfutsal nepal");
		if ($this->email->send()) {
		    
		    return 1;
		}
		else {
		    $error=show_error($this->email->print_debugger());
		    return $error;
		  }
		
	}

	public function user_login(){
			$data=array(
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password'))
				);
			$this->load->model('user_model');
			$result=$this->user_model->user_validate($data);
			if($result==1){
				$status=$this->user_model->check_status($data);
					if($status==1){
							$user_session = array(
							'user_logged_in' => true,
							'username' => $this->input->post('username')
						);

						$this->session->set_userdata($user_session);

						redirect('user_welcome');
					}
					else{
						$this->session->set_flashdata('feedback', 'Please!! Check your email for confirmation');
						redirect('futsalnepal');
					}
			}
			else{
				$this->session->set_flashdata('feedback', 'username or password not matched! </br> Please sign in again!');
				redirect('futsalnepal');
			}
	}

	public function verify(){
			$confirmation_code = $this->uri->segment(3);
			$result=$this->user_model->status_validation($confirmation_code);
			if($result==2){
				$this->session->set_flashdata('feedback', 'Your email is already verified</br>provide login details below');
				redirect('futsalnepal');
			}
			else if($result==1){
				$this->session->set_flashdata('feedback', 'Your account have been verified!</br>please enter your login details below');
				redirect('futsalnepal');
			}
			else if($result==0){
				$this->session->set_flashdata('feedback', 'Wrong verification code!</br> Please sign-up again');
				redirect('futsalnepal');
			}
		}



	function login(){
		$data = array(
			'title' => 'Futsal Nepal login',
			'content' => 'users/user_login_view'
		);
		$this->load->view('users/includes/template', $data);
	}
	 function signup(){
	 	$data = array(
			'title' => 'Futsal Nepal signup',
			'content' => 'users/user_signup_view'
		);
		$this->load->view('users/includes/template', $data);
	 }

	 public function find_arena(){
		$search_value=$this->input->post('find_arena');
		
		$data = array(
					'title' => 'user login',
					'content' => 'users/search_arena_view'
				);
		$data['records']=$this->user_model->search_arena($search_value);

				$this->load->view('users/includes/template', $data);
	}
	function book(){
		$data = $this->session->userdata('user_logged_in');
		if(isset($data) && $data == true){
			// $this->work_model->book($this->ui->segment(3));
			redirect('futsalnepal');
		}
		else{
			redirect('futsalnepal');
		}
	}
}