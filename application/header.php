<!Doctype HTML>

<link rel="stylesheet" href="../Main.css" />

<div id="header">
<div id="login" align="right">

<form method="post" action="login.php">
<table>
<tr>
<td>
Username:
</td>
<td>
<input type="text" name="u_name" required/></p>
</td>
<tr>
<td>Password:</td>
<td>
<input type="password" name="p_word" required/></p>
</td>
</tr>
<tr>
<td>
<input type="submit" name="b_login" value="Login"/>
</td>
<td>
<input type="button" value="Register New User" onclick="location.href='register.php';" name="btn_register"/>
</td>
</tr>
</table>
</form>
</div>

<ul id="nav">
<!--<style>ul#nav li a:hover{
	background-color:#dba204;
	}
</style>-->
<li><a href="index.php">Home</a></li>
<li><a href="reservations.php">My Reservation</a></li>
<li><a href="About.php">About Us</a></li>
</ul>
</div>



