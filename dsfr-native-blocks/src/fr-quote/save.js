import { useBlockProps, RichText } from '@wordpress/block-editor';
import classNames from 'classnames';
import dsfrClassName from '../utils/dsfrClassName';

export default function save({ attributes }) {
	const hasImage = attributes.displayImage && attributes.imageUrl;
	const blockProps = useBlockProps.save({
		className: classNames({
			'fr-quote--column': hasImage,
		}),
	});

	dsfrClassName(blockProps, 'fr-quote');

	return (
		<figure {...blockProps}>
			<blockquote cite={attributes.cite}>
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
				{attributes.sources ? (
					<ul className="fr-quote__source">
            <RichText.Content
              tagName="li"
              value={attributes.sources}
            />
          </ul>
				) : (
					''
				)}
				{hasImage && (
					<div class="fr-quote__image">
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
