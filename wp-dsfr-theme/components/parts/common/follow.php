<?php
// FOOTER SSA FOLLOW
$networks     = [];
$follow_title = get_theme_mod( 'fr_footer_follow_title' );

foreach (
	[
		'Twitter X',
		'Linkedin',
		'Facebook',
		'Instagram',
		'Youtube',
	]
	as
	$network
) {
	$field = get_theme_mod( 'fr_footer_url_' . str_replace( ' ', '_', strtolower( $network ) ) );

	if ( ! empty( $field ) ) {
		$networks[] = [
			'name' => $network,
			'url'  => $field,
		];
	}
}

if ( empty( $follow_title ) && empty( $networks ) ) {
	return;
}
?>
<div class="fr-follow">
	<div class="fr-container">
		<div class="fr-grid-row">
			<div class="fr-col-12">
				<div class="fr-follow__social">
					<?php
					if ( ! empty( $follow_title ) ) :
						?>
						<p class="fr-h5"><?php echo nl2br( esc_html( $follow_title ) ); ?>
						<?php
					endif;
					?>
					<ul class="fr-btns-group">
						<?php
						foreach ( $networks as $entry ) :
							?>
							<li>
								<a
									class="fr-btn fr-btn--<?php echo esc_attr( str_replace( ' ', '-', strtolower( $entry['name'] ) ) ); ?>"
									href="<?php echo esc_url( $entry['url'] ); ?>"
									target="_blank"
									rel="nofollow"><?php echo esc_html( $entry['name'] ); ?></a>
							</li>
							<?php
						endforeach;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>