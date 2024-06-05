<?php
/**
 * Title: Mise en avant - informations
 * Slug: dsfr/callout-informations
 * Categories: callout
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur la composition "Mise en avant"', 'dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Par défaut, la couleur de la bordure est "default-blue-france". Vous pouvez utiliser les classes css suivantes pour définir la couleur de la bordure :', 'dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<?php
	$available_classes = Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_colors( 'fr-callout--' );

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"fr-callout fr-icon-information-line <?php echo esc_attr( $available_class ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group fr-callout fr-icon-information-line <?php echo esc_attr( $available_class ); ?>">
			<!-- wp:heading {"className":"fr-callout__title","level":3,"placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'dsfr-theme' ); ?>"} -->
			<h3 class="wp-block-heading fr-callout__title"></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'dsfr-theme' ); ?>","fontSize":"lg"} -->
			<p class="has-lg-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button /--></div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php
	endforeach;
	?>
</div>
