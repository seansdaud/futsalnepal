<?php 

class SuperAdmin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->super_admin_logged_in();
	}

	function super_admin_logged_in(){
		$super_admin_logged_in = $this->session->userdata('super_admin_logged_in');

		if(!isset($super_admin_logged_in) || $super_admin_logged_in != true){
			redirect('superadmin_login');
			die();
		}
	}

	function index(){
		$data = array(
			'title' => 'welcome',
			'content' => 'superadmin/home'
		);

		$this->load->view('superadmin/includes/template', $data);
	}

	function create_admin(){
		$data = array(
			'title' => 'create Admin',
			'content' => 'superadmin/create_admin'
		);	

		$this->load->view('superadmin/includes/template', $data);
	}

	function create_admin_post(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|min_lenght[5]|is_unique[admin.username]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_lenght[6]|xss_clean');
		$this->form_validation->set_rules('password-again', 'Confirm Password', 'trim|matches[password]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[admin.email]|valid_email|xss_clean');

		if($this->form_validation->run() == false){
			$this->create_admin();
		}
		else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => sha1($this->input->post('password')),
				'email' => $this->input->post('email')
			);

			$this->load->model('superadmin_model');
			$query = $this->superadmin_model->create_new_admin($data);

			if($query){
				$data = array(
					'title' => 'create Admin',
					'content' => 'superadmin/home'
				);
				$data['global_message'] = 'Admin successfully created';
				$this->load->view('superadmin/includes/template', $data);
			}
		}
	}

	function logout(){
		$this->session->unset_userdata('super_admin_logged_in');
		redirect('superadmin_login');
	}

	function admins(){
		$data = array(
			'title' => 'available admins',
			'content' => 'superadmin/admins'
		);

		$this->load->library('pagination');
		$this->load->library('table');

		$base_url = site_url().'superadmin/admins';
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->db->get('admin')->num_rows();
		$config['per_page'] = 5;
		$config['num_links'] = 5;

		$this->pagination->initialize($config);
		$this->db->select('id');
		$this->db->select('username');
		$data['records'] = $this->db->get('admin', $config['per_page'], $this->uri->segment(3))->result();

		$this->load->view('superadmin/includes/template', $data);
	}

	function remove_admin(){
		$this->load->model('superadmin_model');
		if($this->superadmin_model->delete_admin()){
			redirect("superadmin/admins");
		}
		$this->index();
	}

	function admin_details(){
		$data = array(
			'content' => 'superadmin/admin_details'
		);

		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get('admin')->result();
		$data['records'] = $query;
		foreach($query as $rows):
			$data['title'] = $rows->username;
		endforeach;

		$this->load->view('superadmin/includes/template', $data);
	}

	function settings(){
		$data = array(
			'title' => 'Super Admin Settings',
			'content' => 'superadmin/settings'
		);

		$this->load->view('superadmin/includes/template', $data);
	}

	function change_username(){
		$this->form_validation->set_rules('current_username', 'Current Username', 'trim|xss_clean');
		$this->form_validation->set_rules('new_username', 'New Username', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean');

		if($this->form_validation->run() == true){
			$confirm = $this->superadmin_model->change_username();
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
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings',
				'global_message' => $msg
			);

			$this->load->view('superadmin/includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings'
			);

			$this->load->view('superadmin/includes/template', $data);
		}
	}

	function change_password(){
		$this->form_validation->set_rules('current_password', 'Current Password', 'xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'xss_clean | min_lenght[6]');

		if($this->form_validation->run() == true){
			$confirm = $this->superadmin_model->change_password();
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
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings',
				'global_message' => $msg
			);

			$this->load->view('superadmin/includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings'
			);

			$this->load->view('superadmin/includes/template', $data);
		}
	}

	function change_email() {
		$this->form_validation->set_rules('current_email', 'Current Email', 'xss_clean | valid_email | trim');
		$this->form_validation->set_rules('new_email', 'New Email', 'xss_clean | valid_email | trim');

		if($this->form_validation->run() == true){
			$confirm = $this->superadmin_model->change_email();
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
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings',
				'global_message' => $msg
			);

			$this->load->view('superadmin/includes/template', $data);
		}
		else{
			$data = array(
				'title' => 'Super Admin Settings',
				'content' => 'superadmin/settings'
			);

			$this->load->view('superadmin/includes/template', $data);
		}
	}
	function changeProfilePicture(){
		if(!empty($_FILES['file'])){
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= 'superadmin_image'.'.'.$ext;
  			$path='assets/images/profile/superadmin/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'image'=>$path1
				);
				$this->db->update('superadmin', $data, "id = 1");
				redirect('superadmin');
			}
			$this->session->set_flashdata('msg', 'Error Occurred. Please choose different file.');
			redirect('superadmin/settings');
		}
	}

}
