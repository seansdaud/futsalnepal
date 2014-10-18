<?php 


$data['title'] = $title;

if(isset($global_message)){
	$data['message'] = $global_message;
}
else{
	$data['message'] = '';
}

$this->load->view('admin/includes/header', $data);

if($this->session->userdata('admin_logged_in') == true){
	$this->load->view('admin/includes/nav');
}
?><div class="col-md-9">
<?php $this->load->view($content); ?>
</div>
<?php
$this->load->view('admin/includes/footer');