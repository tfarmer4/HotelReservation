<?php 
require_once('generateHash.php');
class Login extends CI_Controller
{
	function index(){
		
		$this->load->library('phpass');
		$this->load->model('db_model');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->view('login_form');
	}

	function doLogin()
	{
		$u_name = $this->input->post('username', TRUE) ? $this->input->post('username', TRUE) : '';
		$pw = $this->input->post('password', TRUE) ? $this->input->post('password', TRUE) : '';
		$this->db->select('uName,pass AS hash, salt');
		$this->db->from('Users');
		$this->db->where('uName', $u_name);
		$query = $this->db->get();
		//var_dump($row = $query->row());
		if($query->num_rows() == 1)
		{
			echo "we made it here";
			$row = $query->row();
			$generator = new GenerateHash($pw, $row->salt);
			$hash = $generator->hash($pw, $row->salt);
			
			if($row->hash == $hash['hash']){
				echo "LOGIN SUCCESS!";
				
			}
		}	
	} 
	
}
?>
