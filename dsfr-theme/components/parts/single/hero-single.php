<?php
// HERO SINGLE
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_array;
use function Beapi\Theme\Dsfr\Helpers\Misc\convert_terms_to_tags_group_arg;

$post_tags = Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_name( get_the_ID(), 'post_tag' );
?>
<header class="hero hero--thumbnail-centered">
	<div class="fr-container">
		<div class="hero__content">
			<?php
			get_template_part(
				'components/parts/common/tags-group',
				'',
				[
					'tags' => convert_terms_to_tags_group_arg( get_the_terms_array( get_the_ID(), 'category' ) ),
				]
			);

			the_title( '<h1 class="hero__title">', '</h1>' );
			?>
			<div class="hero__metas">
				<p class="hero__date"><?php printf(
					/* translators: date de publication */
					esc_html__( 'Publié le %s', 'dsfr-theme' ), '<time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . get_the_date( __( 'd F Y', 'dsfr-theme' ) ) . '</time>' );
				?></p>
				<?php
				if ( ! empty( $post_tags ) ) :
					?>
					<ul class="hero__tags">
						<?php
						foreach ( $post_tags as $post_tag ) :
							the_text(
								$post_tag,
								[
									'before' => '<li>',
									'after'  => '</li>',
								]
							);
						endforeach;
						?>
					</ul>
					<?php
				endif;
				?>
			</div>
			<?php
			if ( has_excerpt() ) :
				the_text(
					get_the_excerpt(),
					[
						'before' => '<p class="hero__excerpt has-lg-font-size">',
						'after'  => '</p>',
					]
				);
			endif;

			get_template_part( 'components/parts/common/share', '', [ 'title' => __( 'Partager l\'actualité', 'dsfr-theme' ) ] );
			?>
		</div>
		<?php
		get_template_part( 'components/parts/common/hero-thumbnail' );
		?>
	</div>
</header>