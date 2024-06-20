<?php
$active_term = null;

if ( is_tag() || is_category() ) {
	$active_term = get_queried_object();
}

get_header();
?>
<div class="fr-my-7w fr-mt-md-12w fr-mb-md-10w">
	<?php
	get_template_part( 'components/parts/common/hero', '', [ 'title' => get_the_archive_title() ] );
	?>
	<div class="fr-container">
		<?php
		if ( null !== $active_term ) {
			get_template_part(
				'components/parts/common/tags-group',
				'',
				[
					'tags' => Beapi\Theme\Dsfr\Helpers\Misc\get_archive_tags_group_arg( $active_term->taxonomy, $active_term ),
				]
			);
		}
		?>
		<div class="grid grid--fr-card-post" data-grid-size="3">
			<?php
			if ( have_posts() ) :

				$i = 0;

				while ( have_posts() ) :
					the_post();
					get_template_part( 'components/loops/card-post', 0 !== $i++ ? '' : 'highlight', [ 'heading_level' => 2 ] );
				endwhile;
			endif;
			?>
		</div>

		<?php get_template_part( 'components/parts/common/pagination' ); ?>
	</div>
</div>
<?php
get_footer();