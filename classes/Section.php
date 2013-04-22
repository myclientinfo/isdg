<?php 

/**
 * class Section
 * Retrieves section object for ISDG 
 * @package isdg
 */


class Section extends Content {
	
	public $structure = array(
	'id' => array('type' => 'hidden'),
		'section_title' => array('type'=>'text', 'label' => 'Title'),
		'section_title_slug' => array('type'=>'text', 'label' => 'Title Slug'),
		'section_order_number' => array('type'=>'text', 'label' => 'Order'),
		'active' => array('type'=>'yesno', 'label' => 'Active')
	);
	
	
	public function getData($section, $page, $piece){
		
		if($section == 'new'){
			return array();
		}
	
		$sql = 'SELECT * FROM sections WHERE section_title_slug = :section';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute(array(':section' => $section));
		
		return $contObj->fetch(PDO::FETCH_ASSOC);
		
	}
	
	
	
	public function add(){
	
		$sql = 'INSERT INTO sections(section_title, section_title_slug, section_order_number) 
					VALUES (:section_title, :section_title_slug, :section_order_number)';
		
		$contObj = $this->db->prepare($sql);
		
		$post_data = array(':section_title' => $_POST['section_title'], 
							':section_title_slug' => $_POST['section_title_slug'], 
							':section_order_number' => $_POST['section_order_number']);
		
		$contObj->execute($post_data);
		print_r($post_data);
		return $contObj->lastInsertId();
		
	}
	
	
	public function save(){
		
		
		$sql = 'UPDATE sections SET section_title = :section_title, section_title_slug = :section_title_slug, 
					section_order_number = :section_order_number 
					WHERE id = :id';
		
		$contObj = $this->db->prepare($sql);
		
		$post_data = array(':section_title' => $_POST['section_title'], 
							':section_title_slug' => $_POST['section_title_slug'], 
							':section_order_number' => $_POST['section_order_number'],
							':id' => $_POST['id']);
		
		$contObj->execute($post_data);
		$contObj->debugDumpParams();
		
		return $_POST['id'];
		
	}
	
	
	public function getList(){
	
		$sql = 'SELECT *, s.section_order_number AS order_number, s.section_title AS title 
					FROM sections AS s 
					ORDER BY s.section_order_number';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute();
		
		return $contObj->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

?>