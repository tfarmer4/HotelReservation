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
		$this->load->helper('form');
		//$this->load->helper('general_helper');
		
		// load models
		$this->load->model("admin_main_mdl");
		
		$this->load->view("header");
	}
	
	public function index() {
		if($this->session->userdata('loggedIn')) {
			redirect("index.php/admin_home", 'refresh');
		} else {
			// load views
			$this->load->view('admin');
			//$this->load->view('admin/templates/footer');
		}
	}
	
	
	public function logout() {
		$this->session->unset_userdata('logged_in');
		// load views
		$this->load->view('admin', array("success" => "You are logged out!!!"));
		//$this->load->view('admin/templates/footer');
	}
}