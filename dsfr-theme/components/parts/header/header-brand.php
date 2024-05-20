<?php
// HEADER BRAND
$official_title = get_theme_mod( 'fr_logo_official_title' );
?>
<div class="fr-header__brand fr-enlarge-link">
	<div class="fr-header__brand-top">
		<?php
		if ( ! empty( $official_title ) ) :
			?>
			<div class="fr-header__logo">
				<p class="fr-logo">
					<?php echo nl2br( esc_html( $official_title ) ); ?>
				</p>
			</div>
			<?php
		endif;

		get_template_part( 'components/parts/common/operator', '', [ 'class' => 'fr-header__operator' ] );
		get_template_part( 'components/parts/header/header-navbar' );
		?>
	</div>
	<?php
	get_template_part( 'components/parts/common/service', '', [ 'class' => 'fr-header__service' ] );
	?>
</div>