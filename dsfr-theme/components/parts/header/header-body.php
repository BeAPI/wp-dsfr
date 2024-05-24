<?php
// HEADER BODY
?>
<div class="fr-header__body">
	<div class="fr-container">
		<div class="fr-header__body-row">
			<?php get_template_part( 'components/parts/header/header-brand' ); ?>
			<div class="fr-header__tools">
				<?php
				get_template_part( 'components/parts/header/header-tools-link' );
				?>
				<div class="fr-header__search fr-modal" id="header-search" tabindex="-1">
					<div class="fr-container fr-container-lg--fluid">
						<button class="fr-btn--close fr-btn" aria-controls="header-search" title="<?php esc_attr_e( 'Fermer', 'dsfr-theme' ); ?>">
							<?php esc_html_e( 'Fermer', 'dsfr-theme' ); ?>
						</button>
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
