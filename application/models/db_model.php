<?php class Db_Model extends CI_Model{

	private $name='Hotels';
	
	public function __construct()
	{		
		$this->load->database();
	}
	
	public function get_hotels()
	{
			$query = $this->db->query('SELECT * FROM `Hotels`');
			return $query->row_array();
	}
	
	function get_by_name($cityName){
		$this
			->db
			->select($this->name . ".*, Location.*")
			->join("Location", $this->name . ".FK_locationID=Location.locationID", "left")
			->where('city', $cityName);
		return $this->db->get($this->name);
	}
	
	public function get_rooms()
	{
			$query = $this->db->query('SELECT * FROM `Rooms`');
			return $query->row_array();
	}
	
	public function get_RoomTypes()
	{
			$query = $this->db->query('SELECT * FROM `RoomTypes`');
			return $query->row_array();	
	}
	
	public function get_locations()
	{
			$query = $this->db->query('SELECT * FROM `Location`');
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
