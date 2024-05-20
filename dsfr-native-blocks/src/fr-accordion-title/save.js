import { useBlockProps } from '@wordpress/block-editor';
import dsfrClassName from '../utils/dsfrClassName';

export default function save({ attributes: { label, ariaControls } }) {
	const blockProps = useBlockProps.save();

	dsfrClassName(blockProps, 'fr-accordion-title', 'fr-accordion__title');

	return (
		<h3 {...blockProps}>
			<button
				aria-expanded="false"
				className="fr-accordion__btn"
				aria-controls={ariaControls}
			>
				{label}
			</button>
		</h3>
	);
}
