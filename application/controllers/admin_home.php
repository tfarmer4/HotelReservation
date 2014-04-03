<?php 

class Admin_home extends CI_Controller {
	 
	public function Admin_home() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		$this->load->helper('form');
		
		// load models
		$this->load->model("admin_main_mdl");
		$this->load->model("hotel_model");
		
		// check if admin logged in
		if(!$this->session->userdata('admin') && !$this->session->userdata('loggedIn')) {
			redirect("admin", "refresh");	
		}
		$this->load->view('header');
		$this->load->view('admin_home');
		

	}
	
	public function index() {
		
		//$this->load->view('admin/templates/footer');
	}
	
	public function manageUsers()
	{
		$query = $this->db->get('Users');
		foreach($query->result() as $row)
		{
			$isAdmin = $this->input->post($row->uName, TRUE) ? $this->input->post($row->uName, TRUE) : NULL;
			if($isAdmin == 'Admin_' . $row->uName)
			{
				if($row->isAdmin != true)
				{
					$data = array(
						'isAdmin'=>$this->db->escape(true)
					);

					$this->db->where('userID', $row->userID);
					$this->db->update('Users', $data);
					continue;
				}
			}
			elseif ($isAdmin == 'User_'. $row->uName)
			{
				$data = array('isAdmin'=>$this->db->escape(false));
				$this->db->where('userID', $row->userID);
				$this->db->update('Users', $data);
			}
		}
		redirect('admin_home', 'refresh');
	}
	
	public function addHotels()
	{
		
	}
}