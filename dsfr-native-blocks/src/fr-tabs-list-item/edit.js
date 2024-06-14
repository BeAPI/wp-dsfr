import { __ } from '@wordpress/i18n';
import { PanelBody, PanelRow, TextControl } from '@wordpress/components';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import { useEffect } from '@wordpress/element';
import ComposeBlockControls from './ComposeBlockControls';

export default function Edit({
	attributes: { label, id, controls, buttonClassName },
	setAttributes,
	clientId,
	context,
}) {
	const activeTabIndex = context['dsfr/fr-tabs--active-tab-index'];
	const index = select('core/block-editor').getBlockIndex(clientId);
	const contextId = context['dsfr/fr-tabs--id'] + '-tab-' + index;
	const contextControls = context['dsfr/fr-tabs--id'] + '-panel-' + index;

	useEffect(() => {
		setAttributes({
			index,
			id: contextId,
			controls: contextControls,
		});
	}, [index, contextId, contextControls]);

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Options du bloc Onglet', 'dsfr-native-blocks')}
					initialOpen={true}
				>
					<PanelRow>
						<TextControl
							value={buttonClassName}
							label={__(
								"Classe(s) CSS du bouton de l'onglet",
								'dsfr-native-blocks'
							)}
							onChange={(newButtonClassName) => {
								setAttributes({
									buttonClassName: newButtonClassName,
								});
							}}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<ComposeBlockControls clientId={clientId} index={index} />
			<li role="presentation" {...useBlockProps()}>
				<RichText
					tagName="span"
					className={('fr-tabs__tab ' + buttonClassName).trim()}
					allowedFormats={[]}
					value={label}
					id={id}
					aria-selected={activeTabIndex === index}
					aria-controls={controls}
					placeholder={__('Item…', 'dsfr-native-blocks')}
					onChange={(newLabel) => {
						setAttributes({ label: newLabel });
					}}
				/>
			</li>
		</>
	);
}
