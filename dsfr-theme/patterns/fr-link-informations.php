<?php
/**
 * Title: Lien - informations
 * Slug: dsfr/link-informations
 * categories: link
 */
?>
<!-- wp:group {"className":"wp-block-group\u002d\u002dhow-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur les liens', 'dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Le lien simple est disponible via la sélection de style de WordPress :', 'dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-link"} -->
		<div class="wp-block-button is-style-link"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Lien', 'dsfr-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php esc_html_e( 'Ajout et positionnement d\'une icône :', 'dsfr-theme' ); ?></h4>
	<!-- /wp:heading -->

	<?php
	$available_classes = [
		'fr-fi-arrow-left-line fr-link--icon-left',
		'fr-fi-arrow-right-line fr-link--icon-right',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-link <?php echo esc_html( $available_class ); ?>"} -->
			<div class="wp-block-button is-style-link <?php echo esc_html( $available_class ); ?>"><a class="wp-block-button__link wp-element-button">lien</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php
	endforeach;
	?>

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php esc_html_e( 'Variantes de taille :', 'dsfr-theme' ); ?></h4>
	<!-- /wp:heading -->
	<?php
	$available_classes = [
		'fr-link--sm',
		'fr-link--lg',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-link <?php echo esc_html( $available_class ); ?>"} -->
			<div class="wp-block-button is-style-link <?php echo esc_html( $available_class ); ?>"><a class="wp-block-button__link wp-element-button">Lien</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php
	endforeach;
	?>
</div>
<!-- /wp:group -->
