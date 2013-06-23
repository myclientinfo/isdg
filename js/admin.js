$(document).ready(function() {
	
	
	$(document).on('click', '.accordion-inner a', function(theEvent){
		
		theEvent.preventDefault();
		if(navigator.onLine){
			
			/*
			var section = $('a.accordion-toggle', $(this).closest('.accordion-group')).data('section').replace('admin-','');
			console.log($(this).text().substring(0,3));
			if(section == 'pages' || section == 'pieces'){
				
			} else {
				$('#dropbox').hide();
			}
			*/
			
			$.get($(this).attr('href'), function(dataResponse){
				$('#section-content').html(dataResponse);
				//setHeight();
				
			});

		}
		
	});
	
	
	$(document).on('click', 'table a', function(theEvent){
		
		theEvent.preventDefault();
		
		var type = $(this).data('type');
		
		$.get($(this).attr('href'), function(dataResponse){
			
			$('#section-content').html(dataResponse);
			setHeight();
			
			//console.log(type);
			
			if( type == 'Piece' || type == 'Page' ){
				$('#dropbox').show();
			} else {
				$('#dropbox').hide();
			}
		});
		
	});
	
	
	$(document).on('submit', 'form', function(theEvent){
		
		theEvent.preventDefault();
		
		$.ajax({
			url: $(this).attr('action'), 
			data: $(this).serialize(),
			type: 'PUT', 
			success: function(){
				
				
			}
		});
	});


	$(document).on('blur', '#section_title, #page_title, #piece_title', function(theEvent){
		
		theEvent.preventDefault();
		
		var type = $(this).attr('id').replace('_title', '');
		
		if($('#'+type+'_title_short').val()==''){
			$('#'+type+'_title_short').val($(this).val());
		}
		
		if($('#'+type+'_title_slug').val()==''){
			var slug = $(this).val().replace(/ /g,'-').toLowerCase();
			$('#'+type+'_title_slug').val(slug);
		}
		
		
	});
	$('#accordion2').load('/api/Nav/Admin?view');
});




var setHeight = function(){
	var final_height = $(window).height() - ($('#section-content').offset().top + 80);
	$('#section-content').height(final_height);
};