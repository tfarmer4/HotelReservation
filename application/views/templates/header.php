<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Hotels cPanel</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/metro.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/uniform/css/uniform.default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/uniform/css/uniform.default.css" />
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
					Hotels cPanel
				</a>
				<!-- END LOGO -->
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        	
			<ul>
				<li class="start">
					<a href="<?php echo site_url('hotels'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Hotels</span>
						<span class="selected"></span>
						<!--<span class="arrow open"></span>-->
					</a>
					
					<!--<ul class="sub" style="display: block;">
						<li class="active">
							<a href="#">
								Rooms
							</a>
						</li>
					</ul>-->
				</li>
				
				<li class="start">
					<a href="<?php echo site_url('guests'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Guests</span>
					</a>
				</li>
				<li class="start">
					<a href="<?php echo site_url('locations'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Location</span>
					</a>
				</li>
				<li class="start">
					<a href="<?php echo site_url('reservations'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Reservations</span>
					</a>
				</li>
				<li class="start">
					<a href="<?php echo site_url('rooms'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Rooms</span>
					</a>
				</li>
				<li class="start">
					<a href="<?php echo site_url('roomTypes'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Room Types</span>
					</a>
				</li>
				<li class="start">
					<a href="<?php echo site_url('users'); ?>">
						<i class="icon-th-list"></i> 
						<span class="title">Users</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->