<?php
/**
 * COMPONENT - FR TAGS GROUP
 * 
 * $args array keys :
 * 
 * @param string[]|WP_Terms[] tags
 * @param string              color
 * @param array               active_term_slugs
 * 
 */
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['tags'] ) ) {
	return;
}

$color             = ! empty( $args['color'] ) ? $args['color'] : '';
$active_term_slugs = ! empty( $args['active_term_slugs'] ) ? $args['active_term_slugs'] : [];
?>
<ul class="fr-tags-group">
	<?php
	foreach ( $args['tags'] as $fr_tag ) :
		$tag_classes = [ 'fr-tag' ];

		if ( ! empty( $color ) ) {
			$tag_classes[] = 'fr-tag--' . $color;
		}

		if  ( $fr_tag instanceof \WP_Term ) {
			$is_active = in_array( $fr_tag->slug, $active_term_slugs, true);

			if ( $is_active ) {
				$tag_classes[] = 'fr-tag--dismiss';
			}

			the_link(
				[
					'href'  => $is_active ? get_permalink( get_option( 'page_for_posts' ) ) : get_term_link( $fr_tag ),
					'class' => implode( ' ', array_map( 'sanitize_html_class', $tag_classes ) ),
					'title' => $is_active ? esc_attr__( 'Retourner à la page des actualités', 'dsfr-theme' ) : '',
				],
				[
					'content' => $fr_tag->name
				]
			);

		} else if ( 'string' === gettype( $fr_tag ) ) {
			the_text(
				$fr_tag,
				[
					'before' => '<li><p class="' . implode( ' ', array_map( 'sanitize_html_class', $tag_classes ) ) . '">',
					'after'  => '</p></li>',
				]
			);
		}
	endforeach;
	?>
</ul>
