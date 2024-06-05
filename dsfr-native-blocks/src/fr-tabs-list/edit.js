import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function Edit() {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['dsfr/fr-tabs-list-item'],
		directInsert: false,
		orientation: 'horizontal',
		templateLock: false,
		template: new Array(3).fill([
			'dsfr/fr-tabs-list-item',
			{ lock: { move: true, remove: true } },
		]),
		templateInsertUpdatesSelection: true,
		renderAppender: false,
	});

	setDSFRBlockClassName(innerBlocksProps, 'fr-tabs-list', 'fr-tabs__list');

	return <ul {...innerBlocksProps} role="tablist" />;
}
