<?php
require_once('generateHash.php');
class Login extends CI_Controller
{
	function index(){
		$this->load->library('session');
		$this->load->library('phpass');
		$this->load->model('db_model');
		$this->load->helper('form');
		$this->load->helper('security');
                                          $this->load->view('header');
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
		
		if($query->num_rows() == 1)
		{

			$row = $query->row();
			$generator = new GenerateHash($pw, $row->salt);
			$hash = $generator->hash($pw, $row->salt);
			
			if($row->hash == $hash['hash']){
				$sessionData = array('uName'=>$u_name,'loggedIn'=>'TRUE');
				$this->session->unset_userdata('loginSuccess');
				$this->session->set_userdata($sessionData);
				$this->session->unset_userdata('error');
				redirect('home');			
			}

			else
			{
				$this->session->set_userdata(array('error'=>'error_login', 'loggedIn'=>'FALSE'));
				redirect('login');	
			}
		}
		else
		{
			$this->session->set_userdata(array('error'=>'error_login', 'loggedIn'=>'FALSE'));
			redirect('login');
		}
	} 
	
}
