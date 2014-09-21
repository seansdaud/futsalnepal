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
		function schedular(){
		$data = array(
			'title' => 'Admin schedular',
			'content' => 'admin/schedular'
		);

		$this->load->view('admin/includes/template', $data);
	}
	function add_schedule(){
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid=$admin[0]->id;
		$this->work_model->delete_schedule($adminid);
		$diff=$this->input->post('diff');
		$j=-1;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
				$data = array(
					'admin_id'=>$adminid,
					'time_diff'=>$this->input->post('diff'),
					'start_time' => $this->input->post('start_time'.$i),
					'end_time' => $this->input->post('end_time'.$i),
					'sunday_price' => $this->input->post('sunday'.$i),
					'monday_price' => $this->input->post('monday'.$i),
					'tuesday_price' => $this->input->post('tuesday'.$i),
					'wednesday_price' => $this->input->post('wednesday'.$i),
					'thrusday_price' => $this->input->post('thrusday'.$i),
					'friday_price' => $this->input->post('friday'.$i),
					'saturday_price' => $this->input->post('saturday'.$i)
				);
			$this->work_model->add_schedule($data);
		
			
		}
		if($j== $diff-1){

			// print_r(json_encode($result));
		}
		else{
			// print_r("error");
		}
		$data = array(
			'title' => 'Show schedular',
			'content' => 'admin/showschedular',
				'global_message' => 'Schedule Created'
			);

			$this->load->view('admin/includes/template', $data);
		

	}
	function show_schedular(){
		$data = array(
			'title' => 'Show schedular',
			'content' => 'admin/showschedular'
		);
		$data['schedular']= $this->db->get('schedular')->result();
		$this->load->view('admin/includes/template', array_merge($data));
	}
	function get_schedular(){
	$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
	$adminid= $admin[0]->id;
	$data['new']=$this->db->where('admin_id', $adminid)->get('schedular')->result();
	$diff=$data['new'];
	print_r(json_encode($diff));
	}
	function update_schedular(){
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		print_r($adminid);
		die();
		$diff=$this->input->post('diff');
		$j=0;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
				$data = array(
					'id'=>$this->input->post('id'.$i),
					'admin_id'=>$adminid,
					'time_diff'=>$this->input->post('diff'),
					'start_time' => $this->input->post('start_time'.$i),
					'end_time' => $this->input->post('end_time'.$i),
					'sunday_price' => $this->input->post('sunday'.$i),
					'monday_price' => $this->input->post('monday'.$i),
					'tuesday_price' => $this->input->post('tuesday'.$i),
					'wednesday_price' => $this->input->post('wednesday'.$i),
					'thrusday_price' => $this->input->post('thrusday'.$i),
					'friday_price' => $this->input->post('friday'.$i),
					'saturday_price' => $this->input->post('saturday'.$i)
				);
				array_push($result, $data);
			if($this->work_model->update_schedule($data)){
				$j++;

			}
		}
			if($j==$diff){
				print_r(1);
		}

	}


}