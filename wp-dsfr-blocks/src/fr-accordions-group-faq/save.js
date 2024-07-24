import { RichText, useBlockProps } from '@wordpress/block-editor';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save();

	setDSFRBlockClassName(
		blockProps,
		'fr-accordions-group-faq',
		'fr-accordions-group'
	);

	return (
		<div {...blockProps}>
			{attributes.questions.map(
				(item, i) =>
					item.question &&
					item.answer && (
						<div
							key={i}
							className="fr-accordion"
							itemProp="mainEntity"
							itemType="https://schema.org/Question"
						>
							<h3 className="fr-accordion__title">
								<RichText.Content
									tagName="button"
									className="fr-accordion__btn"
									aria-expanded="false"
									aria-controls={item.collapseId}
									value={item.question}
									itemProp="name"
								/>
							</h3>
							<div
								className="fr-collapse"
								role="region"
								id={item.collapseId}
								itemScope
								itemProp="acceptedAnswer"
								itemType="https://schema.org/Answer"
							>
								<div>
									<RichText.Content
										tagName="p"
										value={item.answer}
										itemProp="text"
									/>
								</div>
							</div>
						</div>
					)
			)}
		</div>
	);
}
