<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="ie6"> <![endif]-->
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html>         <!--<![endif]-->

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width" />
	<title>Page Title</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lib/jquery.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/home.js"></script>
</head>
<body <?php body_class() ?>>
<header class="clearfix">
	<?php wp_nav_menu( array('theme_location'  => 'Primary', 'container_id' => 'navigation') ); ?> 
</header>