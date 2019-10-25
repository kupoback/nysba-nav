<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cliquestudios.com/
 * @since      1.0.0
 *
 * @package    Nysba_Nav
 * @subpackage Nysba_Nav/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nysba_Nav
 * @subpackage Nysba_Nav/admin
 * @author     Nick Makris | Clique Studios <nmakris@cliquestudios.com>
 */
class Nysba_Nav_Admin
{
	
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;
	
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($plugin_name, $version)
	{
		
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nysba_Nav_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nysba_Nav_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/nysba-nav-admin.css', [], $this->version, 'all');
	}
	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nysba_Nav_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nysba_Nav_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/nysba-nav-admin.js', ['jquery'], $this->version, false);
	}
	
	/**
	 *  Init our custom Nav Menu Walker in the admin area
	 *
	 * @since 1.0.0
	 */
	function nysba_nav_menu_edit()
	{
		return 'Nysba_Nav_Menu_Edit';
	}
	
	/**
	 * Returns names for fields used to store/retrieve metadata.
	 *
	 * @return array The array of field names used.
	 * @since 1.0.0
	 *
	 */
	public function nysba_get_field_names()
	{
		$field_names = [
			'nysba-submenu-anchor-class',
			'nysba-submenu-columns',
			'nysba-submenu-column-width',
			'nysba-submenu-tab-header',
			'nysba-submenu-tab-child-check',
			'nysba-submenu-tab-child-id',
			'nysba-submenu-divider',
			'nysba-submenu-content-check',
			'nysba-submenu-content',
			'nysba-submenu-shortcode',
			//		'nysba-submenu-footer'
		];
		
		return $field_names;
	}
	
}
