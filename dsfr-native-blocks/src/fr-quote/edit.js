import { __ } from '@wordpress/i18n';
import {
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	useBlockProps,
} from '@wordpress/block-editor';
import {
	Button,
	PanelBody,
	RadioControl,
	TextControl,
	ToggleControl,
} from '@wordpress/components';
import { plus, trash } from '@wordpress/icons';
import classNames from 'classnames';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';
import isValidURL from '../common/js/utils/isValidURL';
import DSFRColorSelectControl from '../common/js/components/DSFRColorSelectControl';

import './editor.scss';

export default function Edit({ attributes, setAttributes, isSelected }) {
	const classes = {
		'fr-quote--column': attributes.displayImage,
	};

	if (attributes.color) {
		classes['fr-quote--' + attributes.color] = true;
	}

	const blockProps = useBlockProps({
		className: classNames(classes),
	});

	// replace wp-block-dsfr-fr-quote by fr-quote
	setDSFRBlockClassName(blockProps, 'fr-quote');

	/**
	 * Add a new RichText to the sources list
	 */
	function addSourceField() {
		const sources = [...attributes.sources];
		sources.push('');
		setAttributes({ sources });
	}

	/**
	 * Control if sources have more than 1 source field and has empty field(s)
	 */
	function hasEmptySourceField() {
		return (
			attributes.sources.length > 1 &&
			attributes.sources.filter((source) => !source).length > 0
		);
	}

	/**
	 * Remove all empty fields, add 1 field if sources is empty
	 */
	function cleanSources() {
		const sources = attributes.sources.filter((source) => !!source);

		if (sources.length === 0) {
			sources.push('');
		}

		if (sources.length !== attributes.sources.length) {
			setAttributes({ sources });
		}
	}

	/**
	 * Update the sources attribute (see block.json)
	 */
	function updateSources(source, index) {
		const sources = [...attributes.sources];
		sources[index] = source;
		setAttributes({ sources });
	}

	/**
	 * Update attributes imageId, imageUrl, imageAlt (see block.json)
	 */
	function onSelectMedia(media) {
		setAttributes({
			imageId: media.id,
			imageUrl: media?.sizes?.medium?.url
				? media.sizes.medium.url
				: media.url,
			imageAlt: media.alt,
		});
	}

	/**
	 * Reset attributes imageId, imageUrl, imageAlt (see block.json)
	 */
	function removeMedia() {
		setAttributes({
			imageId: 0,
			imageUrl: '',
			imageAlt: '',
		});
	}

	if (!isSelected) {
		cleanSources();
	}

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Options', 'dsfr-native-blocks')}
					initialOpen={true}
				>
					<DSFRColorSelectControl
						value={attributes.color}
						onChange={(color) => setAttributes({ color })}
					/>
					<ToggleControl
						label={__(
							"Afficher le portrait de l'auteur",
							'dsfr-native-blocks'
						)}
						checked={attributes.displayImage}
						onChange={(displayImage) => {
							removeMedia();
							setAttributes({ displayImage });
						}}
					/>
					<RadioControl
						label={__(
							'Taille de la citation',
							'dsfr-native-blocks'
						)}
						selected={attributes.quoteSize}
						options={[
							{
								label: __('LG', 'dsfr-native-blocks'),
								value: 'lg',
							},
							{
								label: __('Défaut (XL)', 'dsfr-native-blocks'),
								value: '',
							},
						]}
						onChange={(quoteSize) => setAttributes({ quoteSize })}
					/>
					<TextControl
						value={attributes.cite}
						label={__('Source', 'dsfr-native-blocks')}
						onChange={(cite) => setAttributes({ cite })}
						placeholder={'https://www.foo.com'}
						type="url"
						help={
							attributes.cite && !isValidURL(attributes.cite)
								? __(
										'Cette URL est invalide et ne sera pas intégrée au bloc',
										'dsfr-native-blocks'
								  )
								: __(
										"Une URL qui désigne la source du document ou du message cité. Cet attribut est prévu pour signaler l'information expliquant le contexte ou la référence de la citation",
										'dsfr-native-blocks'
								  )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<figure {...blockProps}>
				<blockquote cite={attributes.cite}>
					<RichText
						tagName="p"
						className={
							attributes.quoteSize
								? 'fr-text--' + attributes.quoteSize
								: ''
						}
						placeholder={__('Citation', 'dsfr-native-blocks')}
						value={attributes.quote}
						onChange={(quote) => setAttributes({ quote })}
						allowedFormats={[]}
					/>
				</blockquote>
				<figcaption>
					<RichText
						tagName="p"
						className="fr-quote__author"
						placeholder={__('Auteur', 'dsfr-native-blocks')}
						value={attributes.author}
						onChange={(author) => setAttributes({ author })}
						allowedFormats={[]}
					/>
					<ul className="fr-quote__source">
						{attributes.sources.map((source, index) => (
							<RichText
								tagName="li"
								value={source}
								placeholder={__('Ajouter une source')}
								onChange={(source) => {
									updateSources(source, index);
								}}
								allowedFormats={['core/link']}
								disableLineBreaks="false"
							/>
						))}
						<li>
							{hasEmptySourceField() && (
								<Button
									icon={trash}
									label={__(
										'Supprimer le(s) champ(s) source(s) vide(s)',
										'dsfr-native-blocks'
									)}
									onClick={cleanSources}
								/>
							)}
							<Button
								icon={plus}
								label={__(
									'Ajouter un champ source',
									'dsfr-native-blocks'
								)}
								onClick={addSourceField}
							/>
						</li>
					</ul>
					{attributes.displayImage && (
						<div className="fr-quote__image">
							<MediaUploadCheck>
								<MediaUpload
									allowedTypes={['image']}
									onSelect={onSelectMedia}
									value={attributes.imageId}
									render={({ open }) => (
										<Button onClick={open}>
											{attributes.imageUrl ? (
												<img
													className="fr-responsive-img"
													src={attributes.imageUrl}
													alt={attributes.imageAlt}
												/>
											) : (
												__(
													'Ajouter une image',
													'dsfr-native-blocks'
												)
											)}
										</Button>
									)}
								/>
							</MediaUploadCheck>
						</div>
					)}
				</figcaption>
			</figure>
		</>
	);
}
