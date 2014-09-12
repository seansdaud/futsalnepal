<?php 


$data['title'] = $title;

if(isset($global_message)){
	$data['message'] = $global_message;
}
else{
	$data['message'] = '';
}

$this->load->view('users/includes/header', $data);

if($this->session->userdata('admin_logged_in') == true){
	$this->load->view('users/includes/nav');
}
$this->load->view($content);
$this->load->view('users/includes/footer');