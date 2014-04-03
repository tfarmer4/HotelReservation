<!Doctype HTML>
<!--Add client side input validation-->
<link rel="stylesheet" href="../Main.css" />

<div id="header">
    <div id="login" align="right">
        <?php
        if (!$this->session->userdata('uName') ||(
                $this->session->userdata('loggedIn') != 'TRUE' &&
                $this->session->userdata('error_login') != '1')):
            ?>
            <form method="post" action="login/dologin"  id="head_login">
                <table>
                    <tr>
                        <td>
                            Username:
                        </td>
                        <td>
                            <input type="text"  name="username" required/></p>
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
                        <td>
                    </tr>
                </table>
            </form>
<?php else:?>
    <?php echo $this->session->userdata('uName');?>
    <form method="post" action="login/logout" id="head_logout">
    <table>
    <tbody>
    <tr><td><input type="button" onclick="location.href='login/logout';" name="btn_logout" value="Logout"/></td></tr>
    </tbody>
    </table>
    </form>
<?php endif; ?>
    </div>

    <ul id="nav">
        <li><a href="<?php echo site_url();?>/home">Home</a></li>
        <li><a href="<?php echo site_url();?>/reservations">My Reservation</a></li>
        <li><a href="<?php echo site_url();?>/about">About Us</a></li>
        <?php if($this->session->userdata('admin')=='TRUE'):?>
        <li><a href="<?php echo site_url();?>/admin_home">Admin</a></li>
        <?php endif;?>
    </ul>
</div>
