import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

export default function save() {
	const innerBlocksProps = useInnerBlocksProps.save(useBlockProps.save());

	setDSFRBlockClassName(innerBlocksProps, 'fr-accordions-group');

	return <div {...innerBlocksProps} />;
}
