<?php 


$data['title'] = $title;

if(isset($global_message)){
	$data['message'] = $global_message;
}
else{
	$data['message'] = '';
}

$this->load->view('superadmin/includes/header', $data);

if($this->session->userdata('super_admin_logged_in') == true){
	$this->load->view('superadmin/includes/nav');
}
$this->load->view($content);
$this->load->view('superadmin/includes/footer');