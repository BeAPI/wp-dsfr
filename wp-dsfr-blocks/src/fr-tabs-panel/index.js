import { registerBlockType } from '@wordpress/blocks';
import edit from './edit';
import save from './save';
import metadata from './block.json';

import { Icon, plus } from '@beapi/icons';

registerBlockType(metadata.name, {
	icon: <Icon icon={plus} />,
	edit,
	save,
});
