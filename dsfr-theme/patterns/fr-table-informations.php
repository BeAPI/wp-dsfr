<?php
/**
 * Title: Tableau - informations
 * Slug: dsfr/table-informations
 * Categories: table
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur les tableaux', 'dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Par défaut, les tableaux sont gris. Vous pouvez utiliser les classes css suivantes pour définir la couleur des tableaux :', 'dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<?php
	$available_classes = Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_colors( 'fr-table--' );

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:table {"className":"<?php echo esc_attr( $available_class ); ?>","hasFixedLayout":true} -->
		<figure class="wp-block-table <?php echo esc_attr( $available_class ); ?>"><table class="has-fixed-layout"><thead><tr><th></th><th></th></tr></thead><tbody><tr><td></td><td></td></tr><tr><td></td><td></td></tr></tbody></table></figure>
		<!-- /wp:table -->
		<?php
	endforeach;
	?>
</div>
<!-- /wp:group -->
