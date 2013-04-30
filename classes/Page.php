<?php 

/**
 * class Page
 * Retrieves page object for ISDG 
 * @package isdg
 */


class Page extends Content {

	public $structure = array(
		'id' => array('type' => 'hidden'),
		'section_id'=>array('type'=>'select', 'label' => 'Section'),
		'page_title'=>array('type'=>'text', 'label' => 'Title'),
		'page_title_slug'=>array('type'=>'text', 'label' => 'Title Slug'),
		'page_title_short'=>array('type'=>'text', 'label' => 'Short Title'),
		'page_order_number'=>array('type'=>'text', 'label' => 'Order'),
		'active'=>array('type'=>'yesno', 'label' => 'Active')
	);
	
	
	public function getData($section, $page, $piece){
		
		if($page == 'new'){
			return array();
		}
		
		$sql = 'SELECT * FROM pages AS p LEFT JOIN sections AS s ON s.id = p.section_id WHERE page_title_slug = :page';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute(array(':page' => $page));
		
		return $contObj->fetch(PDO::FETCH_ASSOC);
		
	}
	
	public function add(){
		
		$sql = 'INSERT INTO pages(section_id, page_title, page_title_slug, page_title_short, page_order_number) 
					VALUES (:section_id, :page_title, :page_title_slug, :page_title_short, :page_order_number)';
		
		$contObj = $this->db->prepare($sql);
		
		$post_data = array(':section_id' => $_POST['section_id'], 
							':page_title' => $_POST['page_title'], 
							':page_title_slug' => $_POST['page_title_slug'],
							':page_title_short' => $_POST['page_title_short'],
							':page_order_number' => $_POST['page_order_number']);
		
		$contObj->execute($post_data);
		
		return $contObj->lastInsertId();
		
	}
	
	public function save(){
		
		$sql = 'UPDATE pages SET section_id = :section_id, page_title = :page_title, page_title_slug = :page_title_slug, 
					page_title_short = :page_title_short, page_order_number = :page_order_number 
					WHERE id = :id';
		
		$contObj = $this->db->prepare($sql);
		
		$post_data = array(':section_id' => $_POST['section_id'], 
							':page_title' => $_POST['page_title'], 
							':page_title_slug' => $_POST['page_title_slug'],
							':page_title_short' => $_POST['page_title_short'],
							':page_order_number' => $_POST['page_order_number'], 
							':id' => $_POST['id']);
		
		$contObj->execute($post_data);
		
		return $_POST['id'];
	}
	
	
	public function getList(){
		$sql = 'SELECT *, p.page_order_number AS order_number, p.page_title AS title, p.id FROM pages AS p 
					LEFT JOIN sections AS s ON s.id = p.section_id 
						ORDER BY s.section_order_number, p.page_order_number';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute();
		
		return $contObj->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

?>