<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	echo form_open('register/doHash');
	$data = array('id'=>'uName', 'maxlength'=>'16', 'name'=>'username');
	echo 'Username: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'pass', 'maxlength'=>'16', 'name'=>'password');
	echo 'Password: ';
	echo form_password($data);
	echo '<br />';
	$data = array('id'=>'add1', 'maxlength'=>'100', 'name'=>'address1');
	echo 'Address1: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'add2', 'maxlength'=>'100', 'name'=>'address2');
	echo 'Address2: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'city', 'maxlength'=>'20', 'name'=>'city');
	echo 'City: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'stateCode', 'maxlength'=>'2', 'name'=>'stateCode');
	echo 'State: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'phone', 'maxlength'=>'10', 'name'=>'phone');
	echo 'Phone: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'fName', 'maxlength'=>'20', 'name'=>'fName');
	echo 'First Name: ';
	echo form_input($data);
	echo '<br />';
	$data = array('id'=>'lName', 'maxlength'=>'20', 'name'=>'lName');
	echo 'Last Name: ';
	echo form_input($data);
	echo '<br />';
	echo form_submit('registerSubmit', 'Register');
	$data = array('id'=>'btn_reset', 'name'=>'btn_reset', 'value'=>'Reset Form');
	echo form_reset($data);
	echo form_close();
?>
</div>

</body>
</html>
