<div class="feedback-message"><?php echo ucfirst($message); ?></div>

<div class="dashboard-wrapper">
	<div class="row">
		<nav class="nav navbar-default navigation">
			<div class="dashboard-topic">FutsalNepal</div>
			<ul class="logout">
				<li class="settings"><a href="<?php echo base_url('admin/settings'); ?>"><span class="glyphicon glyphicon-cog"></span></a></li>
				<li><a href="<?php echo base_url('admin/logout'); ?>"><span class="glyphicon glyphicon-off"></span></a></li>
			</ul>
		</nav>
		<div class="col-md-3 sidebar">
			<div class="welcome">
				<div class="user-image">
					<?php $picture = $this->db->select('image')->get('admin')->result(); ?>
					<?php $picture = $picture[0]->image; ?>
					<?php if(strcmp($picture, '') != 0): ?>
						<img src="<?php echo base_url('assets/images/profile/admin/'.$picture); ?>" height="80px" width="80px">
					<?php else: ?>
						<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
					<?php endif; ?>
				</div>
				<div class="username">Welcome <?php echo ucfirst($this->session->userdata('admin')); ?></div>
			</div>
			<nav>
				<ul class="sidebar-navigation">
					<li><a href="<?php echo base_url('admin'); ?>"><span class="glyphicon glyphicon-home fav-icon"></span>Home</a></li>
					<li><a href="<?php echo base_url('admin/schedular') ?>"><span class="glyphicon glyphicon-time fav-icon"></span>Schedular</a></li>
					<li><a href="<?php echo base_url('admin/book_schedular') ?>"><span class="glyphicon glyphicon-bookmark fav-icon"></span>Book Schedule</a></li>
					<li><a href="<?php echo base_url('admin/show_schedular') ?>"><span class="glyphicon glyphicon-check fav-icon"></span>Show Schedular</a></li>
					<li><a href="<?php echo base_url('admin/detail_schedular') ?>"><span class="glyphicon glyphicon-check fav-icon"></span>Today's Schedule</a></li>
				</ul>
			</nav>

		</div>
