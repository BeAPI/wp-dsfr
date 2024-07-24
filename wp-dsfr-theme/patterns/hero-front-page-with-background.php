<?php
/**
 * Title: Hero de page d'accueil avec fond
 * Slug: dsfr/hero-front-page-with-background
 * Categories: hero
 * Viewport width: 1248px
 */
?>
<!-- wp:group {"tagName":"header","metadata":{"name":""},"align":"full","backgroundColor":"background-alt-blue-france","className":"wp-block-group\u002d\u002dhero","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull wp-block-group--hero has-background-alt-blue-france-background-color has-background">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"className":"is-style-flag-fr","fontSize":"display-sm","placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'wp-dsfr-theme' ); ?>"} -->
			<h1 class="wp-block-heading is-style-flag-fr has-display-sm-font-size"></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"xl","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'wp-dsfr-theme' ); ?>"} -->
			<p class="has-xl-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"fr-btn\u002d\u002dlg"} /-->
				<!-- wp:button {"className":"fr-btn\u002d\u002dlg is-style-secondary"} /-->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:image -->
			<figure class="wp-block-image"><img alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</header>
<!-- /wp:group -->
