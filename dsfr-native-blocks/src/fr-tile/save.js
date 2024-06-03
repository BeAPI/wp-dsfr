import { useBlockProps, RichText } from '@wordpress/block-editor';
import classNames from 'classnames';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';

import getSurtitleClasses from './getSurtitleClasses';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save({
		className: classNames({
			'fr-tile--horizontal': attributes.isHorizontal,
			'fr-tile--no-icon': !attributes.displayIcon,
			'fr-tile--no-border': !attributes.displayBorder,
			'fr-tile--shadow': attributes.displayShadow,
			['fr-tile--' + attributes.background]: !!attributes.background,
		}),
	});

	setDSFRBlockClassName(blockProps, 'fr-tile');

	return (
		<div {...blockProps}>
			<div className="fr-tile__body">
				<div className="fr-tile__content">
					<RichText.Content
						tagName="h3"
						className="fr-tile__title"
						value={attributes.title}
					/>

					<RichText.Content
						tagName="p"
						className="fr-tile__desc"
						value={attributes.description}
					/>

					<RichText.Content
						tagName="p"
						className="fr-tile__detail"
						value={attributes.detail}
					/>

					{attributes.surtitleType && attributes.surtitleText ? (
						<div className="fr-tile__start">
							<RichText.Content
								tagName="p"
								className={getSurtitleClasses(attributes)}
								value={attributes.surtitleText}
							/>
						</div>
					) : (
						''
					)}
				</div>
			</div>
			{attributes.displayImage && attributes.imageUrl ? (
				<div className="fr-tile__header">
					<div className="fr-tile__pictogram">
						<img
							className="fr-ratio-1x1"
							src={attributes.imageUrl}
							alt={attributes.imageAlt}
						/>
					</div>
				</div>
			) : (
				''
			)}
		</div>
	);
}
