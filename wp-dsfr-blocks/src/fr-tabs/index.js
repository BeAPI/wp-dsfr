import { registerBlockType } from '@wordpress/blocks';

import { Icon, tabs } from '@beapi/icons';

import edit from './edit';
import save from './save';
import metadata from './block.json';

registerBlockType(metadata.name, {
	icon: <Icon icon={tabs} />,
	edit,
	save,
});
