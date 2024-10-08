<?php

namespace Beapi\Theme\Dsfr;

/**
 * Class Service_Container
 *
 * @package Beapi\Theme\Dsfr
 */
class Service_Container {

	/**
	 * The registered services.
	 *
	 * @var array
	 */
	private $services = [];

	/**
	 * Load all services.
	 */
	public function boot_services(): void {
		$services = array_unique( $this->get_services() );
		$services = array_map( [ $this, 'instantiate_service' ], $services );

		array_walk(
			$services,
			function ( Service $service ) {
				$service->boot( $this );
				$this->services[ $service->get_service_name() ] = $service;
			}
		);
	}

	/**
	 * Get the list of services to register.
	 *
	 * @since 0.1.0
	 *
	 * @return array[string] Array of fully qualified class names.
	 */
	private function get_services(): array {
		return $this->services;
	}

	/**
	 * Get a service's instance
	 *
	 * @param string $name the service name
	 *
	 * @return Service|bool The service instance or false if service not found
	 */
	public function get_service( string $name ) {
		return $this->services[ $name ] ?? false;
	}

	/**
	 * Register a service
	 *
	 * @param string $service
	 *
	 * @return bool
	 * @author Clément Boirie
	 */
	public function register_service( string $service ): bool {
		if ( ! class_exists( $service ) || ! in_array( Service::class, class_implements( $service ), true ) ) {
			return false;
		}

		$this->services[ $service ] = $service;

		return true;
	}

	/**
	 * Instantiate a single service.
	 *
	 * @param string $class Service class to instantiate.
	 *
	 * @return Service
	 */
	private function instantiate_service( string $class ): Service {
		/**
		 * @var Service $service
		 */
		$service = new $class();
		$service->register( $this );
		$this->services[ $service->get_service_name() ] = $service;

		return $this->services[ $service->get_service_name() ];
	}
}
