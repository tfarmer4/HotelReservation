<?php 
class checkdatabase extends CI_Controller {
	public function show($id)
	{
		$this->load->model('db_model');
		
			$hotel = $this->db_model->get_hotels($id);
			$data['hotelName'] = $hotel['hotelName'];
			$data['hotel_URL'] = $hotel['hotel_URL'];
			$this->load->view('hotel_view', $data);
		
	}
}
?>