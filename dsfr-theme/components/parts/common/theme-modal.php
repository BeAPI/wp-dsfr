<?php
$picto_path        = get_template_directory_uri() . '/dist-dsfr/artwork/pictograms/';
$picto_env_path    = $picto_path . 'environment/';
$picto_system_path = $picto_path . 'system/';
?>
<dialog id="fr-theme-modal" class="fr-modal" aria-labelledby="fr-theme-modal-title">
	<div class="fr-container fr-container--fluid fr-container-md">
		<div class="fr-grid-row fr-grid-row--center">
			<div class="fr-col-12 fr-col-md-6 fr-col-lg-4">
				<div class="fr-modal__body">
					<div class="fr-modal__header">
						<button class="fr-btn--close fr-btn" aria-controls="fr-theme-modal" title="<?php esc_attr_e( 'Fermer', 'dsfr-theme' ); ?>">
							<?php esc_html_e( 'Fermer', 'dsfr-theme' ); ?>
						</button>
					</div>
					<div class="fr-modal__content">
						<h1 id="fr-theme-modal-title" class="fr-modal__title">
							<?php esc_html_e( 'Paramètres d’affichage', 'dsfr-theme' ); ?>
						</h1>
						<div id="fr-display" class="fr-display">
							<fieldset class="fr-fieldset" id="display-fieldset">
								<legend class="fr-fieldset__legend--regular fr-fieldset__legend" id="display-fieldset-legend">
									<?php esc_html_e( 'Choisissez un thème pour personnaliser l’apparence du site.', 'dsfr-theme' ); ?>
								</legend>
								<div class="fr-fieldset__element">
									<div class="fr-radio-group fr-radio-rich">
										<input value="light" type="radio" id="fr-radios-theme-light" name="fr-radios-theme">
										<label class="fr-label" for="fr-radios-theme-light">
											<?php esc_html_e( 'Thème clair', 'dsfr-theme' ); ?>
										</label>
										<div class="fr-radio-rich__pictogram">
											<svg aria-hidden="true" class="fr-artwork" viewBox="0 0 80 80" width="80px" height="80px">
												<use class="fr-artwork-decorative" href="<?php echo esc_url( $picto_env_path ); ?>sun.svg#artwork-decorative"></use>
												<use class="fr-artwork-minor" href="<?php echo esc_url( $picto_env_path ); ?>sun.svg#artwork-minor"></use>
												<use class="fr-artwork-major" href="<?php echo esc_url( $picto_env_path ); ?>sun.svg#artwork-major"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="fr-fieldset__element">
									<div class="fr-radio-group fr-radio-rich">
										<input value="dark" type="radio" id="fr-radios-theme-dark" name="fr-radios-theme">
										<label class="fr-label" for="fr-radios-theme-dark">
											<?php esc_html_e( 'Thème sombre', 'dsfr-theme' ); ?>
										</label>
										<div class="fr-radio-rich__pictogram">
											<svg aria-hidden="true" class="fr-artwork" viewBox="0 0 80 80" width="80px" height="80px">
												<use class="fr-artwork-decorative" href="<?php echo esc_url( $picto_env_path ); ?>moon.svg#artwork-decorative"></use>
												<use class="fr-artwork-minor" href="<?php echo esc_url( $picto_env_path ); ?>moon.svg#artwork-minor"></use>
												<use class="fr-artwork-major" href="<?php echo esc_url( $picto_env_path ); ?>moon.svg#artwork-major"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="fr-fieldset__element">
									<div class="fr-radio-group fr-radio-rich">
										<input value="system" type="radio" id="fr-radios-theme-system" name="fr-radios-theme">
										<label class="fr-label" for="fr-radios-theme-system">
											<?php esc_html_e( 'Système', 'dsfr-theme' ); ?>
											<span class="fr-hint-text"><?php esc_html_e( 'Utilise les paramètres système', 'dsfr-theme' ); ?></span>
										</label>
										<div class="fr-radio-rich__pictogram">
											<svg aria-hidden="true" class="fr-artwork" viewBox="0 0 80 80" width="80px" height="80px">
												<use class="fr-artwork-decorative" href="<?php echo esc_url( $picto_system_path ); ?>system.svg#artwork-decorative"></use>
												<use class="fr-artwork-minor" href="<?php echo esc_url( $picto_system_path ); ?>system.svg#artwork-minor"></use>
												<use class="fr-artwork-major" href="<?php echo esc_url( $picto_system_path ); ?>system.svg#artwork-major"></use>
											</svg>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</dialog>
