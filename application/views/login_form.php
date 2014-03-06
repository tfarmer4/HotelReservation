<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('header.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="main">
<?php if($this->session->userdata('registerSuccess') == 1)
	{
		echo 'Registration Successful!';
	}?>
<!-- TODO: Add client side input validation -->
<table border="0">
<?php 
	echo form_open('login/doLogin');
	$data = array('id'=>'uname', 'maxlength'=>'16', 'name'=>'username', "required" => "required");
	echo '<tr><td>';
	echo 'Username: ';
	echo '</td><td>';
	echo form_input($data);
	echo '</td></tr>';
	$data = array('id'=>'pass', 'maxlength'=>'16', 'name'=>'password', "required" => "required");
	echo '<tr><td>';
	echo 'Password: ';
	echo '</td><td>';
	echo form_password($data);
	echo '</td></tr><tr><td>';
	echo form_submit('loginsubmit', 'Login');
	echo '</td></tr>';
	echo form_close();
?>
</table>
</div>

</body>
</html>
