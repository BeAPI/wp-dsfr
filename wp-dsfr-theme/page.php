<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<div class="fr-my-7w fr-mt-md-12w fr-mb-md-10w">
			<?php get_template_part( 'components/parts/common/hero' ); ?>
			<div class="blocks-container">
				<?php the_content(); ?>
			</div>
			<?php get_template_part( 'components/parts/common/page-top' ); ?>
		</div>
		<?php
	endwhile;
endif;

get_footer();
