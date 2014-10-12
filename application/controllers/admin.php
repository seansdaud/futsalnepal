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
		$new=$this->db->where('admin_id',$adminid)->get('scheduler')->result();
		foreach ($new as $key) {

			if($this->db->where("schedule_id",$key->id)){
			$this->db->delete('booking');
			}
		}
		$this->work_model->delete_schedule($adminid);
		$diff=$this->input->post('diff');
		$j=-1;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
			for ($j=1; $j < 8; $j++) { 
					$data = array(
					'admin_id'=>$adminid,
					'time_diff'=>$this->input->post('diff'),
					'start_time' => $this->input->post('start_time'.$i),
					'end_time' => $this->input->post('end_time'.$i),
					'price' => $this->input->post($j.$i),
					'day'=>$j
				);
					$this->work_model->add_schedule($data);
			}
			
		
			
		}
		if($j== $diff-1){

			// print_r(json_encode($result));
		}
		else{
			// print_r("error");
		}
	
			redirect("admin/show_schedular");

	}
	function show_schedular(){
	$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
	$adminid= $admin[0]->id;
	$data1['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
		$data = array(
			'title' => 'Show schedular',
			'content' => 'admin/showschedular'
		);
		$data['schedular']= $this->db->get('scheduler')->result();
		$this->load->view('admin/includes/template', array_merge($data,$data1));
	}
	function get_schedular(){
	$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
	$adminid= $admin[0]->id;
	$data['new']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
	$diff=$data['new'];
	print_r(json_encode($diff));
	}
	function update_schedular(){
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$diff=$this->input->post('diff');
		$c=0;
		$k=0;
		$result = array();
		for ($i=0; $i < $diff; $i++) { 
			for ($j=1; $j < 8; $j++) { 
				$c++;
					$data = array(
					'id'=>$this->input->post('id'.$c),
					'admin_id'=>$adminid,
					'time_diff'=>$this->input->post('diff'),
					'start_time' => $this->input->post('start_time'.$c),
					'end_time' => $this->input->post('end_time'.$c),
					'price' => $this->input->post($j.$i),
					'day'=>$j
				);
					if($this->work_model->update_schedule($data)){
						$k++;
						array_push($result,$this->input->post('id'.$c));
					}
			}
			
		
			
		}
		
			if($k==$diff*7){
							print_r(1);
			
				}


	}
	function book_schedular(){
		$data = array(
			'title' => 'Book schedular',
			'content' => 'admin/choose_player'
		);
		$this->load->view('admin/includes/template',$data);
	}
	function pre_book_schedule(){
		if($username=$this->input->post('user')){
			if($user = $this->db->where('username', $username)->get('user')->result()){
			$data2 = array(
				'user_id' => $user[0]->Id
						);
		}
		else{
			$data2 = array(
				'user_id' =>NULL
						);
		}
		}
		else if($new=$this->session->flashdata('new')){
			$data2 = array(
				'user_id' => $new['user']
						);
		}
		else{
			$data2 = array(
				'user_id' =>NULL
						);

		}
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$data1['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
			$data = array(
				'title' => 'Book schedular',
				'content' => 'admin/bookschedular'
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data,$data1,$data2));
		
	}
	function book(){
			date_default_timezone_set("Asia/Katmandu"); 
			$date = $this->db->where('id', $this->uri->segment(3))->get('scheduler')->result();
			// print_r($date[0]->day);
			$data = array(
					'schedule_id'=>$this->uri->segment(3),
					'user_id'=>$this->uri->segment(4),
					'booking_date'=>date("Y-m-d")
					);
			$booking_id=$this->work_model->booking($data);
			$data1=array('book_status'=>$booking_id);
			$this->db->where('id',$this->uri->segment(3));
			$this->db->update('scheduler',$data1);
			$data2 = array('user'=>$this->uri->segment(4));
			$this->session->set_flashdata('new',$data2);
			redirect("admin/pre_book_schedule");
	}

}