<?php 
	$username = $this->session->userdata('username');
	echo "<br/>welcome<strong> $username</strong>";
?>	
		<p>
		<?php echo anchor("user_welcome/user_setting", 'setting'); ?>
		</p>

		<p>
		<?php echo anchor("user_welcome/user_logout", 'logout'); ?>
		</p>