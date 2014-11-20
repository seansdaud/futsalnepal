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
		$username=$this->input->post('new_username');
		$row=$this->db->where('username',$username)->get('admin')->num_rows();
		if($row==1){
			$this->session->set_flashdata('feedback', 'Username already taken. choose a different one!');
			redirect('admin/settings');
		}

		else{
			$this->load->model('admin_model');
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
	}

	function change_password(){
		$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean');

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
			$this->session->set_flashdata('feedback', 'Something went wrong. Please try again');
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
				$this->session->set_flashdata('feedback', 'current password not matched.');
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
		// foreach ($new as $key) {

		// 	if($this->db->where("schedule_id",$key->id)){
		// 	$this->db->delete('booking');
		// 	}
		// }
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
			'id'=>'books'
		);

		}
		else{
				$data = array(
			'title' => 'Book schedular',
			'content' => 'admin/type_player',
			'id'=>'books'
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
				'id'=>'books'
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data,$data1));
		
	}
	function book_for_all(){
		$data = array(
				'title' => 'Book schedular',
				'content' => 'admin/book_for_all',
				'id'=>'books',
				'getdate'=>$this->input->post('getdate')
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data));
	}
	function book(){
			$date = $this->db->where('id', $this->uri->segment(3))->get('scheduler')->result();
			// print_r($date[0]->day);
			$data = array(
					'schedule_id'=>$this->input->post('key_id'),
					'user_id'=>$this->input->post('user_id'),
					'booking_date'=>$this->input->post('date'),

					);
			$datename= $this->db->where('id',$this->input->post('key_id'))->get('scheduler')->result();
			if($datename[0]->book_status==0){
				$booking_id=$this->work_model->booking($data);
				$data1=array('book_status'=>$booking_id);
				$this->db->where('id',$this->input->post('key_id'));
				$this->db->update('scheduler',$data1);
				$data1=array('status'=>$booking_id);
				$this->db->where('id',$booking_id);
				$this->db->update('booking',$data1);
				redirect("admin/pre_book_schedule");
			}
			else{
				$booking_id=$this->work_model->booking($data);
				$statusname= $this->db->where('id',$this->input->post('key_id'))->get('scheduler')->result();
				$data2=array('status'=>$statusname[0]->book_status);
				$this->db->where('id',$booking_id);
				$this->db->update('booking',$data2);
				redirect("admin/pre_book_schedule");
			}
			
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
				'id'=>'todayschedular'
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
				'id'=>'books'
			);
			$data['schedular']= $this->db->get('scheduler')->result();
			$this->load->view('admin/includes/template', array_merge($data,$data1));
	}
	function detail_schedular_post(){

		$admin = $this->db->where('username', $this->session->userdata('admin'))->get('admin')->result();
		$adminid= $admin[0]->id;
		$data['schedular']=$this->db->where('admin_id', $adminid)->get('scheduler')->result();
		$data = array(
				'title' => 'Detail schedule',
				'content' => 'admin/show_now',
				'id'=>'todayschedular',
				'getdate'=>$this->input->post('getdate')
			);
		$this->load->view('admin/includes/template',$data);
	}
	function news(){
		$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
		$id=$id[0]->id;
		$data = array(
				'title' => 'News',
				'content' => 'admin/news',
				'id'=>'medias',
			);
		$this->load->library('pagination');
		$this->load->library('table');
		$base_url = site_url().'admin/news';
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->db->get('news')->num_rows();
		$config['per_page'] = 8;
		$config['num_links'] = 5;
		$data['news']=$this->db->where('admin_id',$id)->order_by('id', 'desc')->get('news', $config['per_page'], $this->uri->segment(3))->result();
		$this->pagination->initialize($config);
		$this->load->view('admin/includes/template',$data);
	}
	function create_news(){
		$data=array(
				'title'=>'create news',
				'content'=>'admin/create_news',
				'id'=>'medias'
			);
		$this->load->view('admin/includes/template',$data);
	}
	function news_post(){
		$this->form_validation->set_rules('title', 'Title', 'is_unique[news.title]');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if($this->form_validation->run() == false){
			$this->create_news();
		}
		else{
  			$name=$_FILES['image']['name'];
  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  			$path1= uniqid().'.'.$ext;
	  		$path='assets/images/news/'.$path1;

	  		if($_FILES['image']['error']==0 && move_uploaded_file($_FILES['image']['tmp_name'], $path)){
	  			$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
				$id=$id[0]->id;
  				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'image'=>$path1,
					'admin_id'=>$id,
					'date' => date('Y-m-d H:i:s'),
					'day' => date('d'),
					'month' => date('M')
				);
			}
			if($this->admin_model->news($data)){
				$this->session->set_flashdata('feedback', 'News successfully created!!');
				redirect('admin/news');
			}
			else{
				$this->session->set_flashdata('feedback', 'Something went wrong. Please try again.');
			}

		}
	}
	function news_edit(){
		$data = array(
			'title' => 'Edit News',
			'content' => 'admin/edit_news',
			'id' => 'medias'
		);
		$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
		$id=$id[0]->id;
		$data['records']=$this->db->get_where('news',array('id'=>$this->uri->segment(3),'admin_id'=>$id))->result();

		$this->load->view('admin/includes/template', $data);
	}

	function news_edit_post(){
			$name = $_FILES['image']['name'];
			$news_id=$this->input->post('id');
			if(isset($name) && !empty($name)){
				$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
				$id=$id[0]->id;
				$results=$this->db->get_where('news',array('id'=>$news_id,'admin_id'=>$id))->result();
	  			$path1=$results[0]->image;
		  		$path='assets/images/news/'.$path1;
		  		if($_FILES['image']['error']==0 && move_uploaded_file($_FILES['image']['tmp_name'], $path)){
			  			$data = array(
							'title' => $this->input->post('title'),
							'content' => $this->input->post('content'),
							'image' => $path1
						);
			  		}
			  	}
			else{
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content')
				);
			}

			$this->db->where('id',$news_id);
			if($this->db->update('news', $data)){
				$this->session->set_flashdata('feedback', 'News Updated.');
				redirect('admin/news');
			}
			else{
				$this->session->set_flashdata('feedback', 'Something went wrong. Please try again.');
				redirect("admin/news_edit/".$news_id);
			}
	}
	function news_delete(){
		$results=$this->db->get_where('news',array('id'=>$this->uri->segment(3)))->result();
		$path='./assets/images/news/'.$results[0]->image;
		unlink($path);
		$this->db->where('id', $this->uri->segment(3));
		if($this->db->delete('news')){
			$this->session->set_flashdata('feedback', 'Deleted Successfully!!');
			redirect('admin/news');
		}
		else{
			$this->session->set_flashdata('feedback', 'Something went wrong. Please try again.');
			redirect('admin/news');
		}
	}
	function video(){
		$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
		$id=$id[0]->id;
		$data=array(
			'title'=>'add-video',
			'content'=>'admin/add_video',
			'id'=>'medias',
			'video'=>$this->db->where('admin_id',$id)->order_by('id', 'desc')->get('video')->result()
		);
		$this->load->view('admin/includes/template',$data);
	}
		public function add_video(){
				$video= explode("=", $this->input->post('video'));
	  			$video=str_split($video[1],11);
	  			$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
				$id=$id[0]->id;
				$data=array(
						'name'=>$this->input->post('name'),
						'video'=>$video[0],
						'admin_id'=>$id,
						'date'=>date('Y-m-d H:i:s')
					);
					$result=$this->admin_model->add_video($data);
					if($result==1){
						$this->session->set_flashdata('feedback', 'video embeded successfully!');
						redirect('admin/video');
					}
					else{
						$this->session->set_flashdata('feedback', 'Failed to embed video!');
						redirect('admin/video');
					}
			}
		public function delete_video(){
			$result=$this->admin_model->delete_video();
			if($result==1){
				$this->session->set_flashdata('feedback', 'video successfully deleted!!');
				redirect('admin/video');	
			}
		}

		function album(){
			$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
			$id=$id[0]->id;
			$data=array(
				'title'=>'add-album',
				'content'=>'admin/add_album',
				'id'=>'medias',
				'album'=>$this->db->where('admin_id',$id)->order_by('id', 'desc')->get('album')->result()
			);
			$this->load->view('admin/includes/template',$data);
		}

		function add_album(){
			$id=$this->db->select('id')->get_where('admin',array('username'=>$this->session->userdata('admin')))->result();
			$id=$id[0]->id;
			$data=array(
				'name'=>$this->input->post('name'),
				'admin_id' =>$id,
				'date' => date('Y-m-d H:i:s'),
				'id' => 'medias',
				);
				$this->admin_model->add_album($data);
				$this->session->set_flashdata('feedback', 'Album successfully added!!');
				redirect('admin/album');
		}
		public function delete_album(){
					$data=$this->admin_model->get_album_image();
					foreach ($data as $datas) {
						$path='./assets/images/album/'.$datas->image;
						unlink($path);
					}
					$this->admin_model->delete_image();
					$this->admin_model->delete_album();
					$this->session->set_flashdata('feedback', 'Album deleted!!');
					redirect('admin/album');	
		}
		public function images(){
					$data= array(
						'title' => 'Add Images',
						'content' => 'admin/add_images',
						'id' => 'medias',
						'album'=>$this->db->get_where('image',array('album_id'=>$this->uri->segment(3)))->result()
					);

				$this->load->view('admin/includes/template', $data);

			}
		public function add_images(){

						if(!empty($_FILES['image'])){
					  	foreach ($_FILES['image']['name'] as $key => $name) {
					  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
					  			$path1= uniqid().'.'.$ext;
						  		$path='assets/images/album/'.$path1;
						  		if($_FILES['image']['error'][$key]==0 && move_uploaded_file($_FILES['image']['tmp_name'][$key], $path)){
					  			$data=array(
									'image'=>$path1,
									'album_id'=>$this->input->post('id')
								);
							
					  				$this->admin_model->add_images($data);
					  			}
							
					  	 	}

						}
					
						$this->session->set_flashdata('feedback', 'Images successfully added!!');
						redirect('admin/images/'.$this->input->post('id'));

			}
		public function delete_image(){
				$data=$this->db->where('id', $this->uri->segment(3))->get('image')->result();
				$path='./assets/images/album/'.$data[0]->image;
				$album_id=$data[0]->album_id;
				unlink($path);
				$this->db->where("id",$this->uri->segment(3));
				$this->db->delete('image');
				$this->session->set_flashdata('feedback', 'Image successfully deleted!!');
				redirect('admin/images/'.$album_id);	
			}
}