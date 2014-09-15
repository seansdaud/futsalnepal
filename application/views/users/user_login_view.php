<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h1>SignIn</h1>
	<div id=login>
		<?php echo form_open('user_controller/user_login') ?>

		<p>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username"/>
		</p>

		<p>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password"/>
		</p>

		<p>
		<input type="submit" value="submit" />
		</p>

		<?php echo form_close(); ?>
		<?php echo validation_errors(); ?>

		<?php echo anchor("user_controller/form_signup", 'signup'); ?>

	</div>
	</hr>

	<h1>Search Arena</h1>
	<?php echo form_open('user_controller/find_arena') ?>
	<select id="find_arena" name="find_arena">
	  <option value="Pokhara">Pokhara</option>
	  <option value="kathmandu">Kathmandu</option>
	  <option value="Chitwan">Chitwan</option>
	  <option value="Biratnagar">Biratnagar</option>
	</select>
	<p>
		<input type="submit" value="search" />
	</p>
	<?php echo form_close(); ?>
</body>
</html>