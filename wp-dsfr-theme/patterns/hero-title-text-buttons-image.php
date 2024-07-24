<?php
/**
 * Title: Hero avec titre, texte, boutons et image
 * Slug: dsfr/hero-title-text-buttons-image
 * Categories: hero
 * Viewport width: 1248px
 */
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Hero avec titre, texte, boutons et image","categories":["hero"],"patternName":"dsfr/hero-title-text-buttons-image-with-background"},"align":"full","className":"wp-block-group\u002d\u002dhero wp-block-group\u002d\u002dhero-icon","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull wp-block-group--hero wp-block-group--hero-icon">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">
			<!-- wp:heading {"level":1,"placeholder":"Ajouter un titre"} -->
			<h1 class="wp-block-heading"></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"placeholder":"Ajouter un texte","fontSize":"xl"} -->
			<p class="has-xl-font-size"></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-secondary"} -->
				<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button"></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-tertiary"} -->
				<div class="wp-block-button is-style-tertiary"><a class="wp-block-button__link wp-element-button"></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
			<!-- wp:image {"width":"180px","height":"180px","scale":"cover","align":"center"} -->
			<figure class="wp-block-image aligncenter is-resized"><img alt="" style="object-fit:cover;width:180px;height:180px" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</header>
<!-- /wp:group -->
