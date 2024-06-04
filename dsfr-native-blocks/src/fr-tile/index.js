import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import DSFRIcons from '../components/DSFRIcons';

registerBlockType(metadata.name, {
	icon: DSFRIcons.tile,
	edit: Edit,
	save,
});
