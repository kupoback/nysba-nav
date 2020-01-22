<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cliquestudios.com/
 * @since             1.0.2
 * @package           Nysba_Nav
 *
 * @wordpress-plugin
 * Plugin Name:       NYSBA Navigation
 * Plugin URI:        https://github.com/kupoback/nysba-nav
 * Description:       Custom NYSBA Navigation Control
 * Version:           1.0.0
 * Author:            Nick Makris | Clique Studios
 * Author URI:        https://cliquestudios.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nysba-nav
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NYSBA_NAV_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nysba-nav-activator.php
 */
function activate_nysba_nav() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nysba-nav-activator.php';
	Nysba_Nav_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nysba-nav-deactivator.php
 */
function deactivate_nysba_nav() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nysba-nav-deactivator.php';
	Nysba_Nav_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nysba_nav' );
register_deactivation_hook( __FILE__, 'deactivate_nysba_nav' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nysba-nav.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nysba_nav() {

	$plugin = new Nysba_Nav();
	$plugin->run();

}
run_nysba_nav();
