<?php
namespace Beapi\Theme\Dsfr\Helpers\DSFR;

/**
 * Get dsfr colors with label
 *
 * @param string $prefix
 *
 * @return array $colors
 */
function get_dsfr_colors_with_label( string $prefix = '' ): array {
	$colors = [
		'green-tilleul-verveine' => __( 'Tilleul verveine', 'wp-dsfr-theme' ),
		'green-bourgeon'         => __( 'Bourgeon', 'wp-dsfr-theme' ),
		'green-emeraude'         => __( 'Émeraude', 'wp-dsfr-theme' ),
		'green-menthe'           => __( 'Menthe', 'wp-dsfr-theme' ),
		'green-archipel'         => __( 'Archipel', 'wp-dsfr-theme' ),
		'blue-ecume'             => __( 'Écume', 'wp-dsfr-theme' ),
		'blue-cumulus'           => __( 'Cumulus', 'wp-dsfr-theme' ),
		'purple-glycine'         => __( 'Glycine', 'wp-dsfr-theme' ),
		'pink-macaron'           => __( 'Macaron', 'wp-dsfr-theme' ),
		'pink-tuile'             => __( 'Tuile', 'wp-dsfr-theme' ),
		'yellow-tournesol'       => __( 'Tournesol', 'wp-dsfr-theme' ),
		'yellow-moutarde'        => __( 'Moutarde', 'wp-dsfr-theme' ),
		'orange-terre-battue'    => __( 'Terre battue', 'wp-dsfr-theme' ),
		'brown-cafe-creme'       => __( 'Café crème', 'wp-dsfr-theme' ),
		'brown-caramel'          => __( 'Caramel', 'wp-dsfr-theme' ),
		'brown-opera'            => __( 'Opéra', 'wp-dsfr-theme' ),
		'beige-gris-galet'       => __( 'Gris galet', 'wp-dsfr-theme' ),
	];

	if ( ! empty( $prefix ) ) {
		foreach ( $colors as $key => $color ) {
			$colors[ $prefix . $key ] = $colors[ $key ];
			unset( $colors[ $key ] );
		}
	}

	return $colors;
}

/**
 * Get dsfr colors
 *
 * @param string $prefix
 *
 * @return array $colors
 */
function get_dsfr_colors( string $prefix = '' ): array {
	return array_keys( get_dsfr_colors_with_label( $prefix ) );
}
