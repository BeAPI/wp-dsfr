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
	ToggleControl,
} from '@wordpress/components';
import classNames from 'classnames';
import setDSFRBlockClassName from '../utils/setDSFRBlockClassName';
import DSFRColorSelectControl from '../components/DSFRColorSelectControl';
import getSurtitleClasses from './getSurtitleClasses';

import './editor.scss';

export default function Edit({ attributes, setAttributes, isSelected }) {
	const blockProps = useBlockProps({
		className: classNames({
			'fr-tile--horizontal': attributes.isHorizontal,
			'fr-tile--no-icon': !attributes.displayIcon,
			'fr-tile--no-border': !attributes.displayBorder,
			'fr-tile--shadow': attributes.displayShadow,
			['fr-tile--' + attributes.background]: !!attributes.background,
		}),
	});

	/**
	 * Update attributes imageId, imageUrl, imageAlt (see block.json)
	 */
	function onSelectMedia(media) {
		setAttributes({
			imageId: media.id,
			imageUrl: media.sizes.thumbnail.url,
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

	setDSFRBlockClassName(blockProps, 'fr-tile');

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Tile parameters', 'dsfr-native-blocks')}
					initialOpen={true}
				>
					<ToggleControl
						label={__('Is horizontal', 'dsfr-native-blocks')}
						checked={attributes.isHorizontal}
						onChange={(isHorizontal) =>
							setAttributes({ isHorizontal })
						}
					/>
					<ToggleControl
						label={__('Display link icon', 'dsfr-native-blocks')}
						checked={attributes.displayIcon}
						onChange={(displayIcon) =>
							setAttributes({ displayIcon })
						}
					/>
					<ToggleControl
						label={__('Display image', 'dsfr-native-blocks')}
						checked={attributes.displayImage}
						onChange={(displayImage) => {
							removeMedia();
							setAttributes({ displayImage });
						}}
					/>
					<ToggleControl
						label={__('Display border', 'dsfr-native-blocks')}
						checked={attributes.displayBorder}
						onChange={(displayBorder) =>
							setAttributes({
								displayShadow: displayBorder
									? false
									: attributes.displayShadow,
								displayBorder,
							})
						}
					/>
					<ToggleControl
						label={__('Display shadow', 'dsfr-native-blocks')}
						checked={attributes.displayShadow}
						onChange={(displayShadow) =>
							setAttributes({
								displayBorder: displayShadow
									? false
									: attributes.displayBorder,
								displayShadow,
							})
						}
					/>
					<RadioControl
						label={__('Background', 'dsfr-native-blocks')}
						selected={attributes.background}
						options={[
							{
								label: __('Grey', 'dsfr-native-blocks'),
								value: 'grey',
							},
							{
								label: __('Transparent', 'dsfr-native-blocks'),
								value: 'no-background',
							},
							{
								label: __('Default', 'dsfr-native-blocks'),
								value: '',
							},
						]}
						onChange={(background) => setAttributes({ background })}
					/>
					<RadioControl
						label={__('Surtitle type', 'dsfr-native-blocks')}
						selected={attributes.surtitleType}
						options={[
							{
								label: __('Tag', 'dsfr-native-blocks'),
								value: 'tag',
							},
							{
								label: __('Badge', 'dsfr-native-blocks'),
								value: 'badge',
							},
							{
								label: __('None', 'dsfr-native-blocks'),
								value: '',
							},
						]}
						onChange={(surtitleType) => {
							if (!surtitleType) {
								setAttributes({ surtitleText: '' });
							}
							setAttributes({ surtitleType });
						}}
					/>
					{attributes.surtitleType === 'badge' && (
						<DSFRColorSelectControl
							label={__('Badge color', 'dsfr-native-blocks')}
							value={attributes.badgeColor}
							onChange={(badgeColor) =>
								setAttributes({ badgeColor })
							}
						/>
					)}
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<div className="fr-tile__body">
					<div className="fr-tile__content">
						<RichText
							tagName="h3"
							className="fr-tile__title"
							placeholder={__('Add title', 'dsfr-native-blocks')}
							value={attributes.title}
							onChange={(title) => setAttributes({ title })}
							allowedFormats={['core/link']}
						/>

						<RichText
							tagName="p"
							className="fr-tile__desc"
							placeholder={__(
								'Add description',
								'dsfr-native-blocks'
							)}
							value={attributes.description}
							onChange={(description) =>
								setAttributes({ description })
							}
							allowedFormats={[]}
						/>

						<RichText
							tagName="p"
							className="fr-tile__detail"
							placeholder={__('Add detail', 'dsfr-native-blocks')}
							value={attributes.detail}
							onChange={(detail) => setAttributes({ detail })}
							allowedFormats={[]}
						/>

						{attributes.surtitleType && (
							<div className="fr-tile__start">
								<RichText
									tagName="p"
									className={getSurtitleClasses(attributes)}
									placeholder={__(
										'Add text',
										'dsfr-native-blocks'
									)}
									value={attributes.surtitleText}
									onChange={(surtitleText) =>
										setAttributes({ surtitleText })
									}
									allowedFormats={[]}
								/>
							</div>
						)}
					</div>
				</div>
				{attributes.displayImage && (
					<div className="fr-tile__header">
						<div className="fr-tile__pictogram">
							<MediaUploadCheck>
								<MediaUpload
									allowedTypes={['image']}
									onSelect={onSelectMedia}
									value={attributes.mediaId}
									render={({ open }) => (
										<Button onClick={open}>
											{attributes.imageUrl ? (
												<img
													className="fr-ratio-1x1"
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
					</div>
				)}
			</div>
		</>
	);
}
