import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';
import dsfrClassName from '../utils/dsfrClassName';
import uniqid from '../utils/uniqid';

export default function Edit({ setAttributes }) {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		__experimentalDirectInsert: false,
		templateLock: 'all',
		template: [['dsfr/fr-accordion-title'], ['dsfr/fr-collapse']],
	});

	useEffect(() => {
		setAttributes({ id: uniqid('fr-collapse') });
	}, []); // eslint-disable-line react-hooks/exhaustive-deps

	dsfrClassName(innerBlocksProps, 'fr-accordion');

	return <div {...innerBlocksProps} />;
}
