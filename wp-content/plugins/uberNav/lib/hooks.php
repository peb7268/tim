<?php 
function uberNav()
{
	if(! is_admin()){
		do_action('uberNav');
	}
}
function placeholder1($html)
{
	echo 'placeholder1'.$html;
	do_action('placeholder1', $html);
}
function placeholder_created($var)
{
	do_action('placeholder_created', $var);	
}
