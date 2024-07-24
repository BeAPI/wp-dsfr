import { registerBlockType } from '@wordpress/blocks';
import edit from './edit';
import save from './save';
import metadata from './block.json';

import { Icon, navigation } from '@beapi/icons';

registerBlockType(metadata.name, {
	icon: <Icon icon={navigation} />,
	/**
	 * @see ./edit.js
	 */
	edit,

	/**
	 * @see ./save.js
	 */
	save,
});
