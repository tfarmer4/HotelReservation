<?php 

class Reservations extends CI_Controller {
	 
	// num of records per page
	private $limit = 10;
	
	private $moduleName = "reservation";
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table', 'form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Reservations_mdl','',TRUE);
		$this->load->model('Guests_mdl','',TRUE);
		$this->load->model('Users_mdl','',TRUE);
	}
	
	function index($offset = 0)
	{
		$data['title'] = "All " . ucfirst($this->moduleName) . 's';
		$data['moduleName'] = $this->moduleName;
		
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$hotels = $this->Reservations_mdl->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->moduleName . "s/index/");
 		$config['total_rows'] = $this->Reservations_mdl->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_template(array('table_open' => '<table border="0" cellpadding="0" cellspacing="0" class="table table-hover">'));
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Reservation ID', 'Guest Name', 'Check In Date', 'Check Out Date', 'Actions');
		$i = 0 + $offset;
		foreach ($hotels as $obj)
		{
			$this
				->table
				->add_row(
					$obj->reservationID, 
					$obj->guestName,
					$obj->checkinDate,
					$obj->checkoutDate,
					anchor($this->moduleName . "s/view/". $obj->reservationID, 'view', array('class'=>'view')).' | '.
						anchor($this->moduleName . "s/update/". $obj->reservationID, 'update', array('class'=>'update')).' | '.
						anchor($this->moduleName . "s/delete/". $obj->reservationID, 'delete', array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this ". $this->moduleName ."?')"))
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
		
		$data['guests'] = $this->Guests_mdl->list_all()->result();
		$data['users'] = $this->Users_mdl->list_all()->result();
	
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
		
		$data['guests'] = $this->Guests_mdl->list_all()->result();
		$data['users'] = $this->Users_mdl->list_all()->result();
		
		// set empty default form field values
		$this->_set_fields();
		
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '123';
		}
		else
		{
			// save data
			$obj = array(
				'FK_guestID' => $this->input->post('FK_guestID')
				, 'FK_userID' => $this->input->post('FK_userID')
				, 'checkinDate' => $this->input->post('checkinDate')
				, 'checkoutDate' => $this->input->post('checkoutDate')
				, 'totalPrice' => $this->input->post('totalPrice')
			);
			$id = $this->Reservations_mdl->save($obj);
			
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
		$data['obj'] = $this->Reservations_mdl->get_by_id($id)->row();
		
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
		$obj = $this->Reservations_mdl->get_by_id($id)->row();
		var_dump($obj);
		$this->form_data->reservationID = $id;
		$this->form_data->FK_guestID = $obj->FK_guestID;
		$this->form_data->FK_userID = $obj->FK_userID;
		$this->form_data->checkinDate = $obj->checkinDate;
		$this->form_data->checkoutDate = $obj->checkoutDate;
		$this->form_data->totalPrice = $obj->totalPrice;
		
		// set common properties
		$data['title'] = 'Update ' . $this->moduleName;
		$data['message'] = '';
		$data['action'] = site_url($this->moduleName .'s/updateHandler');
		$data['link_back'] = anchor($this->moduleName .'s/index/','Back to list of '. $this->moduleName . 's',array('class'=>'back'));
		
		$data['guests'] = $this->Guests_mdl->list_all()->result();
		$data['users'] = $this->Users_mdl->list_all()->result();
	
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
		
		$data['guests'] = $this->Guests_mdl->list_all()->result();
		$data['users'] = $this->Users_mdl->list_all()->result();
		
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
			$id = $this->input->post('reservationID');
			$obj = array(
				'FK_guestID' => $this->input->post('FK_guestID')
				, 'FK_userID' => $this->input->post('FK_userID')
				, 'checkinDate' => $this->input->post('checkinDate')
				, 'checkoutDate' => $this->input->post('checkoutDate')
				, 'totalPrice' => $this->input->post('totalPrice')
			);
			$this->Reservations_mdl->update($id, $obj);
			
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
		$this->Reservations_mdl->delete($id);
		
		// redirect to person list page
		redirect($this->moduleName . 's/index/', 'refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->reservationID = '';
		$this->form_data->FK_userID = '';
		$this->form_data->FK_guestID = '';
		$this->form_data->checkinDate = '';
		$this->form_data->checkoutDate = '';
		$this->form_data->totalPrice = 0;
	}
	
	// validation rules
	function _set_rules()
	{
		//$this->form_validation->set_rules('reservationID', 'Reservation ID', 'trim|required');
		$this->form_validation->set_rules('FK_userID', 'User', 'trim|required');
		$this->form_validation->set_rules('FK_guestID', 'Guest', 'trim|required');
		$this->form_validation->set_rules('checkinDate', 'Check In Date', 'trim|required');
		$this->form_validation->set_rules('checkoutDate', 'Check Out Date', 'trim|required');
		$this->form_validation->set_rules('totalPrice', 'Total Price', 'trim|required');
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

}