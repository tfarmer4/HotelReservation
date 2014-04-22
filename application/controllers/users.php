<?php 

class Users extends CI_Controller {
	 
	// num of records per page
	private $limit = 10;
	
	private $moduleName = "user";
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Users_mdl','',TRUE);
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
		$users = $this->Users_mdl->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->moduleName . "s/index/");
 		$config['total_rows'] = $this->Users_mdl->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_template( array ( 'table_open'  => '<table border="0" cellpadding="0" cellspacing="0" class="table table-hover">' ));
		$this->table->set_empty("&nbsp;");
		//$this->table->set_heading('User ID', 'Username', 'pass', 'address1', 'address2', 'City', 'State Code', 'Phone', 'fName', 'lName', 'salt', 'Actions');
		$this->table->set_heading('User ID', 'Username', 'City', 'Phone', 'First Name', 'Last Name', 'Actions');
		$i = 0 + $offset;
		foreach ($users as $obj)
		{
			$this
				->table
				->add_row(
					$obj->userID, 
					$obj->uName,
					//$obj->pass,
					//$obj->address1,
					//$obj->address2,
					$obj->city,
					$obj->phone,
					$obj->fName,
					$obj->lName,
					//$obj->stateCode,
					//$obj->salt,
					
					anchor($this->moduleName . "s/view/". $obj->userID, 'view', array('class'=>'view')).' | '.
						anchor($this->moduleName . "s/update/". $obj->userID, 'update', array('class'=>'update')).' | '.
						anchor($this->moduleName . "s/delete/". $obj->userID, 'delete', array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this ". $this->moduleName ."?')"))
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
			$obj = array(
				'uName' => $this->input->post('uName')
				, 'pass' => $this->input->post('pass')
				, 'address1' => $this->input->post('address1')
				, 'address2' => $this->input->post('address2')
				, 'city' => $this->input->post('city')
				, 'stateCode' => $this->input->post('stateCode')
				, 'phone' => $this->input->post('phone')
				, 'fName' => $this->input->post('fName')
				, 'lName' => $this->input->post('lName')
				, 'salt' => $this->input->post('salt')
			);
			$id = $this->Users_mdl->save($obj);
			
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
		$data['obj'] = $this->Users_mdl->get_by_id($id)->row();
		
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
		$obj = $this->Users_mdl->get_by_id($id)->row();
		$this->form_data->userID = $id;
		$this->form_data->uName = $obj->uName;
		$this->form_data->pass = $obj->pass;
		$this->form_data->address1 = $obj->address1;
		$this->form_data->address2 = $obj->address2;
		$this->form_data->city = $obj->city;
		$this->form_data->stateCode = $obj->stateCode;
		$this->form_data->phone = $obj->phone;
		$this->form_data->fName = $obj->fName;
		$this->form_data->lName = $obj->lName;
		$this->form_data->salt = $obj->salt;
		
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
			$id = $this->input->post('userID');
			$obj = array(
				'uName' => $this->input->post('uName')
				, 'pass' => $this->input->post('pass')
				, 'address1' => $this->input->post('address1')
				, 'address2' => $this->input->post('address2')
				, 'city' => $this->input->post('city')
				, 'stateCode' => $this->input->post('stateCode')
				, 'phone' => $this->input->post('phone')
				, 'fName' => $this->input->post('fName')
				, 'lName' => $this->input->post('lName')
				, 'salt' => $this->input->post('salt')
			);
			$this->Users_mdl->update($id, $obj);
			
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
		$this->Users_mdl->delete($id);
		
		// redirect to person list page
		redirect($this->moduleName . 's/index/', 'refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->userID = '';
		$this->form_data->uName = '';
		$this->form_data->pass = '';
		$this->form_data->address1 = '';
		$this->form_data->address2 = '';
		$this->form_data->city = '';
		$this->form_data->stateCode = '';
		$this->form_data->phone = '';
		$this->form_data->fName = '';
		$this->form_data->lName = '';
		$this->form_data->salt = '';	
	}
	
	// validation rules
	function _set_rules()
	{
		//$this->form_validation->set_rules('userID', 'User ID', 'trim|required');
		$this->form_validation->set_rules('uName', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('address2', 'Address 2', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('stateCode', 'State Code', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('fName', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('salt', 'Salt', 'trim|required');
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

}