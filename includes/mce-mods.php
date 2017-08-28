<?php
/**
 * Add anchor button to TinyMCE editor.
 *
 * @package FeAnchorShortcode
 */

add_filter( 'mce_buttons', 'fe_anchor_register_mce_button' );
add_filter( 'mce_external_plugins', 'fe_anchor_add_plugin_mce_button' );

/**
 * Add the fe_anchor button to the TinyMCE editor.
 *
 * @param string[] $buttons Slugs that represent TinyMCE (plugin) functionality.
 * @return Updated array of buttons with divider and fe_anchor included.
 */
function fe_anchor_register_mce_button( $buttons ) {
	// Add a divider ("|") and the "fe_anchor" button.
	array_push( $buttons, '|', 'fe_anchor' );
	return $buttons;
}

/**
 * Add our custom TinyMCE plugin.
 *
 * @param string[] $plugins URLs to load custom TinyMCE plugins.
 * @return Updated array of plugin URLs with our own included.
 */
function fe_anchor_add_plugin_mce_button( $plugins ) {
	$plugins['fe_anchor'] = FE_ANCHOR_URL . 'assets/mce-plugin-fe-anchor.js';
	return $plugins;
}
