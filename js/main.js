
$(document).ready(function() {

	$(document).on('click', '.accordion-inner a', function(theEvent){
		theEvent.preventDefault();
		if(navigator.onLine){
			
			$.get($(this).attr('href'), function(dataResponse){
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

	$('#accordion2').load('/api/Nav/?view');

});

var setHeight = function(){
	var final_height = $(window).height() - ($('#page-content').offset().top + 80);
	$('#page-content').height(final_height);
};

