<?php 


$data['title'] = $title;

$this->load->view('users/includes/header', $data);
	
$this->load->view('users/includes/nav');

$this->load->view($content);
$this->load->view('users/includes/footer');