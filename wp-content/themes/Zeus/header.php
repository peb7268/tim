<!DOCTYPE html>
<!-- http://copypastecharacter.com/all-characters -->
<!--[if lt IE 7]>      <html class="ie6"> <![endif]-->
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html>         <!--<![endif]-->

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width" />
	<title>Page Title</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8">

	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div id="wrapper" class="clearfix">
	<header class="clearfix">
		<h1>
			<span>Welcome To</span> Imperative Design
		</h1>
		<div class="navigation clearfix">
			<a href="#">≡ </a>
			<span>Navigation</span>
		</div><!-- .navigation -->
		<?php 
		if(has_action('uberNav')){
			uberNav();
		} else {
			wp_nav_menu( array(
				'theme_location'  	=> 'Primary', 
				'container_id' 		=> 'navigation'
				)
			); 
		} 
		?> 
	</header>