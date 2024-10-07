<?php
// IMG OR SVG

$attachment_id = ! empty( $args['attachment_id'] ) ? $args['attachment_id'] : 0;
$size          = ! empty( $args['size'] ) ? $args['size'] : '';
$class         = ! empty( $args['class'] ) ? $args['class'] : '';

$file_path = get_attached_file( $attachment_id );

if ( empty( $file_path ) ) {
	return;
}

$file_type = wp_check_filetype( $file_path );

if ( 'svg' !== $file_type['ext'] ) :
	echo wp_get_attachment_image( $attachment_id, $size, false, [ 'class' => $class ] );
else :
	$svg = file_get_contents( $file_path ); // phpcs:ignore

	// add role="img" for a11y
	if ( ! str_contains( $svg, ' role="img"' ) ) {
		$svg = str_replace( '<svg ', '<svg role="img" aria-hidden="true" ', $svg );
	}

	echo $svg; // phpcs:ignore
endif;
