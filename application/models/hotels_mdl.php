<?php
class Hotels_mdl extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function get_hotels($table_name, $start, $max_rows) {
		return $this->db
					->select("$table_name.*, location.address as location")
					->join('Location', "$table_name.FK_locationID=Location.LocationID", "left")
					->get($table_name, $max_rows, $start)
					->result_array();
	}
	
	public function get_brand($table_name, $data) {
		$result = $this->db
					->where($data)
					->get($table_name)
					->result_array();
		return isset($result[0]) ? $result[0] : array();
	}
	
	public function add_brand($table_name, $data) {
		$old = $this->get_brand($table_name, array("name" => $data["name"], "category_id" => $data["category_id"]));
		if(count($old) < 1) {
			$this->db->insert($table_name, $data);
			return $this->db->insert_id();
		} else {
			return true;
		}
	}
	
	public function update_category($table_name, $where, $data) {
		return $this->db
					->where($where)
					->update($table_name, $data);
	}
	
	public function delete_category($table_name, $where) {
		return $this->db
					->where($where)
					->delete($table_name);	
	}
}