<?php
/**
 * Title: Hero avec titre, texte, boutons et image
 * Slug: dsfr/hero-title-text-buttons-image
 * Categories: hero
 * Viewport width: 1248px
 */
?>
<!-- wp:group {"tagName":"header","metadata":{"name":""},"align":"full","className":"wp-block-group\u002d\u002dhero","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull wp-block-group--hero">
	<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">
			<!-- wp:heading {"level":1,"className":"is-style-flag-fr","fontSize":"display-sm","placeholder":"<?php esc_attr_e( 'Ajouter un titre', 'dsfr-theme' ); ?>"} -->
			<h1 class="wp-block-heading is-style-flag-fr has-display-sm-font-size"></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"xl","placeholder":"<?php esc_attr_e( 'Ajouter un texte', 'dsfr-theme' ); ?>"} -->
			<p class="has-xl-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button /-->
				<!-- wp:button {"className":"is-style-secondary"} /-->
				<!-- wp:button {"className":"is-style-tertiary"} /-->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
			<!-- wp:image {"width":"180px","height":"auto"} -->
			<figure class="wp-block-image is-resized"><img alt="" style="width:180px;height:auto"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</header>
<!-- /wp:group -->
