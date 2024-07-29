<?php
/**
 * Title: Alerte - informations
 * Slug: dsfr/alert-informations
 * Categories: alert
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur la composition "Alerte"', 'wp-dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Quatre types d\'alerte sont disponibles, info, success, error et warning :', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Alerte par défaut :', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"fr-alert","layout":{"type":"constrained"}} -->
	<div class="wp-block-group fr-alert">
		<!-- wp:heading {"className":"fr-alert__title","level":3,"placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'wp-dsfr-theme' ); ?>"} -->
		<h3 class="wp-block-heading fr-alert__title"></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<p></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph -->
	<p><code>fr-icon-lock-fill</code> :</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"fr-alert fr-icon-lock-fill","layout":{"type":"constrained"}} -->
	<div class="wp-block-group fr-alert fr-icon-lock-fill">
		<!-- wp:heading {"className":"fr-alert__title","level":3,"placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'wp-dsfr-theme' ); ?>"} -->
		<h3 class="wp-block-heading fr-alert__title"></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<p></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php
	$available_classes = [
		'fr-alert--info',
		'fr-alert--success',
		'fr-alert--error',
		'fr-alert--warning',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"fr-alert <?php echo esc_attr( $available_class ); ?>","layout":{"type":"constrained"}} -->
		<div class="wp-block-group fr-alert <?php echo esc_attr( $available_class ); ?>">
			<!-- wp:heading {"className":"fr-alert__title","level":3,"placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'wp-dsfr-theme' ); ?>"} -->
			<h3 class="wp-block-heading fr-alert__title"></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?> fr-alert--sm</code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"fr-alert <?php echo esc_attr( $available_class ); ?> fr-alert--sm","layout":{"type":"constrained"}} -->
		<div class="wp-block-group fr-alert <?php echo esc_attr( $available_class ); ?> fr-alert--sm">
			<!-- wp:paragraph {"placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php
	endforeach;
	?>
</div>
