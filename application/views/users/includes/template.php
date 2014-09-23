<?php 


$data['title'] = $title;

$this->load->view('users/includes/header', $data);

if($this->session->userdata('user_logged_in') == true){
	$this->load->view('users/includes/nav');
}
$this->load->view($content);
$this->load->view('users/includes/footer');