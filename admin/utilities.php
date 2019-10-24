<?php
/**
 * CS Nav Walker: Utilities
 *
 * A series of administrative functions used by the plugin.
 *
 * @package    CSNW_Nav_Walker
 * @subpackage Administration
 *
 * @since      1.0.0
 */

// No direct access
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

//;

/**
 * Registers css/js files
 *
 * @since 1.0.0
 */
function csnw_register_scripts()
{
	
	wp_register_script('csnw-admin', plugin_dir_url(CSNW_FILE) . 'assets/js/csnw-menu-admin.min.js', [], '', true);

	
	wp_register_style('csnw-admin', plugin_dir_url(CSNW_FILE) . 'assets/css/csnw-admin.min.css');

}

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since 1.0.0
 */
function csnw_admin_menu_scripts($hook)
{
	if ('nav-menus.php' !== $hook) {
		return $hook;
	}
	
	wp_enqueue_script('csnw-admin');

	wp_enqueue_style('csnw-admin');

}
