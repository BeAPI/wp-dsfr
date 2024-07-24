<?php
// HEADER MENU
?>
<div class="fr-header__menu fr-modal" id="header-navigation" aria-labelledby="button-2598" tabindex="-1">
	<div class="fr-container">
		<button class="fr-btn--close fr-btn" aria-controls="header-navigation" title="<?php esc_attr_e( 'Fermer', 'wp-dsfr-theme' ); ?>">
			<?php esc_html_e( 'Fermer', 'wp-dsfr-theme' ); ?>
		</button>
		<div class="fr-header__menu-links">
		</div>
		<nav class="fr-nav" role="navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'wp-dsfr-theme' ); ?>">
			<?php
			wp_nav_menu(
				[
					'theme_location' => 'menu-main',
					'container'      => 'none',
					'menu_class'     => 'fr-nav__list',
					'fallback_cb'    => false,
					'depth'          => 2,
					'walker'         => new Beapi\Theme\Dsfr\Helpers\Custom_Menu_Walker(),
				]
			);
			?>
		</nav>
	</div>
</div>
