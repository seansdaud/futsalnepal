<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title> <?php echo ucfirst($title); ?> </title>
	<link rel="icon" href="<?=base_url()?>/favicon.jpg" type="image/jpg">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/style.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/jquery.timepicker.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin.css'); ?>">

		<style type="text/css">

	.loading img{
			position: fixed;
			margin: -75px 240px;
			z-index: 999;
			height: 466px;
		
		}
		
		 .warning{
			background-color: rgba(121, 103, 9, 0.26) !important;
		}
		</style>
	<script type="text/javascript" src="<?php echo site_url().'assets/ckeditor/ckeditor.js' ?>"></script>
</head>
<body>