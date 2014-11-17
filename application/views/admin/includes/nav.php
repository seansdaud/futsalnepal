
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
					<?php $picture = $this->db->select('image')->where('username',$this->session->userdata('admin'))->get('admin')->result(); ?>
					<?php $picture = $picture[0]->image; ?>
					<?php if(strcmp($picture, '') != 0): ?>
						<img src="<?php echo base_url('assets/images/profile/admin/'.$picture); ?>" height="80px" width="80px">
					<?php else: ?>
						<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
					<?php endif; ?>
				</div>
				<?php $email = $this->db->select('email')->where('username',$this->session->userdata('admin'))->get('admin')->result(); ?>
				<?php $email = $email[0]->email; ?>
				<div class="username">Welcome <?php echo ucfirst($this->session->userdata('admin')); ?></div>
				<div class="email"><?php echo $email; ?></div>
			</div>
			<nav>
				<ul class="sidebar-navigation">
					<li><a href="<?php echo base_url('admin'); ?>"><span class="glyphicon glyphicon-home fav-icon"></span>Home</a></li>
					<li><a href="<?php echo base_url('admin/news'); ?>"><span class="glyphicon glyphicon-list-alt fav-icon"></span>News</a></li>
					<li><a href="<?php echo base_url('admin/schedular') ?>"><span class="glyphicon glyphicon-time fav-icon"></span>Schedular</a></li>
					<div class="panel panel-default nav-panel">
							<div class="panel-heading nav-panel-heading">
								<li><a href="#book" data-toggle="collapse" data-parent="#navaccordian"><span class="glyphicon glyphicon-picture fav-icon"></span>Book Schedule<span class="glyphicon glyphicon-chevron-down drop-up"></span></a></li>
							</div>
							<div class="panel-collapse collapse" id="book">
								<div class="panel-body nav-panel-body">
									<li>
										<ul>
											<li>
												<a href="<?php echo base_url('admin/book_schedular/1'); ?>">												
													<div class="bookpaneloption">
														Via Username
													</div>												
												</a>
											</li>

											<li>
												<a href="<?php echo base_url('admin/book_schedular/2'); ?>">
													<div class="bookpaneloption">
														Via Name 
													</div>
												</a>
											</li>				
										</ul>
									</li>
								</div>
							</div>
			
					<li><a href="<?php echo base_url('admin/show_schedular') ?>"><span class="glyphicon glyphicon-check fav-icon"></span>Update Schedule</a></li>
					<li><a href="<?php echo base_url('admin/detail_schedular') ?>"><span class="glyphicon glyphicon-check fav-icon"></span>Today's Booking</a></li>
				</ul>
			</nav>

		</div>
