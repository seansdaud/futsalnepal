<div class="dashboard-wrapper">
	<div class="row">
		<nav class="nav navbar-default navigation">
		<?php if($this->session->userdata('user_logged_in') == true): ?>
			<ul class="logout">
				<li><a href="<?php echo base_url('futsalnepal'); ?>"><span class="glyphicon glyphicon-home home-arena"></span></a></li>
				<li><a href="<?php echo base_url('user_welcome/profile'); ?>"><span class="glyphicon glyphicon-user user-profile"></span></a></li>
				<li><span>
					<form class="navbar-form navbar-left" role="search" method="post">
					    <input type="text" name="search-arena" class="form-control search-arena" placeholder="Search arena..">
					    <button type="submit" class="btn btn-default submit-arena">Submit</button>
					</form>
				</span>
				</li>		
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="cog"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span></div></a>
			          <ul class="dropdown-menu" role="menu">
				            <li><a href="<?php echo base_url('user_welcome/user_logout'); ?>">logout</a></li>
				            <li><a href="<?php echo base_url('user_welcome/user_setting'); ?>">settings</a></li>
			          </ul>
			     </li>
			</ul>
		</nav>

		<?php else: ?>
		<nav class="nav navbar-default navigation">
			<ul class="logout">
				<li><a href="<?php echo base_url('futsalnepal'); ?>"><span class="glyphicon glyphicon-home home-arena"></span></a></li>
				<li><a href="<?php echo base_url('futsalnepal'); ?>"><span class="glyphicon glyphicon-stats fields-arena"></span></a></li>
				<li><span>
					<form class="navbar-form navbar-left" role="search" method="post">
					    <input type="text" name="search-arena" class="form-control search-arena" placeholder="Search arena..">
					    <button type="submit" class="btn btn-default submit-arena">Submit</button>
					</form>
				</span>
				</li>
			</ul>
		<?php endif; ?>
		</nav>
		<div><?php echo $this->session->flashdata('feedback');?></div>
	</div>
</div>