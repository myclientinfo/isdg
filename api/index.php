<?php

set_include_path($_SERVER['DOCUMENT_ROOT'].'/classes');
require 'flight/Flight.php';

Flight::set('flight.views.path', $_SERVER['DOCUMENT_ROOT'].'/views');

Flight::register('db', 'Database');
Flight::register('content', 'Content');




Flight::route('GET /Nav(/@type)', function($type = 'Content'){
	
	if($type=='Admin'){
		$nav = Flight::content()->getAdminNav();
	} else {
		$nav = Flight::content()->getMainNav();
	}
	
	if(isset(Flight::request()->query['view'])){
		Flight::render('nav', array('nav' => $nav, 'type' => $type));
	} else {
		Flight::json($nav);
	}
	
});

Flight::route('GET /List/@type', function($type){

	Flight::register('data', $type);
    
    $data = Flight::data()->getList();
    
    if(!isset(Flight::request()->query['view'])){
	    Flight::json($data);
    } else {
	    Flight::render('list', array('data' => $data, 'type' => $type));
    }
});


Flight::route('GET /Admin(/@section(/@page(/@piece)))', function($section, $page, $piece){
	
	
	if($piece) $type = 'Piece';
    else if($page) $type = 'Page';
    else $type = 'Section';
    
    Flight::register('data', $type);
    
    $data = Flight::data()->getData($section, $page, $piece);
    
    if(!isset($_REQUEST['view'])){
	    Flight::json($data);
    } else {
    	$structure = Flight::data()->getStructure();
    	
    	foreach($structure as $k => &$s){
	    	if($s['type']=='select'){
	    		
	    		Flight::register('temp', $s['label']);
	    		$s['values'] = Flight::temp()->getList();
		    	
	    	}
    	}
	    Flight::render('admin_form.php', array('data' => $data, 'type' => $type, 'structure' => $structure));
    }

});


Flight::route('GET /Content(/@section(/@page))', function($section, $page){
	
    $data = Flight::content()->getContent($section, $page);
    
    if(!isset($_REQUEST['view'])){
	    Flight::json($data);
    } else {
   	    Flight::render('content', array('pageContent' => $data));
    }

});



Flight::route('GET /Project/@project_number/@module/@request', function($project_number, $module, $request){
	
	
});


Flight::route('POST /Project/@project_number/@module/@request', function($project_number, $module, $request){
	
	
});



Flight::route('POST|PUT /Admin(/@section(/@page(/@piece)))', function($section, $page, $piece){
	
	
	echo '<pre>';
	print_r(Flight::request());
	die();
	
	
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
    
    if($_POST['method'] == 'POST'){
    	$data = Flight::data()->add($section, $page, $piece);
    } else {
    	$data = Flight::data()->save($section, $page, $piece);
    }

	
});



Flight::start();
?>
