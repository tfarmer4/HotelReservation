<?php 

class Rooms extends CI_Controller {
	 
	// num of records per page
	private $limit = 10;
	
	private $moduleName = "room";
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Rooms_mdl','',TRUE);
		$this->load->model('RoomTypes_mdl','',TRUE);
		$this->load->model('Hotels_mdl','',TRUE);

	}
	
	function index($offset = 0)
	{
		$data['title'] = "All " . ucfirst($this->moduleName) . 's';
		$data['moduleName'] = $this->moduleName;
		
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$hotels = $this->Rooms_mdl->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->moduleName . "s/index/");
 		$config['total_rows'] = $this->Rooms_mdl->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_template(array('table_open' => '<table border="0" cellpadding="0" cellspacing="0" class="table table-hover">'));
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Room ID', 'Room Price', 'Room Description', 'Hotel Name', 'Is Booked?', 'Actions');
		$i = 0 + $offset;
		foreach ($hotels as $obj)
		{
			$this
				->table
				->add_row(
					$obj->roomID, 
					$obj->roomPrice,
					$obj->roomDesc,
					$obj->hotelName,
					($obj->isBooked == "1" ? "Yes" : "No"),
					anchor($this->moduleName . "s/view/". $obj->roomID, 'view', array('class'=>'view')).' | '.
						anchor($this->moduleName . "s/update/". $obj->roomID, 'update', array('class'=>'update')).' | '.
						anchor($this->moduleName . "s/delete/". $obj->roomID, 'delete', array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this ". $this->moduleName ."?')"))
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
		
		$data['roomTypes'] = $this->RoomTypes_mdl->list_all()->result();
		$data['hotels'] = $this->Hotels_mdl->list_all()->result();
	
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
		
		$data['roomTypes'] = $this->RoomTypes_mdl->list_all()->result();
		$data['hotels'] = $this->Hotels_mdl->list_all()->result();
		
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
				'FK_roomTypeID' => $this->input->post('FK_RoomTypeID')
				, 'FK_hotelID' => $this->input->post('FK_HotelID')
				, 'isBooked' => $this->input->post('isBooked')
			);
			$id = $this->Rooms_mdl->save($obj);
			
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
		$data['obj'] = $this->Rooms_mdl->get_by_id($id)->row();
		
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
		$obj = $this->Rooms_mdl->get_by_id($id)->row();
		$this->form_data->roomID = $id;
		$this->form_data->FK_RoomTypeID = $obj->FK_RoomTypeID;
		$this->form_data->FK_HotelID = $obj->FK_HotelID;
		$this->form_data->isBooked = $obj->isBooked;
		
		// set common properties
		$data['title'] = 'Update ' . $this->moduleName;
		$data['message'] = '';
		$data['action'] = site_url($this->moduleName .'s/updateHandler');
		$data['link_back'] = anchor($this->moduleName .'s/index/','Back to list of '. $this->moduleName . 's',array('class'=>'back'));
		
		$data['roomTypes'] = $this->RoomTypes_mdl->list_all()->result();
		$data['hotels'] = $this->Hotels_mdl->list_all()->result();
	
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
		
		$data['roomTypes'] = $this->RoomTypes_mdl->list_all()->result();
		$data['hotels'] = $this->Hotels_mdl->list_all()->result();
		
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
			$id = $this->input->post('roomID');
			$obj = array(
				'FK_roomTypeID' => $this->input->post('FK_RoomTypeID')
				, 'FK_hotelID' => $this->input->post('FK_HotelID')
				, 'isBooked' => $this->input->post('isBooked')
			);
			$this->Rooms_mdl->update($id, $obj);
			
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
		$this->Rooms_mdl->delete($id);
		
		// redirect to person list page
		redirect($this->moduleName . 's/index/', 'refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->roomID = '';
		$this->form_data->FK_RoomTypeID = '';
		$this->form_data->FK_HotelID = '';
		$this->form_data->isBooked = '';
	}
	
	// validation rules
	function _set_rules()
	{
		//$this->form_validation->set_rules('roomID', 'Location ID', 'trim|required');
		$this->form_validation->set_rules('FK_RoomTypeID', 'Room Type', 'trim|required');
		$this->form_validation->set_rules('FK_HotelID', 'Hotel', 'trim|required');
		$this->form_validation->set_rules('isBooked', 'Is Booked', 'trim|required');
		
		// $this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

}
