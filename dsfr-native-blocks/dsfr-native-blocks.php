<?php
/**
 * Plugin Name:       DSFR Native Blocks
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dsfr-native-blocks
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function dsfr_native_blocks_init() {
	$blocks = [
		'fr-accordions-group-faq',
		'fr-accordions-group',
		'fr-accordion',
		'fr-accordion-title',
		'fr-collapse',
		'fr-tabs',
		'fr-tabs-list',
		'fr-tabs-list-item',
		'fr-tabs-panel',
	];

	foreach ( $blocks as $block ) {
		register_block_type( __DIR__ . '/build/' . $block );
	}
}

add_action( 'init', 'dsfr_native_blocks_init' );

/**
 * Allow additional HTML attributes in KSES.
 *
 * Without this, the attributes are stripped from the post content for users without the `unfiltered_html` capability.
 * This break the block in the editor since the saved content doesn't match the output of the block's `save` function.
 *
 * @param array $tags
 * @param string $context
 *
 * @return array
 */
function dsfr_native_blocks_allow_aria_attributes( $tags, $context ) {

	if ( 'post' === $context ) {
		// button
		$tags['button']['aria-controls'] = true;
		$tags['button']['aria-expanded'] = true;
		$tags['button']['aria-hidden']   = true;
		$tags['button']['aria-selected'] = true;

		// div
		$tags['div']['aria-label']      = true;
		$tags['div']['aria-labelledby'] = true;

		// span
		$tags['span']['aria-controls'] = true;
		$tags['span']['aria-selected'] = true;
	}

	return $tags;
}

add_filter( 'wp_kses_allowed_html', 'dsfr_native_blocks_allow_aria_attributes', 10, 2 );
