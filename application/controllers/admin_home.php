<?php 

class Admin_home extends CI_Controller {
	 
	public function Admin_home() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		
		
		// load models
		$this->load->model("admin_main_mdl");
		
		// check if admin logged in
		if(!$this->session->userdata('admin')) {
			redirect("admin");	
		}
		$this->load->view('header');
		$this->load->view('admin_home');
		

	}
	
	public function index() {
		
		//$this->load->view('admin/templates/footer');
	}
}