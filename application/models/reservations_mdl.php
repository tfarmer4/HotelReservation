<?php
class Reservations_mdl extends CI_Model {

	private $tableName= 'Reservations';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('reservationID','asc');
		return $this->db->get($tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		return $this
				->db
				->query("
					SELECT " . $this->tableName. ".*, CONCAT(Guests.fName, ' ', Guests.lName) as guestName, Users.uName
					FROM ". $this->tableName ."
					LEFT JOIN Guests ON " . $this->tableName . ".FK_guestID=Guests.guestID
					LEFT JOIN Users ON " . $this->tableName . ".FK_userID=Users.userID
					ORDER BY reservationID ASC
					LIMIT $offset $limit
				");
	}
	
	function get_by_id($id){
		return $this
				->db
				->query("
					SELECT " . $this->tableName. ".*, CONCAT(Guests.fName, ' ', Guests.lName) as guestName, Users.uName
					FROM ". $this->tableName ."
					LEFT JOIN Guests ON " . $this->tableName . ".FK_guestID=Guests.guestID
					LEFT JOIN Users ON " . $this->tableName . ".FK_userID=Users.userID
				");
	}
	
	function save($room){
		$this->db->insert($this->tableName, $room);
		return $this->db->insert_id();
	}
	
	function update($id, $reservation) {
		$this->db->where('reservationID', $id);
		$this->db->update($this->tableName, $reservation);
	}
	
	function delete($id){
		$this->db->where('reservationID', $id);
		$this->db->delete($this->tableName);
	}
}