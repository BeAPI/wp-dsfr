<?php

namespace Beapi\Theme\Dsfr\Services;

use Beapi\Theme\Dsfr\Service;
use Beapi\Theme\Dsfr\Service_Container;

/**
 * Class Menu
 *
 * @package Beapi\Theme\Dsfr
 */
class Menu implements Service {

	/**
	 * @var array $data
	 */
	private $data = [
		// menu header tools
		'fr-btns-group' => [
			'list_item_class' => '',
			'link_class'      => 'fr-btn',
		],
		// menu main
		'fr-nav__list' => [
			'submenu_class'   => 'fr-menu__list',
			'list_item_class' => 'fr-nav__item',
			'link_class'      => 'fr-nav__link',
		],
		// footer menu top
		'fr-grid-row fr-grid-row--start fr-grid-row--gutters' => [
			'submenu_class'   => 'fr-footer__top-list',
			'list_item_class' => [ 'fr-col-12 fr-col-sm-6 fr-col-md-3', '' ],
			'link_class'      => [ 'fr-footer__top-cat', 'fr-footer__top-link' ],
			'empty_link'      => [ '/<a href="(#|)" class="fr-footer__top-cat">(.*?)<\/a>/', '<h3 class="fr-footer__top-cat">$2</h3>' ],
		],
		// footer menu content
		'fr-footer__content-list' => [
			'list_item_class' => 'fr-footer__content-item',
			'link_class'      => 'fr-footer__content-link',
		],
		// footer menu bottom
		'fr-footer__bottom-list' => [
			'list_item_class' => 'fr-footer__bottom-item',
			'link_class'      => 'fr-footer__bottom-link',
		],
	];

	/**
	 * @var array $list_item_classes
	 */
	private $list_item_classes = [];

	/**
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container ): void {}

	/**
	 * @param Service_Container $container
	 */
	public function boot( Service_Container $container ): void {
		add_theme_support( 'menus' );

		$this->register_menus();

		add_filter( 'walker_nav_menu_start_el', [ $this, 'override_empty_link' ], 11, 4 );

		add_filter( 'nav_menu_submenu_css_class', [ $this, 'override_submenu_class' ], 11, 3 );
		add_filter( 'nav_menu_css_class', [ $this, 'override_list_item_class' ], 11, 4 );
		add_filter( 'nav_menu_link_attributes', [ $this, 'override_link_class' ], 11, 4 );
	}

	/**
	 * @return string
	 */
	public function get_service_name(): string {
		return 'menu';
	}

	/**
	 * Register wp menu
	 * 
	 * @return string
	 */
	public function register_menus(): void {
		$nav_menu = [
			'menu-header-tools'   => 'Menu entête de page outils',
			'menu-main'           => 'Menu principal',
			'menu-footer-top'     => 'Menu pied de page haut',
			'menu-footer-content' => 'Menu pied de page contenu',
			'menu-footer-bottom'  => 'Menu pied de page bas',
		];
		register_nav_menus( $nav_menu );
	}

	/**
	 * Override submenu class
	 * 
	 * @param array     $classes
	 * @param \stdClass $args
	 * @param int       $depth
	 * 
	 * @return array    $classes
	 */
	public function override_submenu_class( array $classes, \stdClass $args, int $depth ): array {

		if ( array_key_exists( $args->menu_class, $this->data ) && array_key_exists( 'submenu_class', $this->data[ $args->menu_class ] ) ) {
			$class   = $this->data[ $args->menu_class ]['submenu_class'];
			$classes = [ is_array( $class ) ? $class[ min( $depth, count( $class ) - 1 ) ] : $class ];
		}

		return $classes;
	}

	/**
	 * Override list item class
	 * 
	 * @param array     $classes
	 * @param \WP_Post  $menu_item
	 * @param \stdClass $args
	 * @param int       $depth
	 * 
	 * @return array    $classes
	 */
	public function override_list_item_class( array $classes, \WP_Post $menu_item, \stdClass $args, int $depth ): array {
		$classes_length = count( $classes ) - 1;

		// reset array
		$this->list_item_classes = [];

		// get all classes matching fr-
		for ( $i = 0; $i < $classes_length; $i++ ) {
			if ( preg_match('/^fr-/', $classes[ $i ] ) ) {
				$this->list_item_classes[] = $classes[ $i ];
			}
		}

		if ( array_key_exists( $args->menu_class, $this->data ) && array_key_exists( 'list_item_class', $this->data[ $args->menu_class ] ) ) {
			$class   = $this->data[ $args->menu_class ]['list_item_class'];
			$classes = [ is_array( $class ) ? $class[ min( $depth, count( $class ) - 1 ) ] : $class ];
		}

		return $classes;
	}

	/**
	 * Override link class
	 * 
	 * @param array $atts
	 * @param \WP_Post $menu_item
	 * @param \stdClass $args
	 * @param int $depth
	 * 
	 * @return array $atts
	 */
	public function override_link_class( array $atts, \WP_Post $menu_item, \stdClass $args, int $depth ): array {
		$link_classes = $this->list_item_classes;

		if ( array_key_exists( $args->menu_class, $this->data ) && array_key_exists( 'link_class', $this->data[ $args->menu_class ] ) ) {
			$class          = $this->data[ $args->menu_class ]['link_class'];
			$link_classes[] = is_array( $class ) ? $class[ min( $depth, count( $class ) - 1 ) ] : $class;
		}

		$atts['class'] = implode( ' ', $link_classes );
	
		return $atts;
	}

	/**
	 * Override empty link
	 * 
	 * @param string    $item_output
	 * @param \WP_Post  $menu_item
	 * @param int       $depth
	 * @param \stdClass $args
	 * 
	 * @return string   $item_output
	 */
	public function override_empty_link( string $item_output, \WP_Post $menu_item, int $depth, \stdClass $args ): string {

		if ( array_key_exists( $args->menu_class, $this->data ) && array_key_exists( 'empty_link', $this->data[ $args->menu_class ] ) ) {
			$pattern_replacement = $this->data[ $args->menu_class ]['empty_link'];
			$item_output = preg_replace( $pattern_replacement[0], $pattern_replacement[1], $item_output );
		}

		return $item_output;
	}
}
