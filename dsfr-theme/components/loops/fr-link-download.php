<?php
// FR LINK DOWNLOAD

if ( empty( $args['file_id'] ) || empty( $args['content'] ) ) {
	return;
}

$file_href = wp_get_attachment_url( $args['file_id'] );

if ( empty( $file_href ) ) {
	return;
}

$file_path = get_attached_file( $args['file_id'] );
$file_size = size_format( wp_filesize( $file_path ) );
$file_type = wp_check_filetype( $file_path );

?>
<a class="fr-link--download fr-link" download="true" href="<?php echo esc_url( $file_href ); ?>">
	<?php echo esc_html( $args['content'] ); ?> <span class="fr-link__detail"><?php echo esc_html( strtoupper( $file_type['ext'] ) ); ?> – <?php echo esc_html( $file_size ); ?></span>
</a>
