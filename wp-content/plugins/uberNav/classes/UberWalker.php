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
	public static $elem_i = null;

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
	public function createPlaceHolder()
	{
		//placeholder1, placeholder2, ect..
		$placeholder  	= 'placeholder'.self::$count;
		//holds $placeholder1, $placeholder2, ect.. which are anonymous functions
		$$placeholder 	= function( $html = '' ){
			return $html;
		};
		// echo "\$placeholder is: $placeholder <br>And<br>";
		// echo "\$$placeholder is: <pre style='color: #eee;'>"; 
		// var_dump( $$placeholder );
		// echo "</pre><br>";
		return $$placeholder;
	}

	//WP_Walker overrides
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{	

		//Info
		//echo "self::\$elem_i =".self::$elem_i."<br>";
		// echo "\$id = {$id}<br>";
		// echo "\$depth = {$depth}<br>";
		// echo "\$item->ID = {$item->ID}<br><br>";


		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		//Test here
		//$delimeter 		= $this->getStartDelimeter(self::$elem_i, 2);
		$delimeter 			= null;
		$output .= $indent . $delimeter .'<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		self::$elem_i++;
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		//$delimeter 	 =	$this->getEndDelimeter(self::$elem_i, 2);
		$delimeter 		 =  null;
		$output    		.= 	"</li>".$elem."\n";
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) 
	{
		self::$elem_i 	= 1;
		$i 				= self::$elem_i;
		$html 			= $this->getHTML(self::$count - 1);
		$placeholder 	= $this->createPlaceHolder();
		$indent 	 	= str_repeat("\t", $depth);

		$elem 			= "\n$indent<ul class=\"sub-menu\">".$placeholder($html)."\n";
		$output 		.= $elem;
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) 
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		self::$count++;
		self::$elem_i = 0;
	}
	public function getStartDelimeter($i, $delim)
	{
		if($i % $delim == 0){
			return "</ul><ul class=\"sub-menu\">";
		} 
	}
	public function getEndDelimeter($i, $delim)
	{
		if($i % $delim == 0){
			return "</ul>";
		} 
	}
}