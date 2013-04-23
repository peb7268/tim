<?php 
define('PLUGIN_DIRECTORY', plugins_url().'/uberNav'); 	//starts w http
define('CLASS_PATH', plugin_dir_path(__FILE__));		//Application path - no http
require_once CLASS_PATH.'/UberWalker.php';

class uberNav {
	private $walker;

	public function __construct()
	{
		$this->walker = new UberWalker();
		$this->walker->setHTML(array(
			"boom1", "boom2", "boom3", "boom4"
			)
		);
		add_action('placeholder_created', array($this, 'populate1'), 10, 1);
		add_action('init', array($this, 'setUpPlugin'));
	}
	public function populate1($html)
	{
		return $html;
	}
	public function setUpPlugin()
	{
		$this->registerMenus();
		$this->registerActions();
		$this->registerFilters();
		
		if( ! is_admin() ){
			$this->registerScriptsAndStyles();
			$this->enqueueScriptsAndStyles();
		}
	}
	public function registerMenus( $menus = null )
	{
		//array($id, $desc)
		$menus = array(
			'uberNav' => 'Primary Navigation Menu ( uber style )'
		);
		register_nav_menus( $menus );
	}
	public function registerActions()
	{
		add_action('admin_menu', array($this, 'registerSettingsScreen'));
		add_action('uberNav', array($this, 'buildNav'));
	}
	public function registerFilters()
	{
		add_filter( 'wp_nav_menu_objects', array($this, 'add_menu_parent_class' ));
	}
	public function registerScriptsAndStyles()
	{
		wp_register_script('nav', PLUGIN_DIRECTORY.'/lib/js/nav.js', array(), '0', true);
		wp_register_style( 'uberStyles', PLUGIN_DIRECTORY.'/lib/styles/styles.css', array(), false, 'all' );
	}
	public function enqueueScriptsAndStyles()
	{
		wp_enqueue_script( 'nav' );
		wp_enqueue_style( 'uberStyles' );
	}
	//abstract this methods members to their own files
	public function registerSettingsScreen()
	{
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position )
		add_menu_page('uberNav Plugin Settings', 'uberNav Settings', 'administrator', __FILE__, array($this, 'uberNav_settings_page'), get_stylesheet_directory_uri('stylesheet_directory')."/images/media-button-other.gif");

		add_action( 'admin_init', array($this, 'register_uberNav_settings' ));
	}
	public function register_uberNav_settings()
	{
		register_setting( 'uberNav-settings-group', 'new_option_name' );
		register_setting( 'uberNav-settings-group', 'some_other_option' );
		register_setting( 'uberNav-settings-group', 'option_etc' );	
	}
	public function uberNav_settings_page()
	{ 
		require PLUGIN_DIRECTORY.'lib/settings/page.php';
		echo $form;
	}
	public function buildNav()
	{
		
		wp_nav_menu( array( 'theme_location'=> 'uberNav', 
							'container_id' 	=> 'navigation',
							'after'			=> '<span></span>',
							'walker' 		=> $this->walker
					) 
		); 
	}
	public function add_menu_parent_class( $items ) 
	{
		$parents = array();
		foreach ( $items as $item ){
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}
		
		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'menu-parent-item clearfix'; 
			}
		}
		
		return $items;    
	}
}