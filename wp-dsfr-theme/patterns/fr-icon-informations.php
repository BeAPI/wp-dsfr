<?php
/**
 * Title: Icônes - informations
 * Slug: dsfr/icon-informations
 * Categories: icon
 * Viewport width: 768px
 */
?>
<!-- wp:group {"className":"wp-block-group--how-to-use fr-icon-information-line","layout":{"type":"constrained"}} -->
<div class="wp-block-group wp-block-group--how-to-use fr-icon-information-line">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Informations sur les icônes', 'wp-dsfr-theme' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Les classes css suivantes peuvent être utilisées sur les boutons, les compositions "Mise en avant", les compositions "Mise en exergue", ... :', 'wp-dsfr-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"list-icons","layout":{"type":"constrained"}} -->
	<div class="wp-block-group list-icons">
		<?php
		$available_icons = Beapi\Theme\Dsfr\Helpers\DSFR\get_dsfr_icons_by_category();

		foreach ( $available_icons as $category => $classes ) :
			?>
			<!-- wp:heading {"level":4} -->
			<h4 class="wp-block-heading"><?php echo esc_html( $category ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>
				<?php
				foreach ( $classes as $class ) :
					?>
					<span class="<?php echo esc_attr( $class ); ?>"></span> <code><?php echo esc_html( $class ); ?></code><br />
					<?php
				endforeach;
				?>
			</p>
			<!-- /wp:paragraph -->
			<?php
		endforeach;
		?>
	</div>
	<!-- /wp:group -->
</div>