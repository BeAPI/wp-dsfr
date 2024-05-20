<?php
// FR TAGS GROUP
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['tags'] ) ) {
	return;
}
?>
<ul class="fr-tags-group">
	<?php
	foreach ( $args['tags'] as $fr_tag ) :
		if ( 'string' === gettype( $fr_tag ) ) {
			$fr_badge = [
				'label' => $fr_tag,
				'color' => '',
			];
		}

		the_text(
			$fr_tag,
			[
				'before' => '<li><p class="fr-tag' . ( ! empty( $fr_tag['color'] ) ? ' fr-tag--' . $fr_tag['color'] : '' ) . '">',
				'after'  => '</p></li>',
			]
		);
	endforeach;
	?>
</ul>
