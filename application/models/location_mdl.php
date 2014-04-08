<?php
class Location_mdl extends CI_Model {

	private $tableName= 'location';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('locationID','asc');
		return $this->db->get($tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this
			->db
			->order_by('locationID', 'asc');
		return $this->db->get($this->tableName, $limit, $offset);
	}
	
	function get_by_id($id){
		$this
			->db
			->where('locationID', $id);
		return $this->db->get($this->tableName);
	}
	
	function save($location){
		$this->db->insert($this->tableName, $location);
		return $this->db->insert_id();
	}
	
	function update($id, $location) {
		$this->db->where('locationID', $id);
		$this->db->update($this->tableName, $location);
	}
	
	function delete($id){
		$this->db->where('locationID', $id);
		$this->db->delete($this->tableName);
	}
}