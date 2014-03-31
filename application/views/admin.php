<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign in - Admin</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<a href="<?php echo base_url(); ?>" class="round button dark ic-left-arrow image-left ">Return to website</a>
			<br /><br />

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Sign in to admin</h1>
				<h5>Enter your credentials below</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<!--<a href="#" id="company-branding" class="fr"><img src="images/company-logo.png" alt="Blue Hosting" /></a>-->
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="<?php echo base_url(); ?>index.php/admin/login" method="POST" id="login-form">
	        <?php
				if(isset($error)) {
			?>
					<div class="error-box round"><?php echo $error; ?></div>
			<?php
				} else if(isset($success)) {
			?>
					<div class="confirmation-box round"><?php echo $success; ?></div>
			<?php
				}
			?>
			<fieldset>
				
				<p>
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="round full-width-input" autofocus />
				</p>

				<p>
					<label for="password">password</label>
					<input type="password" id="password" name="password" class="round full-width-input" />
				</p>
				
				<input type="submit" id="submit" name="submit" class="button round blue image-right ic-right-arrow" value="LOG IN" />

			</fieldset>
		</form>
		
	</div> <!-- end content -->