import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

export default function save({ attributes: { id } }) {
	const blockProps = useBlockProps.save({
		role: `region`,
	});
	const innerBlocksProps = useInnerBlocksProps.save();

	setDSFRBlockClassName(blockProps, 'fr-collapse');

	return (
		<div {...blockProps} id={id}>
			<div {...innerBlocksProps} />
		</div>
	);
}
