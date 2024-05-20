import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import dsfrClassName from '../utils/dsfrClassName';

export default function save({ attributes }) {
	const { title, tabsListPosition } = attributes;
	const blockProps = useBlockProps.save();
	const innerBlocksProps = useInnerBlocksProps.save(blockProps);

	dsfrClassName(innerBlocksProps, 'fr-tabs');

	if (tabsListPosition) {
		innerBlocksProps.className +=
			' has-tabs-list-aligned-' + tabsListPosition;
	}

	return <div {...innerBlocksProps} aria-label={title} />;
}
