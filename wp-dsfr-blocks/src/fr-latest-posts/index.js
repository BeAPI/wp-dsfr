import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

registerBlockType( metadata.name, {
	title: __( 'Dernières actualités', 'dsfr' ),
	category: 'dsfr',
	icon: 'megaphone',
	edit: () => {
		return (
			<p>
				{ __(
					'Bloc affichant les 3 derniers articles de la catégorie actualités.',
					'dsfr'
				) }
			</p>
		);
	},
	save: () => {
		// Rendered via PHP
		return null;
	},
} );
