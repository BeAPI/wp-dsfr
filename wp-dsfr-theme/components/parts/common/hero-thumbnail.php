<?php
// HERO SINGLE THUMBNAIL
if ( ! has_post_thumbnail() ) {
	return;
}

// ----
// args
// ----
$thumbnail_class = ! empty( $args['thumbnail_class'] ) ? $args['thumbnail_class'] : 'fr-ratio-16x9';

// ----
// misc
// ----
$caption = get_the_post_thumbnail_caption();
?>
<figure class="hero__thumbnail">
	<div class="hero__thumbnail-image-wrapper">
		<?php
		the_post_thumbnail( 'large', [ 'class' => esc_attr( $thumbnail_class ) ] );
		?>
	</div>
	<?php
	if ( ! empty( $caption ) ) :
		?>
		<figcaption><?php echo esc_html( $caption ); ?></figcaption>
		<?php
	endif;
	?>
</figure>
