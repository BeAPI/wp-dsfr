<?php
// FR BADGES GROUP
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['badges'] ) ) {
	return;
}
?>
<ul class="fr-badges-group">
	<?php
	foreach ( $args['badges'] as $fr_badge ) :
		if ( 'string' === gettype( $fr_badge ) ) {
			$fr_badge = [
				'label' => $fr_badge,
				'color' => '',
			];
		}

		the_text(
			$fr_badge['label'],
			[
				'before' => '<li><p class="fr-badge' . ( ! empty( $fr_badge['color'] ) ? ' fr-badge--' . $fr_badge['color'] : '' ) . '">',
				'after'  => '</p></li>',
			]
		);
	endforeach;
	?>
</ul>
