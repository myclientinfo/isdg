<?php 

/**
 * class Content
 * Retrieves content for ISDG pages called by ajax requests
 * in interface.
 * @package isdg
 */


class Content {

	protected $db;
	var $content;
	protected $structure;

  	/**
	 * Constructor for Content class
	 * If provided both a section and a page will get the relevant pieces from the database
	 * @param string $section In slug format - ie. my-section-title
	 * @param string $page In slug format - ie. this-page-name
	 */

	function __construct($section = false, $page = false){
		$this->db = Database::getInstance();

	}


	/**
	 * Generate page content
	 * Get the actual content and assemble it in the correct structure for HTML generation
	 * @param string $section In slug format - ie. my-section-title
	 * @param string $page In slug format - ie. this-page-name
	 * @return array $content 
	 */
	public function getContent($section, $page){

		$sql = 'SELECT * FROM page_pieces AS pp
						INNER JOIN pages AS p ON p.id = pp.page_id
						INNER JOIN sections AS s ON s.id = p.section_id
						WHERE p.page_title_slug = ?
						AND s.section_title_slug = ? ORDER BY pp.piece_order_number';
		
		$contObj = $this->db->prepare($sql);
		
		
		$contObj->execute(array($page, $section));
		
		$content['data'] = $contObj->fetchAll();
		$content['subnav'] = $this->getSubnav($content['data']);
		//print_r($content);
		return $content;
	}
	
	
	/**
	 * Structure of subnav Block at top of content
	 * @param array $data page data to strip out the subnav elements
	 * @return array $subnavStructure 
	 */
	public function getSubnav($data){
		$subnavStructure = array();
		return $subnavStructure;
	}



	static function getAdminNav(){
		
		$navStructure['admin-sections']['section_title'] = 'Section Admin';
		$navStructure['admin-sections']['primary_colour'] = '';
		$navStructure['admin-sections']['secondary_colour'] = '';
		$navStructure['admin-sections']['pages']['new'] = array('page_title' => 'Add Section', 'link' => '/api/Admin/new/');
		$navStructure['admin-sections']['pages']['edit'] = array('page_title' => 'Edit Sections', 'link' => '/api/List/Section');
																
																
		$navStructure['admin-pages']['section_title'] = 'Page Admin';
		$navStructure['admin-pages']['primary_colour'] = '';
		$navStructure['admin-pages']['secondary_colour'] = '';
		$navStructure['admin-pages']['pages']['new'] = array('page_title' => 'Add Page', 'link' => '/api/Admin/new/new/');
		$navStructure['admin-pages']['pages']['edit'] = array('page_title' => 'Edit Page', 'link' => '/api/List/Page');
																
		
		$navStructure['admin-pieces']['section_title'] = 'Piece Admin';
		$navStructure['admin-pieces']['primary_colour'] = '';
		$navStructure['admin-pieces']['secondary_colour'] = '';
		$navStructure['admin-pieces']['pages']['new'] = array('page_title' => 'Add Pieces', 'link' => '/api/Admin/new/new/new/');
		$navStructure['admin-pieces']['pages']['edit'] = array('page_title' => 'Edit Pieces', 'link' => '/api/List/Piece');
		
		return $navStructure;
	}


	/**
	 * Get Main Nav
	 * Generates the structure used to create the navigation on the left
	 * @return array $navStructure
	 */

	static function getMainNav(){
	
		$sql = 'SELECT s.*, p.* FROM pages AS p 
					INNER JOIN sections AS s ON p.section_id = s.id
					WHERE p.active = 1 AND s.active = 1
					ORDER BY section_order_number, page_order_number';

		$db = Database::getInstance();

		$navStructure = array();
		
		foreach($db->query($sql) as $row){
			
			$navStructure[$row['section_title_slug']]['section_title'] = $row['section_title'];
			$navStructure[$row['section_title_slug']]['primary_colour'] = $row['primary_colour'];
			$navStructure[$row['section_title_slug']]['secondary_colour'] = $row['secondary_colour'];
			$navStructure[$row['section_title_slug']]['pages'][$row['page_title_slug']] = $row;
		}

		return $navStructure;
		
	}
	
	
	
	public function getStructure(){
	
		return $this->structure;
		
	}


}

?>