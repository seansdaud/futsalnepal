<div class="col-md-12">
		<div class="form-group login">	
					<div><?php echo $this->session->flashdata('feedback_signup');?></div>
					<div class="register">create account</div>
					<?php 
					$attributes = array('class' => 'user_signup', 'data-toggle' => 'validator');
					echo form_open('futsalnepal/create',$attributes) ?>

					<div class="form-group field">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-info-sign"></span></div>
							<input class="form-control" name="name" type="text" placeholder="Fullname" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group field">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-globe"></span></div>
							<input class="form-control" name="email" type="email" placeholder="email" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>

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
							<input class="form-control" name="password" type="password" placeholder="password" required>
						</div>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group field">
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-earphone"></span></div>
							<input class="form-control" name="contactno" data-minlength="10" maxlength="10" data-error="enter 10 digit number" type="tel"  placeholder="Contact number.." required>
						</div>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group field">
						<div class="input-group">
							<input type="submit" class="btn btn-default login-btn disabled" value="Signup" style="pointer-events: all; cursor: pointer;">
						</div>
					</div>
					<?php echo form_close(); ?>
					<?php echo validation_errors(); ?>
		</div>
</div>
 

	