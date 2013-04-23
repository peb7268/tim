<?php
/**
 * 		Class Notes:
 * 		uses nav-menu-template.php thats located in wp-includes
 * 
 * 		Notes on the params: 
 * 		$output is which page / link its outputing
 *		$depth
 *		$args all the stuff that is passed to the wp_nav_menu call.
 * 
 * 		Method Notes: 
 * 		start_lvl is only called when a sub-menu is needed.
 * 		
 */

class UberWalker extends Walker_Nav_Menu {
	public static $count = 1;
	public $placeholder;
	public $html;

	public function __construct(){}
	public function setHTML($htmlArr)
	{
		$this->html = $htmlArr;
	}
	public function getHTML($i)
	{
		return $this->html[$i];
	}
	public function placeholder1()
	{
		echo "bajangajang";
	}
	public function createPlaceHolder()
	{
		$placeholder  	= placeholder.self::$count;
		$$placeholder 	= function( $html = '' ){
			placeholder_created('yo yo from the p1');
			return "placeholder".self::$count.$html;
		};
		add_action('placeholder'.self::$count, array($this, $placeholder), 10, 1);
		return $$placeholder;
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) 
	{
		$placeholder 	= $this->createPlaceHolder();
		$indent 	 	= str_repeat("\t", $depth);
		$output 		.= "\n$indent<ul class=\"sub-menu\">".$placeholder('test')."\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) 
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		self::$count++;
	}
}