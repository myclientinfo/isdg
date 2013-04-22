<?php

set_include_path($_SERVER['DOCUMENT_ROOT'].'/classes');
require 'flight/Flight.php';

Flight::set('flight.views.path', $_SERVER['DOCUMENT_ROOT'].'/views');

Flight::register('db', 'Database');
Flight::register('content', 'Content');

Flight::set('contentObject', Flight::content());

Flight::route('GET /Nav/(@type)', function($type){
	
});

Flight::route('GET /List/@type', function($type){

	Flight::register('data', $type);
    $content = Flight::data();
    
    $data = $content->getList();
    
    
    if(!isset($_REQUEST['view'])){
	    Flight::json($data);
    } else {
	    Flight::render('list.php', array('data' => $data, 'type' => $type));
    }
});


Flight::route('GET /Content(/@section(/@page(/@piece)))', function($section, $page, $piece){
	
	
	
	if($piece) $type = 'Piece';
    else if($page) $type = 'Page';
    else $type = 'Section';
    
    Flight::register('data', $type);
    $content = Flight::data();
    $data = $content->getData($section, $page, $piece);
    
    
    
    if(!isset($_REQUEST['view'])){
	    Flight::json($data);
    } else {
    	$structure = $content->getStructure();
    	
    	foreach($structure as $k => &$s){
	    	if($s['type']=='select'){
	    		
	    		Flight::register('temp', $s['label']);
	    		$temp = Flight::temp();
	    		$s['values'] = $temp->getList();
		    	
	    	}
    	}
	    Flight::render('admin_form.php', array('data' => $data, 'type' => $type, 'structure' => $structure));
    }

});


// create a peice
Flight::route('POST|PUT /Content(/@section(/@page(/@piece)))', function($section, $page, $piece){
	
	if($_POST['method'] == 'POST'){
	
		if($piece) $type = 'Piece';
	    else if($page && !$piece) $type = 'Page';
	    else $type = 'Section';
	    
	} else {
		
		if($piece) $type = 'Piece';
	    else if($page) $type = 'Page';
	    else $type = 'Section';
    	
	}

	Flight::register('data', $type);
    $content = Flight::data();
    
    if($_POST['method'] == 'POST'){
    	$data = $content->add($section, $page, $piece);
    } else {
    	$data = $content->save($section, $page, $piece);
    }
    
    
    
    
	
});



Flight::start();
?>
