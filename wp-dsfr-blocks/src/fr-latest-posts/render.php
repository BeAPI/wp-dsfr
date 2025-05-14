<?php
$posts_query = new WP_Query(
	[
		'category_name'  => 'actualites',
		'posts_per_page' => 4,
		'post_status'    => 'publish',
	]
);

if ( ! $posts_query->have_posts() ) {
	return;
}
?>
<section class="latest-posts" style="max-width: 78rem;">
	<div class="fr-container">
		<div class="grid grid--fr-card-post" data-grid-size="3">
			<?php
			$i = 0;
			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();
				get_template_part( 'components/loops/card-post', 0 !== $i++ ? '' : 'highlight', [ 'heading_level' => 2 ] );
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
