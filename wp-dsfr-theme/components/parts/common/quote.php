<?php
// FR QUOTE
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

$quote_classes  = [ 'fr-quote' ];
$quote_color    = ! empty( $args['color'] ) ? $args['color'] : '';
$quote_cite     = ! empty( $args['cite'] ) ? ' cite="' . esc_attr( $args['cite'] ) . '"' : '';
$quote_quote    = ! empty( $args['quote'] ) ? $args['quote'] : '';
$quote_author   = ! empty( $args['author'] ) ? $args['author'] : '';
$quote_sources  = ! empty( $args['sources'] ) ? $args['sources'] : [];
$quote_image_id = ! empty( $args['image_id'] ) ? $args['image_id'] : 0;

if ( ! empty( $quote_image_id ) ) {
	$quote_classes[] = 'fr-quote--column';
}

if ( ! empty( $quote_color ) ) {
	$quote_classes[] = 'fr-quote--' . $quote_color;
}
?>
<figure class="<?php echo implode( ' ', array_map( 'sanitize_html_class', $quote_classes ) ); ?>">
	<blockquote<?php echo $quote_cite; // phpcs:ignore ?>>
		<?php
		the_text(
			strip_tags( $quote_quote, '<br>' ),
			[
				'before' => '<p>',
				'after'  => '</p>',
				'escape' => 'wp_kses_post',
			]
		);
		?>
	</blockquote>
	<figcaption>
		<?php
		the_text(
			$quote_author,
			[
				'before' => '<p class="fr-quote__author">',
				'after'  => '</p>',
			]
		);

		if ( ! empty( $quote_sources ) ) :
			?>
			<ul class="fr-quote__source">
				<?php
				foreach ( $quote_sources as $source ) :
					the_text(
						strip_tags( $source, [ 'a', 'cite' ] ),
						[
							'before' => '<li>',
							'after'  => '</li>',
							'escape' => 'wp_kses_post',
						]
					);
				endforeach;
				?>
			</ul>
			<?php
		endif;

		if ( ! empty( $quote_image_id ) ) :
			?>
			<div class="fr-quote__image">
				<?php echo wp_get_attachment_image( $quote_image_id, 'medium', false, [ 'class' => 'fr-responsive-img' ] ); ?>
			</div>
			<?php
		endif;
		?>
	</figcaption>
</figure>
