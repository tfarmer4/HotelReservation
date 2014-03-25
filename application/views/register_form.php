<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Register New User</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	 <script type="text/javascript">
            $(document).ready(function(){ $("#btn_fill_form").click(function autofill()
            {
                document.getElementById("uName").value = "Dev";
                document.getElementById("add1").value = "some add1";
                document.getElementById("add2").value = "some add2";
                document.getElementById("city").value = "Denton";
                $("#main select").val("TX");
                document.getElementById("phone").value = "18005555555";
                document.getElementById("fName").value = "Development";
                document.getElementById("lName").value = "Mastery";
		document.getElementById("email").value = "noreply@noreply.com";
            });
	    });
        </script>
    </head>

    <body>

        <div id="main">

            <table border="0">
                <?php
                echo '<tr><td>' . form_open('register/dohash') . '</tr></td>';

                $data = array('id' => 'btn_fill_form', 'name' => 'btn_fill_form', 'content' => 'Autofill');
                echo '<tr><td>';
                echo form_button($data);
                echo '</td></tr>';
                
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

                $data = array('id' => 'fName', 'maxlength' => '20', 'name' => 'fName', "required" => "required");
                echo '<tr><td>';
                echo 'First Name: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';

                $data = array('id' => 'lName', 'maxlength' => '20', 'name' => 'lName', "required" => "required");
                echo '<tr><td>';
                echo 'Last Name: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';

                $data = array('id' => 'add1', 'maxlength' => '100', 'name' => 'address1', "required" => "required");
                echo '<tr><td>';
                echo 'Address1: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';

                $data = array('id' => 'add2', 'maxlength' => '100', 'name' => 'address2');
                echo '<tr><td>';
                echo 'Address2: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';


                $data = array('id' => 'city', 'maxlength' => '20', 'name' => 'city', "required" => "required");
                echo '<tr><td>';
                echo 'City: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';

                $data = array('id' => 'stateCode', 'maxlength' => '2', 'name' => 'stateCode', "required" => "required");
		$options = array (
                    'Select' => 'Select',
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
		    'DC' => 'District of Columbia',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming'
                    );
                echo '<tr><td>';
                echo 'State: ';
                echo '</td><td>';
		echo form_dropdown('stateCode',$options, 'Select', $data);
                echo '</td></tr>';

                $data = array('id' => 'phone', 'maxlength' => '10', 'name' => 'phone', "required" => "required");
                echo '<tr><td>';
                echo 'Phone: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td></tr>';

                
		$data = array('id' => 'email', 'maxlength' => '100', 'name' => 'email', 'required' => 'required');
                echo '<tr><td>';
                echo 'Email: ';
                echo '</td><td>';
                echo form_input($data);
                echo '</td>';
		if($this->session->userdata('error_email') == '1')
			echo '<td class="error"> *Email is registered to another account</td>';
		echo '</tr></table>';
		
                echo form_submit('registerSubmit', 'Register');

                $data = array('id' => 'btn_reset', 'name' => 'btn_reset', 'value' => 'Reset Form', "required" => "required");
                echo form_reset($data);
                echo form_close();
                ?>
            </table>
        </div>
       





    </body>
</html>
