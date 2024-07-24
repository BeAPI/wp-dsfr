<?php
namespace Beapi\Theme\Dsfr;

/**
 * Interface Interface_Module
 *
 * @package Beapi\Theme\Dsfr
 */
interface Interface_Module {

	/**
	 * Register the module
	 *
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container );
}
