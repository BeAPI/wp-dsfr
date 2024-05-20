<?php
/**
 * Title: Mise en exergue - informations
 * Slug: dsfr/highlight-informations
 * categories: highlight
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Informations sur la composition "Mise en exergue"</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Par défaut, la couleur de la bordure est "default-blue-france". Vous pouvez utiliser les classes css suivantes pour définir la couleur de la bordure :</p>
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
			<!-- wp:paragraph {"placeholder":"Ajouter un texte"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php
	endforeach;
	?>
</div>
<!-- /wp:group -->
