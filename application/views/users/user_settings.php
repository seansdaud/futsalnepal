<h1>Change security</h1>
	<?php echo validation_errors(); ?>
	<div id=changepsw>
		<?php echo form_open('user_welcome/change_password') ?>

		<p>
		<label for="current_password">Current Password:</label>
		<input type="password" name="current_password" id="current_password"/>
		</p>

		<p>
		<label for="new_password">New Password:</label>
		<input type="password" name="new_password" id="new_password"/>
		</p>

		<p>
		<input type="submit" value="confirm" />
		</p>

	<?php echo form_close(); ?>

	</div>