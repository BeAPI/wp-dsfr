<?php

namespace Beapi\Theme\Dsfr\Services;

use Beapi\Theme\Dsfr\Framework;
use Beapi\Theme\Dsfr\Service;
use Beapi\Theme\Dsfr\Service_Container;
use Beapi\Theme\Dsfr\Tools\Assets as Assets_Tools;

class Editor implements Service {
	/**
	 * @var Assets_Tools $assets_tools
	 */
	private $assets_tools;

	/**
	 * @var Assets;
	 */
	private $assets;

	/**
	 * @var beapi_accordion_block_counter;
	 */
	private $beapi_accordion_block_counter = 0;

	/**
	 * @param Service_Container $container
	 */
	public function register( Service_Container $container ): void {
		$this->assets_tools = new Assets_Tools();
		$this->assets       = Framework::get_container()->get_service( 'assets' );
	}

	/**
	 * @return string
	 */
	public function get_service_name(): string {
		return 'editor';
	}

	/**
	 * @param Service_Container $container
	 */
	public function boot( Service_Container $container ): void {
		$this->after_theme_setup();
		/**
		 * Load editor style css for admin and frontend
		 */
		$this->style();

		/**
		 * Register custom block style
		 */
		$this->register_custom_block_styles();

		/**
		 * Load editor JS for ADMIN
		 */
		add_action( 'enqueue_block_editor_assets', [ $this, 'admin_editor_script' ] );

		/**
		 * White list of gutenberg blocks
		 */
		add_filter( 'allowed_block_types_all', [ $this, 'gutenberg_blocks_allowed' ], 10, 2 );

		/**
		 * Modify core blocks render
		 */
		add_filter( 'render_block_core/file', [ $this, 'override_block_core_file_render' ], 20, 3 );
	}

