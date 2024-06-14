import { __, sprintf } from '@wordpress/i18n';
import {
	InspectorControls,
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();
	const innerBlocksProps = {
		...useInnerBlocksProps(blockProps, {
			allowedBlocks: ['dsfr/fr-tile'],
			template: new Array(3).fill(['dsfr/fr-tile']),
			templateInsertUpdatesSelection: true,
		}),
	};
	const tilesByLine = Math.ceil(attributes.tilesByLine / 5);
	const tilesByLineSM = Math.ceil(attributes.tilesByLine / 2);
	const tilesByLineMD = attributes.tilesByLine;
	const style = {
		'--tiles-by-line': tilesByLine,
		'--tiles-by-line-sm': tilesByLineSM,
		'--tiles-by-line-md': tilesByLineMD,
	};

	setDSFRBlockClassName(innerBlocksProps, 'fr-tiles-group');

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__(
						'Paramètres de la grille de tuiles',
						'dsfr-native-blocks'
					)}
					initialOpen={true}
				>
					<RangeControl
						label={__('Tuiles par ligne', 'dsfr-native-blocks')}
						value={attributes.tilesByLine}
						onChange={(tilesByLine) =>
							setAttributes({ tilesByLine })
						}
						min={1}
						max={6}
						help={sprintf(
							__(
								'%d colonnes(s) pour les ordinateurs de bureau, %d pour les tablettes et %s pour les mobiles'
							),
							tilesByLineMD,
							tilesByLineSM,
							tilesByLine
						)}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} style={style} />
		</>
	);
}
