<?php
if ( ! function_exists( 'yoast_breadcrumb' ) || get_field( 'is_breadcrumb_hidden' ) ) {
	return;
}
?>
<div class="fr-container">
	<nav class="fr-breadcrumb" aria-label="<?php esc_attr_e( 'vous êtes ici :', 'wp-dsfr-theme' ); ?>">
		<button class="fr-breadcrumb__button" aria-expanded="false" aria-controls="breadcrumb"><?php esc_html_e( 'Voir le fil d’Ariane', 'wp-dsfr-theme' ); ?></button>
		<div class="fr-collapse" id="breadcrumb">
			<?php yoast_breadcrumb( '<ol class="fr-breadcrumb__list">', '</ol>' ); ?>
		</div>
	</nav>
</div>
