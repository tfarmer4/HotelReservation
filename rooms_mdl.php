<?php
class Rooms_mdl extends CI_Model {

	private $tableName= 'Rooms';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('roomID','asc');
		return $this->db->get($tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this
			->db
			->select($this->tableName . ".*, RoomTypes.roomPrice, RoomTypes.roomDesc, Hotels.hotelName")
			->join("RoomTypes", $this->tableName . ".FK_RoomTypeID=RoomTypes.RoomTypeID", "left")
			->join("Hotels", $this->tableName . ".FK_HotelID=Hotels.HotelID", "left")
			->order_by('roomID', 'asc');
		
		return $this->db->get($this->tableName, $limit, $offset);
	}
	
	function get_by_id($id){
		$this
			->db
			->select($this->tableName . ".*, RoomTypes.roomPrice, RoomTypes.roomDesc, Hotels.hotelName")
			->join("RoomTypes", $this->tableName . ".FK_RoomTypeID=RoomTypes.RoomTypeID", "left")
			->join("Hotels", $this->tableName . ".FK_HotelID=Hotels.HotelID", "left")
			->where('roomID', $id);
		return $this->db->get($this->tableName);
	}
	
	function save($room){
		$this->db->insert($this->tableName, $room);
		return $this->db->insert_id();
	}
	
	function update($id, $room) {
		$this->db->where('roomID', $id);
		$this->db->update($this->tableName, $room);
	}
	
	function delete($id){
		$this->db->where('roomID', $id);
		$this->db->delete($this->tableName);
	}
}