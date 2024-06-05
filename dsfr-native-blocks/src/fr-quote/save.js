import { useBlockProps, RichText } from '@wordpress/block-editor';
import classNames from 'classnames';
import isValidURL from '../common/js/utils/isValidURL';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';

export default function save({ attributes }) {
	const hasImage = attributes.displayImage && attributes.imageUrl;
	const cite = isValidURL(attributes.cite) ? attributes.cite : '';
	const classes = {
		'fr-quote--column': attributes.displayImage,
	};

	if (attributes.color) {
		classes['fr-quote--' + attributes.color] = true;
	}

	const blockProps = useBlockProps.save({
		className: classNames(classes),
	});

	setDSFRBlockClassName(blockProps, 'fr-quote');

	return (
		<figure {...blockProps}>
			<blockquote cite={cite}>
				<RichText.Content
					tagName="p"
					className={
						attributes.quoteSize
							? 'fr-text--' + attributes.quoteSize
							: ''
					}
					value={attributes.quote}
				/>
			</blockquote>
			<figcaption>
				<RichText.Content
					tagName="p"
					className="fr-quote__author"
					value={attributes.author}
				/>
				{attributes.sources.length ? (
					<ul className="fr-quote__source">
						{attributes.sources.map((source) =>
							source ? (
								<RichText.Content tagName="li" value={source} />
							) : (
								''
							)
						)}
					</ul>
				) : (
					''
				)}
				{hasImage && (
					<div className="fr-quote__image">
						<img
							className="fr-responsive-img"
							src={attributes.imageUrl}
							alt={attributes.imageAlt}
						/>
					</div>
				)}
			</figcaption>
		</figure>
	);
}
