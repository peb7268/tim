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

		function getTweets(user_object)
		{
			var user_object;

			var un 		= user_object.user_name,
				limit 	= user_object.limit || 1,
				base 	= 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=',
				URL 	= base + un + '&count=' + limit;
			
			//use a mock data object until prod.
			var data 	= [{"created_at":"Mon Apr 15 04:33:11 +0000 2013","id":323655218594213889,"id_str":"323655218594213889","text":"Really @petra @johnschlitt ? Why did you have to mess up \"Just reach out\" by redoing it? The original was perfect!!","source":"\u003ca href=\"http:\/\/itunes.apple.com\/us\/app\/twitter\/id409789998?mt=12\" rel=\"nofollow\"\u003eTwitter for Mac\u003c\/a\u003e","truncated":false,"in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":14404880,"id_str":"14404880","name":"peb7268","screen_name":"peb7268","location":"33.846364,-84.372799","url":"http:\/\/www.imperativedesign.net","description":"","protected":false,"followers_count":70,"friends_count":143,"listed_count":4,"created_at":"Wed Apr 16 05:22:54 +0000 2008","favourites_count":3,"utc_offset":-18000,"time_zone":"Quito","geo_enabled":true,"verified":false,"statuses_count":1130,"lang":"en","contributors_enabled":false,"is_translator":false,"profile_background_color":"2C4A39","profile_background_image_url":"http:\/\/a0.twimg.com\/profile_background_images\/129944260\/twitterbgs.jpg","profile_background_image_url_https":"https:\/\/si0.twimg.com\/profile_background_images\/129944260\/twitterbgs.jpg","profile_background_tile":false,"profile_image_url":"http:\/\/a0.twimg.com\/profile_images\/557072235\/I_normal.png","profile_image_url_https":"https:\/\/si0.twimg.com\/profile_images\/557072235\/I_normal.png","profile_link_color":"2FC2EF","profile_sidebar_border_color":"181A1E","profile_sidebar_fill_color":"252429","profile_text_color":"666666","profile_use_background_image":true,"default_profile":false,"default_profile_image":false,"following":null,"follow_request_sent":null,"notifications":null},"geo":null,"coordinates":null,"place":null,"contributors":null,"retweet_count":0,"favorite_count":0,"entities":{"hashtags":[],"urls":[],"user_mentions":[{"screen_name":"petra","name":"petra moes","id":5692432,"id_str":"5692432","indices":[7,13]},{"screen_name":"JohnSchlitt","name":"Gil Gambala","id":210439735,"id_str":"210439735","indices":[14,26]}]},"favorited":false,"retweeted":false,"lang":"en"}]

			//$.getJSON(URL, function(data) {
			//	console.log(data);
			//});
			return data;
		}
		function parseTweets(tweets)
		{	
			var user, home, return_val = {};

			$.each(tweets, function(i, tweet){
				user = tweet.user,
				home = "http://twitter.com/" + user.name;

				return_val = {'text': tweet.text, 'home': home};
			});

			return return_val;
		}
		function loadTweetContainer( tweetResp, lselector, rselector )
		{
			$(lselector).attr('href', tweetResp.home);
			$(rselector).html(tweetResp.text);
		}

		//Implementation
		var tweets 		= getTweets({ user_name: 'peb7268', limit: 1 });
		var tweetResp 	= parseTweets( tweets );
		loadTweetContainer ( tweetResp, '#tweets .left p:nth-child(2) a','#tweets .right p');
	});
})(jQuery);