<?php
if ( ! has_nav_menu( 'menu-header-tools' ) ) {
	return;
}
?>
<div class="fr-header__tools-links">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'menu-header-tools',
			'container'      => 'none',
			'menu_class'     => 'fr-btns-group',
			'fallback_cb'    => false,
			'depth'          => 1,
		]
	);
	?>
</div>
