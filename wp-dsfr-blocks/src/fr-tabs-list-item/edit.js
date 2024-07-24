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
	const buttonClassNames = ['fr-tabs__tab', buttonClassName];
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

	if (
		buttonClassName.includes('fr-icon-') &&
		!buttonClassName.includes('fr-tabs__tab--icon-left')
	) {
		buttonClassNames.push('fr-tabs__tab--icon-left');
	}

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Options du bloc Onglet', 'wp-dsfr-blocks')}
					initialOpen={true}
				>
					<PanelRow>
						<TextControl
							value={buttonClassName}
							help={__(
								'Vous pouvez utiliser ce champ pour ajouter une icône (exemple: fr-icon-success-line)',
								'dsfr-native-block'
							)}
							label={__(
								"Classe(s) CSS du bouton de l'onglet",
								'wp-dsfr-blocks'
							)}
							onChange={(buttonClassName) =>
								setAttributes({ buttonClassName })
							}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<ComposeBlockControls clientId={clientId} index={index} />
			<li role="presentation" {...useBlockProps()}>
				<RichText
					tagName="span"
					className={buttonClassNames.join(' ').trim()}
					allowedFormats={[]}
					value={label}
					id={id}
					aria-selected={activeTabIndex === index}
					aria-controls={controls}
					placeholder={__('Item…', 'wp-dsfr-blocks')}
					onChange={(newLabel) => {
						setAttributes({ label: newLabel });
					}}
				/>
			</li>
		</>
	);
}
