<?php
/**
 * Title: Mise en exergue - informations
 * Slug: dsfr/highlight-informations
 * Categories: highlight
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur la composition "Mise en exergue"', 'wp-dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Par défaut, la couleur de la bordure est "default-blue-france". Vous pouvez utiliser les classes css suivantes pour définir la couleur de la bordure :', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<?php
	$available_classes = Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_colors( 'fr-highlight--' );

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"fr-highlight <?php echo esc_attr( $available_class ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group fr-highlight <?php echo esc_attr( $available_class ); ?>">
			<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php
	endforeach;
	?>
</div>
<!-- /wp:group -->
