<?php

namespace Beapi\Theme\Dsfr\Tools;

/**
 * Class Assets
 *
 * @package Beapi\Theme\Dsfr\Tools
 */
class Assets {

	/**
	 * Register a script with the get_theme_file_uri function.
	 *
	 *
	 * @param $handle
	 * @param $src : Have to be a relative filename
	 * @param array $deps
	 * @param mixed $ver
	 * @param bool $in_footer
	 *
	 * @return bool
	 */
	public function register_script( string $handle, string $src, array $deps = [], $ver = false, bool $in_footer = false ): bool {
		return \wp_register_script( $handle, \get_theme_file_uri( $src ), $deps, $ver, $in_footer );
	}

	/**
	 * @param string $handle
	 */
	public function enqueue_script( string $handle ): void {
		\wp_enqueue_script( $handle );
	}

	/**
	 * Register a style with the get_theme_file_uri function.
	 *
	 *
	 * @param string $handle
	 * @param string $src : Have to be a relative filename
	 * @param array  $deps
	 * @param bool   $ver
	 * @param string $media
	 *
	 * @return bool
	 */
	public function register_style( string $handle, string $src, array $deps = [], $ver = false, string $media = 'all' ): bool {
		return \wp_register_style( $handle, \get_theme_file_uri( $src ), $deps, $ver, $media );
	}

	/**
	 * @param string $handle
	 */
	public function enqueue_style( string $handle ): void {
		\wp_enqueue_style( $handle );
	}
}
