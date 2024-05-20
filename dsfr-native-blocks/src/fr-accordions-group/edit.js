import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import dsfrClassName from '../utils/dsfrClassName';
import './editor.scss';

export default function Edit() {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['dsfr/fr-accordion'],
		template: new Array(3).fill(['dsfr/fr-accordion']),
	});

	dsfrClassName(innerBlocksProps, 'fr-accordions-group');

	return <div {...innerBlocksProps} />;
}
