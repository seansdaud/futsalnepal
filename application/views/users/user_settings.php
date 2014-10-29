	<?php
		$username=$this->session->userdata('username');
		$result=$this->db->select('id')->where('username',$username)->get('user')->result();
		$id=$result[0]->id;
	?>
<div class="panel-group" id="accordian">

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="#changeusername" data-toggle="collapse" data-parent="#accordian">Change Username</a></strong>
		</div>

		<div class="panel-collapse collapse in" id="changeusername">
			<div class="panel-body">
				<?php echo form_open("user_welcome/change_username", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="text" class="form-control" placeholder="New Username" name="new_username" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="submit">
						<input type="hidden" name="hidden_id" value="<?php echo $id;?>">
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
				<?php echo form_open("user_welcome/change_password", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" data-minlength="6" name="new_password" data-error="minimum 6 characters required" placeholder="New Password" required>
						<div class="help-block"></div>
					</div>

					<div class="submit">
						<input type="hidden" name="hidden_id" value="<?php echo $id;?>">
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
				<?php echo form_open("user_welcome/change_email", array('data-toggle' => 'validator')); ?>
					
					<div class="form-group">
						<input type="email" pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$" data-error="Invalid Email" class="form-control" name="new_email" value=" <?php echo $this->session->flashdata('new_email');?> " placeholder="New Email" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="submit">
						<input type="hidden" name="hidden_id" value="<?php echo $id;?>">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

</div>