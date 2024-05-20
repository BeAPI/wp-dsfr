<?php
// FR TILE
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

// ----
// args
// ----
$is_tile_horizontal = isset( $args['is_horizontal'] ) ? $args['is_horizontal'] : false;
$has_icon           = isset( $args['has_icon'] ) ? $args['has_icon'] : true;
$has_href           = ! empty( $args['href'] ) && '#' !== $args['href'];
$tile_vertical_at   = ! empty( $args['vertical_at'] ) ? $args['vertical_at'] : '';
$tile_href          = $has_href ? $args['href'] : '';
$tile_target        = ! empty( $args['target'] ) ? $args['target'] : '';
$tile_title         = ! empty( $args['title'] ) ? $args['title'] : '';
$tile_heading_level = ! empty( $args['heading_level'] ) ? $args['heading_level'] : '3';
$tile_description   = ! empty( $args['description'] ) ? $args['description'] : '';
$tile_detail        = ! empty( $args['detail'] ) ? $args['detail'] : '';
$tile_badge         = ! empty( $args['badge'] ) ? $args['badge'] : '';
$tile_badge_color   = ! empty( $args['badge_color_name'] ) ? ' fr-badge--' . $args['badge_color_name'] : '';
$tile_image_id      = ! empty( $args['image_id'] ) ? $args['image_id'] : 0;

// ----
// misc
// ----
$tile_classes = [ 'fr-tile' ];

if ( $has_href ) {
	$tile_classes[] = 'fr-enlarge-link';
}

if ( $is_tile_horizontal ) {
	$tile_classes[] = 'fr-tile--horizontal';
}

if ( $is_tile_horizontal && in_array( $tile_vertical_at, [ 'md', 'lg' ], true ) ) {
	$tile_classes[] = 'fr-tile--vertical@' . $tile_vertical_at;
}

if ( ! $has_icon ) {
	$tile_classes[] = 'fr-tile--no-icon';
}
?>
<div class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $tile_classes ) ); ?>">
	<div class="fr-tile__body">
		<div class="fr-tile__content">
			<?php
			if ( $has_href ) :
				the_link(
					[
						'href'   => $tile_href,
						'target' => $tile_target,
					],
					[
						'content' => $tile_title,
						'before'  => sprintf( '<h%s class="fr-tile__title">', $tile_heading_level ),
						'after'   => sprintf( '</h%s>', $tile_heading_level ),
					]
				);
			else :
				the_text(
					$tile_title,
					[
						'before' => sprintf( '<h%s class="fr-tile__title">', $tile_heading_level ),
						'after'  => sprintf( '</h%s>', $tile_heading_level ),
					]
				);
			endif;

			the_text(
				$tile_description,
				[
					'before' => '<p class="fr-tile__desc">',
					'after'  => '</p>',
				]
			);

			the_text(
				$tile_detail,
				[
					'before' => '<p class="fr-tile__detail">',
					'after'  => '</p>',
				]
			);

			the_text(
				$tile_badge,
				[
					'before' => '<div class="fr-tile__start"><p class="fr-badge fr-badge--sm' . $tile_badge_color . '">',
					'after'  => '</p></div>',
				]
			);
			?>
		</div>
	</div>
	<?php
	if ( ! empty( $tile_image_id ) ) :
		?>
		<div class="fr-tile__header">
			<div class="fr-tile__pictogram">
				<?php
				get_template_part(
					'components/parts/common/img-or-svg',
					'',
					[
						'attachment_id' => $tile_image_id,
						'size'          => 'thumbnail',
						'class'         => 'fr-ratio-1x1',
					]
				);
				?>
			</div>
		</div>
		<?php
	endif;
	?>
</div>
