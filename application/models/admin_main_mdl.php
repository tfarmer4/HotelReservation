<?php
class Admin_main_mdl extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function validate_user($username, $password) {
		$this->db->where("uName", $username);
		$this->db->where("pass", $password);
		$this->db->where("isAdmin", '1');
		$query = $this->db->get("Users", 1);
		return $query->result_array();
	}
	
	public function get_total_rows($table_name) {
		$result = $this->db->select("COUNT(*) AS total_rows")
							->get($table_name)
							->result_array();
		return $result[0];
		
	}
	
	function change_password($user, $new_password) {
		return $this->db
					->update("Users", array("pass" => $new_password));	
	}
	
	public function get_all_cities() {
		return $this->db
					->get("city")
					->result_array();
	}
	
	public function get_all_qualifications() {
		return $this->db
					->get("tblqualifications")
					->result_array();
	}
	
	public function get_all_designations() {
		return $this->db
					->get("tbldesignations")
					->result_array();
	}
	
	public function get_daily_visitors_by_month($table_name, $month, $year) {
		return $this->db->query("SELECT DATE_FORMAT(date, '%b %e, %Y') AS fdate, COUNT(*) as count FROM `" . $table_name . "` WHERE MONTH(date) = '" . $month . "' AND YEAR(date) = '" . $year . "' GROUP BY DATE(date) ORDER BY `date`")->result_array();
	}
}