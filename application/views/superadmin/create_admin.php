<h1 class="heading">Create Admin</h1>
<div class="row">
	<div class="col-md-5">
		<form action="<?php echo site_url().'SuperAdmin/create_admin_post'; ?>" method='post' data-toggle='validator'>
			<div class="form-group">
				<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-user fav-icon"></span></div>
							<input class="form-control" name="username" type="text" placeholder="username" data-error="Provide username" required>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-lock fav-icon"></span></div>
							<input class="form-control" name="password" id="password" data-minlength="6" type="password" placeholder="password" required>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-lock fav-icon"></span></div>
							<input class="form-control" type="password" name="password_again" id="password_again" data-match="#password" data-match-error="Whoops, password don't match" placeholder="confirm password" required>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-globe fav-icon"></span></div>
							<input class="form-control" name="email" type="email" placeholder="email" required>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-user fav-icon"></span></div>
							<input class="form-control" name="fieldname" type="text" placeholder="fieldname" data-error="Provide fieldname" required>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<div class="input-group">
						<input type="submit" class="btn btn-default" value="Confirm" style="pointer-events: all; cursor: pointer;">
				</div>
			</div>
			<div><?php echo $this->session->flashdata('feedback');?></div>
		</form>
	</div>
</div>

