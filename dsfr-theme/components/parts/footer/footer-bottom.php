<?php
// FOOTER BOTTOM
?>
<div class="fr-footer__bottom">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'menu-footer-bottom',
			'container'      => 'none',
			'menu_class'     => 'fr-footer__bottom-list',
			'fallback_cb'    => false,
			'depth'          => 1,
		]
	);
	?>
	<div class="fr-footer__bottom-copy">
		<p><?php echo wp_kses_post( __( 'Sauf mention explicite de propriété intellectuelle détenue par des tiers, les contenus de ce site sont proposés sous <a href="https://github.com/etalab/licence-ouverte/blob/master/LO.md" target="_blank">licence etalab-2.0</a>', 'dsfr-theme' ) ); ?></p>
	</div>
</div>
