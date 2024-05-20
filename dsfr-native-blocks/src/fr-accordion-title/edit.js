import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';
import dsfrClassName from '../utils/dsfrClassName';

export default function Edit({ attributes, setAttributes, context }) {
	const blockProps = useBlockProps();
	const { label } = attributes;

	useEffect(() => {
		setAttributes({ ariaControls: context['dsfr/fr-accordion--id'] });
	}, [context['dsfr/fr-accordion--id']]);

	dsfrClassName(blockProps, 'fr-accordion-title', 'fr-accordion__title');

	return (
		<h3 {...blockProps}>
			<RichText
				tagName="span"
				className="fr-accordion__btn"
				allowedFormats={[]}
				value={label}
				placeholder={__('Accordion title', 'dsfr-native-blocks')}
				onChange={(content) => {
					setAttributes({ label: content });
				}}
			/>
		</h3>
	);
}
