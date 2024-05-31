import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
	BlockControls,
	AlignmentControl,
} from '@wordpress/block-editor';
import { PanelBody, PanelRow, TextControl } from '@wordpress/components';
import { useEffect } from '@wordpress/element';
import TabsFocus from './TabsFocus';
import {
	heading,
	justifyRight,
	justifyCenter,
	justifyLeft,
	justifySpaceBetween,
	pullLeft,
	pullRight,
} from '@wordpress/icons';
import { select } from '@wordpress/data';
import './editor.scss';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';
import uniqid from '../utils/uniqid';

const defaultTabsListPositions = [
	{
		icon: justifyLeft,
		title: __('Align top left', 'dsfr-native-blocks'),
		align: 'top-left',
	},
	{
		icon: justifyCenter,
		title: __('Align top center', 'dsfr-native-blocks'),
		align: 'top-center',
	},
	{
		icon: justifyRight,
		title: __('Align top right', 'dsfr-native-blocks'),
		align: 'top-right',
	},
	{
		icon: justifySpaceBetween,
		title: __('Align top space between', 'dsfr-native-blocks'),
		align: 'top-space-between',
	},
	{
		icon: pullLeft,
		title: __('Align sidebar right', 'beapi-tabs-block'),
		align: 'sidebar-right',
	},
	{
		icon: pullRight,
		title: __('Align sidebar left', 'beapi-tabs-block'),
		align: 'sidebar-left',
	},
];

export default function Edit({
	attributes: { title, tabsListPosition },
	setAttributes,
	clientId,
}) {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		__experimentalDirectInsert: false,
		allowedBlocks: ['dsfr/fr-tabs-panel'],
		templateLock: false,
		template: [
			['dsfr/fr-tabs-list'],
			...new Array(3).fill([
				'dsfr/fr-tabs-panel',
				{ lock: { move: true, remove: true } },
			]),
		],
		templateInsertUpdatesSelection: false,
	});
	const hasTabsListPositionSupport = select('core/blocks').hasBlockSupport(
		'dsfr/fr-tabs',
		'tabsListPositions'
	);
	let tabsListPositions = [];

	if (hasTabsListPositionSupport) {
		tabsListPositions = select('core/blocks').getBlockSupport(
			'dsfr/fr-tabs',
			'tabsListPositions'
		);

		if (tabsListPositions === true) {
			tabsListPositions = defaultTabsListPositions;

			if (!tabsListPosition) {
				setAttributes({
					tabsListPosition: defaultTabsListPositions[0].align,
				});
			}
		}

		if (!Array.isArray(tabsListPositions)) {
			tabsListPositions = [];
		}
	}

	useEffect(() => {
		setAttributes({ id: uniqid('fr-tabs') });
	}, []); // eslint-disable-line react-hooks/exhaustive-deps

	setDSFRBlockClassName(innerBlocksProps, 'fr-tabs');

	if (tabsListPosition) {
		innerBlocksProps.className +=
			' has-tabs-list-aligned-' + tabsListPosition;
	}

	return (
		<>
			<BlockControls key="block">
				<AlignmentControl
					value={tabsListPosition}
					describedBy={__(
						'Change tabs alignment',
						'dsfr-native-blocks'
					)}
					alignmentControls={tabsListPositions}
					onChange={(newTabsListPosition) =>
						setAttributes({ tabsListPosition: newTabsListPosition })
					}
				/>
			</BlockControls>
			<InspectorControls>
				<PanelBody
					title={__('Accessibility', 'dsfr-native-blocks')}
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
