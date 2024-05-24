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
		'green-tilleul-verveine' => __( 'Tilleul verveine', 'dsfr-theme' ),
		'green-bourgeon'         => __( 'Bourgeon', 'dsfr-theme' ),
		'green-emeraude'         => __( 'Émeraude', 'dsfr-theme' ),
		'green-menthe'           => __( 'Menthe', 'dsfr-theme' ),
		'green-archipel'         => __( 'Archipel', 'dsfr-theme' ),
		'blue-ecume'             => __( 'Écume', 'dsfr-theme' ),
		'blue-cumulus'           => __( 'Cumulus', 'dsfr-theme' ),
		'purple-glycine'         => __( 'Glycine', 'dsfr-theme' ),
		'pink-macaron'           => __( 'Macaron', 'dsfr-theme' ),
		'pink-tuile'             => __( 'Tuile', 'dsfr-theme' ),
		'yellow-tournesol'       => __( 'Tournesol', 'dsfr-theme' ),
		'yellow-moutarde'        => __( 'Moutarde', 'dsfr-theme' ),
		'orange-terre-battue'    => __( 'Terre battue', 'dsfr-theme' ),
		'brown-cafe-creme'       => __( 'Café crème', 'dsfr-theme' ),
		'brown-caramel'          => __( 'Caramel', 'dsfr-theme' ),
		'brown-opera'            => __( 'Opéra', 'dsfr-theme' ),
		'beige-gris-galet'       => __( 'Gris galet', 'dsfr-theme' ),
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
