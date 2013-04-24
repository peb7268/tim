<?php
define('THEME_DIR', get_template_directory_uri());
define('JS_DIR', THEME_DIR.'/js');	

function initTheme()
{
	add_action('wp_enqueue_scripts', 'setupTheme'); //Ensures page conditionals work
}
function removeDefaults()
{
	remove_filter ('the_content','wpautop');
	remove_filter ('the_excerpt','wpautop');
}
function registerScripts()
{
	//wp_deregister_script('jquery');
	//wp_register_script( $handle, $src, $deps = array, $ver = false, $in_footer = false )
	//wp_register_script('jquery', JS_DIR.'/lib/jquery.js', array(), '', false);
	wp_register_script('home', JS_DIR.'/home.js', array(), false, false);
	wp_register_script('twitter', JS_DIR.'/twitter.js', array('jquery'), false, true);
	wp_register_script('webfonts', JS_DIR.'/webfonts.js', array(), false, false);
	wp_register_script('global', JS_DIR.'/global.js', array('webfonts'), false, true);
}
function enqueueScripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('home');
	wp_enqueue_script('global');
	wp_enqueue_script('twitter');
	wp_enqueue_script('webfonts');
}
function setupTheme()
{	
	removeDefaults();
	registerScripts();
	enqueueScripts();
	//registerStickyPosts();

	//Configure Featured Imaged
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 655, 0, false );						//Sets the default size
	
	//Set a $size var equal to default WP sizes for these in your themes
	//Sizes are: "thumbnail", "medium", "large" and "full" ( full being the cropped default size we said )
	add_image_size( 'banner-full-lanscape', 655, 9999, false);		
	add_image_size( 'banner-full-square', 655, 9999, false);
	add_image_size( 'featured-square', 180, 999, false);
}
function custom_excerpt_length( $length ) 
{
	return 20;
}

//Configs
register_nav_menus( array(
	'Primary' => 'Primary Navigation Menu',
	'Footer' => 'Footer Navigation Menu'
) );


//Actions
add_action('init', 'initTheme');

//Filters
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
