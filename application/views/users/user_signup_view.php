<!DOCTYPE html>
<html>
<head>
	<title>futsalnepal</title>
</head>
<body>
	<h2><?php echo $this->session->flashdata('feedback_signup');?></h2>
	<h1>SignUp</h1>
	<?php echo form_open('futsalnepal/create') ?>

	<p>
	<label for="name">Full Name:</label>
	<input type="text" name="name" id="name"/>
	</p>

	<p>
	<label for="email">Email:</label>
	<input type="text" name="email" id="email"/>
	</p>

	<p>
	<label for="username">Username:</label>
	<input type="text" name="username" id="username"/>
	</p>

	<p>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password"/>
	</p>

	<p>
	<label for="contactno">Contact Number:</label>
	<input type="text" name="contactno" id="contactno"/>
	</p>

	<p>
	<input type="submit" value="signup" />
	</p>

	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>

	<hr/>
	
</body>
</html>