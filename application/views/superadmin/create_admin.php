<div class="col-md-9">
	<form action="<?php echo site_url().'SuperAdmin/create_admin_post'; ?>" method='post' data-toggle='validator'>
		<div class="form-group">
			<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-info-sign"></span></div>
						<input class="form-control" name="username" type="text" placeholder="username" required>
			</div>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group">
			<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-info-sign"></span></div>
						<input class="form-control" name="password" type="password" placeholder="password" required>
			</div>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group">
			<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-info-sign"></span></div>
						<input class="form-control" name="password_again" type="password" placeholder="password again.." required>
			</div>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group">
			<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-info-sign"></span></div>
						<input class="form-control" name="email" type="email" placeholder="email" required>
			</div>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group">
			<div class="input-group">
					<input type="submit" class="btn btn-default" value="Confirm" style="pointer-events: all; cursor: pointer;">
			</div>
		</div>
	</form>
</div>