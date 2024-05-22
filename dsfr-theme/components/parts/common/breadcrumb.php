<?php
if ( ! function_exists( 'yoast_breadcrumb' ) || get_field( 'is_breadcrumb_hidden' ) ) {
	return;
}
?>
<div class="fr-container">
	<nav class="fr-breadcrumb" aria-label="vous êtes ici :">
		<button class="fr-breadcrumb__button" aria-expanded="false" aria-controls="breadcrumb">Voir le fil d’Ariane</button>
		<div class="fr-collapse" id="breadcrumb">
			<?php yoast_breadcrumb( '<ol class="fr-breadcrumb__list">', '</ol>' ); ?>
		</div>
	</nav>
</div>
