<?php 
/**
* Description of Hotel Search
* Controller that will call hotel results
* @author Edmund
*/

class confirm extends CI_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
    }

	function index()
    {
		$this->load->model('db_model');
		
			$this->load->view('header');				
			
			$this->load->view('confirm_view');
			
    }

} 

?>
