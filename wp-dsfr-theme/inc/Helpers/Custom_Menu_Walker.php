<?php

namespace Beapi\Theme\Dsfr\Helpers;

class Custom_Menu_Walker extends \Walker_Nav_Menu {

	/**
	 * @param       $output
	 * @param int   $depth
	 * @param array $args
	 */
	public function start_lvl( &$output, $depth = 0, $args = [] ) {}

	/**
	 * @param         $output
	 * @param \WP_Post $item
	 * @param int     $depth
	 * @param array   $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
		parent::start_el( $output, $item, $depth, $args, $id );

		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$sub_menu_id = 'menu-' . $item->ID;

			// replace the last link by a button
			$output = preg_replace(
				'/(<a (.*)?>(.*)?<\/a>)$/',
				sprintf( '<button class="fr-nav__btn" aria-expanded="false" aria-controls="%s">$3</button>', $sub_menu_id ),
				$output
			);

			$output .= sprintf( '<div class="fr-collapse fr-menu" id="%s">', esc_attr( $sub_menu_id ) );
			$output .= '<ul class="fr-menu__list">';
		}
	}

	/**
	 * @param       $output
	 * @param int   $depth
	 * @param array $args
	 */
	public function end_lvl( &$output, $depth = 0, $args = [] ) {
		$output .= '</ul></div>';
	}
}
