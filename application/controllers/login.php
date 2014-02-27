<?php 
class Login extends CI_Controller
{
	function index(){
		$this->load->library('PasswordHash');
		$this->load->model('db_model');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->view('login_form');
	}

	function doLogin()
	{
		$u_name=(isset ($this->input->post('uname',TRUE) ? this->input->post('uname',TRUE): '');
		$pw = (isset($this->input->post('pass', TRUE)?$this->input->post('pass', TRUE) : '');
		$query = $this->db->query("SELECT `uname`, `pass` AS hash FROM `Users` WHERE `uname` = " . $this->db->escape($u_name) . "LIMIT 1");
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			if($this->passwordhash->CheckPassword($pw, $row->hash )){return $row->userID;}
		}	
	}
}
?>
