
<?php echo $this->session->flashdata('feedback');?>	
<?php 
	$username = $this->session->userdata('username');
	echo "<br/>welcome<strong> $username</strong>";
?>
	<div id="display_image">
		<?php if(isset($records)): foreach($records as $row):?>
			<img src="<?php echo site_url('images/'.$row->image_name); ?>" width="200" height="200"/></br>
			<?php
				echo anchor("user_welcome/delete_image/$row->image_id", 'delete'); 
			?>	</br>
		<?php endforeach;?>
		<?php else : ?>
			<div id="uploadpic">
				<form action="<?php echo base_url('user_welcome/do_upload'); ?>" method="post" enctype="multipart/form-data">
				<label for="file">change your profile pic:</label>
				<input type="file" name="image" id="image" accept=".jpg,.png,.jpeg"><br>
				<input type="submit" name="submit" value="Submit">
				</form>
			</div>

		<?php endif; ?>
	</div>
		</br>
		<p>
		<?php echo anchor("user_welcome/user_setting", 'setting'); ?>
		</p>

		<p>
		<?php echo anchor("user_welcome/user_logout", 'logout'); ?>
		</p>