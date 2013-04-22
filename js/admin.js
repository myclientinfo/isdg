
$(document).ready(function() {
	$('#accordion2').load('../ajax/nav.php?admin');
	setHeight();
	
	$(document).on('click', '.accordion-inner a', function(theEvent){
		
		theEvent.preventDefault();
		if(navigator.onLine){
			
			//var section = $('a.accordion-toggle', $(this).closest('.accordion-group')).data('section');
			
			$.get($(this).attr('href'), function(dataResponse){
				$('#section-content').html(dataResponse);
				setHeight();
			});

		}
		
	});
	
	
	$(document).on('click', 'table a', function(theEvent){
		
		theEvent.preventDefault();
		
		$.get($(this).attr('href'), function(dataResponse){
			$('#section-content').html(dataResponse);
			setHeight();
		});
		
	});
	
	
	$(document).on('submit', 'form', function(theEvent){
		
		theEvent.preventDefault();
		
		$.post($(this).attr('action'), $(this).serialize(), function(){
			alert('Updated');
		});
		
	});


	$(document).on('blur', '#section_title, #page_title, #piece_title', function(theEvent){
		
		theEvent.preventDefault();
		
		var type = $(this).attr('id').replace('_title', '');
		
		console.log(type);
		
		if($('#'+type+'_title_short').val()==''){
			$('#'+type+'_title_short').val($(this).val());
		}
		
		if($('#'+type+'_title_slug').val()==''){
			var slug = $(this).val().replace(/ /g,'-').toLowerCase();
			console.log(slug);
			$('#'+type+'_title_slug').val(slug);
		}
		
		
		
		
		//$.post($(this).attr('action'), $(this).serialize(), function(){
		//	alert('Updated');
		//});
		
	});
	
});




var setHeight = function(){
	var final_height = $(window).height() - ($('#page-content').offset().top + 80);
	$('#page-content').height(final_height);
};
