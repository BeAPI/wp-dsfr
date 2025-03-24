<?php
// FR CARD
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

// ----
// args
// ----
$is_card_horizontal      = isset( $args['is_horizontal'] ) ? $args['is_horizontal'] : false;
$is_thumbnail_hidden     = isset( $args['is_thumbnail_hidden'] ) ? $args['is_thumbnail_hidden'] : false;
$card_title              = ! empty( $args['title'] ) ? $args['title'] : get_the_title();
$card_href               = ! empty( $args['href'] ) ? $args['href'] : get_permalink();
$card_target             = ! empty( $args['target'] ) ? $args['target'] : '';
$card_description        = ! empty( $args['description'] ) ? $args['description'] : '';
$card_tags               = ! empty( $args['tags'] ) ? $args['tags'] : [];
$card_start_badges       = ! empty( $args['start_badges'] ) ? $args['start_badges'] : [];
$card_end_detail_content = ! empty( $args['end_detail_content'] ) ? $args['end_detail_content'] : '';
$card_heading_level      = ! empty( $args['heading_level'] ) ? $args['heading_level'] : 3;
$card_thumbnail_id       = ! empty( $args['thumbnail_id'] ) ? $args['thumbnail_id'] : get_post_thumbnail_id();
$card_footer             = ! empty( $args['footer'] ) ? $args['footer'] : '';

// ----
// misc
// ----
$card_classes = [ 'fr-card' ];

if ( empty( $card_footer ) ) {
	$card_classes[] = 'fr-enlarge-link';
}

if ( $is_card_horizontal ) {
	$card_classes[] = 'fr-card--horizontal';
}

?>
<div class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $card_classes ) ); ?>" data-post-type="<?php echo esc_attr( get_post_type() ); ?>">
	<div class="fr-card__body">
		<div class="fr-card__content">
			<?php
			the_link(
				[
					'href'   => $card_href,
					'target' => $card_target,
				],
				[
					'content' => $card_title,
					'before'  => sprintf( '<h%s class="fr-card__title">', $card_heading_level ),
					'after'   => sprintf( '</h%s>', $card_heading_level ),
				]
			);

			the_text(
				$card_description,
				[
					'before' => '<p class="fr-card__desc">',
					'after'  => '</p>',
				]
			);

			if ( ! empty( $card_tags ) || ! empty( $card_start_badges ) ) :
				?>
				<div class="fr-card__start">
					<?php
					get_template_part( 'components/parts/common/tags-group', '', [ 'tags' => $card_tags ] );
					get_template_part( 'components/parts/common/badges-group', '', [ 'badges' => $card_start_badges ] );
					?>
				</div>
				<?php
			endif;

			if ( ! empty( $card_end_detail_content ) ) :
				?>
				<div class="fr-card__end">
					<?php echo wp_kses_post( $card_end_detail_content ); ?>
				</div>
				<?php
			endif;

			if ( ! empty( $card_footer ) ) :
				?>
				<div class="fr-card__footer">
					<?php echo wp_kses_post( $card_footer ); ?>
				</div>
				<?php
			endif;
			?>
		</div>
	</div>
	<?php
	if ( ! $is_thumbnail_hidden && ! empty( $card_thumbnail_id ) ) :
		?>
		<div class="fr-card__header">
			<div class="fr-card__img">
				<?php
				get_template_part(
					'components/parts/common/img-or-svg',
					'',
					[
						'attachment_id' => $card_thumbnail_id,
						'size'          => 'large',
						'class'         => 'fr-responsive-img',
					]
				);
				?>
			</div>
		</div>
		<?php
	endif;
	?>
</div>