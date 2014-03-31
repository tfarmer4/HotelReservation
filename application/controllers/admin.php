<?php 

class Admin extends CI_Controller {

	/**
	 * Admin Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *
	 * Since this controller is set as the controller for main for cPanel
	 *
	 */
	 
	public function admin() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		$this->load->helper('general_helper');
		
		// load models
		$this->load->model("admin_main_mdl");
	}
	
	public function index() {
		if($this->session->userdata('logged_in')) {
			redirect("index.php/admin_home", 'refresh');
		} else {
			// load views
			$this->load->view('admin/admin');
			$this->load->view('admin/templates/footer');
		}
	}
	
	public function login() {
		$message = "";
		extract($_POST);
		if(empty($username) || empty($password)) {
			$message = "Please provide username and password";
		} else {
			if($user = $this->admin_main_mdl->validate_user($username, $password)) {
				$this->session->set_userdata('logged_in', $user);
				redirect('index.php/admin_home', 'refresh');
			} else {
				$message = "Username or password is invalid";
			}
		}	
		if(isset($message)) {
			// load views
			$this->load->view('admin/admin', array("error" => $message));
			$this->load->view('admin/templates/footer');
		}
	}
	
	public function logout() {
		$this->session->unset_userdata('logged_in');
		// load views
		$this->load->view('admin/admin', array("success" => "You are logged out!!!"));
		$this->load->view('admin/templates/footer');
	}
}