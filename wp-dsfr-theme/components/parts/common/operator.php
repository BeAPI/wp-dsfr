<?php
$operator_class = ! empty( $args['class'] ) ? $args['class'] : '';
$operator_logo  = get_theme_mod( 'fr_site_logo' );
if ( empty( $operator_logo ) ) {
	return;
}
?>
<div class="<?php echo esc_attr( $operator_class ); ?>">
	<img class="fr-responsive-img"
		style="max-width:9.0625rem;"
		src="<?php echo esc_url( wp_get_attachment_image_url( $operator_logo, 'full' ) ); ?>"
		alt="Logo - <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
</div>
