<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function Welcome() {
		parent::__construct();
		
		// load libraries
		$this->load->library('email');
		
		// load helpers
		$this->load->helper('url');
		$this->load->helper('general_helper');
		
		// load models
		$this->load->model("welcome_mdl");
		//$this->load->model("edit_welcome_mdl");
		//$this->load->model("admin_projects_mdl");
	}
	
	public function index() {
		$data = array("page" => "welcome");
		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('templates/footer', $data);
	}
}