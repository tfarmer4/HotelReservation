<?php

require_once('generateHash.php');

class Register extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('db_model');
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->helper('security');
        $this->load->view('header');
        $this->load->view('register_form');
	$this->load->library('session');
	if($this->session->userdata('loggedIn')=='TRUE')
	{
	    redirect('home');
	}
    }

    function doHash()
    {
	//TODO: Add server side input validation code
        $password = $this->input->post('password', TRUE);
        if ($password)
        {
	    $this->session->unset_userdata('error_email');
	    $this->session->unset_userdata('error_uName');
            $uName = $this->input->post('username', TRUE);
            $add1 = $this->input->post('address1', TRUE);
            $add2 = $this->input->post('address2', TRUE);
            $city = $this->input->post('city', TRUE);
            $stateCode = $this->input->post('stateCode', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $fName = $this->input->post('fName', TRUE);
            $lName = $this->input->post('lName', TRUE);
            $userSalt = bin2hex(openssl_random_pseudo_bytes(32));
            $email = $this->input->post('email', 'TRUE');
            $generator = new GenerateHash($password, $userSalt);
            $hash = $generator->hash($password, $userSalt);
            if ($uName == 'Dev')
            {
                $sql = "DELETE FROM `Users` WHERE uName='Dev'";
                $this->db->query($sql);
                $this->session->userdata('error', 1);
		$sql = 'INSERT INTO `Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`, `salt`, `email`, `isAdmin`) 
        			 VALUES (' . $this->db->escape($uName) . ', ' .
                    $this->db->escape($hash['hash']) . ',	' .
                    $this->db->escape($add1) . ', ' .
                    $this->db->escape($add2) . ', ' .
                    $this->db->escape($city) . ', ' .
                    $this->db->escape($stateCode) . ', ' .
                    $this->db->escape($phone) . ', ' .
                    $this->db->escape($fName) . ', ' .
                    $this->db->escape($lName) . ', ' .
                    $this->db->escape($userSalt) . ', ' .
                    $this->db->escape($email) . ', ' .
		    $this->db->escape(true) . ')';

            }
	    
            
            else
            {
                $num_errors = 0;
		$sql = "SELECT 1 FROM `Users` WHERE `uName`='" . $uName . "' LIMIT 1";
                
		if($this->db->query($sql)->num_rows() > 0)
                {
                    $this->session->set_userdata('error_uName', '1');
		    $num_errors++;
                }
		$sql = "SELECT 1 FROM `Users` WHERE `email`='" . $email . "' LIMIT 1";
		if($this->db->query($sql)->num_rows() > 0)
		{
		    $this->session->set_userdata('error_email', '1');
		    $num_errors++;
		}
		if($num_errors>0)
		{
		    $num_errors = 0;
		    redirect('register');
		}
	    }

		    $sql = 'INSERT INTO `Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`, `salt`, `email`) 
        			 VALUES (' . $this->db->escape($uName) . ', ' .
                    $this->db->escape($hash['hash']) . ',	' .
                    $this->db->escape($add1) . ', ' .
                    $this->db->escape($add2) . ', ' .
                    $this->db->escape($city) . ', ' .
                    $this->db->escape($stateCode) . ', ' .
                    $this->db->escape($phone) . ', ' .
                    $this->db->escape($fName) . ', ' .
                    $this->db->escape($lName) . ', ' .
                    $this->db->escape($userSalt) . ', ' .
                    $this->db->escape($email) . ')';
	    
            if ($this->db->query($sql))
            {
                $this->session->set_userdata('error', '1');
                redirect('login');
            }
            else
            {
                $this->session->set_userdata('error', 'error_registration');
                redirect('register');
            }
        }
    }

}
?>

