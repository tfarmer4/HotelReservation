<?php class Db_Model extends CI_Model{
	public function __construct()
	{		
		$this->load->database();
	}
	
	public function get_hotels()
	{
			$query = $this->db->query('SELECT * FROM `Hotels`');
			return $query->row_array();
	}
	
	function registerNewUser($uName, $pass, $add1, $add2, $city, $stateCode, $phone, $fName, $lName)
	{
		$query = $this->db->query("INSERT INTO `tlf0096`.`Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`) 
		VALUES (" . $uName . "," . $pass . "," . $add1 . "," . $add2 . "," . $city . "," . $stateCode . "," . $phone . "," . $fName . "," . $lName . "") ;
	}
}