<!-- 
  -- Timothy Farmer 
  -- Internet Programming
  -- CSCE 3420.001
  -- 10/23/12
  -->
  #!/usr/local/bin/php
<head>
	<meta charset="utf-8" />
<style type="text/css">
table,th,td
{
	border-style:solid;
	border-width:1px;
	border-color:black;
	font-weight:bold;
	color:black;
	background-color:white;
	text-align:right;
}

th
{
background-color:lightblue;
}
</style>
</head>
 <body>
 <form method="post" action="">
<?php
	echo 'Timothy Farmer' . ' CSCE3420 ' . "Program 4 <br />\n<br />\n";
	echo 'This file was last updated: ' . date ('F d Y H:i:s.', getlastmod()) . "<br /> <br />";


	function buildForm($text_value, $select_value, $radio_value)
	{
		if($text_value != null && is_numeric($text_value)):
			echo <<< EOT
			Specify which table to create: <input type="textbox" name="user_text" maxlength="2" size="2" value="$text_value"/>
			<input type="submit" value="Build table 1" name="Button"/>
			<br />
			<br />
			Specify which table to create:
EOT;
		else:
			echo <<< EOT
			Specify which table to create: <input type="textbox" name="user_text" maxlength="2" size="2" value=""/>
			<input type="submit" value="Build table 1" name="Button"/>
			<br />
			<br />
			Specify which table to create:
EOT;
		endif;
		
		if($select_value != null):
			echo '<select name="select_list">';
			for($i=2; $i<=12; $i++):
				if($select_value == $i):
					echo "<option value=\"$i\" selected>$i</option>";
				else:
					echo "<option value=\"$i\">$i</option>";
				endif;
			endfor;
			echo '</select>';
			echo '<input type="submit" name="Button" value="Build table 2" /><br /><br />';
			
		else:
			echo '<select name="select_list">';
			for($i=2; $i<=12; $i++):
				echo "<option value=\"$i\">$i</option>";
			endfor;
			echo '<input type="submit" name="Button" value="Build table 2" /><br /><br />';
			echo '</select>';
		endif;
		
		echo 'Specify which table to create:<br />';
		
		if($radio_value != null):
			$radio_list = array(1,2,3,4,5,6,7,8,9,10,11,12);
			foreach($radio_list as $value):
				if($radio_value == $value):
					echo "<input type=\"radio\" name=\"radio_list\" value=\"$value\" checked>$value</input>";
				else:
					echo "<input type=\"radio\" name=\"radio_list\" value=\"$value\">$value</input>";
				endif;
			endforeach;
		else:
			$radio_list = array(1,2,3,4,5,6,7,8,9,10,11,12);
			foreach($radio_list as $value):
					echo "<input type=\"radio\" name=\"radio_list\" value=\"$value\" >$value</input>";
			endforeach;
		endif;
		echo '<input type="submit" name="Button" value="Build table 3" /><br /><br />';
	}

	function buildTable($start, $end)
	{
		echo '<table>';
		echo '<tr><th></th>';
		for ($x = $start; $x <= $end; $x++) { echo '<th>'.$x.'</th>'; }
		echo "</tr>\n";
		for ($y = $start; $y <= $end; $y++) {
			echo '<tr><th>'.$y.'</th>';
			for ($z = $start; $z <= $end; $z++) {
				echo '<td>'.($y * $z).'</td>';
			}
			echo "</tr>\n";
		}
		echo '</table>';

	}
	
if(count($_POST)==0):
	buildForm(null,null,null); 
else:
	if(isset($_POST['Button'])):
		$button = $_POST['Button'];
		switch($button):
			case 'Build table 1' :
				if(isset($_POST['user_text']) && is_numeric($_POST['user_text'])):
					buildForm($_POST['user_text'],null,null);
				else:
					buildForm(null, null, null);
				endif;
			break;
			case 'Build table 2' :
				$select_list = array(2,3,4,5,6,7,8,9,10,11,12);
				$count = 2;
				foreach ($select_list as $value) {
					$selected = ($_POST['select_list'] == $value) ? ' selected' : '';
					if($selected == ' selected'):
						buildForm(null, $count, null);
						break;
					endif;
					$count++;
				}
			break;
			case 'Build table 3' :
				$count = 2;
				$radio_list = array(2,3,4,5,6,7,8,9,10,11,12);
				foreach($radio_list as $value){
					$checked = ($_POST['radio_list'] == $value) ? 'checked' : '';
					if($checked == 'checked'):
						buildForm(null, null, $value);
						break;
					endif;
				}
			break;
		endswitch;
		switch($button):
			case 'Build table 1' :
				if(isset($_POST['user_text']) && is_numeric($_POST['user_text'])):
					$text = $_POST['user_text'];
					if($text <= 12 && $text >= 2):
						buildTable(1, $text);
					else:
						echo '<p style="color:red;">The value is out of range</p>';
					endif;
				else:
					echo '<p style="color:red;">The value is not numeric.</p>';
				endif;
			break;
			case 'Build table 2' :
				$select_list = array(2,3,4,5,6,7,8,9,10,11,12);
				
				foreach ($select_list as $value) 
				{
					$selected = ($_POST['select_list'] == $value) ? ' selected' : '';
					if($selected == ' selected'):
						buildTable(1, $value);
						break;
					endif;
				}
			break;
			case 'Build table 3' :
				$radio_list = array(2,3,4,5,6,7,8,9,10,11,12);
				
				foreach($radio_list as $value)
				{
					$checked = ($_POST['radio_list'] == $value) ? 'checked' : '';
					if($checked == 'checked'):
						buildTable(1, $value);
						break;
					endif;
				}
		endswitch;
	endif;
endif;
?>
</form>
</body>