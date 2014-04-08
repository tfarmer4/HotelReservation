<?php
class Users_mdl extends CI_Model {

	private $tableName= 'Users';
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('userID','asc');
		return $this->db->get($this->tableName);
	}
	
	function count_all(){
		return $this->db->count_all($this->tableName);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this
			->db
			->order_by('userID', 'asc');
		return $this->db->get($this->tableName, $limit, $offset);
	}
	
	function get_by_id($id){
		$this
			->db
			->where('userID', $id);
		return $this->db->get($this->tableName);
	}
	
	function save($user){
		$this->db->insert($this->tableName, $user);
		return $this->db->insert_id();
	}
	
	function update($id, $user) {
		$this->db->where('userID', $id);
		$this->db->update($this->tableName, $user);
	}
	
	function delete($id){
		$this->db->where('userID', $id);
		$this->db->delete($this->tableName);
	}
}