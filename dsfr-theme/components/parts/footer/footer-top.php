<?php
// FOOTER TOP

if ( ! has_nav_menu( 'menu-footer-top' ) ) {
	return;
}
?>
<div class="fr-footer__top">
	<div class="fr-container">
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'menu-footer-top',
				'container'      => 'none',
				'menu_class'     => 'fr-grid-row fr-grid-row--start fr-grid-row--gutters',
				'fallback_cb'    => false,
				'depth'          => 2,
			]
		);
		?>
	</div>
</div>
