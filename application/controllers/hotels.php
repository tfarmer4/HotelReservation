<?php 

class Hotels extends CI_Controller {
	 
	// num of records per page
	private $limit = 10;
	
	private $moduleName = "hotel";
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Hotels_mdl','',TRUE);
		if(!$this->session->userdata('admin') == 'TRUE') {
		
			redirect('admin');
		}
	}
	
	function index($offset = 0)
	{
		$data['title'] = "All " . ucfirst($this->moduleName) . 's';
		$data['moduleName'] = $this->moduleName;
		
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$hotels = $this->Hotels_mdl->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->moduleName . "s/index/");
 		$config['total_rows'] = $this->Hotels_mdl->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_template( array ( 'table_open'  => '<table border="0" cellpadding="0" cellspacing="0" class="table table-hover">' ));
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Hotel ID', 'Location', 'Hotel Name', 'Hotel URL', 'Actions');
		$i = 0 + $offset;
		foreach ($hotels as $obj)
		{
			$this
				->table
				->add_row(
					$obj->hotelID, 
					$obj->location, 
					$obj->hotelName, 
					$obj->hotel_URL, 
					anchor($this->moduleName . "s/view/". $obj->hotelID, 'view', array('class'=>'view')).' | '.
						anchor($this->moduleName . "s/update/". $obj->hotelID, 'update', array('class'=>'update')).' | '.
						anchor($this->moduleName . "s/delete/". $obj->hotelID, 'delete', array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this ". $this->moduleName ."?')"))
				);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName . "List", $data);
		$this->load->view('templates/footer', $data);
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = "Add new " . $this->moduleName;
		$data['message'] = '';
		$data['action'] = site_url($this->moduleName . "s/addHandler");
		$data['link_back'] = anchor($this->moduleName . 's/index/', 'Back to list of ' . $this->moduleName, array('class'=>'back'));
	
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName . "Edit", $data);
		$this->load->view('templates/footer', $data);
	}
	
	function addHandler()
	{
		// set common properties
		$data['title'] = "Add new " . $this->moduleName;
		$data['action'] = site_url($this->moduleName . "s/addHandler");
		$data['link_back'] = anchor($this->moduleName . "s/index/", "Back to list of " . $this->moduleName . "s", array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$obj = array('location' => $this->input->post('location'),
							'hotelName' => $this->input->post('hotelName'),
							'hotel_URL' => $this->input->post('hotel_URL'));
			$id = $this->Hotels_mdl->save($obj);
			
			// set user message
			$data['message'] = "<div class=\"success\">add new ". $this->moduleName ." success</div>";
		}
		
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName .'Edit', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = ucfirst($this->moduleName) . ' Details';
		$data['link_back'] = anchor($this->moduleName . 's/index/', "Back to list of " . $this->moduleName . "s", array('class'=>'back'));
		
		// get obj details
		$data['obj'] = $this->Hotels_mdl->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName .'View', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$obj = $this->Hotels_mdl->get_by_id($id)->row();
		$this->form_data->hotelID = $id;
		$this->form_data->location = $obj->location;
		$this->form_data->hotelName = $obj->hotelName;
		$this->form_data->hotel_URL = $obj->hotel_URL;
		
		// set common properties
		$data['title'] = 'Update ' . $this->moduleName;
		$data['message'] = '';
		$data['action'] = site_url($this->moduleName .'s/updateHandler');
		$data['link_back'] = anchor($this->moduleName .'s/index/','Back to list of '. $this->moduleName . 's',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName .'Edit', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function updateHandler()
	{
		// set common properties
		$data['title'] = 'Update ' . $this->moduleName;
		$data['action'] = site_url($this->moduleName . 's/updateHandler');
		$data['link_back'] = anchor($this->moduleName . 's/index/','Back to list of '. $this->moduleName .'s', array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$id = $this->input->post('hotelID');
			$obj = array('location' => $this->input->post('location'),
							'hotelName' => $this->input->post('hotelName'),
							'hotel_URL' => $this->input->post('hotel_URL'));
			$this->Hotels_mdl->update($id, $obj);
			
			// set user message
			$data['message'] = '<div class="success">update '. $this->moduleName .' success</div>';
		}
		
		// load view
		$this->load->view('templates/header', $data);
		$this->load->view($this->moduleName .'Edit', $data);
		$this->load->view('templates/footer', $data);
	}
	
	function delete($id)
	{
		// delete person
		$this->Hotels_mdl->delete($id);
		
		// redirect to person list page
		redirect($this->moduleName . 's/index/', 'refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->hotelID = '';
		$this->form_data->location = '';
		$this->form_data->hotelName = '';
		$this->form_data->hotel_URL = '';
	}
	
	// validation rules
	function _set_rules()
	{
		//$this->form_validation->set_rules('hotelID', 'Hotel ID', 'trim|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|required');
		$this->form_validation->set_rules('hotelName', 'Hotel Name', 'trim|required');
		$this->form_validation->set_rules('hotel_URL', 'Hotel URL', 'trim|required');
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

}