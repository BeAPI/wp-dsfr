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
			'type' => '',
		];
	}

	$file_path = get_attached_file( $file_id );

	return [
		'href' => $file_href,
		'path' => $file_path,
		'size' => size_format( wp_filesize( $file_path ) ),
		'type' => wp_check_filetype( $file_path ),
	];
}