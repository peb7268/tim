(function($){
	$('li', '.menu').hover(function(){
		var rootId 		= $(this).parent().parent().attr('id'),
			navWidth 	= $('#' + rootId).width(),
			rPosition 	= $('#' + rootId).position().left,
			cPosition  	= $(this).position().left; 
			
		$(this).addClass('on');
		$(this).find('.sub-menu').hide().css({
			'width': navWidth,
			'left': -cPosition
		}).slideDown(100);
		}, function(){
			$(this).removeClass('on');
			$(this).find('.sub-menu').show().slideUp(100, function(){
				$(this).removeAttr('style');
			});
	});
}(jQuery));