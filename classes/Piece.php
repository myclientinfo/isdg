<?php 

/**
 * class Piece
 * Retrieves piece object for ISDG 
 * @package isdg
 */


class Piece extends Content {
	
	public $structure = array(
		'piece_title' => array('type'=>'text', 'label' => 'Title'),
		'page_id' => array('type'=>'select', 'label' => 'Page'),
		'piece_title_slug' => array('type'=>'text', 'label' => 'Title Slug'),
		'piece_title_short' => array('type'=>'text', 'label' => 'Short Title'),
		'piece_order_number' => array('type'=>'text', 'label' => 'Order'),
		'content' => array('type'=>'textarea', 'label'=>'Content'),
		'active' => array('type'=>'yesno', 'label' => 'Active')
	);
	
	
	
	public function getData($section, $page, $piece){
	
		$sql = 'SELECT *, pp.piece_order_number AS order_number, pp.piece_title AS title FROM page_pieces AS pp 
					LEFT JOIN pages AS p ON pp.page_id = p.id
					LEFT JOIN sections AS s ON s.id = p.section_id WHERE pp.id = :id';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute(array(':id' => $piece));
		
		return $contObj->fetch(PDO::FETCH_ASSOC);
	}
	
	
	
	public function add(){
		
		$sql = 'INSERT INTO page_pieces(page_id, piece_title, piece_title_slug, piece_title_short, piece_order_number) 
					VALUES (:page_id, :piece_title, :piece_title_slug, :piece_title_short, :piece_order_number)';
		
		
		
		$contObj = $this->db->prepare($sql);
		
		$post_data = array(':page_id' => $_POST['page_id'], 
							':piece_title' => $_POST['piece_title'], 
							':piece_title_slug' => $_POST['piece_title_slug'],
							':piece_title_short' => $_POST['piece_title_short'],
							':piece_order_number' => $_POST['piece_order_number']);
		
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
							':id' => $_POST['id'] );
		
		$contObj->execute($post_data);
		
		return $_POST['id'];
	}
	
	
	
	public function getList(){
		$sql = 'SELECT *, pp.piece_order_number AS order_number, pp.piece_title AS title, pp.id FROM page_pieces AS pp 
					LEFT JOIN pages AS p ON pp.page_id = p.id
					LEFT JOIN sections AS s ON s.id = p.section_id 
						ORDER BY s.section_order_number, p.page_order_number, pp.piece_order_number';
		
		$contObj = $this->db->prepare($sql);
		$contObj->execute();
		
		return $contObj->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

?>