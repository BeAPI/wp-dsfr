<?php
/**
 * Title: Bouton - informations
 * Slug: dsfr/btn-informations
 * categories: btn
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Informations sur les boutons</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Trois types de boutons sont disponibles via la sélection de style de WordPress :</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button">bouton</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-secondary"} -->
		<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button">bouton</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-tertiary"} -->
		<div class="wp-block-button is-style-tertiary"><a class="wp-block-button__link wp-element-button">bouton</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->


	<!-- wp:heading {"level":4,"placeholder":"Ajouter un titre"} -->
	<h4 class="wp-block-heading">Ajout et positionnement d'une icône :</h3>
	<!-- /wp:heading -->
	<?php
	$available_classes = [
		'fr-btn--icon-left',
		'fr-btn--icon-right',
		'fr-btn--icon',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code>fr-icon-information-line <?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-fill fr-icon-information-line <?php echo esc_html( $available_class ); ?>"} -->
			<div class="wp-block-button is-style-fill fr-icon-information-line <?php echo esc_html( $available_class ); ?>"><a class="wp-block-button__link wp-element-button">bouton</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php
	endforeach;
	?>

	<!-- wp:heading {"level":4,"placeholder":"Ajouter un titre"} -->
	<h4 class="wp-block-heading">Variantes de taille :</h3>
	<!-- /wp:heading -->
	<?php
	$available_classes = [
		'fr-btn--sm',
		'fr-btn--lg',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-fill <?php echo esc_html( $available_class ); ?>"} -->
			<div class="wp-block-button is-style-fill <?php echo esc_html( $available_class ); ?>"><a class="wp-block-button__link wp-element-button">bouton</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php
	endforeach;
	?>
</div>
