<?php

namespace Beapi\Theme\Dsfr\Services;

use Beapi\Theme\Dsfr\Service;
use Beapi\Theme\Dsfr\Service_Container;
use Beapi\Theme\Dsfr\Tools\Assets as Assets_Tools;
use function json_last_error;
use const JSON_ERROR_NONE;

/**
 * Class Assets
 *
 * @package Beapi\Theme\Dsfr
 */
class Assets implements Service {

	/**
	 * @var Assets_Tools
	 */
	private $assets_tools;

	/**
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container ): void {
		$this->assets_tools = new Assets_Tools();
	}

	/**
	 * @param Service_Container $container
	 */
	public function boot( Service_Container $container ): void {
		add_action( 'init', [ $this, 'register_login_styles' ] );
		add_action( 'login_head', [ $this, 'enqueue_login_styles' ] );

		/**
		 * Add hooks for the scripts and styles to hook on
		 */
		add_action( 'wp', [ $this, 'register_assets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_print_styles', [ $this, 'enqueue_styles' ] );

		/**
		 * set module attribute
		 */
		add_filter( 'script_loader_tag', [ $this, 'set_script_module_attribute' ], 10, 2 );
	}

	/**
	 * @return string
	 */
	public function get_service_name(): string {
		return 'assets';
	}

	/**
	 * Register all the Theme assets
	 */
	public function register_assets(): void {
		if ( is_admin() ) {
			return;
		}

		// Do not add a versioning query param in assets URLs if minified
		$version      = $this->get_assets_version();
		$dsfr_version = $this->get_dsfr_version();

		// DSFR JS
		$this->assets_tools->register_script(
			'dsfr-scripts',
			'dist-dsfr/' . ( $this->is_minified() ? 'dsfr.module.min.js' : 'dsfr.module.js' ),
			[],
			$dsfr_version,
			true
		);

		// DSFR STYLE
		$this->assets_tools->register_style(
			'dsfr-style',
			'dist-dsfr/' . ( $this->is_minified() ? 'dsfr.min.css' : 'dsfr.css' ),
			[],
			$dsfr_version
		);

		$this->assets_tools->register_style(
			'dsfr-utility-style',
			'dist-dsfr/' . ( $this->is_minified() ? 'utility/utility.min.css' : 'utility/utility.css' ),
			[],
			$dsfr_version
		);

		// Js
		$file       = $this->is_minified() ? $this->get_min_file( 'js' ) : 'app.js';
		$asset_data = $this->get_asset_data( $file );
		$this->assets_tools->register_script(
			'theme-dsfr',
			'dist/' . $file,
			array_merge( [ 'dsfr-scripts', 'jquery' ], $asset_data['dependencies'] ), // ensure jQuery dependency is set even if not declared explicitly in the JS
			$asset_data['version'],
			true
		);

		// CSS
		wp_register_style(
			'theme-dsfr',
			\get_stylesheet_directory_uri() . '/dist/' . ( $this->is_minified() ? $this->get_min_file( 'css' ) : 'app.css' ),
			[ 'dsfr-style', 'dsfr-utility-style' ],
			$version
		);
	}

	/**
	 * Enqueue the scripts
	 */
	public function enqueue_scripts(): void {
		// JS
		$this->assets_tools->enqueue_script( 'theme-dsfr' );
	}

	/**
	 * Enqueue the styles
	 */
	public function enqueue_styles(): void {
		// CSS
		$this->assets_tools->enqueue_style( 'theme-dsfr' );
	}

	/**
	 * Return JS/CSS .min file based on assets.json
	 *
	 * @param string $type
	 *
	 * @return string
	 */
	public function get_min_file( string $type ): string {
		if ( empty( $type ) ) {
			return '';
		}

		if ( ! file_exists( \get_template_directory() . '/dist/assets.json' ) ) {
			return '';
		}

		$json   = file_get_contents( \get_template_directory() . '/dist/assets.json' ); //phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$assets = json_decode( $json, true );

		if ( empty( $assets ) || JSON_ERROR_NONE !== json_last_error() ) {
			return '';
		}

		switch ( $type ) {
			case 'css':
				$file = $assets['app.css'];
				break;
			case 'editor.css':
				$file = $assets['editor.css'];
				break;
			case 'login':
				$file = $assets['login.css'];
				break;
			case 'editor.js':
				$file = $assets['editor.js'];
				break;
			case 'js':
				$file = $assets['app.js'];
				break;
			default:
				$file = null;
				break;
		}

		// Custom type
		if ( ! empty( $assets[ $type ] ) ) {
			$file = $assets[ $type ];
		}

		if ( empty( $file ) ) {
			return '';
		}

		return $file;
	}

	/**
	 * Retrieve data for a compiled asset file.
	 *
	 * Asset data are produced by the webpack dependencies extraction plugin. They contain for each asset the list of
	 * dependencies use by the asset and a hash representing the current version of the asset.
	 *
	 * @param string $file The asset name including its extension, eg: app.js, app-min.js
	 *
	 * @return array{dependencies: string[], version:string} The asset data if available or an array with the default keys.
	 */
	public function get_asset_data( string $file ): array {
		static $cache_data;

		$empty_asset_data = [
			'dependencies' => [],
			'version'      => '',
		];

		$file = trim( $file );
		if ( empty( $file ) ) {
			return $empty_asset_data;
		}

		if ( isset( $cache_data[ $file ] ) ) {
			return $cache_data[ $file ];
		}

		$filename = strtok( $file, '.' );
		$file     = sprintf( '/dist/%s.asset.php', $filename );
		if ( ! file_exists( \get_template_directory() . $file ) ) {
			$cache_data[ $file ] = $empty_asset_data;
			return $cache_data[ $file ];
		}

		$cache_data[ $file ] = require \get_template_directory() . $file;

		return $cache_data[ $file ];
	}

	/**
	 * Check if we are on minified environment.
	 *
	 * @return bool
	 * @author Nicolas JUEN
	 */
	public function is_minified(): bool {
		return ( ! defined( 'SCRIPT_DEBUG' ) || SCRIPT_DEBUG === false );
	}

	/**
	 * Register login style
	 * @return void
	 */
	public function register_login_styles(): void {
		$this->assets_tools->register_style(
			'dsfr-style',
			'dist-dsfr/' . ( $this->is_minified() ? 'dsfr.min.css' : 'dsfr.css' ),
			[],
			$this->get_dsfr_version()
		);

		wp_register_style(
			'theme-dsfr-login',
			\get_stylesheet_directory_uri() . '/dist/' . ( $this->is_minified() ? $this->get_min_file( 'login' ) : 'login.css' ),
			[ 'dsfr-style' ],
			$this->get_assets_version()
		);
	}

	/**
	 * Enqueue login style
	 * @return void
	 */
	public function enqueue_login_styles(): void {
		$this->assets_tools->enqueue_style( 'theme-dsfr-login' );
	}

	/**
	 * get assets version
	 * @return null|string
	 */
	private function get_assets_version(): null|string {
		$theme = wp_get_theme();
		return $this->is_minified() ? null : $theme->get( 'Version' );
	}

	/**
	 * get dsfr version
	 * @return string
	 */
	private function get_dsfr_version(): string {
		return '1.11.2';
	}

	/**
	 * Set script module attribute
	 *
	 * @param string $html The link tag for the enqueued script.
	 * @param string $handle The script's registered handle.
	 *
	 * @return string
	 */
	public function set_script_module_attribute( string $html, string $handle ): string {
		if ( ! str_contains( $html, 'dsfr.module' ) ) {
			return $html;
		}

		return str_replace( ' src=', ' type="module" src=', $html );
	}
}
