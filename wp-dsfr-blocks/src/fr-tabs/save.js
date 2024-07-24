import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function save({ attributes }) {
	const { title, tabsListPosition } = attributes;
	const blockProps = useBlockProps.save();
	const innerBlocksProps = useInnerBlocksProps.save(blockProps);

	setDSFRBlockClassName(innerBlocksProps, 'fr-tabs');

	if (tabsListPosition) {
		innerBlocksProps.className +=
			' has-tabs-list-aligned-' + tabsListPosition;
	}

	return <div {...innerBlocksProps} aria-label={title} />;
}
