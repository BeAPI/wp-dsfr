import { __ } from '@wordpress/i18n';
import { useEffect, useMemo, useRef, useState } from '@wordpress/element';
import {
	BlockControls,
	InspectorControls,
	__experimentalLinkControl as LinkControl,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	useBlockProps,
} from '@wordpress/block-editor';
import {
	Button,
	PanelBody,
	Popover,
	RadioControl,
	ToggleControl,
	ToolbarButton,
} from '@wordpress/components';
import { useMergeRefs } from '@wordpress/compose';
import { link, linkOff } from '@wordpress/icons';
import classNames from 'classnames';
import DSFRColorSelectControl from '../common/js/components/DSFRColorSelectControl';
import IconRaw from '../common/js/components/IconRaw';
import setDSFRBlockClassName from '../common/js/utils/setDSFRBlockClassName';
import getSurtitleClasses from './getSurtitleClasses';

import './editor.scss';

export default function Edit({ attributes, setAttributes, isSelected }) {
	const [popoverAnchor, setPopoverAnchor] = useState(null);
	const [isEditingURL, setIsEditingURL] = useState(false);
	const isURLSet = !!attributes.linkURL;
	const ref = useRef();
	const blockProps = useBlockProps({
		className: classNames({
			'fr-tile--horizontal': attributes.isHorizontal,
			'fr-tile--no-icon': !attributes.displayIcon,
			'fr-tile--no-border': !attributes.displayBorder,
			'fr-tile--shadow': attributes.displayShadow,
			['fr-tile--' + attributes.background]: !!attributes.background,
			'fr-enlarge-link': attributes.title && attributes.linkURL,
		}),
		ref: useMergeRefs([setPopoverAnchor, ref]),
	});
	const linkValue = useMemo(
		() => ({
			url: attributes.linkURL,
			opensInNewTab: attributes.target === '_blank',
			title: attributes.linkTitle,
		}),
		[attributes.linkURL, attributes.linkTarget, attributes.linkTitle]
	);

	/**
	 * Update attributes imageId, imageURL, imageAlt (see block.json)
	 */
	function onSelectMedia(media) {
		if (media.mime === 'image/svg+xml') {
			fetch(media.url)
				.then((response) => response.text())
				.then((svg) => {
					setAttributes({
						imageURL: '',
						imageAlt: '',
						imageSvg: svg,
					});
				});
		}

		setAttributes({
			imageId: media.id,
			imageURL: media?.sizes?.thumbnail?.url
				? media.sizes.thumbnail.url
				: media.url,
			imageAlt: media.alt,
		});
	}

	/**
	 * Reset attributes imageId, imageURL, imageAlt (see block.json)
	 */
	function removeMedia() {
		setAttributes({
			imageId: 0,
			imageURL: '',
			imageAlt: '',
			imageSvg: '',
		});
	}

	/**
	 * When user start editing link
	 */
	function startEditingURL(e) {
		e.preventDefault();
		setIsEditingURL(true);
	}

	/**
	 * Reset link attributes
	 */
	function unlink() {
		setAttributes({
			url: '',
			linkTarget: '',
		});
		setIsEditingURL(false);
	}

	useEffect(() => {
		if (!isSelected) {
			setIsEditingURL(false);
		}
	}, [isSelected]);

	setDSFRBlockClassName(blockProps, 'fr-tile');

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Paramètres de la Tuile', 'dsfr-native-blocks')}
					initialOpen={true}
				>
					<ToggleControl
						label={__(
							'Afficher horizontalement',
							'dsfr-native-blocks'
						)}
						checked={attributes.isHorizontal}
						onChange={(isHorizontal) =>
							setAttributes({ isHorizontal })
						}
					/>
					<ToggleControl
						label={__(
							"Afficher l'icône du lien",
							'dsfr-native-blocks'
						)}
						checked={attributes.displayIcon}
						onChange={(displayIcon) =>
							setAttributes({ displayIcon })
						}
					/>
					<ToggleControl
						label={__("Afficher l'image", 'dsfr-native-blocks')}
						checked={attributes.displayImage}
						onChange={(displayImage) => {
							removeMedia();
							setAttributes({ displayImage });
						}}
					/>
					<ToggleControl
						label={__(
							'Afficher les bordures',
							'dsfr-native-blocks'
						)}
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
						label={__("Afficher l'ombre", 'dsfr-native-blocks')}
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
						label={__('Fond', 'dsfr-native-blocks')}
						selected={attributes.background}
						options={[
							{
								label: __('Gris', 'dsfr-native-blocks'),
								value: 'grey',
							},
							{
								label: __('Transparent', 'dsfr-native-blocks'),
								value: 'no-background',
							},
							{
								label: __('Défaut', 'dsfr-native-blocks'),
								value: '',
							},
						]}
						onChange={(background) => setAttributes({ background })}
					/>
					<RadioControl
						label={__('Type de surtitre', 'dsfr-native-blocks')}
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
								label: __('Aucun', 'dsfr-native-blocks'),
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
							label={__('Couleur du badge', 'dsfr-native-blocks')}
							value={attributes.badgeColor}
							onChange={(badgeColor) =>
								setAttributes({ badgeColor })
							}
						/>
					)}
				</PanelBody>
			</InspectorControls>
			<BlockControls group="block">
				{!isURLSet && (
					<ToolbarButton
						name="link"
						icon={link}
						title={__('Link')}
						onClick={startEditingURL}
					/>
				)}
				{isURLSet && (
					<ToolbarButton
						name="link"
						icon={linkOff}
						title={__('Unlink')}
						onClick={unlink}
						isActive
					/>
				)}
			</BlockControls>
			{isSelected && (isEditingURL || isURLSet) && (
				<Popover
					placement="bottom"
					onClose={() => {
						setIsEditingURL(false);
					}}
					anchor={popoverAnchor}
					focusOnMount={isEditingURL ? 'firstElement' : false}
					__unstableSlotName="__unstable-block-tools-after"
					shift
				>
					<LinkControl
						value={linkValue}
						onChange={(value) => {
							setAttributes({
								linkURL: value.url,
								linkTarget: value.opensInNewTab
									? '_blank'
									: '_self',
							});
						}}
						onRemove={unlink}
						forceIsEditingLink={isEditingURL}
					/>
				</Popover>
			)}
			<div {...blockProps}>
				<div className="fr-tile__body">
					<div className="fr-tile__content">
						<h3 className="fr-tile__title">
							{isURLSet ? (
								<a
									href={attributes.linkURL}
									onClick={(e) => e.preventDefault()}
									rel="noopener"
								>
									<RichText
										tagName="span"
										placeholder={__(
											'Ajouter un titre',
											'dsfr-native-blocks'
										)}
										value={attributes.title}
										onChange={(title) =>
											setAttributes({ title })
										}
										allowedFormats={[]}
									/>
								</a>
							) : (
								<RichText
									tagName="span"
									placeholder={__(
										'Ajouter un titre',
										'dsfr-native-blocks'
									)}
									value={attributes.title}
									onChange={(title) =>
										setAttributes({ title })
									}
									allowedFormats={[]}
								/>
							)}
						</h3>

						<RichText
							tagName="p"
							className="fr-tile__desc"
							placeholder={__(
								'Ajouter une description',
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
							placeholder={__(
								'Ajouter des détails',
								'dsfr-native-blocks'
							)}
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
										'Ajouter un texte',
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
									value={attributes.imageId}
									render={({ open }) => (
										<Button onClick={open}>
											{attributes.imageId ? (
												attributes.imageURL ? (
													<img
														className="fr-ratio-1x1"
														src={
															attributes.imageURL
														}
														alt={
															attributes.imageAlt
														}
													/>
												) : (
													<IconRaw
														content={
															attributes.imageSvg
														}
													/>
												)
											) : (
												__(
													'Choisir une image',
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
