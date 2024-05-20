<?php

namespace Beapi\Theme\Dsfr;

use Beapi\Theme\Dsfr\Services\Assets;
use Beapi\Theme\Dsfr\Services\Performance;
use Beapi\Theme\Dsfr\Services\Assets_JS_Async;
use Beapi\Theme\Dsfr\Services\Editor;
use Beapi\Theme\Dsfr\Services\Editor_Patterns;
use Beapi\Theme\Dsfr\Services\Menu;
use Beapi\Theme\Dsfr\Services\Sidebar;
use Beapi\Theme\Dsfr\Services\Svg;
use Beapi\Theme\Dsfr\Services\Theme;
use Beapi\Theme\Dsfr\Services\Customizer;
use Beapi\Theme\Dsfr\Tools\Body_Class;
use Beapi\Theme\Dsfr\Tools\Template_Parts;

/**
 * Class Framework
 *
 * @package Beapi\Theme\Dsfr
 */
class Framework {
	/**
	 * @var Service_Container
	 */
	protected static $container;

	/**
	 * @var array $services
	 */
	protected static $services = [
		// Services
		Theme::class,
		Assets::class,
		Editor::class,
		Editor_Patterns::class,
		Svg::class,
		Menu::class,
	];

	/**
	 * @return Service_Container
	 */
	public static function get_container(): Service_Container {
		if ( is_null( self::$container ) ) {
			self::$container = new Service_Container();
			array_map( [ __CLASS__, 'register_service' ], self::$services );
		}

		return self::$container;
	}

	/**
	 * Register Service
	 *
	 * @param $name
	 */
	public static function register_service( $name ): void {
		self::get_container()->register_service( $name );
	}
}
