(function($){
	$('document').ready(function(){
		var $hero = $('#hero'),
			$li   = $hero.find('li');

		$li.hover(function(evt){
			//console.log('on');
			$(this).find('a:first').slideUp(100);

		}, function(){
			//console.log('off');
			$(this).find('a').slideDown(100);

		});
		
		//Since we now have to use twitter's gay embedded timeline you can inject stuff into the iframe to get around styling issues
		function injectIntoIframe(iframeId){
			var loaded = $('body').data('twttr-rendered');
			if(loaded){
				var frameBody 	= frames[0];
				var cssLink 	= document.createElement("link");
				var fontLink 	= document.createElement("link");
				var tImg 		= $(frameBody.document.body).find('.u-photo');
				var iFrame 		= $('#twitter-widget-0');
				$(iFrame).addClass('fw');

				//Load custom styles
				cssLink.href 	= "http://localhost/Dev/php/tim/wordpress/wp-content/themes/Zeus/styles/twitter.css"; 
				//cssLink.href 	= "http://imperativedesign.net/wp-content/themes/Zeus/styles/twitter.css"; 
				cssLink .rel 	= "stylesheet"; 
				cssLink .type 	= "text/css"; 

				//Load custom fonts
				//<link rel="stylesheet" id="fonts-css" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed%3A300&amp;ver=3.3.1" type="text/css" media="all">
				fontLink.href 	= 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed%3A300&amp;ver=3.3.1';
				fontLink.rel 	= "stylesheet"; 
				fontLink.type 	= "text/css";

				$('#twitter-widget-0').removeAttr('style');
				$('#twitter-widget-0').removeAttr('height');
				$('#twitter-widget-0').removeAttr('width');
				$('#twitter-widget-0').css({
					'width' : '100%'
				});
				frameBody.document.body.appendChild(fontLink);
				frameBody.document.body.appendChild(cssLink);
				
				var that = this;
				function shouldShowTweet(){
					var toShow = $(tImg).is(':hidden');
					console.log(toShow);
					if(toShow == true) {
						window.clearInterval(timerId2);
						$(iFrame).show();
					}
					return toShow;
				}
				
				window.timerId2 = window.setInterval(shouldShowTweet, 100);
				window.clearInterval(timerId);
			}

		}
		window.timerId = window.setInterval(injectIntoIframe, 500);
		
	});
})(jQuery);