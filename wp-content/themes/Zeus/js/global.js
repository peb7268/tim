//equalize
;(function($){
	$.fn.equalize = function(){
		var elem1 = this[0], elem2 = this[1], max = 0, 
			paddingTop = 0, paddingBottom = 0, totalPadding = 0
			h1 = 0, h2 = 0;
		
		this.each(function(i, elem) {
			var height = $(this).outerHeight();
			(i == 1) ? h1 = height : h2 = height;
      		max = Math.max(max, height);
    	});

		this.each(function() {
      		if($(this).outerHeight() !== max){
      			var currHeight 			= $(this).outerHeight();
      				//max = 446
      				//currHeight = 420
      				difference 			= max - currHeight,
      				calculatedHeight 	= currHeight + difference;
      				console.log(max, currHeight, difference, calculatedHeight);
      			
      			$(this).css('height', calculatedHeight);
      		}
    	});
	}
}(jQuery));


(function($){
	$('document').ready(function(){
		//Implementation
		var sel1 = ($('#body').length > 0) ? '#body' : '#blog';
		$( sel1 + ', #sidebar', '#wrapper').equalize();		
	});
}(jQuery));
