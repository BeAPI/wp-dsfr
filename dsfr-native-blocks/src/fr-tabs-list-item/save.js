import { RichText } from '@wordpress/block-editor';

export default function save({
	attributes: { label, controls, id, index, buttonClassName },
}) {
	const buttonClassNames = ['fr-tabs__tab', buttonClassName];

	if (
		buttonClassName.includes('fr-icon-') &&
		!buttonClassName.includes('fr-tabs__tab--icon-left')
	) {
		buttonClassNames.push('fr-tabs__tab--icon-left');
	}

	return (
		<li role="presentation">
			<RichText.Content
				tagName="button"
				role="tab"
				className={buttonClassNames.join(' ').trim()}
				id={id}
				aria-controls={controls}
				aria-selected={index === 0}
				value={label}
			/>
		</li>
	);
}
