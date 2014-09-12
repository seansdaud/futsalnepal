<form action="<?php echo site_url().'SuperAdmin/create_admin_post'; ?>" method='post'>
	
	<div>
		Username:<input type="text" name="username" value="<?php echo set_value('username'); ?>" required>
		<?php echo form_error('username'); ?>
	</div>

	<div>
		Password:<input type="password" name="password" required>
		<?php echo form_error('password'); ?>
	</div>

	<div>
		Password Again:<input type="password" name="password-again" required>
		<?php echo form_error('password-again'); ?>
	</div>

	<div>
		Email:<input type="email" name="email" value="<?php echo set_value('email'); ?>" required>
		<?php echo form_error('email'); ?>
	</div>
	
	<input type="submit" value="Create">

</form>