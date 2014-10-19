<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title> <?php echo ucfirst($title).' | Admin | FutsalNepal'; ?> </title>
	<link rel="icon" href="<?=base_url()?>/favicon.jpg" type="image/jpg">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin.css'); ?>">
	<style type="text/css">
		body{
			background: rgba(0,0,255,.4);
			margin: 0;
			padding: 0;		
			background-image: url('assets/css/road.jpg') !important;
			background-repeat: no-repeat !important;
			-moz-background-size:100% 100%; /* Firefox */
			background-size:100% 100%;
		}
		.container{
			height: 100% !important;
			width: 100% !important;
			margin: 0;
			padding: 0;
			background: rgba(103, 92, 124, 0.8);
			position: absolute;

		}

		.user-image img{
			display: block;
			margin: 0 auto;
			border-radius: 50%;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			overflow: hidden;
		}
		.flashdata{
			display:block;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php echo form_open("admin_login/post_login", array('class'=>'admin-login-form', 'data-toggle'=>'validator')); ?>
				<?php $msg = $this->session->flashdata('feedback_admin_login'); if(!empty($msg)): ?>
				<div class="alert alert-danger">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <?php echo ucfirst($msg); ?>
			    </div>
				<?php endif; ?>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group field">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-user"></span></div>
								<input class="form-control" name="username" type="text" placeholder="Username" required autofocus>
							</div>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-md-2 user-image">
						<?php $picture = $this->db->select('image')->get('admin')->result(); ?>
						<?php if(!empty($picture[0])): ?>
							<img src="<?php echo base_url('assets/images/profile/admin/'.$picture[0]->image); ?>" height="80px" width="80px">
						<?php else: ?>
							<img src="<?php echo base_url('assets/images/default.jpg'); ?>" height="80px" width="80px">
						<?php endif; ?>
					</div>
					<div class="col-md-5">
						<div class="form-group field">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon log-icon glyphicon-lock"></span></div>
								<input type="password" name="password" placeholder="Password" required class="form-control" >
							</div>
							<div class="help-block with-errors"></div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4 admin-login-btn">
						<input type="submit" class="btn btn-default login-btn" value="Login">
						<a href="<?php echo base_url('admin_login/forgot') ?>">Forgot Password?</a>
					</div>
					<div class="col-md-4"></div>
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/validator.min.js"); ?>"></script>
</body>
</html>