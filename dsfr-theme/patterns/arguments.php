<?php
/**
 * Title: Arguments
 * Slug: dsfr/arguments
 * Categories: misc
 * Viewport width: 1248px
 */
?>
<!-- wp:group {"align":"full","className":"wp-block-group\u002d\u002darguments","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull wp-block-group--arguments">
	<!-- wp:heading {"level":3,"align":"wide","placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'dsfr-theme' ); ?>"} -->
	<h3 class="wp-block-heading alignwide"></h3>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php for ( $i = 0; $i < 3; $i++ ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"width":"120px","height":"120px","scale":"cover","align":"center"} -->
			<figure class="wp-block-image aligncenter is-resized"><img alt="" style="object-fit:cover;width:120px;height:120px" /></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":4,"placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'dsfr-theme' ); ?>"} -->
			<h4 class="wp-block-heading has-text-align-center"></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'dsfr-theme' ); ?>"} -->
			<p class="has-text-align-center"></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		 <?php endfor; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->