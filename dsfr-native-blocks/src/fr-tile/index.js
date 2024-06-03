import { registerBlockType } from '@wordpress/blocks';
import { SVG, Path } from '@wordpress/primitives';
import Edit from './edit';
import save from './save';
import metadata from './block.json';

registerBlockType(metadata.name, {
	icon: (
		<SVG
			xmlns="http://www.w3.org/2000/svg"
			x="0"
			y="0"
			version="1.1"
			viewBox="0 0 24 24"
		>
			<Path d="M4 0v24h16V0H4zm15 23H5V1h14v22z" />
			<Path d="M9 5h6v6H9zM7 14h10v2H7zM7 17h10v2H7z" />
		</SVG>
	),
	edit: Edit,
	save,
});
