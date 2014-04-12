<?php
class Hotel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_hotels()
    {
        return $this->db->get('Hotels')->result();
    }
    
    public function get_hotel($id)
    {
        return $this->db->get_where('Hotels', array('hotelID'=>$id), 1)->result();
    }
    
    public function get_all_locations()
    {
        return $this->db->get('Locations')->result();
    }
    
    public function get_all_rooms_in_hotel($id)
    {
        return $this->db->get_where('Rooms', array('FK_hotelID'=>$id))->result();
    }
    
    public function get_all_booked_rooms($hotelID=NULL)
    {
        if(isset($hotelID))
            return $this->db->get_where('Rooms', array('FK_hotelID'=>$hotelID, 'isBooked'=>1))->result();
        else
            return $this->db->get_where('Rooms', array('isBooked'=>1))->result();
    }
    
    public function get_all_available_rooms($hotelID=NULL)
    {
        if(isset($hotelID))
            return $this->db->get_where('Rooms', array('FK_hotelID'=>$hotelID, 'isBooked'=>0))->result();
        else
            return $this->db->get_where('Rooms', array('isBooked'=>0))->result();
    }
    
    public function get_all_rooms()
    {
        return $this->db->get('Rooms')->result();
    }
}