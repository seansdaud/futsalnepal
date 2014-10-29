<div id="fluid-container">
	<?php if($this->session->userdata('user_logged_in') == true): ?>
		<div class="col-md-9">
			<?php $this->load->view('users/schedule'); ?>
		</div>
		<div class="col-md-3"></div>

	<?php else: ?>
		<div class="col-md-9">
			<?php $this->load->view('users/schedule'); ?>
		<div class="col-md-3 side">
			<div class="row">
				<?php
					$this->load->view('users/user_login_view');
				?>
			</div>
			<div class="row">
				<?php 
					$this->load->view('users/user_signup_view');
				 ?>
			</div>
		</div>
	<?php endif; ?>
