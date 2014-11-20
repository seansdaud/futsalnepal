<h1 class="heading">SuperAdmin Settings</h1>

<div class="panel-group" id="accordian">

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#changeusername" data-toggle="collapse" data-parent="#accordian">Change Username</a></strong>
		</div>

		<div class="panel-collapse collapse in" id="changeusername">
			<div class="panel-body">
				<?php echo form_open("superadmin/change_username", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="text" class="form-control" placeholder="New Username" name="new_username" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="submit">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#changepassword" data-toggle="collapse" data-parent="#accordian">Change Password</a></strong>
		</div>

		<div class="panel-collapse collapse" id="changepassword">
			<div class="panel-body">
				<?php echo form_open("superadmin/change_password", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" data-minlength="6" name="new_password" placeholder="New Password" required>
						<div class="help-block">Minimum 6 characters</div>
					</div>

					<div class="submit">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#changeemail" data-toggle="collapse" data-parent="#accordian">Change Email</a></strong>
		</div>

		<div class="panel-collapse collapse" id="changeemail">
			<div class="panel-body">
				<?php echo form_open("superadmin/change_email", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="email" pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$" data-error="Invalid Email" class="form-control" name="new_email" value=" <?php echo set_value('new_email'); ?> " placeholder="New Email" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="submit">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#adminimage" data-toggle="collapse" data-parent="#accordian">Change Profile Picture</a></strong>
		</div>

		<div class="panel-collapse collapse" id="adminimage">
			<div class="panel-body">
				<?php echo form_open_multipart("superadmin/changeProfilePicture", array('data-toggle' => 'validator')); ?>
					
					<div>
						<?php $picture = $this->db->select('image')->get('superadmin')->result(); ?>
						<?php $picture = $picture[0]->image; ?>
						<?php if(strcmp($picture, '') != 0): ?>
							<img id="imagePreview1" src='<?php echo base_url('assets/images/profile/superadmin/'.$picture); ?>' width="180px" height="180px">
							<img id="imagePreview" width="120px" height="120px">
						<?php else: ?>
							<img id="imagePreview1" src='<?php echo base_url('assets/images/default.jpg'); ?>' width="180px" height="180px">
							<img id="imagePreview" width="120px" height="120px">
						<?php endif; ?>
					</div>

					<div class="choose">
						<button class="btn btn-default changeImage">Change</button>
						<input type="file" class="btn imageFile" id="uploadImage" name="file" accept="image/gif, image/jpeg, image/png" required/>
					</div>
					<div class="submit">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

</div>