<div class="col-md-12">
	<div class="form-group login">
		<p><?php echo $this->session->flashdata('feedback');?></p>
		<h1>SignIn</h1>
		<?php
		$attributes=array('class'=>'user_signin', 'data-toggle'=>'validator');
		echo form_open('futsalnepal/user_login',$attributes) ?>
					<div class="form-group field">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-user"></span></div>
							<input class="form-control" name="username" type="text" placeholder="Username" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group field">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-lock"></span></div>
							<input type="password" name="password" placeholder="Password" required class="form-control" >
						</div>
							<div class="help-block with-errors"></div>
					</div>
					<div class="form-group field">
						<div class="input-group">
							<input type="submit" class="btn btn-default login-btn disabled" value="Login" style="pointer-events: all; cursor: pointer;">
						</div>
					</div>
			</div>
				<?php echo form_close(); ?>
</div>

