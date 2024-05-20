import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import classnames from 'classnames';
import dsfrClassName from '../utils/dsfrClassName';

export default function save({ attributes: { id, labelledby, index } }) {
	const blockProps = useBlockProps.save({
		className: classnames({
			'fr-tabs__panel--selected': index === 0,
		}),
		role: `tabpanel`,
		tabindex: 0,
	});

	dsfrClassName(blockProps, 'fr-tabs-panel', 'fr-tabs__panel');

	return (
		<div {...blockProps} id={id} aria-labelledby={labelledby}>
			<div {...useInnerBlocksProps.save()} />
		</div>
	);
}
