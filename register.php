<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register New User</title>
<link href="Main.css" rel="stylesheet"/>

</head>
<body>
<?php include("header.php"); ?>
<div id="main">
<h1>Register New User</h1>
<form action="register.php" method="post" class="f_register">
<table>
<tr>
<td>First Name:</td>
<td><input type="text" maxlength="25" name="fname" required/>
</td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" maxlength="25" name="lname"required/></td>
</tr>
<tr>
<td>Email Address:</td>
<td><input type="email" name="email" required/></td>
</tr>
<tr>
<td>User Name:</td>
<td><input type="text" name="u_name" maxlength="20" required /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="pword" name="pword" maxlength="16" required/>
</tr>
<tr>
<td>
<input type="submit" value="Submit" />
</td>
</tr>
</table>
</form>
</div>
</html>