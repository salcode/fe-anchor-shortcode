<?php
/**
 * Plugin Name: Anchor Shortcode
 * Plugin URI: https://github.com/salcode/fe-anchor-shortcode
 * Description: An easy way to add an anchor location using either the shortcode directly <code>[anchor id="my-anchor-id"]</code> or the WYSIWYG editor.
 * Version: 1.0.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: fe-anchor-shortcode
 * Domain Path: /languages
 *
 * @package FeAnchorShortcode
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'FE_ANCHOR_URL' ) ) {
	define( 'FE_ANCHOR_URL', plugin_dir_url( __FILE__ ) );
}

// Load TinyMCE modifications on admin pages ONLY.
if ( is_admin() ) {
	include_once( __DIR__ . '/includes/mce-mods.php' );
}

add_shortcode( 'anchor', 'fe_anchor_shortcode' );
/**
 * Anchor Shortcode Processing
 *
 * @param @array $atts Keys listed below.
 *          'id' => string The value to use for the ID attribute in the span output.
 * @return string HTML markup of a <span> with an ID based on $atts['id'].
 */
function fe_anchor_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			// Default ID value.
			'id' => 'fe-anchor-default-id',
		),
		// Attributes set in the shortcode.
		$atts,
		// Name of the shortcode (to allow targetted filtering).
		'anchor'
	);

	$output = sprintf(
		'<span class="fe-anchor" id="%s"></span>',
		esc_attr( $atts['id'] )
	);

	return $output;
}
