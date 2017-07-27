<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.tannerrecord.com
 * @since      1.0.0
 *
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ada_Compliant_Oembeds
 * @subpackage Ada_Compliant_Oembeds/admin
 * @author     Tanner Record <tanner.record@gmail.com>
 */
class Ada_Compliant_Oembeds_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name       The name of this plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_filter( 'oembed_dataparse', array( $this, 'filter_oembed_fetch' ), 10, 3 );

	}
	
	/**
	 * Filter through the result if it's a video and add the title to the iFrame.
	 *
	 * @since   1.0.0
	 * @param		string	$html		The html used to render the embed.
	 * @param		object	$data		The json object passed back from the provider.
	 * @param		string	$url		The url of the video to embed.
	 */
	public function filter_oembed_fetch( $html, $data, $url ) {

		if ( 'video' === $data->type ) {

			$pattern = '~(?i)\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:.,<>?«»“”‘’\'\"]))~';
			preg_match( $pattern, $html, $matches);
			$src = $matches[1];

			$html = '<iframe src="' . esc_url($src) . '" width="' . esc_attr($data->width) . '" height="' . esc_attr($data->height) . '" title="' . esc_html($data->title) . '" frameborder="0" allowfullscreen></iframe>';

		}

		return $html;
	}

}
