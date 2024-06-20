<?php
namespace Beapi\Theme\Dsfr\Helpers\Formatting\Term;

use function Beapi\Theme\Dsfr\Helpers\Formatting\Escape\escape_content_value;

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_name( 0, 'news-type' );
 *
 * @param int|\WP_Post $post Post ID or object.
 * @param string $taxonomy Taxonomy name
 *
 * @return array Return an array with the terms name
 */
function get_the_terms_name( $post_id, string $taxonomy ): array {
	return wp_list_pluck( get_the_terms_array( $post_id, $taxonomy ), 'name' );
}

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_array( 0, 'news-type' );
 *
 * @param int|\WP_Post $post Post ID or object.
 * @param string $taxonomy Taxonomy name
 *
 * @return array Return an array with the terms
 */
function get_the_terms_array( $post_id, string $taxonomy ): array {
	$terms = get_the_terms( $post_id, $taxonomy );

	if ( false === $terms || is_wp_error( $terms ) ) {
		return [];
	}

	return $terms;
}

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_terms_list( ['post_id' => 0,'taxonomy' => 'news-type'],['items'  => '<span>%s</span>', 'separator' => ' ', 'wrapper' => '<p>%s</p>'] );
 *
 * @param int|\WP_Post $post Post ID or object.
 * @param string $taxonomy Taxonomy name.
 *
 * @param array $settings {
 *   Optional. Settings for the terms list markup.
 *
 * @type string $before Optional. Markup to prepend to the wrapper of the item. Default <ul>.
 * @type string $after Optional. Markup to prepend to the wrapper of the item. Default </ul>.
 * @type string $before_item Optional. Markup to prepend to the item. Default <li>.
 * @type string $after_item Optional. Markup to prepend to the item. Default </li>.
 * @type string $separator Optional. Markup to prepend to the image. Default empty.
 *
 * }
 *
 * @return string
 */
function get_terms_list( $post, string $taxonomy, array $settings = [] ): string {
	$attributes = apply_filters( 'bea_theme_framework_term_list_attributes', $post, $taxonomy, $settings );
	$terms      = get_the_terms_name( $post, $taxonomy );

	if ( empty( $terms ) ) {
		return '';
	}

	$settings = wp_parse_args(
		$settings,
		[
			'before'      => '<ul>',
			'after'       => '</ul>',
			'before_item' => '<li>',
			'after_item'  => '</li>',
			'separator'   => '',
		]
	);

	$settings = apply_filters( 'bea_theme_framework_term_list_settings', $settings, $attributes );

	$items = [];
	foreach ( $terms as $term ) {
		$value = escape_content_value( $term, 'esc_html' );
		if ( empty( $value ) ) {
			continue;
		}

		$items[] = $settings['before_item'] . $value . $settings['after_item'];
	}

	if ( empty( $items ) ) {
		return '';
	}

	return $settings['before'] . implode( $settings['separator'], $items ) . $settings['after'];
}

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Formatting\Term\the_terms_list( ['post_id' => 0,'taxonomy' => 'news-type'],['items'  => '<span>%s</span>', 'separator' => ' ', 'wrapper' => '<p>%s</p>'] );
 *
 * @param int|\WP_Post $post Post ID or object.
 * @param string $taxonomy Taxonomy name.
 *
 * @param array $settings {
 *   Optional. Settings for the terms list markup.
 *
 * @type string $before Optional. Markup to prepend to the wrapper of the item. Default <ul>.
 * @type string $after Optional. Markup to prepend to the wrapper of the item. Default </ul>.
 * @type string $before_item Optional. Markup to prepend to the item. Default <li>.
 * @type string $after_item Optional. Markup to prepend to the item. Default </li>.
 * @type string $separator Optional. Markup to prepend to the image. Default empty.
 *
 * }
 */
function the_terms_list( $post, string $taxonomy, array $settings = [] ): void {
	echo get_terms_list( $post, $taxonomy, $settings );
}
