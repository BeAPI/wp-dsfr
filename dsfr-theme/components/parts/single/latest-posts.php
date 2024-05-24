<?php
// LATEST POST
use function Beapi\Theme\Dsfr\Helpers\Formatting\Link\the_link;

$posts_query = new WP_Query(
	[
		'post_type'      => 'post',
		'posts_per_page' => 4,
		'post__not_in'   => [ get_the_ID() ],
		'no_found_rows'  => true,
	]
);

if ( ! $posts_query->have_posts() ) {
	return;
}
?>
<section class="latest-posts">
	<div class="fr-container">
		<h2 class="latest-posts__title"><?php esc_html_e( 'Nos autres actualités', 'dsfr-theme' ); ?></h2>
		<?php
		the_link(
			[
				'href'  => get_post_type_archive_link( 'post' ),
				'class' => 'fr-link fr-icon-arrow-right-line fr-link--icon-right',
			],
			[
				'content' => __( 'Voir toute l’actualité', 'dsfr-theme' ),
				'before'  => '<p class="latest-posts__link">',
				'after'   => '</p>',
			]
		);
		?>
		<div class="latest-posts__grid">
			<?php
			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();
				get_template_part( 'components/loops/card-post', '', [ 'heading_level' => 3 ] );
			endwhile;

			wp_reset_postdata();
			?>
		</div>
	</div>
</section>