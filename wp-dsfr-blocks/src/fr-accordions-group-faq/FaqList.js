/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
import { Button } from '@wordpress/components';
import { chevronUp, chevronDown, trash, plusCircle } from '@wordpress/icons';
import { RichText } from '@wordpress/block-editor';
import uniqid from '../common/js/utils/uniqid';

export default function FaqList({ questions, onChange, isBlockSelected }) {
	const [activeAccordionId, setActiveAccordionId] = useState('');

	// set questions as a new array to force update
	questions = [...questions];

	const arrayMove = (indexFrom, indexTo) => {
		const question = questions[indexFrom];

		questions[indexFrom] = questions[indexTo];
		questions[indexTo] = question;

		onChange(questions);
	};

	const onAddElement = () => {
		questions.push({
			id: uniqid('fr-accordion'),
			collapseId: uniqid('fr-collapse'),
			question: '',
			answer: '',
		});
		onChange(questions);
	};

	const onRemoveElement = (removedIndex) => {
		questions.splice(removedIndex, 1);
		onChange(questions);
	};

	const onMoveUpElement = (index) => {
		arrayMove(index, index - 1);
	};

	const onMoveDownElement = (index) => {
		arrayMove(index, index + 1);
	};

	const updateQuestion = (index, question) => {
		questions[index].question = question;
		onChange(questions);
	};

	const updateAnswer = (index, answer) => {
		questions[index].answer = answer;
		onChange(questions);
	};

	return (
		<>
			{questions.map((item, index) => (
				<div
					key={index}
					className={
						'fr-accordion' +
						(activeAccordionId === item.id && isBlockSelected
							? ' has-child-selected'
							: '')
					}
					data-index={index}
				>
					<div className="fr-accordion__editor-title-wrapper">
						<div className="fr-accordion__editor-btns-group">
							{index !== 0 && (
								<Button
									icon={chevronUp}
									className="fr-accordion__editor-btn"
									aria-hidden="true"
									label={__('Move up FAQs', 'faq-block')}
									// Should not be able to tab to drag handle as this
									// button can only be used with a pointer device.
									tabIndex="-1"
									onClick={() => onMoveUpElement(index)}
								/>
							)}
							{index + 1 !== questions.length && (
								<Button
									icon={chevronDown}
									className="fr-accordion__editor-btn"
									aria-hidden="true"
									label={__('Move down FAQs', 'faq-block')}
									// Should not be able to tab to drag handle as this
									// button can only be used with a pointer device.
									tabIndex="-1"
									onClick={() => onMoveDownElement(index)}
								/>
							)}
							<Button
								icon={trash}
								iconSize={18}
								className="fr-accordion__editor-btn"
								aria-hidden="true"
								label={__('Remove FAQ', 'faq-block')}
								// Should not be able to tab to drag handle as this
								// button can only be used with a pointer device.
								tabIndex="-1"
								onClick={() => onRemoveElement(index)}
							/>
						</div>
						<h3 className="fr-accordion__title">
							<RichText
								tagName="span" // The tag here is the element output and editable in the admin
								className="fr-accordion__btn"
								value={item.question} // Any existing content, either from the database or an attribute default
								allowedFormats={[]} // Allow the content to be made bold or italic, but do not allow other formatting options
								onChange={(content) =>
									updateQuestion(index, content)
								} // Store updated content as a block attribute
								onClick={() => {
									setActiveAccordionId(item.id);
								}}
								placeholder={__('Question…?', 'faq-block')} // Display this text before any content has been added by the user
							/>
						</h3>
					</div>
					<div className="fr-collapse">
						<div>
							<RichText
								tagName="p" // The tag here is the element output and editable in the admin
								value={item.answer} // Any existing content, either from the database or an attribute default
								onChange={(content) =>
									updateAnswer(index, content)
								} // Store updated content as a block attribute
								placeholder={__('Answer…', 'faq-block')} // Display this text before any content has been added by the user
							/>
						</div>
					</div>
				</div>
			))}
			<Button
				icon={plusCircle}
				iconSize={18}
				className="fr-accordion__editor-btn"
				label={__('Add a question', 'faq-block')}
				// Should not be able to tab to drag handle as this
				// button can only be used with a pointer device.
				tabIndex="-1"
				text={__('Add a question', 'faq-block')}
				onClick={() => onAddElement()}
			/>
		</>
	);
}
