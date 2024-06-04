import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import './style.scss';
import DSFRIcons from '../components/DSFRIcons';

registerBlockType(metadata.name, {
	icon: DSFRIcons.tilesGroup,
	edit: Edit,
	save,
});
