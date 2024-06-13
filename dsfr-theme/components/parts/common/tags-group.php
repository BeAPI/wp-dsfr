<?php
// FR TAGS GROUP
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['tags'] ) ) {
	return;
}

$color     = ! empty( $args['color'] ) ? $args['color'] : '';
$clickable = isset( $args['clickable'] ) ? $args['clickable'] : true; 
?>
<ul class="fr-tags-group">
	<?php
	foreach ( $args['tags'] as $fr_tag ) :
		if  ( $fr_tag instanceof \WP_Term ) {
			$fr_tag = [
				'label' => $fr_tag->name,
				'color' => $color,
				'href'  => get_term_link($fr_tag),
			];
		} else if ( 'string' === gettype( $fr_tag ) ) {
			$fr_tag = [
				'label' => $fr_tag,
				'color' => $color,
				'href'  => '',
			];
		}

		$tag_color_class = ( ! empty( $fr_tag['color'] ) ? ' fr-tag--' . $fr_tag['color'] : '' );

		if ( $clickable && ! empty( $fr_tag['href'] ) ) {
			the_link(
				[
					'href'  => $fr_tag['href'],
					'class' => 'fr-tag' . $tag_color_class,
				],
				[
					'content' => $fr_tag['label']
				]
			);
		} else {
			the_text(
				$fr_tag['label'],
				[
					'before' => '<li><p class="fr-tag' . $tag_color_class . '">',
					'after'  => '</p></li>',
				]
			);
		}
	endforeach;
	?>
</ul>
