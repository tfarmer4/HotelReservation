<?php 

class Hotels extends CI_Controller {
	 
	public function Hotels() {
		parent::__construct();

		//load library
		$this->load->library('session');
		
		// load helpers
		$this->load->helper('url');
		
		// load models
		$this->load->model("hotels_mdl");

	}
	
	private $table_name = "hotels";
	private $max_rows = 20;
	
	// load admin projects view
	public function index() {
		$data["selected_tab"] = $this->router->fetch_class();
		$data["selected_tab_item"] = $this->router->fetch_method();
		$data["page_type"] = "table_editable";
		$data["max_rows"] = $this->max_rows;
		$data["hotels"] = $this->hotels_mdl->get_hotels($this->table_name, 0, $this->max_rows);
		$data["total_rows"] = count($data["hotels"]);
		
		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('list_all_hotels', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function scrap_brands() {
		$cell_phone_category_id = 1;
		
		$data["selected_tab"] = $this->router->fetch_class();
		$data["selected_tab_item"] = $this->router->fetch_method();
		
		$html = file_get_contents("http://www.gsmarena.com/makers.php3");
		$doc = phpQuery::newDocument($html);
		phpQuery::selectDocument($doc);
		
		
		$urls = array();
		if(pq("title")->text() == "List of all mobile phone brands - GSMArena.com") {
			$images = pq("div.st-text img");
			foreach($images as $key => $img) {
				$brand = array();
				$brand["category_id"] = $cell_phone_category_id;
				$brand["name"] = pq($img)->attr("alt");
				$brand["logo"] = pq($img)->attr("src");
				$brand["status"] = "active";
				$brand["href"] = "http://www.gsmarena.com/" . pq($img)->parent()->attr("href");
				
				$img = generate_unique_file_name("brand_", $brand["logo"]);
				$img_and_path =  FCPATH . "/assets/brand_images/" . $img;
				download_image($brand["logo"], $img_and_path);
				$brand["logo"] = $img;
				$brand_id = $this->brands_mdl->add_brand("brands", $brand);
				
				if(is_numeric($brand_id)) {
					$urls[$key]["brand_id"] = $brand_id;
					$urls[$key]["url"] = $brand["href"];
					$urls[$key]["type"] = "brand";
					$urls[$key]["status"] = "active";
				}
			}
			
			$this->scrapper_mdl->add_urls_to_fetch("urls_to_fetch", $urls);
			$data["test"] = $urls;
		} else {
			$data["error"] = "Unable to get page from gsmarena.com";
		}
		
		// load views
		$this->load->view('templates/header', $data);
		$this->load->view('scrap_brands', $data);
		$this->load->view('templates/footer', $data);
	}
}