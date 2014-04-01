<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Register New User</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--TODO: Add client side validation code in the script below-->
	<link href="../Main.css" rel="stylesheet"/>
    </head>

    <body>

        <div id="main">

            <table border="0">
                <?php
		 echo '<tr><td>' . form_open('login/admin_login') . '</tr></td>';
                $data = array('id' => 'uName', 'maxlength' => '16', 'name' => 'username', "required" => "required");
                echo '<tr><td>';
                echo 'Username: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td>';
                if ($this->session->userdata('error_uName') == '1')
                    echo '<td class="error">* Username already registered</td>';
                echo '</tr>';
				
		$data = array('id' => 'pass', 'maxlength' => '16', 'name' => 'password', "required" => "required");
                echo '<tr><td>';
                echo 'Password: ';
                echo '</td><td>';
                echo form_password($data);
                echo '</td></tr>';
		echo '<tr><td>';
                $data = array('id' => 'btn_submit', 'name' => 'btn_submit', 'value' => 'Login', "required" => "required");
                echo form_submit($data);
		echo '</td></tr></table>';
                echo form_close();
                ?>
            </table>
        </div>
       





    </body>
</html>
