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
		$sql = 'INSERT INTO `Users` (`uName`, `pass`, `address1`, `address2`, `city`, `stateCode`, `phone`, `fName`, `lName`)
                                VALUES ('.    $this->db->escape($uName).', '.
                                               $this->db->escape($hash).',      ' .
                                                $this->db->escape($add1).', ' .
                                                $this->db->escape($add2).', ' .
                                                $this->db->escape($city).', ' .
                                                $this->db->escape($stateCode).', ' .
                                                $this->db->escape($phone).', ' .
                                                $this->db->escape($fName).', ' .
                                                $this->db->escape($lName).')';
                                $this->db->query($sql);
                                echo $this->db->affected_rows();

	}
}
