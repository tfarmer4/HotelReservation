<?php
class welcome_mdl extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	// return top 10 testimonials order them by date added descending
	public function get_top_testimonials($count) {
		$this->db
			->order_by("rand()")
			->where("description !=", "")
			->join('tblcustomer', 'tblcustomer.id=tbltestimonials.client_id');
		if($count == "*") {
			$query = $this->db->get("tbltestimonials");
		}
		$query = $this->db->get("tbltestimonials", $count);
		return $query->result_array();
	}
	
	// return top 9 clients from tblcustomer order them by their sorting order ascending
	public function get_top_clients($count) {
		return $this->db
					->order_by("sorting_order", "asc")
					->where("sorting_order >", "0")
					->where("show_on_portfolio", "1")
					->get("tblcustomer", $count)
					->result_array();
	}
	
	// get top 10 project categories from tblcategory order them by their sorting order
	public function get_top_project_categories($count) {
		return $this->db
					->order_by("sortingorder", "asc")
					->where("sortingorder >", "0")
					->where("show_on_portfolio", "1")
					->get("tblcategory", $count)
					->result_array();
	}
	
	// get projects for portfolio only image and id and category
	public function get_projects_for_portfolio($categories) {
		return $this->db
					->select("pc.*, p.image, c.cat_title")
					->join("tblprojects p", "p.id=pc.project_id")
					->join("tblcategory c", "c.id=pc.category_id")
					->order_by("p.sortingorder", "asc")
					->where("p.image !=''")
					->where_in("pc.category_id", $categories)
					//->group_by("p.id")
					->get("project_cats pc")
					->result_array();
	}
	
	// hit counter and tracker
	public function tracker($table_name, $data) {
		return $this->db
					->insert($table_name, $data);
	}
}