<?php

namespace Beapi\Theme\Dsfr\Services;

use Beapi\Theme\Dsfr\Service;
use Beapi\Theme\Dsfr\Service_Container;

/**
 * Class Customizer
 *
 * @package Beapi\Theme\Dsfr
 */
class Customizer implements Service {

	/**
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container ): void {}

	/**
	 * @param Service_Container $container
	 */
	public function boot( Service_Container $container ): void {
		add_action( 'customize_register', [ $this, 'add_customizer_options' ], 10, 1 );
	}

	/**
	 * @return string
	 */
	public function get_service_name(): string {
		return 'customizer';
	}

	/**
	 * Add customizer options
	 *
	 * @param \WP_Customize_Manager $wp_customize
	 *
	 * @return void
	 */
	public function add_customizer_options( \WP_Customize_Manager $wp_customize ): void {
		$this->set_textarea(
			$wp_customize,
			[
				'section'     => 'title_tagline',
				'field_name'  => 'fr_logo_official_title',
				'label'       => 'Logo Marque - Intitulé officiel',
				'default'     => 'Intitulé officiel',
				'description' => 'L\'intitulé officiel ne doit pas dépasser six lignes.',
				'priority'    => 1,
			]
		);

		$this->set_image(
			$wp_customize,
			[
				'section'    => 'title_tagline',
				'field_name' => 'fr_site_logo',
				'label'      => 'Logo du site',
				'priority'   => 5,
			]
		);

		$this->set_textarea(
			$wp_customize,
			[
				'section'    => 'title_tagline',
				'field_name' => 'fr_footer_content_desc',
				'label'      => 'Texte du footer',
				'priority'   => 20,
			]
		);

		$wp_customize->add_section(
			'social_network',
			[
				'title'      => 'Résaux sociaux',
				'priority'   => 30,
			]
		);

		$this->set_textarea(
			$wp_customize,
			[
				'section'    => 'social_network',
				'field_name' => 'fr_footer_follow_title',
				'label'      => 'Titre des réseaux sociaux',
			]
		);

		foreach (
			[
				'Twitter X',
				'Linkedin',
				'Facebook',
				'Instagram',
				'Youtube',
			]
			as
			$network
		) {
			$this->set_text(
				$wp_customize,
				[
					'section'    => 'social_network',
					'field_name' => 'fr_footer_url_' . str_replace( ' ', '_', strtolower( $network ) ),
					'label'      => 'Url ' . $network,
				]
			);
		}
	}

	/**
	 * Set image
	 *
	 * @param \WP_Customize_Manager $wp_customize
	 * @param array options
	 *
	 * @return void
	 */
	private function set_image( \WP_Customize_Manager $wp_customize, array $options ): void {
		$wp_customize->add_setting(
			$options['field_name'],
			[
				'default'           => ! empty( $options['default'] ) ? $options['default'] : '',
				'sanitize_callback' => 'absint',
				'transport'         => 'refresh',
			]
		);

		$wp_customize->add_control(
			new \WP_Customize_Media_Control(
				$wp_customize,
				$options['field_name'],
				[
					'mime_type'   => 'image',
					'label'       => $options['label'],
					'description' => ! empty( $options['description'] ) ? $options['description'] : '',
					'section'     => $options['section'],
					'priority'    => ! empty( $options['priority'] ) ? $options['priority'] : 10,
				]
			)
		);
	}

	/**
	 * Set textarea
	 *
	 * @param \WP_Customize_Manager $wp_customize
	 * @param array options
	 *
	 * @return void
	 */
	private function set_textarea( \WP_Customize_Manager $wp_customize, array $options ): void {
		$wp_customize->add_setting(
			$options['field_name'],
			[
				'default'           => ! empty( $options['default'] ) ? $options['default'] : '',
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'refresh',
			]
		);

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$options['field_name'],
				[
					'label'       => $options['label'],
					'section'     => $options['section'],
					'settings'    => $options['field_name'],
					'type'        => 'textarea',
					'description' => ! empty( $options['description'] ) ? $options['description'] : '',
					'priority'    => ! empty( $options['priority'] ) ? $options['priority'] : 10,
				]
			)
		);
	}

	/**
	 * Set text
	 *
	 * @param \WP_Customize_Manager $wp_customize
	 * @param array options
	 *
	 * @return void
	 */
	private function set_text( \WP_Customize_Manager $wp_customize, array $options ): void {
		$wp_customize->add_setting(
			$options['field_name'],
			[
				'default'           => ! empty( $options['default'] ) ? $options['default'] : '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			]
		);

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$options['field_name'],
				[
					'label'       => $options['label'],
					'section'     => $options['section'],
					'settings'    => $options['field_name'],
					'type'        => 'text',
					'description' => ! empty( $options['description'] ) ? $options['description'] : '',
					'priority'    => ! empty( $options['priority'] ) ? $options['priority'] : 10,
				]
			)
		);
	}

	/**
	 * Set radio
	 *
	 * @param \WP_Customize_Manager $wp_customize
	 * @param array options
	 *
	 * @return void
	 */
	private function set_radio( \WP_Customize_Manager $wp_customize, array $options ): void {
		$wp_customize->add_setting(
			$options['field_name'],
			[
				'default'   => ! empty( $options['default'] ) ? $options['default'] : '',
				'transport' => 'refresh',
			]
		);

		$wp_customize->add_control(
			new \WP_Customize_Control(
				$wp_customize,
				$options['field_name'],
				[
					'label'       => $options['label'],
					'section'     => $options['section'],
					'settings'    => $options['field_name'],
					'type'        => 'radio',
					'description' => ! empty( $options['description'] ) ? $options['description'] : '',
					'priority'    => ! empty( $options['priority'] ) ? $options['priority'] : 10,
					'choices'     => $options['choices'],
				]
			)
		);
	}
}
