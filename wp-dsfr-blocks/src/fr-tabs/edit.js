import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, PanelRow, TextControl } from '@wordpress/components';
import { useEffect } from '@wordpress/element';
import TabsFocus from './TabsFocus';
import { heading } from '@wordpress/icons';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';
import uniqid from '../common/js/utils/uniqid';

import './editor.scss';

export default function Edit({
	attributes: { title },
	setAttributes,
	clientId,
}) {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		directInsert: false,
		allowedBlocks: ['dsfr/fr-tabs-list', 'dsfr/fr-tabs-panel'],
		template: [
			['dsfr/fr-tabs-list'],
			...new Array(3).fill(['dsfr/fr-tabs-panel']),
		],
		templateInsertUpdatesSelection: true,
		renderAppender: false,
	});

	useEffect(() => {
		setAttributes({ id: uniqid('fr-tabs') });
	}, []); // eslint-disable-line react-hooks/exhaustive-deps

	setDSFRBlockClassName(innerBlocksProps, 'fr-tabs');

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Accéssibilité', 'wp-dsfr-blocks')}
					icon={heading}
					initialOpen={true}
				>
					<PanelRow>
						<TextControl
							value={title}
							label={__('Title')}
							onChange={(content) => {
								setAttributes({ title: content });
							}}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<TabsFocus clientId={clientId} setAttributes={setAttributes} />
			<div {...innerBlocksProps} />
		</>
	);
}
