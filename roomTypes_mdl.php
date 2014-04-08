<?php
class RoomTypes_mdl extends CI_Model {

	private $tableName= 'Roomtypes';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('roomTypeID','asc');
		return $this->db->get($this->tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this
			->db
			->order_by('roomTypeID', 'asc');
		return $this->db->get($this->tableName, $limit, $offset);
	}
	
	function get_by_id($id){
		$this
			->db
			->where('roomTypeID', $id);
		return $this->db->get($this->tableName);
	}
	
	function save($roomType){
		$this->db->insert($this->tableName, $roomType);
		return $this->db->insert_id();
	}
	
	function update($id, $roomType) {
		$this->db->where('roomTypeID', $id);
		$this->db->update($this->tableName, $roomType);
	}
	
	function delete($id){
		$this->db->where('roomTypeID', $id);
		$this->db->delete($this->tableName);
	}
}