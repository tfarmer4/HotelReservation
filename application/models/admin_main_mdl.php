<?php
class Admin_main_mdl extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function validate_user($username, $password) {
		
	}
		
	function change_password($user, $new_password) {
			
	}
	
	public function get_all_users()
	{
		return $this->db->get('Users')->result();
	}
}