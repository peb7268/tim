<?php

//Filters
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Callbacks
function custom_excerpt_length( $length ) 
{
	return 20;
}

//Configs
register_nav_menus( array(
	'Primary' => 'Primary Navigation Menu',
	'Footer' => 'Footer Navigation Menu'
) );

