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
?>
<div class="col-md-9">
	<?php $this->load->view($content); ?>
</div>
<?php
$this->load->view('superadmin/includes/footer');