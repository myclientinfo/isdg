
$(document).ready(function() {

	$(document).on('click', '.accordion-inner a', function(theEvent){
		console.log('clickety');
		theEvent.preventDefault();
		if(navigator.onLine){
			
			var section = $('a.accordion-toggle', $(this).closest('.accordion-group')).data('section');
			
			$.get('ajax/content.php', {section: section, page: $(this).attr('href').replace('#', '')}, function(dataResponse){
				$('#section-content').html(dataResponse);
				setHeight();
			});

		}
		
	});

	$(document).on('click', '#icon-calculator', function(theEvent){
		
		if($('#calendar-popup').css('display')=='none'){
			$('#calendar-popup').calculator().show();
		} else {
			$('#calendar-popup').hide();
		}

	});

	 $('.row-fluid, footer').click(function() {
	 	$('#calendar-popup').hide();

	 });

	 $('#calendar-popup').click(function(event){
	     event.stopPropagation();
	 });

	$(window).resize(setHeight);

	$('#accordion2').load('ajax/nav.php');
	setHeight();
	
	
});

var setHeight = function(){
	var final_height = $(window).height() - ($('#page-content').offset().top + 80);
	$('#page-content').height(final_height);
};