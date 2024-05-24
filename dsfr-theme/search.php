<?php
get_header();
?>
<div class="fr-my-7w fr-mt-md-12w fr-mb-md-10w">
	<header class="hero">
		<div class="fr-container">
			<h1 class="hero__title">
				<?php
				echo esc_html(
					sprintf(
						/* translators: terme(s) recherché(s) */
						__( 'Résultat(s) de recherche pour "%s"', 'dsfr-theme' ),
						get_search_query( false )
					)
				);
				?>
			</h1>
		</div>
	</header>
	<div class="fr-container">
		<div class="search__columns">
			<div>
				<?php echo get_search_form(); ?>
			</div>
			<div>
				<div class="grid grid--fr-card-search" data-grid-size="1">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'components/loops/card-search', '', [ 'heading_level' => 2 ] );
						endwhile;
					endif;
					?>
				</div>
				<?php get_template_part( 'components/parts/common/pagination' ); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
