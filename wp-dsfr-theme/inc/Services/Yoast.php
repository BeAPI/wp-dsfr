<?php

namespace Beapi\Theme\Dsfr\Services;

use Beapi\Theme\Dsfr\Service;
use Beapi\Theme\Dsfr\Service_Container;
use Yoast\WP\SEO\Presentations\Indexable_Presentation;

/**
 * Class Yoast
 *
 * @package Beapi\Theme\DsfrSSA
 */
class Yoast implements Service {
	/**
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container ): void {}

	/**
	 * @param Service_Container $container
	 */
	public function boot( Service_Container $container ): void {
		if ( ! function_exists( 'yoast_breadcrumb' ) || is_admin() ) {
			return;
		}

		add_filter( 'wpseo_breadcrumb_output', [ $this, 'override_breadcrumb_output' ], 10, 2 );
	}

	/**
	 * @return string
	 */
	public function get_service_name(): string {
		return 'yoast';
	}

	/**
	 * Override breadcrumb output
	 *
	 * @param string $output
	 * @param Indexable_Presentation $presentation
	 *
	 * @return string
	 */
	public function override_breadcrumb_output( string $output, Indexable_Presentation $presentation ): string {
		$dsfr_breadcrumb_output = '';
		$crumbs                 = $presentation->breadcrumbs;
		$total_crumbs           = count( $crumbs );

		foreach ( $crumbs as $index => $crumb ) {
			// Open crumb element.
			$dsfr_breadcrumb_output .= '<li>';

			// Render crumb content
			if ( ( $total_crumbs - 1 ) === $index ) {
				// On the last element, don't add HREF attribute and add `aria-current` attribute.
				$dsfr_breadcrumb_output .= '<a class="' . esc_attr( 'fr-breadcrumb__link' ) . '" aria-current="page">' . esc_html( $crumb['text'] ) . '</a>';
			} else {
				$dsfr_breadcrumb_output .= '<a class="' . esc_attr( 'fr-breadcrumb__link' ) . '" href="' . esc_url( $crumb['url'] ) . '">' . esc_html( $crumb['text'] ) . '</a>';
			}

			// Close crumb element.
			$dsfr_breadcrumb_output .= '</li>';
		}

		return $dsfr_breadcrumb_output;
	}
}
