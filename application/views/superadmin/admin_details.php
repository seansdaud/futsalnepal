<h1 class="heading">Admins</h1>
	
	<?php if(!empty($records)) { ?>
				<?php if(!empty($records[0]->image)): ?>
					<img src="<?php echo base_url('assets/images/profile/admin/'.$records[0]->image); ?>" height="330px" width="330px"><br/>						
				<?php else: ?>
					<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="330px" width="330px"><br/>
				<?php endif; ?>
				<?php 
					echo $records[0]->username."<br />";
					echo $records[0]->email."<br />"; ?>
	<?php } ?>
	