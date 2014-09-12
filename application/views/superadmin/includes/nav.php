<?php echo ucfirst($message); ?>

<ul>	
	<li><a href="<?php echo base_url('superadmin'); ?>">Home</a></li>
	<li><?php echo anchor('superadmin/logout', 'Logout'); ?></li>
	<li><?php echo anchor('superadmin/create_admin', 'Create Admin') ?></li>
	<li><?php echo anchor('superadmin/admins', 'Admins'); ?></li>
	<li><?php echo anchor('superadmin/settings', 'Settings') ?></li>
</ul>