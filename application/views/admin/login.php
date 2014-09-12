<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="log-wrapper">
				<?php echo form_open("admin_login/post_login"); ?>
					  <div class="form-group">
					    <label class="log-label">Username</label>
					    <div class="input-group">
					      <div class="input-group-addon"><span class="glyphicon log-icon glyphicon-user"></span></div>
					      <input class="form-control" name="username" type="text" placeholder="Username" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="log-label">Password :</label>
					    <div class="input-group">
					      <div class="input-group-addon"><span class="glyphicon log-icon glyphicon-ok-sign"></span></div>
					      <input type="password" name="password" placeholder="Password" required class="form-control" >
					    </div>
					    
					  </div>
					  <input type="submit" class="btn btn-success" value="Login">	

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>