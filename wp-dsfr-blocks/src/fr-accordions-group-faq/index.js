import { registerBlockType } from '@wordpress/blocks';
import './editor.scss';
import Edit from './edit';
import save from './save';

registerBlockType('dsfr/fr-accordions-group-faq', {
	edit: Edit,
	save,
});
