<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once('header.php'); ?>
<title>Register New User</title>

</head>

<body>

<div id="main">
<?php
	echo form_open('register/doHash');

	$data = array('id'=>'uName', 'maxlength'=>'16', 'name'=>'username', "required" => "required");
	echo 'Username: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'pass', 'maxlength'=>'16', 'name'=>'password', "required" => "required");
	echo 'Password: ';
	echo form_password($data);
	echo '<br />';

	$data = array('id'=>'add1', 'maxlength'=>'100', 'name'=>'address1', "required" => "required");
	echo 'Address1: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'add2', 'maxlength'=>'100', 'name'=>'address2');
	echo 'Address2: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'city', 'maxlength'=>'20', 'name'=>'city', "required" => "required");
	echo 'City: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'stateCode', 'maxlength'=>'2', 'name'=>'stateCode', "required" => "required");
	echo 'State: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'phone', 'maxlength'=>'10', 'name'=>'phone', "required" => "required");
	echo 'Phone: ';
	echo form_input($data);
	echo '<br />';

	$data = array('id'=>'fName', 'maxlength'=>'20', 'name'=>'fName', "required" => "required");
	echo 'First Name: ';
	echo form_input($data);
	echo '<br />';
	
	$data = array('id'=>'lName', 'maxlength'=>'20', 'name'=>'lName', "required" => "required");
	echo 'Last Name: ';
	echo form_input($data);
	echo '<br />';
?>
	<script type="text/javascript">
	function autofill()
	{
		document.getElementById("uName").value = "Dev";
		document.getElementById("add1").value = "some add1";
		document.getElementById("add2").value = "some add2";
		document.getElementById("city").value = "Denton";
		document.getElementById("stateCode").value = "TX";
		document.getElementById("phone").value = "18005555555";
		document.getElementById("fName").value = "Development";
		document.getElementById("lName").value = "Mastery";
	}
	</script>	

<?php
	$data = array('id'=>'btn_fill_form', 'name'=>'btn_fill_form', 'content'=>'Autofill', 'onClick'=>'this.onclick=function(){autofill()};');
	echo form_button($data);
	echo '<br />';
	echo form_submit('registerSubmit', 'Register');

	$data = array('id'=>'btn_reset', 'name'=>'btn_reset', 'value'=>'Reset Form', "required" => "required");
	echo form_reset($data);
	echo form_close();
?>
</div>

</body>
</html>
