<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h2><?php echo $this->session->flashdata('feedback');?></h2>
	<h1>SignIn</h1>
	<div id=login>
		<?php echo form_open('futsalnepal/user_login') ?>

		<p>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username"/>
		</p>

		<p>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password"/>
		</p>

		<p>
		<input type="submit" value="login" />
		</p>

		<?php echo form_close(); ?>
		<?php echo validation_errors(); ?>

	</div>
</body>
</html>