import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import dsfrClassName from '../utils/dsfrClassName';

export default function save() {
	const innerBlocksProps = useInnerBlocksProps.save(useBlockProps.save());

	dsfrClassName(innerBlocksProps, 'fr-tabs-list', 'fr-tabs__list');

	return <ul {...innerBlocksProps} role="tablist" />;
}
