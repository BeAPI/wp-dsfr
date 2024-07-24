<?php
// FOOTER BODY
$footer_content_desc = get_theme_mod( 'fr_footer_content_desc' );
?>
<div class="fr-footer__body">
	<?php
	get_template_part( 'components/parts/footer/footer-brand' );
	?>
	<div class="fr-footer__content">
		<?php
		if ( ! empty( $footer_content_desc ) ) :
			?>
			<p class="fr-footer__content-desc"><?php echo nl2br( esc_html( $footer_content_desc ) ); ?></p>
			<?php
		endif;

		wp_nav_menu(
			[
				'theme_location' => 'menu-footer-content',
				'container'      => 'none',
				'menu_class'     => 'fr-footer__content-list',
				'fallback_cb'    => false,
				'depth'          => 1,
			]
		);
		?>
	</div>
</div>