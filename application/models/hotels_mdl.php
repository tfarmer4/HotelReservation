<?php
class Hotels_mdl extends CI_Model {

	private $tableName= 'Hotels';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('hotelID','asc');
		return $this->db->get($this->tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this
			->db
			->select($this->tableName . ".*, Location.address location")
			->join("Location", $this->tableName . ".FK_locationID=Location.locationID", "left")
			->order_by('hotelID', 'asc');
		return $this->db->get($this->tableName, $limit, $offset);
	}
	
	function get_by_id($id){
		$this
			->db
			->select($this->tableName . ".*, Location.address location")
			->join("Location", $this->tableName . ".FK_locationID=Location.locationID", "left")
			->where('hotelID', $id);
		return $this->db->get($this->tableName);
	}
	
	function save($hotel){
		$location = $hotel["location"];
		unset($hotel['location']);
		$this->db->insert($this->tableName, $hotel);
		return $this->db->insert_id();
	}
	
	function update($id, $hotel) {
		$location = $hotel["location"];
		unset($hotel['location']);
		$this->db->where('hotelID', $id);
		$this->db->update($this->tableName, $hotel);
	}
	
	function delete($id){
		$this->db->where('hotelID', $id);
		$this->db->delete($this->tableName);
	}
}