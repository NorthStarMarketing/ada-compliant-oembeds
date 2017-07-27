<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.tannerrecord.com
 * @since      1.0.0
 *
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/includes
 * @author     Tanner Record <tanner.record@gmail.com>
 */
class Ada_Compliant_Oembeds_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ada-compliant-oembeds',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