	/**
	 * Register :
	 *  - theme_supports
	 *  - color palettes
	 *  - font sizes
	 *  - etc.
	 *
	 */
	private function after_theme_setup(): void {
		// disable
		add_theme_support( 'disable-custom-font-sizes' );

		// excerpt
		add_post_type_support( 'page', 'excerpt' );

		// ----
		// color palette
		// use DSFR variables to support dark-scheme
		// ----
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => 'Titre',
					'slug'  => 'text-title-grey',
					'color' => '#161616',
				],
				[
					'name'  => 'Titre alternatif, texte',
					'slug'  => 'text-default-grey',
					'color' => '#3a3a3a',
				],
				[
					'name'  => 'Bleu France',
					'slug'  => 'background-action-high-blue-france',
					'color' => '#000091',
				],
				[
					'name'  => 'Bleu France alternatif',
					'slug'  => 'background-alt-blue-france',
					'color' => '#f5f5fe',
				],
			]
		);

		// ----
		// font sizes
		// "t-shirt" size bug with less than 6 sizes : https://github.com/WordPress/gutenberg/issues/44245
		// ----
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name' => 'XS - Texte mention',
					'size' => 12,
					'slug' => 'xs',
				],
				[
					'name' => 'SM - Texte détail',
					'size' => 14,
					'slug' => 'sm',
				],
				[
					'name' => 'MD - Texte standard',
					'size' => 16,
					'slug' => 'md',
				],
				[
					'name' => 'LG - Texte article',
					'size' => 18,
					'slug' => 'lg',
				],
				[
					'name' => 'XL - Texte chapô',
					'size' => 20.1,
					'slug' => 'xl',
				],
				[
					'name' => 'H6 - Titre de niveau 6',
					'size' => 20.2,
					'slug' => 'h6',
				],
				[
					'name' => 'H5 - Titre de niveau 5',
					'size' => 22,
					'slug' => 'h5',
				],
				[
					'name' => 'H4 - Titre de niveau 4',
					'size' => 24,
					'slug' => 'h4',
				],
				[
					'name' => 'H3 - Titre de niveau 3',
					'size' => 28,
					'slug' => 'h3',
				],
				[
					'name' => 'H2 - Titre de niveau 2',
					'size' => 32,
					'slug' => 'h2',
				],
				[
					'name' => 'H1 - Titre de niveau 1',
					'size' => 40,
					'slug' => 'h1',
				],
				[
					'name' => 'XS - Titre alternatif xs',
					'size' => 48,
					'slug' => 'display-xs',
				],
				[
					'name' => 'SM - Titre alternatif sm',
					'size' => 56,
					'slug' => 'display-sm',
				],
				[
					'name' => 'MD - Titre alternatif md',
					'size' => 64,
					'slug' => 'display-md',
				],
				[
					'name' => 'LG - Titre alternatif lg',
					'size' => 72,
					'slug' => 'display-lg',
				],
				[
					'name' => 'XL - Titre alternatif xl',
					'size' => 80,
					'slug' => 'display-xl',
				],

			]
		);
	}

	/**
	 * editor style
	 */
	private function style(): void {
		$file              = $this->assets->is_minified() ? $this->assets->get_min_file( 'editor.css' ) : 'editor.css';
		$dsfr_file         = 'dist-dsfr/dsfr.css';
		$dsfr_utility_file = 'dist-dsfr/utility/utility.css';

		if ( is_file( \get_template_directory() . '/' . $dsfr_file ) ) {
			add_editor_style( $dsfr_file );
		}

		if ( is_file( \get_template_directory() . '/' . $dsfr_utility_file ) ) {
			add_editor_style( $dsfr_utility_file );
		}

		/**
		 * Do not enqueue a inexistant file on admin
		 */
		if ( is_file( \get_template_directory() . '/dist/' . $file ) ) {
			add_editor_style( 'dist/' . $file );
		}
	}

	/**
	 * Editor script
	 */
	public function admin_editor_script(): void {
		$file     = $this->assets->is_minified() ? $this->assets->get_min_file( 'editor.js' ) : 'editor.js';
		$filepath = 'dist/' . $file;

		if ( ! file_exists( \get_template_directory() . '/' . $filepath ) ) {
			return;
		}

		$asset_data = $this->assets->get_asset_data( $file );

		wp_register_script(
			'theme-dsfr-admin-editor-script',
			\get_template_directory_uri() . '/' . $filepath,
			$asset_data['dependencies'],
			$asset_data['version'],
			true
		);

		$dsfr_data = [
			'editorColors' => \Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_colors_with_label(),
		];

		wp_add_inline_script( 'theme-dsfr-admin-editor-script', 'window.dsfrData = ' . wp_json_encode( $dsfr_data ), 'before' );

		$this->assets_tools->enqueue_script( 'theme-dsfr-admin-editor-script' );
	}

	/**
	 * Register custom block styles
	 */
	private function register_custom_block_styles() {
		// Buttons
		register_block_style(
			'core/button',
			[
				'name'  => 'secondary',
				'label' => 'Secondaire',
			]
		);

		register_block_style(
			'core/button',
			[
				'name'  => 'tertiary',
				'label' => 'Ternaire',
			]
		);

		register_block_style(
			'core/button',
			[
				'name'  => 'link',
				'label' => 'Lien',
			]
		);
	}

	/**
	 * Allow some core Gutenberg blocks
	 *
	 * @param bool|array $allowed_blocks
	 * @param \WP_Block_Editor_Context $block_editor_context
	 *
	 * @return array
	 */
	public function gutenberg_blocks_allowed( $allowed_blocks, \WP_Block_Editor_Context $block_editor_context ): array {

		$allowed = [
			//base
			'core/block',
			'core/heading',
			'core/paragraph',
			'core/image',
			'core/list',
			'core/list-item',
			'core/table',
			'core/buttons',
			'core/button',
			'core/group',
			'core/columns',
			'core/column',
			'core/media-text',
			'core/spacer',
			'core/separator',
			'core/cover',
			'core/gallery',
			'core/video',
			'core/embed',
			'core/audio',
			'core/file',
			// dsfr
			'dsfr/fr-accordions-group-faq',
			'dsfr/fr-accordions-group',
			'dsfr/fr-accordion',
			'dsfr/fr-collapse',
			'dsfr/fr-accordion-title',
			'dsfr/fr-quote',
			'dsfr/fr-tabs',
			'dsfr/fr-tabs-list',
			'dsfr/fr-tabs-list-item',
			'dsfr/fr-tabs-panel',
			'dsfr/fr-tile',
			'dsfr/fr-tiles-group',
		];

		return ( is_array( $allowed_blocks ) ) ? array_merge( $allowed, $allowed_blocks ) : $allowed;
	}

	/**
	 * Modify core file - insert file detail into core/file block
	 *
	 * @param array  $attributes
	 * @param string $content
	 *
	 * @return string
	 */
	public function override_block_core_file_render( string $block_content, array $block, \WP_Block $instance ): string {
		if ( empty( $block['attrs'] ) || empty( $block['attrs']['id'] ) ) {
			return $block_content;
		}

		$file_infos = \Beapi\Theme\Dsfr\Helpers\Misc\get_file_infos( $block['attrs']['id'] );
		$position   = strpos( $block_content, '</a>' );

		if ( empty( $file_infos['href'] ) || false === $position ) {
			return $block_content;
		}

		$detail = \Beapi\Theme\Dsfr\Helpers\Misc\get_file_detail( $file_infos );

		return substr_replace( $block_content, '<span class="fr-link__detail">' . esc_html( $detail ) . '</span></a>', $position, 4 );
	}
}
