import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function save() {
	const innerBlocksProps = useInnerBlocksProps.save(useBlockProps.save());

	setDSFRBlockClassName(innerBlocksProps, 'fr-accordion');

	return <div {...innerBlocksProps} />;
}
