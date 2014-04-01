<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<!-- TODO: Add client side input validation -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php if($this->session->userdata('error')=='error_login'):?>
<script>
$(document).ready(function()
    {
        $("#head_login").hide();
    });
</script>


<?php endif;?>


</head>

<body>
<div id="main">
<?php if($this->session->userdata('registerSuccess') == 1)
	{
		echo 'Registration Successful!';
	}?>

<table border="0">
    <tbody>
	<?php 
                     if($this->session->userdata('error_login')=='1')
                     {
                         echo '<tr><td class="error">* Wrong username/password combination.</td></tr>';
                         $this->session->unset_userdata('error_login');
                     }
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
	    echo '</td><td>';
	    echo '<input type="button" value="Register New User" onclick="location.href=\'register\';" name="btn_register"/>';
	    echo '</td></tr>';
	    echo form_close();
	?>
    </tbody>
</table>
</div>

</body>
</html>
