<?php 
class Register extends CI_Controller
{
	function index()
	{
		$this->load->library('phpass');
		$this->load->model('db_model');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->view('register_form');
	}
	
	function doHash()
	{
		$password = $this->input->post('password', TRUE);
		$hash = 0;
    		if ( $password ) {
        		$hash = $this->phpass->HashPassword( $password );

        		if ( strlen( $hash ) < 20 ) {
            			exit( "Failed to hash new password" );
        		}
			$uName = $this->input->post('username', TRUE);
			$add1 = $this->input->post('address1', TRUE);
			$add2 = $this->input->post('address2', TRUE);
			$city = $this->input->post('city', TRUE);
			$stateCode = $this->input->post('stateCode', TRUE);
			$phone = $this->input->post('phone', TRUE);
			$fName = $this->input->post('fName', TRUE);
			$lName = $this->input->post('lName', TRUE);
			var_dump($_POST);
$sql = 'INSERT INTO `Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`) 
        			VALUES ('.    $this->db->escape($uName).', '.
					       $this->db->escape($hash).',	' . 
					 	$this->db->escape($add1).', ' . 
						$this->db->escape($add2).', ' .
						$this->db->escape($city).', ' .
						$this->db->escape($stateCode).', ' .
						$this->db->escape($phone).', ' . 
						$this->db->escape($fName).', ' .
						$this->db->escape($lName).')';
				$this->db->query($sql);
				echo $this->db->affected_rows();
			
    		}
	}
}
?>
