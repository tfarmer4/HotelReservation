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
	 
	public function __construct() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->helper('general_helper');
		
		$this->load->view("header");
	}
	
	public function index() {
		if($this->session->userdata('loggedIn')=='TRUE' && $this->session->userdata('admin') == 1) {
			redirect("hotels");
		} else {
			// load views
			$this->load->view('admin');
			//$this->load->view('admin/templates/footer');
		}
	}
}