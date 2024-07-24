<?php
namespace Beapi\Theme\Dsfr\Helpers\Svg;

use Beapi\Theme\Dsfr\Services\Svg;

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Svg\get_the_icon( 'like' );
 *
 * @param string $icon_class
 * @param array $additionnal_classes
 *
 * @return string
 */
function get_the_icon( string $icon_class, $additionnal_classes = [] ): string {
	/**
	* @var Svg $svg
	*/
	$svg = \Beapi\Theme\Dsfr\Framework::get_container()->get_service( 'svg' );
	return false !== $svg ? $svg->get_the_icon( $icon_class, $additionnal_classes ) : '';
}

/**
 * @usage Beapi\Theme\Dsfr\Helpers\Svg\the_icon( 'like' );
 *
 * @param string $icon_class
 * @param array  $additionnal_classes
 */
function the_icon( string $icon_class, $additionnal_classes = [] ): void {
	/**
	* @var Svg $svg
	*/
	$svg = \Beapi\Theme\Dsfr\Framework::get_container()->get_service( 'svg' );
	false !== $svg ? $svg->the_icon( $icon_class, $additionnal_classes ) : '';
}
