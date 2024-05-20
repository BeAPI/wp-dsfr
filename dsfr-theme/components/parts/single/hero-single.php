<?php
// HERO SINGLE
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

$post_tags = Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_terms_name( get_the_ID(), 'post_tag' );
?>
<header class="hero hero--thumbnail-centered">
	<div class="fr-container">
		<div class="hero__content">
			<?php
			get_template_part( 'components/parts/single/hero-single-tags-group' );

			the_title( '<h1 class="hero__title">', '</h1>' );
			?>
			<div class="hero__metas">
				<p class="hero__date">Publié le <time datetime="<?php echo esc_attr( get_the_date( 'd-m-Y' ) ); ?>"><?php the_date( 'd F Y' ); ?></time></p>
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

			get_template_part( 'components/parts/common/share', '', [ 'title' => 'Partager l\'actualité' ] );
			?>
		</div>
		<?php
		get_template_part( 'components/parts/common/hero-thumbnail' );
		?>
	</div>
</header>