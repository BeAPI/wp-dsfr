import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';
import './editor.scss';

export default function Edit() {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['dsfr/fr-accordion'],
		template: new Array(3).fill(['dsfr/fr-accordion']),
	});

	setDSFRBlockClassName(innerBlocksProps, 'fr-accordions-group');

	return <div {...innerBlocksProps} />;
}
