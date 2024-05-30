import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';
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
	PanelRow,
	RadioControl,
	TextControl,
	ToggleControl,
} from '@wordpress/components';
import classNames from 'classnames';
import dsfrClassName from '../utils/dsfrClassName';

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({
		className: classNames({
			'fr-quote--column': attributes.displayImage,
		}),
	});

	// replace wp-block-dsfr-fr-quote by fr-quote
	dsfrClassName(blockProps, 'fr-quote');

	function onSelectMedia(media) {
		console.log(media);
		setAttributes({
			imageId: media.id,
			imageUrl: media.sizes.medium.url,
      imageAlt: media.alt,
		});
	}

	function removeMedia() {
		setAttributes({
			imageId: 0,
			imageUrl: '',
		});
	}

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Options', 'dsfr-native-blocks')}
					initialOpen={true}
				>
					<PanelRow>
						<ToggleControl
							label={__(
								'Show author portrait',
								'dsfr-native-blocks'
							)}
							checked={attributes.displayImage}
							onChange={(displayImage) => {
								if (!displayImage) {
									removeMedia();
								}
								setAttributes({ displayImage });
							}}
						/>
					</PanelRow>
					<PanelRow>
						<RadioControl
							label={__('Quote size', 'dsfr-native-blocks')}
							selected={attributes.quoteSize}
							options={[
								{
									label: __('LG', 'dsfr-native-blocks'),
									value: 'lg',
								},
								{
									label: __(
										'Default (XL)',
										'dsfr-native-blocks'
									),
									value: '',
								},
							]}
							onChange={(quoteSize) =>
								setAttributes({ quoteSize })
							}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							value={attributes.cite}
							label={__('Cite', 'dsfr-native-blocks')}
							onChange={(cite) => setAttributes({ cite })}
							placeholder={'https://www.foo.com'}
							type="url"
							help={__(
								'A URL that designates a source document or message for the information quoted. This attribute is intended to point to information explaining the context or the reference for the quote.',
								'dsfr-native-blocks'
							)}
						/>
					</PanelRow>
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
						<RichText
							tagName="li"
							placeholder={__('Add source')}
							onChange={(sources) => setAttributes({ sources })}
							allowedFormats={['core/link']}
							disableLineBreaks="false"
						/>
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
