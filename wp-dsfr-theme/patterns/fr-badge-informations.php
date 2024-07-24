<?php
/**
 * Title: Badge - informations
 * Slug: dsfr/badge-informations
 * Categories: badge
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur la composition "Badge"', 'wp-dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Par défaut, les badges sont gris. Vous pouvez utiliser les classes css suivantes pour définir la couleur des badges :', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<?php
	$available_classes = Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_colors( 'fr-badge--' );

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"fr-badge <?php echo esc_attr( $available_class ); ?>","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<p class="fr-badge <?php echo esc_attr( $available_class ); ?>"></p>
		<!-- /wp:paragraph -->
		<?php
	endforeach;
	?>

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php esc_html_e( 'Badge succès, erreur, informations, avertissement et nouveauté', 'wp-dsfr-theme' ); ?></h4>
	<!-- /wp:heading -->

	<?php
	$available_classes = [
		'fr-badge--success',
		'fr-badge--success fr-badge--no-icon',
		'fr-badge--error',
		'fr-badge--error fr-badge--no-icon',
		'fr-badge--info',
		'fr-badge--info fr-badge--no-icon',
		'fr-badge--warning',
		'fr-badge--warning fr-badge--no-icon',
		'fr-badge--new',
		'fr-badge--new fr-badge--no-icon',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"fr-badge <?php echo esc_attr( $available_class ); ?>","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<p class="fr-badge <?php echo esc_attr( $available_class ); ?>"></p>
		<!-- /wp:paragraph -->
		<?php
	endforeach;
	?>

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php esc_html_e( 'Variantes de taille :', 'wp-dsfr-theme' ); ?></h4>
	<!-- /wp:heading -->

	<?php
	$available_classes = [
		'fr-badge--sm',
	];

	foreach ( $available_classes as $available_class ) :
		?>
		<!-- wp:paragraph -->
		<p><code><?php echo esc_html( $available_class ); ?></code> :</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"fr-badge <?php echo esc_attr( $available_class ); ?>","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<p class="fr-badge <?php echo esc_attr( $available_class ); ?>"></p>
		<!-- /wp:paragraph -->
		<?php
	endforeach;
	?>

	<!-- wp:heading {"level":4} -->
	<h4 class="wp-block-heading"><?php esc_html_e( 'Groupe de badges :', 'wp-dsfr-theme' ); ?></h4>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Chaque item de liste doit avoir une classe css <code>fr-badge</code>', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:list {"className":"fr-badges-group"} -->
	<ul class="fr-badges-group">
		<!-- wp:list-item {"className":"fr-badge","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<li class="fr-badge"></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item {"className":"fr-badge","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<li class="fr-badge"></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item {"className":"fr-badge","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
		<li class="fr-badge"></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->
</div>
