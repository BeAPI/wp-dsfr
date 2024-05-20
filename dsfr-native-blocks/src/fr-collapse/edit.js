import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import { useEffect } from '@wordpress/element';
import dsfrClassName from '../utils/dsfrClassName';

export default function Edit({ setAttributes, context }) {
	let allowedBlocks = [];
	const hasSupport = select('core/blocks').hasBlockSupport(
		'dsfr/fr-accordions-group',
		'accordionPanelBlocks'
	);
	const blockProps = useBlockProps();

	if (hasSupport) {
		allowedBlocks = select('core/blocks').getBlockSupport(
			'dsfr/fr-accordions-group',
			'accordionPanelBlocks'
		);
	} else {
		allowedBlocks = select('core/blocks')
			.getBlockTypes()
			.map((block) => {
				return block.name;
			})
			.filter((blockName) => {
				return (
					blockName !== 'dsfr/fr-accordions-group' &&
					blockName !== 'dsfr/fr-accordion' &&
					blockName !== 'dsfr/fr-accordion-title' &&
					blockName !== 'dsfr/fr-collapse'
				);
			});
	}

	useEffect(() => {
		setAttributes({ id: context['dsfr/fr-accordion--id'] });
	}, [context['dsfr/fr-accordion--id']]);

	dsfrClassName(blockProps, 'fr-collapse');

	return (
		<div {...blockProps}>
			<InnerBlocks
				allowedBlocks={allowedBlocks}
				templateLock={false}
				template={[['core/paragraph']]}
			/>
		</div>
	);
}
