<div class="welcome">
	<?php 
		$result=$this->db->select('*')->where('username',$this->session->userdata('username'))->get('user')->result();
		$id=$result[0]->id;
		$name=$result[0]->name;

		echo "<br/>welcome<strong>" .$name."</strong>";
	?>
	<div>
		<div id="display_image">
			<?php echo form_open_multipart("user_welcome/changeProfilePicture", array('data-toggle' => 'validator')); ?>
						
					<div>
						<?php $picture = $this->db->select('image')->where('id',$id)->get('user')->result(); ?>
						<?php $picture = $picture[0]->image; ?>
						<?php if(strcmp($picture, '') != 0): ?>
							<img id="imagePreview1" src='<?php echo base_url('assets/images/profile/users/'.$picture); ?>' width="180px" height="180px">
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
						<input type="hidden" name="hidden_id" value="<?php echo $id;?>">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

			<?php echo form_close(); ?>
		</div>
		<div>
			<?php echo anchor("user_welcome/user_setting", 'setting'); ?>
		</div>
		<div>
			<?php echo anchor("user_welcome/user_logout", 'logout'); ?>
		</div>
	</div>
</div>