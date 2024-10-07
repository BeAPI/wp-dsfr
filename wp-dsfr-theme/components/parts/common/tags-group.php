<?php
/**
 * COMPONENT - FR TAGS GROUP
 *
 * $args array keys :
 *
 * @param array $args = [
 *     'tags' => [
 *          [
 *               'is_dismissable' => bool,
 *               'label'          => '',
 *               'href'           => '',
 *               'title'          => '',
 *               'color'          => 'green-menthe' | ...,
 *               'size'           => '' | 'sm',
 *          ],
 *          ...
 *     ]
 * ]
 *
 */
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['tags'] ) ) {
	return;
}
?>
<ul class="fr-tags-group">
	<?php
	foreach ( $args['tags'] as $fr_tag ) :
		$tag_classes = [ 'fr-tag' ];

		if ( ! empty( $fr_tag['color'] ) ) {
			$tag_classes[] = 'fr-tag--' . $fr_tag['color'];
		}

		if ( ! empty( $fr_tag['size'] ) ) {
			$tag_classes[] = 'fr-tag--' . $fr_tag['size'];
		}

		if ( ! empty( $fr_tag['href'] ) ) {
			if ( $fr_tag['is_dismissable'] ) {
				$tag_classes[] = 'fr-tag--dismiss';
			}

			the_link(
				[
					'href'  => $fr_tag['href'],
					'class' => implode( ' ', array_map( 'sanitize_html_class', $tag_classes ) ),
					'title' => $fr_tag['title'],
				],
				[
					'content' => $fr_tag['label']
				]
			);

		} else {
			the_text(
				$fr_tag['label'],
				[
					'before' => '<li><p class="' . implode( ' ', array_map( 'sanitize_html_class', $tag_classes ) ) . '">',
					'after'  => '</p></li>',
				]
			);
		}
	endforeach;
	?>
</ul>
