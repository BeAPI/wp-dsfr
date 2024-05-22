<?php
// SEARCHFORM
$id_prefix  = str_replace( '.', '-', uniqid( 'search-', true ) );
$input_id   = $id_prefix . '-input';
$message_id = $id_prefix . '-messages';
?>
<form class="fr-search-bar" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="fr-label" for="<?php echo esc_attr( $input_id ); ?>">
		<?php esc_html_e( 'Rechercher', 'dsfr-theme' ); ?>
	</label>
	<input
		class="fr-input"
		aria-describedby="<?php echo esc_attr( $message_id ); ?>"
		placeholder="<?php esc_attr_e( 'Rechercher', 'dsfr-theme' ); ?>"
		id="<?php echo esc_attr( $input_id ); ?>"
		type="search"
		name="s"
		value="<?php echo esc_attr( get_query_var( 's' ) ); ?>">
	<div class="fr-messages-group" id="<?php echo esc_attr( $message_id ); ?>" aria-live="assertive">
	</div>
	<button class="fr-btn" title="<?php esc_attr_e( 'Rechercher', 'dsfr-theme' ); ?>">
	<?php esc_html_e( 'Rechercher', 'dsfr-theme' ); ?>
	</button>
</form>
