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
			'content' => 'admin/home',
			'id' => 'home'
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
			'content' => 'admin/settings',
			'id'=>''
		);

		$this->load->view('admin/includes/template', $data);
	}

	function change_username(){
		$this->form_validation->set_rules('new_username', 'New Username', 'trim|xss_clean|is_unique[admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_username();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'username changed.');
				redirect('admin');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'Error occured. Please try again.');
				redirect('admin/settings');
			}
			else if($confirm==0){
				$this->session->set_flashdata('feedback', 'Invalid password.');
				redirect('admin/settings');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Provide valid details.');
			redirect('admin/settings');
		}
	}

	function change_password(){
		$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean | min_lenght[6]');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_password();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'Password changed successfully.');
				redirect('admin');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'error occured. Please try again.');
				redirect('admin/settings');
			}
			else if($cofirm==0){
				$this->session->set_flashdata('feedback', 'Invalid current password.');
				redirect('admin/settings');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Minimum character for password is 6.');
			redirect('admin/settings');
		}
	}

	function change_email() {
		$this->form_validation->set_message('valid_email', 'Email not valid.');
		$this->form_validation->set_rules('new_email', 'New Email', 'trim|xss_clean|valid_email');

		if($this->form_validation->run() == true){
			$confirm = $this->admin_model->change_email();
			if($confirm === true){
				$this->session->set_flashdata('feedback', 'Email changed successfully.');
				redirect('admin');
			}
			else if($confirm === false){
				$this->session->set_flashdata('feedback', 'Error occured. Please try again.');
				redirect('admin/settings');
			}
			else if($confirm==0){
				$this->session->set_flashdata('feedback', 'password not matched.');
				redirect('admin/settings');
			}
		}
		else{
			$this->session->set_flashdata('feedback', 'Please provide valid details.');
			redirect('admin/settings');
		}
	}
	function changeProfilePicture(){
		if(!empty($_FILES['file'])){
			$id=$this->input->post('hidden_id');
			$result=$this->db->select('image')->where('id',$id)->get('admin')->result();
			$link = "assets/images/profile/admin/".$result[0]->image;
			unlink($link);
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= $id.'.'.$ext;
  			$path='assets/images/profile/admin/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'image'=>$path1
				);
				$this->db->where('id',$id);
				$this->db->update('admin', $data);
				$this->session->set_flashdata('feedback', 'profile picture changed successfully.');
				redirect('admin');
			}
			$this->session->set_flashdata('feedback', 'Error Occurred. Please choose different file.');
			redirect('admin/settings');
		}
	}
		function schedular(){
		$data = array(
			'title' => 'Admin schedular',
			'content' => 'admin/schedular',
			'id' => 'scheduler'
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
			'content' => 'admin/showschedular',
			'id'=>'showschedular'
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
		if($this->uri->segment(3)==1){
				$data = array(
			'title' => 'Book schedular',
			'content' => 'admin/choose_player',
			'id'=>'book'
		);

		}
		else{
				$data = array(
			'title' => 'Book schedular',
			'content' => 'admin/type_player',
			'id'=>'book'
		);
		}
	
		$this->load->view('admin/includes/template',$data);
	}
	function pre_book_schedule(){
		if($username=$this->input->post('user')){
			if($user = $this->db->where('username', $username)->get('user')->result()){
				$datanew = array(
					'user_id' => $user[0]->id
				);
			}

				$this->session->set_userdata($datanew);
		
		}
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$data1['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
			$data = array(
				'title' => 'Book schedular',
				'content' => 'admin/bookschedular',
				'id'=>'book'
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data,$data1));
		
	}
	function book(){
			date_default_timezone_set("Asia/Katmandu"); 
			$date = $this->db->where('id', $this->uri->segment(3))->get('scheduler')->result();
			// print_r($date[0]->day);
			$data = array(
					'schedule_id'=>$this->input->post('key_id'),
					'user_id'=>$this->input->post('user_id'),
					'booking_date'=>$this->input->post('date'),
					);
			$booking_id=$this->work_model->booking($data);
			$data1=array('book_status'=>$booking_id);
			$this->db->where('id',$this->input->post('key_id'));
			$this->db->update('scheduler',$data1);
			redirect("admin/pre_book_schedule");
	}
	function searchuser(){
			$search_content=$this->input->post('mem');
				if ($search_content!=null) {
				$result=$this->admin_model->search_user($search_content);
				$result_count=$this->admin_model->search_user_num($search_content);
				if($result_count!=null){
				$suffix=($result_count != 1 )?'s':'';
				$res= array();
				foreach ($result as $key ) {
					$data = array(
					'id'=>$key->id,
					'uname'=> $key->username,
					);
					array_push($res, $data);
				}
				print_r(json_encode($res));
				}
				else{
					$res= array();
					$data = array(
					'uname'=> 'emptysetfound',
					);
					array_push($res, $data);
						print_r(json_encode($res));
				}
				}
				else{
						$res= array();
					$data = array(
					'uname'=> 'emptysetfound',
					);
					array_push($res, $data);
						print_r(json_encode($res));
				}

	}
	function detail_schedular(){
		
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$data['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
		$data = array(
				'title' => 'Detail schedule',
				'content' => 'admin/schedule_today',
				'id'=>'book'
			);
		$this->load->view('admin/includes/template',$data);
	}
	function custom_book_schedule(){

		if($username=$this->input->post('user')){
			$data3 = array(
			'name' => $this->input->post('user'),
			'contactno' => $this->input->post('phn'),
				);
			$this->user_model->signup($data3);
			if($insert_id = $this->db->insert_id()){
				$datanew = array(
					'user_id' => $insert_id 
				);
			}
		
				$this->session->set_userdata($datanew);
		
		}
		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$data1['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
			$data = array(
				'title' => 'Book schedular',
				'content' => 'admin/bookschedular',
				'id'=>'book'
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data,$data1));
	}

}