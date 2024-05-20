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
		'green-tilleul-verveine' => 'Tilleul verveine',
		'green-bourgeon'         => 'Bourgeon',
		'green-emeraude'         => 'Émeraude',
		'green-menthe'           => 'Menthe',
		'green-archipel'         => 'Archipel',
		'blue-ecume'             => 'Écume',
		'blue-cumulus'           => 'Cumulus',
		'purple-glycine'         => 'Glycine',
		'pink-macaron'           => 'Macaron',
		'pink-tuile'             => 'Tuile',
		'yellow-tournesol'       => 'Tournesol',
		'yellow-moutarde'        => 'Moutarde',
		'orange-terre-battue'    => 'Terre battue',
		'brown-cafe-creme'       => 'Café crème',
		'brown-caramel'          => 'Caramel',
		'brown-opera'            => 'Opéra',
		'beige-gris-galet'       => 'Gris galet',
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
