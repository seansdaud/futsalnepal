
<?php  if ($this->session->flashdata('feedback')):?>

	<div class="alert alert-danger"><?php echo $this->session->flashdata('feedback');?></div>
<?php endif; ?>
</br>
	<h1 class="heading">Welcome To HomePage</h1>