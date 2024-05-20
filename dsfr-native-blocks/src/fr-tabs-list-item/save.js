import { RichText } from '@wordpress/block-editor';

export default function save({
	attributes: { label, controls, id, index, buttonClassName },
}) {
	return (
		<li role="presentation">
			<RichText.Content
				tagName="button"
				role="tab"
				className={('fr-tabs__tab ' + buttonClassName).trim()}
				id={id}
				aria-controls={controls}
				aria-selected={index === 0}
				value={label}
			/>
		</li>
	);
}
