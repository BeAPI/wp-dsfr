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
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';
import isValidURL from '../utils/isValidURL';
import DSFRColorSelectControl from '../components/DSFRColorSelectControl';

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
						label={__('Show author portrait', 'dsfr-native-blocks')}
						checked={attributes.displayImage}
						onChange={(displayImage) => {
							removeMedia();
							setAttributes({ displayImage });
						}}
					/>
					<RadioControl
						label={__('Quote size', 'dsfr-native-blocks')}
						selected={attributes.quoteSize}
						options={[
							{
								label: __('LG', 'dsfr-native-blocks'),
								value: 'lg',
							},
							{
								label: __('Default (XL)', 'dsfr-native-blocks'),
								value: '',
							},
						]}
						onChange={(quoteSize) => setAttributes({ quoteSize })}
					/>
					<TextControl
						value={attributes.cite}
						label={__('Cite', 'dsfr-native-blocks')}
						onChange={(cite) => setAttributes({ cite })}
						placeholder={'https://www.foo.com'}
						type="url"
						help={
							attributes.cite && !isValidURL(attributes.cite)
								? __(
										'This URL is not valid and will not be used.',
										'dsfr-native-blocks'
								  )
								: __(
										'A URL that designates a source document or message for the information quoted. This attribute is intended to point to information explaining the context or the reference for the quote.',
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
						placeholder={__(
							'Write your quote here',
							'dsfr-native-blocks'
						)}
						value={attributes.quote}
						onChange={(quote) => setAttributes({ quote })}
						allowedFormats={[]}
					/>
				</blockquote>
				<figcaption>
					<RichText
						tagName="p"
						className="fr-quote__author"
						placeholder={__('Author', 'dsfr-native-blocks')}
						value={attributes.author}
						onChange={(author) => setAttributes({ author })}
						allowedFormats={[]}
					/>
					<ul className="fr-quote__source">
						{attributes.sources.map((source, index) => (
							<RichText
								tagName="li"
								value={source}
								placeholder={__('Add source')}
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
										'Remove empty field(s)',
										'dsfr-native-blocks'
									)}
									onClick={cleanSources}
								/>
							)}
							<Button
								icon={plus}
								label={__(
									'Add source field',
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
									value={attributes.mediaId}
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
													'Choose an image',
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
