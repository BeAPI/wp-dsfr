import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import dsfrClassName from '../utils/dsfrClassName';

export default function save({ attributes: { id } }) {
	const blockProps = useBlockProps.save({
		role: `region`,
	});
	const innerBlocksProps = useInnerBlocksProps.save();

	dsfrClassName(blockProps, 'fr-collapse');

	return (
		<div {...blockProps} id={id}>
			<div {...innerBlocksProps} />
		</div>
	);
}
