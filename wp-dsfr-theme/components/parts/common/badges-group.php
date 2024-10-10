<?php
/**
 * COMPONENT - FR BADGES GROUP
 *
 * @param array $args = [
 *    'badges' => [
 *        [
 *            'type'     => '' | 'success' | 'error' | 'info' | 'warning' | 'new'
 *            'size'     => '' | 'sm'
 *            'color'    => 'green-menthe' | ... (priority goes to type)
 *            'has_icon' => bool
 *        ],
 *        ...
 *    ]
 * ]
 *
 */
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

if ( empty( $args['badges'] ) ) {
	return;
}
?>
<ul class="fr-badges-group">
	<?php
	foreach ( $args['badges'] as $fr_badge ) :
		$badge_classes = [ 'fr-badge' ];

		if ( ! empty( $fr_badge['type'] ) ) {
			$badge_classes[] = 'fr-badge--' . $fr_badge['type'];
		} else if ( ! empty( $fr_tag['color'] ) ) {
			$badge_classes[] = 'fr-badge--' . $fr_tag['color'];
		}

		if ( ! empty( $fr_tag['size'] ) ) {
			$badge_classes[] = 'fr-badge--' . $fr_tag['size'];
		}

		if ( false === $fr_badge['has_icon'] ) {
			$badge_classes[] = 'fr-badge--no-icon';
		}

		the_text(
			$fr_badge['label'],
			[
				'before' => '<li><p class="' . implode( ' ', array_map( 'sanitize_html_class', $badge_classes ) ) . '">',
				'after'  => '</p></li>',
			]
		);
	endforeach;
	?>
</ul>
