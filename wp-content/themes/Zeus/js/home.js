(function($){

	$('document').ready(function(){
		var $hero = $('#hero'),
			$li   = $hero.find('li');

		$li.hover(function(evt){
			console.log('on');
			$(this).find('a').slideUp(100);

		}, function(){
			console.log('off');
			$(this).find('a').slideDown(100);

		});
	});

})(jQuery);