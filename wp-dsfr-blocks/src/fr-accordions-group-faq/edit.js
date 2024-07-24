/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';
/**
 * Internal dependencies
 */
import FaqList from './FaqList';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function Edit({ attributes, setAttributes, isSelected }) {
	const { questions } = attributes;
	const blockProps = useBlockProps();

	setDSFRBlockClassName(
		blockProps,
		'fr-accordions-group-faq',
		'fr-accordions-group'
	);

	return (
		<div {...blockProps}>
			<FaqList
				isBlockSelected={isSelected}
				questions={questions}
				onChange={(newQuestions) =>
					setAttributes({ questions: newQuestions })
				}
			/>
		</div>
	);
}
