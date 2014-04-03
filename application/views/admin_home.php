<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link href="Main.css" rel="stylesheet"/>
</head>
<body>

<div id="main">
<h1>Admin Console</h1>

<h2>Manage Users</h2>
<div id="users">
	<?php echo form_open('admin_home/manageUsers');?>
	<table id="user_tbl" border="1">
	<?php $result_array = $this->admin_main_mdl->get_all_users();
	?>
	<tr><td>User Name</td><td>Admin</td></tr>
	<?php
	foreach ($result_array as $row)
	{
		$options = array(
                  'Admin_' . $row->uName  => 'Admin',
                  'User_' . $row->uName    => 'User',
                );

		
		echo '<tr><td>' . $row->uName . '</td><td>';
		if($row->isAdmin == true)
			echo form_dropdown($row->uName, $options, 'Admin_' . $row->uName);
		elseif($row->isAdmin == false)
			echo form_dropdown($row->uName, $options, 'User_' . $row->uName);
		echo '</td></tr>';
		
	}
	?>
	</table>
	<?php
	echo form_submit('submit_user_changes', 'Save Changes');
	echo form_close();?>
</div>
</div>
</body>
</html>
