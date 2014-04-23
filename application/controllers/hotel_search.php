<?php 
/**
* Description of Hotel Search
* Controller that will call hotel results
* @author Edmund
*/

class Hotel_search extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

	function index()
    {
		$this->load->model('db_model');
		
			$this->load->view('header');	
			
			//get passed values
			$cityName = $_GET["cityname"];
			$data['dateIn'] = $_GET["checkInDate"];
			$data['dateOut'] = $_GET["checkOutDate"];
			
			$location = $this->db_model->get_locations();
			//$locID = $location['locationID'];
			$data['locationID'] = $location['locationID'];
			
			$data['cityName'] = $cityName['cityname'];			
			
			$hotel = $this->db_model->get_hotels();
			
			$roomType = $this->db_model->get_RoomTypes();
			$rooms = $this->db_model->get_rooms();
			
			$data['hotelName'] = $hotel['hotelName'];
			$data['hotel_URL'] = $hotel['hotel_URL'];
			
			$data['address'] = $location['address'];
			$data['city'] = $location['city'];
			$data['stateCode'] = $location['stateCode'];
			$data['zip'] = $location['zip'];
			
			$data['roomPrice'] = $roomType['roomPrice'];
			$data['roomDesc'] = $roomType['roomDesc'];
			$data['isSmoking'] = $roomType['isSmoking'];
			$data['maxGuests'] = $roomType['maxGuests'];
			
			//$data['isBooked'] = $rooms['isBooked'];
			
			$this->load->view('results_form', $data);
			
    }

} 

?>