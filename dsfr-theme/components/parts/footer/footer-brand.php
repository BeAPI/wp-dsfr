<?php
// FOOTER BRAND
$official_title = get_theme_mod( 'fr_logo_official_title' );

if ( empty( $official_title ) ) {
	return;
}
?>
<div class="fr-footer__brand fr-enlarge-link">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Retour à l’accueil du site - %s', 'dsfr-theme' ), get_bloginfo( 'name' ) ) ); ?>">
		<p class="fr-logo">
			<?php echo nl2br( esc_html( $official_title ) ); ?>
		</p>
	</a>
</div>
