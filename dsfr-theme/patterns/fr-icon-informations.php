<?php
/**
 * Title: Icônes - informations
 * Slug: dsfr/icon-informations
 * categories: icon
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur les icônes', 'dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Les classes css suivantes peuvent être utilisées sur les boutons, les compositions "Mise en avant", les compositions "Mise en exergue", ... :', 'dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"list-icons","layout":{"type":"constrained"}} -->
	<div class="wp-block-group list-icons">
		<?php
		$available_icons = [
			'Building' => [
				'fr-icon-ancient-gate-fill',
				'fr-icon-ancient-gate-line',
				'fr-icon-ancient-pavilion-fill',
				'fr-icon-ancient-pavilion-line',
				'fr-icon-bank-fill',
				'fr-icon-bank-line',
				'fr-icon-building-fill',
				'fr-icon-building-line',
				'fr-icon-community-fill',
				'fr-icon-community-line',
				'fr-icon-government-fill',
				'fr-icon-government-line',
				'fr-icon-home-4-fill',
				'fr-icon-home-4-line',
				'fr-icon-hospital-fill',
				'fr-icon-hospital-line',
				'fr-icon-hotel-fill',
				'fr-icon-hotel-line',
				'fr-icon-store-fill',
				'fr-icon-store-line',
			],

			'Business' => [
				'fr-icon-archive-fill',
				'fr-icon-archive-line',
				'fr-icon-attachment-fill',
				'fr-icon-attachment-line',
				'fr-icon-award-fill',
				'fr-icon-award-line',
				'fr-icon-bar-chart-box-fill',
				'fr-icon-bar-chart-box-line',
				'fr-icon-bookmark-fill',
				'fr-icon-bookmark-line',
				'fr-icon-briefcase-fill',
				'fr-icon-briefcase-line',
				'fr-icon-calendar-2-fill',
				'fr-icon-calendar-2-line',
				'fr-icon-calendar-event-fill',
				'fr-icon-calendar-event-line',
				'fr-icon-calendar-fill',
				'fr-icon-calendar-line',
				'fr-icon-cloud-fill',
				'fr-icon-cloud-line',
				'fr-icon-copyright-fill',
				'fr-icon-copyright-line',
				'fr-icon-customer-service-fill',
				'fr-icon-customer-service-line',
				'fr-icon-flag-fill',
				'fr-icon-flag-line',
				'fr-icon-global-fill',
				'fr-icon-global-line',
				'fr-icon-line-chart-fill',
				'fr-icon-line-chart-line',
				'fr-icon-links-fill',
				'fr-icon-links-line',
				'fr-icon-mail-fill',
				'fr-icon-mail-line',
				'fr-icon-mail-open-fill',
				'fr-icon-mail-open-line',
				'fr-icon-medal-fill',
				'fr-icon-medal-line',
				'fr-icon-pie-chart-2-fill',
				'fr-icon-pie-chart-2-line',
				'fr-icon-pie-chart-box-fill',
				'fr-icon-pie-chart-box-line',
				'fr-icon-printer-fill',
				'fr-icon-printer-line',
				'fr-icon-profil-fill',
				'fr-icon-profil-line',
				'fr-icon-projector-2-fill',
				'fr-icon-projector-2-line',
				'fr-icon-send-plane-fill',
				'fr-icon-send-plane-line',
				'fr-icon-slideshow-fill',
				'fr-icon-slideshow-line',
				'fr-icon-window-fill',
				'fr-icon-window-line',
			],

			'Communication' => [
				'fr-icon-chat-2-fill',
				'fr-icon-chat-2-line',
				'fr-icon-chat-3-fill',
				'fr-icon-chat-3-line',
				'fr-icon-chat-check-fill',
				'fr-icon-chat-check-line',
				'fr-icon-chat-delete-fill',
				'fr-icon-chat-delete-line',
				'fr-icon-chat-poll-fill',
				'fr-icon-chat-poll-line',
				'fr-icon-discuss-fill',
				'fr-icon-discuss-line',
				'fr-icon-feedback-fill',
				'fr-icon-feedback-line',
				'fr-icon-message-2-fill',
				'fr-icon-message-2-line',
				'fr-icon-question-answer-fill',
				'fr-icon-question-answer-line',
				'fr-icon-questionnaire-fill',
				'fr-icon-questionnaire-line',
				'fr-icon-video-chat-fill',
				'fr-icon-video-chat-line',
			],

			'Design' => [
				'fr-icon-ball-pen-fill',
				'fr-icon-ball-pen-line',
				'fr-icon-brush-3-fill',
				'fr-icon-brush-3-line',
				'fr-icon-brush-fill',
				'fr-icon-brush-line',
				'fr-icon-contrast-fill',
				'fr-icon-contrast-line',
				'fr-icon-crop-fill',
				'fr-icon-crop-line',
				'fr-icon-drag-move-2-fill',
				'fr-icon-drag-move-2-line',
				'fr-icon-drop-fill',
				'fr-icon-drop-line',
				'fr-icon-edit-box-fill',
				'fr-icon-edit-box-line',
				'fr-icon-edit-fill',
				'fr-icon-edit-line',
				'fr-icon-ink-bottle-fill',
				'fr-icon-ink-bottle-line',
				'fr-icon-layout-grid-fill',
				'fr-icon-layout-grid-line',
				'fr-icon-mark-pen-fill',
				'fr-icon-mark-pen-line',
				'fr-icon-paint-brush-fill',
				'fr-icon-paint-brush-line',
				'fr-icon-paint-fill',
				'fr-icon-paint-line',
				'fr-icon-palette-fill',
				'fr-icon-palette-line',
				'fr-icon-pantone-fill',
				'fr-icon-pantone-line',
				'fr-icon-pen-nib-fill',
				'fr-icon-pen-nib-line',
				'fr-icon-pencil-fill',
				'fr-icon-pencil-line',
				'fr-icon-pencil-ruler-fill',
				'fr-icon-pencil-ruler-line',
				'fr-icon-sip-fill',
				'fr-icon-sip-line',
				'fr-icon-table-fill',
				'fr-icon-table-line',
			],

			'Development' => [
				'fr-icon-bug-fill',
				'fr-icon-bug-line',
				'fr-icon-code-box-fill',
				'fr-icon-code-box-line',
				'fr-icon-code-s-slash-line',
				'fr-icon-cursor-fill',
				'fr-icon-cursor-line',
				'fr-icon-git-branch-fill',
				'fr-icon-git-branch-line',
				'fr-icon-git-commit-fill',
				'fr-icon-git-commit-line',
				'fr-icon-git-merge-fill',
				'fr-icon-git-merge-line',
				'fr-icon-git-pull-request-fill',
				'fr-icon-git-pull-request-line',
				'fr-icon-git-repository-commits-fill',
				'fr-icon-git-repository-commits-line',
				'fr-icon-git-repository-fill',
				'fr-icon-git-repository-line',
				'fr-icon-git-repository-private-fill',
				'fr-icon-git-repository-private-line',
				'fr-icon-terminal-box-fill',
				'fr-icon-terminal-box-line',
				'fr-icon-terminal-line',
				'fr-icon-terminal-window-fill',
				'fr-icon-terminal-window-line',
			],

			'Device' => [
				'fr-icon-bluetooth-fill',
				'fr-icon-bluetooth-line',
				'fr-icon-computer-fill',
				'fr-icon-computer-line',
				'fr-icon-dashboard-3-fill',
				'fr-icon-dashboard-3-line',
				'fr-icon-database-fill',
				'fr-icon-database-line',
				'fr-icon-device-fill',
				'fr-icon-device-line',
				'fr-icon-hard-drive-2-fill',
				'fr-icon-hard-drive-2-line',
				'fr-icon-mac-fill',
				'fr-icon-mac-line',
				'fr-icon-phone-fill',
				'fr-icon-phone-line',
				'fr-icon-qr-code-fill',
				'fr-icon-qr-code-line',
				'fr-icon-rss-fill',
				'fr-icon-rss-line',
				'fr-icon-save-3-fill',
				'fr-icon-save-3-line',
				'fr-icon-save-fill',
				'fr-icon-save-line',
				'fr-icon-server-fill',
				'fr-icon-server-line',
				'fr-icon-smartphone-fill',
				'fr-icon-smartphone-line',
				'fr-icon-tablet-fill',
				'fr-icon-tablet-line',
				'fr-icon-tv-fill',
				'fr-icon-tv-line',
				'fr-icon-wifi-fill',
				'fr-icon-wifi-line',
			],

			'Document' => [
				'fr-icon-article-fill',
				'fr-icon-article-line',
				'fr-icon-book-2-fill',
				'fr-icon-book-2-line',
				'fr-icon-booklet-fill',
				'fr-icon-booklet-line',
				'fr-icon-clipboard-fill',
				'fr-icon-clipboard-line',
				'fr-icon-draft-fill',
				'fr-icon-draft-line',
				'fr-icon-file-add-fill',
				'fr-icon-file-add-line',
				'fr-icon-file-download-fill',
				'fr-icon-file-download-line',
				'fr-icon-file-fill',
				'fr-icon-file-line',
				'fr-icon-file-pdf-fill',
				'fr-icon-file-pdf-line',
				'fr-icon-file-text-fill',
				'fr-icon-file-text-line',
				'fr-icon-folder-2-fill',
				'fr-icon-folder-2-line',
				'fr-icon-newspaper-fill',
				'fr-icon-newspaper-line',
				'fr-icon-survey-fill',
				'fr-icon-survey-line',
				'fr-icon-todo-fill',
				'fr-icon-todo-line',
			],

			'Editor' => [
				'fr-icon-bold',
				'fr-icon-highlight',
				'fr-icon-quote-fill',
				'fr-icon-quote-line',
				'fr-icon-code-view',
				'fr-icon-font-size',
				'fr-icon-h-1',
				'fr-icon-h-2',
				'fr-icon-h-3',
				'fr-icon-h-4',
				'fr-icon-h-5',
				'fr-icon-h-6',
				'fr-icon-hashtag',
				'fr-icon-italic',
				'fr-icon-link-unlink',
				'fr-icon-link',
				'fr-icon-list-ordered',
				'fr-icon-list-unordered',
				'fr-icon-question-mark',
				'fr-icon-separator',
				'fr-icon-space',
				'fr-icon-subscript',
				'fr-icon-superscript',
				'fr-icon-table-2',
				'fr-icon-translate-2',
			],

			'Finance' => [
				'fr-icon-bank-card-fill',
				'fr-icon-bank-card-line',
				'fr-icon-coin-fill',
				'fr-icon-gift-fill',
				'fr-icon-gift-line',
				'fr-icon-money-euro-box-fill',
				'fr-icon-money-euro-box-line',
				'fr-icon-money-euro-circle-fill',
				'fr-icon-money-euro-circle-line',
				'fr-icon-secure-payment-fill',
				'fr-icon-secure-payment-line',
				'fr-icon-shopping-bag-fill',
				'fr-icon-shopping-bag-line',
				'fr-icon-shopping-cart-2-fill',
				'fr-icon-shopping-cart-2-line',
				'fr-icon-trophy-fill',
				'fr-icon-trophy-line',
			],

			'Health' => [
				'fr-icon-capsule-fill',
				'fr-icon-capsule-line',
				'fr-icon-dislike-fill',
				'fr-icon-dislike-line',
				'fr-icon-dossier-fill',
				'fr-icon-dossier-line',
				'fr-icon-first-aid-kit-fill',
				'fr-icon-first-aid-kit-line',
				'fr-icon-hand-sanitizer-fill',
				'fr-icon-hand-sanitizer-line',
				'fr-icon-health-book-fill',
				'fr-icon-health-book-line',
				'fr-icon-heart-fill',
				'fr-icon-heart-line',
				'fr-icon-heart-pulse-fill',
				'fr-icon-heart-pulse-line',
				'fr-icon-lungs-fill',
				'fr-icon-lungs-line',
				'fr-icon-medicine-bottle-fill',
				'fr-icon-medicine-bottle-line',
				'fr-icon-mental-health-fill',
				'fr-icon-mental-health-line',
				'fr-icon-microscope-fill',
				'fr-icon-microscope-line',
				'fr-icon-psychotherapy-fill',
				'fr-icon-psychotherapy-line',
				'fr-icon-pulse-line',
				'fr-icon-stethoscope-fill',
				'fr-icon-stethoscope-line',
				'fr-icon-surgical-mask-fill',
				'fr-icon-surgical-mask-line',
				'fr-icon-syringe-fill',
				'fr-icon-syringe-line',
				'fr-icon-test-tube-fill',
				'fr-icon-test-tube-line',
				'fr-icon-thermometer-fill',
				'fr-icon-thermometer-line',
				'fr-icon-virus-fill',
				'fr-icon-virus-line',
			],

			'Logos' => [
				'fr-icon-dailymotion-fill',
				'fr-icon-dailymotion-line',
				'fr-icon-tiktok-fill',
				'fr-icon-tiktok-line',
				'fr-icon-chrome-fill',
				'fr-icon-chrome-line',
				'fr-icon-edge-fill',
				'fr-icon-edge-line',
				'fr-icon-facebook-circle-fill',
				'fr-icon-facebook-circle-line',
				'fr-icon-firefox-fill',
				'fr-icon-firefox-line',
				'fr-icon-github-fill',
				'fr-icon-github-line',
				'fr-icon-google-fill',
				'fr-icon-google-line',
				'fr-icon-ie-fill',
				'fr-icon-ie-line',
				'fr-icon-instagram-fill',
				'fr-icon-instagram-line',
				'fr-icon-linkedin-box-fill',
				'fr-icon-linkedin-box-line',
				'fr-icon-mastodon-fill',
				'fr-icon-mastodon-line',
				'fr-icon-npmjs-fill',
				'fr-icon-npmjs-line',
				'fr-icon-remixicon-fill',
				'fr-icon-remixicon-line',
				'fr-icon-safari-fill',
				'fr-icon-safari-line',
				'fr-icon-slack-fill',
				'fr-icon-slack-line',
				'fr-icon-snapchat-fill',
				'fr-icon-snapchat-line',
				'fr-icon-telegram-fill',
				'fr-icon-telegram-line',
				'fr-icon-twitch-fill',
				'fr-icon-twitch-line',
				'fr-icon-twitter-x-fill',
				'fr-icon-twitter-x-line',
				'fr-icon-threads-fill',
				'fr-icon-threads-line',
				'fr-icon-twitter-fill',
				'fr-icon-twitter-line',
				'fr-icon-vimeo-fill',
				'fr-icon-vimeo-line',
				'fr-icon-vuejs-fill',
				'fr-icon-vuejs-line',
				'fr-icon-youtube-fill',
				'fr-icon-youtube-line',
			],

			'Map' => [
				'fr-icon-anchor-fill',
				'fr-icon-anchor-line',
				'fr-icon-bike-fill',
				'fr-icon-bike-line',
				'fr-icon-bus-fill',
				'fr-icon-bus-line',
				'fr-icon-car-fill',
				'fr-icon-car-line',
				'fr-icon-caravan-fill',
				'fr-icon-caravan-line',
				'fr-icon-charging-pile-2-fill',
				'fr-icon-charging-pile-2-line',
				'fr-icon-compass-3-fill',
				'fr-icon-compass-3-line',
				'fr-icon-cup-fill',
				'fr-icon-cup-line',
				'fr-icon-earth-fill',
				'fr-icon-earth-line',
				'fr-icon-france-fill',
				'fr-icon-france-line',
				'fr-icon-gas-station-fill',
				'fr-icon-gas-station-line',
				'fr-icon-goblet-fill',
				'fr-icon-goblet-line',
				'fr-icon-map-pin-2-fill',
				'fr-icon-map-pin-2-line',
				'fr-icon-map-pin-user-fill',
				'fr-icon-map-pin-user-line',
				'fr-icon-motorbike-fill',
				'fr-icon-motorbike-line',
				'fr-icon-passport-fill',
				'fr-icon-passport-line',
				'fr-icon-restaurant-fill',
				'fr-icon-restaurant-line',
				'fr-icon-road-map-fill',
				'fr-icon-road-map-line',
				'fr-icon-sailboat-fill',
				'fr-icon-sailboat-line',
				'fr-icon-ship-2-fill',
				'fr-icon-ship-2-line',
				'fr-icon-signal-tower-fill',
				'fr-icon-signal-tower-line',
				'fr-icon-suitcase-2-fill',
				'fr-icon-suitcase-2-line',
				'fr-icon-taxi-fill',
				'fr-icon-taxi-line',
				'fr-icon-train-fill',
				'fr-icon-train-line',
			],

			'Media' => [
				'fr-icon-camera-fill',
				'fr-icon-camera-line',
				'fr-icon-clapperboard-fill',
				'fr-icon-clapperboard-line',
				'fr-icon-equalizer-fill',
				'fr-icon-equalizer-line',
				'fr-icon-film-fill',
				'fr-icon-film-line',
				'fr-icon-gallery-fill',
				'fr-icon-gallery-line',
				'fr-icon-headphone-fill',
				'fr-icon-headphone-line',
				'fr-icon-image-add-fill',
				'fr-icon-image-add-line',
				'fr-icon-image-edit-fill',
				'fr-icon-image-edit-line',
				'fr-icon-image-fill',
				'fr-icon-image-line',
				'fr-icon-live-fill',
				'fr-icon-live-line',
				'fr-icon-mic-fill',
				'fr-icon-mic-line',
				'fr-icon-music-2-fill',
				'fr-icon-music-2-line',
				'fr-icon-notification-3-fill',
				'fr-icon-notification-3-line',
				'fr-icon-pause-circle-fill',
				'fr-icon-pause-circle-line',
				'fr-icon-play-circle-fill',
				'fr-icon-play-circle-line',
				'fr-icon-stop-circle-fill',
				'fr-icon-stop-circle-line',
				'fr-icon-volume-down-fill',
				'fr-icon-volume-down-line',
				'fr-icon-volume-mute-fill',
				'fr-icon-volume-mute-line',
				'fr-icon-volume-up-fill',
				'fr-icon-volume-up-line',
			],

			'Other' => [
				'fr-icon-leaf-fill',
				'fr-icon-leaf-line',
				'fr-icon-lightbulb-fill',
				'fr-icon-lightbulb-line',
				'fr-icon-plant-fill',
				'fr-icon-plant-line',
				'fr-icon-recycle-fill',
				'fr-icon-recycle-line',
				'fr-icon-scales-3-fill',
				'fr-icon-scales-3-line',
				'fr-icon-seedling-fill',
				'fr-icon-seedling-line',
				'fr-icon-umbrella-fill',
				'fr-icon-umbrella-line',
			],

			'System' => [
				'fr-icon-arrow-left-s-fill',
				'fr-icon-arrow-left-s-line',
				'fr-icon-arrow-right-s-fill',
				'fr-icon-arrow-right-s-line',
				'fr-icon-error-fill',
				'fr-icon-error-line',
				'fr-icon-info-fill',
				'fr-icon-info-line',
				'fr-icon-success-fill',
				'fr-icon-success-line',
				'fr-icon-warning-fill',
				'fr-icon-warning-line',
				'fr-icon-theme-fill',
				'fr-icon-add-circle-fill',
				'fr-icon-add-circle-line',
				'fr-icon-add-line',
				'fr-icon-alarm-warning-fill',
				'fr-icon-alarm-warning-line',
				'fr-icon-alert-fill',
				'fr-icon-alert-line',
				'fr-icon-arrow-down-fill',
				'fr-icon-arrow-down-line',
				'fr-icon-arrow-down-s-fill',
				'fr-icon-arrow-down-s-line',
				'fr-icon-arrow-go-back-fill',
				'fr-icon-arrow-go-back-line',
				'fr-icon-arrow-go-forward-fill',
				'fr-icon-arrow-go-forward-line',
				'fr-icon-arrow-left-fill',
				'fr-icon-arrow-left-line',
				'fr-icon-arrow-right-fill',
				'fr-icon-arrow-right-line',
				'fr-icon-arrow-right-up-line',
				'fr-icon-arrow-up-fill',
				'fr-icon-arrow-up-line',
				'fr-icon-arrow-up-s-fill',
				'fr-icon-arrow-up-s-line',
				'fr-icon-check-line',
				'fr-icon-checkbox-circle-fill',
				'fr-icon-checkbox-circle-line',
				'fr-icon-checkbox-fill',
				'fr-icon-checkbox-line',
				'fr-icon-close-circle-fill',
				'fr-icon-close-circle-line',
				'fr-icon-close-line',
				'fr-icon-delete-fill',
				'fr-icon-delete-line',
				'fr-icon-download-fill',
				'fr-icon-download-line',
				'fr-icon-error-warning-fill',
				'fr-icon-error-warning-line',
				'fr-icon-external-link-fill',
				'fr-icon-external-link-line',
				'fr-icon-eye-fill',
				'fr-icon-eye-line',
				'fr-icon-eye-off-fill',
				'fr-icon-eye-off-line',
				'fr-icon-filter-fill',
				'fr-icon-filter-line',
				'fr-icon-arrow-left-s-first-line',
				'fr-icon-arrow-left-s-line-double',
				'fr-icon-arrow-right-s-last-line',
				'fr-icon-arrow-right-s-line-double',
				'fr-icon-information-fill',
				'fr-icon-information-line',
				'fr-icon-lock-fill',
				'fr-icon-lock-line',
				'fr-icon-lock-unlock-fill',
				'fr-icon-lock-unlock-line',
				'fr-icon-logout-box-r-fill',
				'fr-icon-logout-box-r-line',
				'fr-icon-menu-2-fill',
				'fr-icon-menu-fill',
				'fr-icon-more-fill',
				'fr-icon-more-line',
				'fr-icon-notification-badge-fill',
				'fr-icon-notification-badge-line',
				'fr-icon-question-fill',
				'fr-icon-question-line',
				'fr-icon-refresh-fill',
				'fr-icon-refresh-line',
				'fr-icon-search-fill',
				'fr-icon-search-line',
				'fr-icon-settings-5-fill',
				'fr-icon-settings-5-line',
				'fr-icon-shield-fill',
				'fr-icon-shield-line',
				'fr-icon-star-fill',
				'fr-icon-star-line',
				'fr-icon-star-s-fill',
				'fr-icon-star-s-line',
				'fr-icon-subtract-line',
				'fr-icon-thumb-down-fill',
				'fr-icon-thumb-down-line',
				'fr-icon-thumb-up-fill',
				'fr-icon-thumb-up-line',
				'fr-icon-time-fill',
				'fr-icon-time-line',
				'fr-icon-timer-fill',
				'fr-icon-timer-line',
				'fr-icon-upload-2-fill',
				'fr-icon-upload-2-line',
				'fr-icon-upload-fill',
				'fr-icon-upload-line',
				'fr-icon-zoom-in-fill',
				'fr-icon-zoom-in-line',
				'fr-icon-zoom-out-fill',
				'fr-icon-zoom-out-line',
			],

			'User' => [
				'fr-icon-account-circle-fill',
				'fr-icon-account-circle-line',
				'fr-icon-account-fill',
				'fr-icon-account-line',
				'fr-icon-account-pin-circle-fill',
				'fr-icon-account-pin-circle-line',
				'fr-icon-admin-fill',
				'fr-icon-admin-line',
				'fr-icon-group-fill',
				'fr-icon-group-line',
				'fr-icon-parent-fill',
				'fr-icon-parent-line',
				'fr-icon-team-fill',
				'fr-icon-team-line',
				'fr-icon-user-add-fill',
				'fr-icon-user-add-line',
				'fr-icon-user-fill',
				'fr-icon-user-line',
				'fr-icon-user-heart-fill',
				'fr-icon-user-heart-line',
				'fr-icon-user-search-fill',
				'fr-icon-user-search-line',
				'fr-icon-user-setting-fill',
				'fr-icon-user-setting-line',
				'fr-icon-user-star-fill',
				'fr-icon-user-star-line',
			],

			'Weather' => [
				'fr-icon-cloudy-2-fill',
				'fr-icon-cloudy-2-line',
				'fr-icon-flashlight-fill',
				'fr-icon-flashlight-line',
				'fr-icon-moon-fill',
				'fr-icon-moon-line',
				'fr-icon-file-pdf-line',
			],
		];

		foreach ( $available_icons as $category => $classes ) :
			?>
			<!-- wp:heading {"level":4} -->
			<h4 class="wp-block-heading"><?php echo esc_attr( $category ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>
				<?php
				foreach ( $classes as $class ) :
					?>
					<span class="<?php echo esc_attr( $class ); ?>"></span> <code><?php echo esc_html( $class ); ?></code><br />
					<?php
				endforeach;
				?>
			</p>
			<!-- /wp:paragraph -->
			<?php
		endforeach;
		?>
	</div>
	<!-- /wp:group -->
</div>