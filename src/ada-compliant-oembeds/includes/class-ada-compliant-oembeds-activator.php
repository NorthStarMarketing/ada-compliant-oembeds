<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.tannerrecord.com
 * @since      1.0.0
 *
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/includes
 * @author     Tanner Record <tanner.record@gmail.com>
 */
class Ada_Compliant_Oembeds_Activator {

	/**
	 * Clear all current oembed caches so we can regenerate them the right way
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;

		$sql = $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE `meta_key` LIKE %s;", '_oembed%' );
		$wpdb->query( $sql );

	}

}
