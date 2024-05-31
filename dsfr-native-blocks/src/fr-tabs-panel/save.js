import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import classNames from 'classnames';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

export default function save({ attributes: { id, labelledby, index } }) {
	const blockProps = useBlockProps.save({
		className: classNames({
			'fr-tabs__panel--selected': index === 0,
		}),
		role: `tabpanel`,
		tabindex: 0,
	});

	setDSFRBlockClassName(blockProps, 'fr-tabs-panel', 'fr-tabs__panel');

	return (
		<div {...blockProps} id={id} aria-labelledby={labelledby}>
			<div {...useInnerBlocksProps.save()} />
		</div>
	);
}
