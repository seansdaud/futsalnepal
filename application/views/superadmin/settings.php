<h3>Change Username</h3>
<form action=" <?php echo site_url().'superadmin/change_username'; ?> " method="post">
	
	<div>
		New : <input type="text" name="new_username" value=" <?php echo set_value('new_username'); ?> " required>
	</div>

	<div>
		Password : <input type="password" name="password" required>
	</div>

	<input type="submit" value="Confirm">

</form>

<h3>Change Password</h3>
<form action=" <?php echo site_url().'superadmin/change_password'; ?> " method="post">
	
	<div>
		Current : <input type="password" name="current_password" required>	
	</div>
	
	<div>
		New : <input type="password" name="new_password" required>
	</div>

	<input type="submit" value="Confirm">

</form>

<h3>Change Email</h3>
<form action=" <?php echo site_url().'superadmin/change_email'; ?> " method="post">
	
	<div>
		New : <input type="email" name="new_email" value=" <?php echo set_value('new_email'); ?> " required>
	</div>

	<div>
		Password : <input type="password" name="password" required>
	</div>

	<input type="submit" value="Confirm">

</form>