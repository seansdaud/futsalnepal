<form action="<?php echo site_url().'superAdmin_login/postlogin'; ?>" method='post'>
	
	<div>
		Username:<input type="text" name="username" required>
	</div>

	<div>
		Password:<input type="password" name="password" required>	
	</div>
	
	<input type="submit" value="Login">

</form>