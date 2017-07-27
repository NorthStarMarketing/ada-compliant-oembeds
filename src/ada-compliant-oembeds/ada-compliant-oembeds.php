<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.northstarmarketing.com
 * @since             1.0.0
 * @package           Ada_Compliant_Oembeds
 *
 * @wordpress-plugin
 * Plugin Name:       ADA Compliant oEmbeds
 * Plugin URI:        https://www.northstarmarketing.com
 * Description:       A simple plugin that adds the ADA required 'title' attribute to oembedded iframes.
 * Version:           1.0.0
 * Author:            North Star Marketing
 * Author URI:        https://www.northstarmarketing.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ada-compliant-oembeds
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ada-compliant-oembeds-activator.php
 */
function activate_ada_compliant_oembeds() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ada-compliant-oembeds-activator.php';
	Ada_Compliant_Oembeds_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ada-compliant-oembeds-deactivator.php
 */
function deactivate_ada_compliant_oembeds() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ada-compliant-oembeds-deactivator.php';
	Ada_Compliant_Oembeds_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ada_compliant_oembeds' );
register_deactivation_hook( __FILE__, 'deactivate_ada_compliant_oembeds' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ada-compliant-oembeds.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ada_compliant_oembeds() {

	$plugin = new Ada_Compliant_Oembeds();
	$plugin->run();

}
run_ada_compliant_oembeds();
