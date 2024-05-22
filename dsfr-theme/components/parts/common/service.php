<?php
// SERVICE
use function Beapi\Theme\Dsfr\Helpers\Formatting\Text\the_text;

$service_class = ! empty( $args['class'] ) ? $args['class'] : '';
?>
<div class="<?php echo esc_attr( $service_class ); ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Accueil -  %s', 'dsfr-theme' ), get_bloginfo( 'name' ) ) ); ?>">
		<p class="<?php echo esc_attr( $service_class ); ?>-title">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</p>
	</a>
	<?php
	the_text(
		get_bloginfo( 'description' ),
		[
			'before' => sprintf( '<p class="%s-tagline">', esc_attr( $service_class ) ),
			'after'  => '</p>',
		]
	);
	?>
</div>