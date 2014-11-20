
<div class="dashboard-wrapper">
	<div class="row">
		<nav class="nav navbar-default navigation">
			<div class="dashboard-topic">FutsalNepal(SuperAdmin)</div>
			<ul class="logout">
				<li class="settings"><a href="<?php echo base_url('superadmin/settings'); ?>"><span class="glyphicon glyphicon-cog"></span></a></li>
				<li><a href="<?php echo base_url('superadmin/logout'); ?>"><span class="glyphicon glyphicon-off"></span></a></li>
			</ul>
		</nav>
		<div class="col-md-3 sidebar">
			<div class="welcome">
				<div class="user-image">
					<?php $picture = $this->db->select('image')->get('superadmin')->result(); ?>
					<?php $picture = $picture[0]->image; ?>
					<?php if(strcmp($picture, '') != 0): ?>
						<img src="<?php echo base_url('assets/images/profile/superadmin/'.$picture); ?>" height="80px" width="80px">
					<?php else: ?>
						<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
					<?php endif; ?>
				</div>
				<?php $email = $this->db->select('email')->where('username',$this->session->userdata('superadmin'))->get('superadmin')->result(); ?>
				<?php $email = $email[0]->email; ?>
				<div class="username">Welcome <?php echo ucfirst($this->session->userdata('superadmin')); ?></div>
				<div class="email"><?php echo $email; ?></div>
			</div>
			<nav>
				<ul class="sidebar-navigation">
					<li><a href="<?php echo base_url('superadmin'); ?>"><span class="glyphicon glyphicon-home fav-icon"></span>Home</a></li>
					<li><?php echo anchor('superadmin/create_admin', '<span class="glyphicon glyphicon-list fav-icon"></span>Create Admin') ?></li>
					<li><?php echo anchor('superadmin/admins', '<span class="glyphicon glyphicon-user fav-icon"></span>Admins'); ?></li>
				</ul>
			</nav>

		</div>
