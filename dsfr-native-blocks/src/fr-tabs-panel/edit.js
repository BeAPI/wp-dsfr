import classNames from 'classnames';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import { useEffect } from '@wordpress/element';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

export default function Edit({
	attributes: { id, labelledby },
	setAttributes,
	clientId,
	context,
}) {
	const activeTabIndex = context['dsfr/fr-tabs--active-tab-index'];
	const index = select('core/block-editor').getBlockIndex(clientId) - 1;
	const blockProps = useBlockProps({
		className: classNames({
			'fr-tabs__panel--selected': activeTabIndex === index,
		}),
	});
	const contextId = context['dsfr/fr-tabs--id'] + '-panel-' + index;
	const contextLabelledBy = context['dsfr/fr-tabs--id'] + '-tab-' + index;
	const allowedBlocks = select('core/blocks')
    .getBlockTypes()
    .map((block) => {
      return block.name;
    })
    .filter((blockName) => {
      return (
        blockName !== 'dsfr/fr-tabs' &&
        blockName !== 'dsfr/fr-tabs-list' &&
        blockName !== 'dsfr/fr-tabs-list-item' &&
        blockName !== 'dsfr/fr-tabs-panel'
      );
    });

	useEffect(() => {
		setAttributes({
			index,
			id: contextId,
			labelledby: contextLabelledBy,
		});
	}, [index, contextId, contextLabelledBy]);

	setDSFRBlockClassName(blockProps, 'fr-tabs-panel', 'fr-tabs__panel');

	return (
		<div {...blockProps} id={id} aria-labelledby={labelledby}>
			<InnerBlocks
				allowedBlocks={allowedBlocks}
				templateLock={false}
				templateInsertUpdatesSelection={false}
				template={[['core/paragraph']]}
			/>
		</div>
	);
}
