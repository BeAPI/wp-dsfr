import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save();
	const innerBlocksProps = useInnerBlocksProps.save(blockProps);
	const tilesByLine = Math.ceil(attributes.tilesByLine / 5);
	const tilesByLineSM = Math.ceil(attributes.tilesByLine / 2);
	const tilesByLineMD = attributes.tilesByLine;
	// css var must be casted to string to prevent px unit addition
	// https://github.com/WordPress/gutenberg/issues/36568
	const style = {
		'--tiles-by-line': '' + tilesByLine,
		'--tiles-by-line-sm': '' + tilesByLineSM,
		'--tiles-by-line-md': '' + tilesByLineMD,
	};

	setDSFRBlockClassName(innerBlocksProps, 'fr-tiles-group');

	return <div {...innerBlocksProps} style={style} />;
}
