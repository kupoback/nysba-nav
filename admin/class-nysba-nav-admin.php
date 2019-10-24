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
	
	public function nysba_add_meta_box()
	{
		add_meta_box(
			'shortcode_metabox',
			__('Shortcode Metaboxes'),
			[ $this, 'nysba_metabox' ],
			'nav-menus',
			'side',
			'low'
		);
	}
	
	public function nysba_metabox()
	{
		global $_nav_menu_placeholder, $nav_menu_selected_id;
		
		$_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : - 1;
		?>
		<div class="csnmdiv" id="csnmdiv">
			
			<input type="hidden" value="nysba-custom" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-type]" />
			
			<p id="nysba-menu-item-url-wrap" class="wp-clearfix">
				<label class="howto" for="nysba-url-menu-item"><?php _e('Shortcode'); ?></label>
				<input id="nysba-url-menu-item" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-url]" type="text" class="code nysba-menu-item-textbox" value="" />
			
			<p id="nysba-menu-item-name-wrap" class="wp-clearfix">
				<label class="howto" for="nysba-title-menu-item"><?php _e('Shortcode Name'); ?></label>
				<input id="nysba-title-menu-item" name="menu-item[<?php echo $_nav_menu_placeholder; ?>][menu-item-title]" type="text" class="code nysba-menu-item-textbox" />
			</p>
			
			<p class="button-controls wp-clearfix">
			 <span class="add-to-menu">
          <input type="submit"<?php wp_nav_menu_disabled_check($nav_menu_selected_id); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-nysba-menu-item" id="submit-csnmdiv" />
          <span class="spinner"></span>
      </span>
			</p>
		
		</div>
		<?php
		
	}
	
}
