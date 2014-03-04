<?php
require_once('generateHash.php');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

        function index()
        {
                $this->load->library('phpass');
                $this->load->model('db_model');
                $this->load->helper('form');
		$this->load->library('table');
                $this->load->helper('security');
                $this->load->view('register_form');
	}

        function doHash()
        {
                $password = $this->input->post('password', TRUE);
                if ( $password ) {
					
			$uName = $this->input->post('username', TRUE);
                        $add1 = $this->input->post('address1', TRUE);
                        $add2 = $this->input->post('address2', TRUE);
                        $city = $this->input->post('city', TRUE);
                        $stateCode = $this->input->post('stateCode', TRUE);
                        $phone = $this->input->post('phone', TRUE);
                        $fName = $this->input->post('fName', TRUE);
                        $lName = $this->input->post('lName', TRUE);
			$userSalt = substr(uniqid(null,true), 15);
			$generator = new GenerateHash($password, $userSalt);
			$hash = $generator->hash($password, $userSalt); 
			$sql = "DELETE FROM `Users` WHERE uName='" . $uName . "'";
			$this->db->query($sql);	
			$sql = 
				'INSERT INTO `Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`, `salt`) 
        			VALUES ('.    $this->db->escape($uName).', '.
					       $this->db->escape($hash['hash']).',	' . 
					 	$this->db->escape($add1).', ' . 
						$this->db->escape($add2).', ' .
						$this->db->escape($city).', ' .
						$this->db->escape($stateCode).', ' .
						$this->db->escape($phone).', ' . 
						$this->db->escape($fName).', ' .
						$this->db->escape($lName).', ' .
						$this->db->escape($userSalt). ')';
			if($this->db->query($sql))
			{
				$this->load->view('registration_successful');	
			}
			else
			{
				$this->load->view('registeration_unsuccessful');
			}
		}
	
        }
}
?>

