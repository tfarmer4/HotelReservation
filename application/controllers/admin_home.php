<?php 

class Admin_home extends CI_Controller {
	 
	public function Admin_home() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		$this->load->helper('general_helper');
		
		// load models
		$this->load->model("admin_main_mdl");
		
		// check if admin logged in
		if(!$this->session->userdata('logged_in')) {
			redirect("admin", "refresh");	
		}
	}
	
	public function index() {
		$data["page"] = "admin_home";
		$data["user"] = $this->session->userdata('logged_in');
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/admin_home');
		$this->load->view('admin/templates/footer');
	}
}