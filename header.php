<!Doctype HTML>

<link rel="stylesheet" href="../Main.css" />

<div id="header">
<div id="login" align="right">
<?php if(!$this->session->userdata('uName') && $this->session->userdata('loggedIn')!='TRUE') :?>
<form method="post" action="login/dologin">
<table>
<tr>
<td>
Username:
</td>
<td>
<input type="text" name="username" required/></p>
</td>
<tr>
<td>Password:</td>
<td>
<input type="password" name="password" required/></p>
</td>
</tr>
<tr>
<td>
<input type="submit" name="b_login" value="Login"/>
</td>
<td>
<input type="button" value="Register New User" onclick="location.href='register';" name="btn_register"/>
</td>
</tr>
</table>
</form>
<?php else: echo $this->session->userdata('uName'); endif;?>
</div>

<ul id="nav">
<!--<style>ul#nav li a:hover{
	background-color:#dba204;
	}
</style>-->
<li><a href="../">Home</a></li>
<li><a href="reservations">My Reservation</a></li>
<li><a href="about">About Us</a></li>
</ul>
</div>
