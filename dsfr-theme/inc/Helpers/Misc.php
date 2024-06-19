<?php
namespace Beapi\Theme\Dsfr\Helpers\Misc;

/**
 * Get file infos
 *
 * @param int $file_id
 *
 * @return array $file_infos
 */
function get_file_infos( int $file_id ): array {
	$file_href = wp_get_attachment_url( $file_id );

	if ( empty( $file_href ) ) {
		return [
			'href' => '',
			'path' => '',
			'size' => '',
			'ext'  => '',
		];
	}

	$file_path = get_attached_file( $file_id );

	return [
		'href' => $file_href,
		'path' => $file_path,
		'size' => size_format( wp_filesize( $file_path ) ),
		'ext'  => wp_check_filetype( $file_path )['ext'],
	];
}

/**
 * Get file details
 *
 * @param array $file_infos (see function below)
 *
 * @return string $file_detail
 */
function get_file_detail( array $file_infos ): string {
	$details = [];

	if ( ! empty( $file_infos['ext'] ) ) {
		$details[] = strtoupper( $file_infos['ext'] );
	}
	
	if ( ! empty( $file_infos['size'] ) ) {
		$details[] = $file_infos['size'];
	}

	return implode( ' – ', $details );
}
