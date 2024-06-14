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

/**
 * Convert terms to tags group arg
 * @usage Beapi\Theme\Dsfr\Helpers\Misc\get_archive_tags_group_arg( $terms );
 *
 * @param array  $terms.
 * @param string $color
 *
 * @return array
 */
function convert_terms_to_tags_group_arg( array $terms, string $color = '' ): array {
	$items = [];

	foreach ( $terms as $term ) {
		$items[] = [
			'label' => $term->name,
			'href'  => get_term_link( $term ),
			'title' => '',
			'color' => $color
		];
	}

	return $items;
}

/**
 * Get archive tags group arg
 * @usage Beapi\Theme\Dsfr\Helpers\Misc\get_archive_tags_group_arg( 'category' );
 *
 * @param string $taxonomy.
 * @param string $color
 *
 * @return array
 */
function get_archive_tags_group_arg( string $taxonomy, string $color = '' ): array {
	if ( ! is_archive() && ! is_home() ) {
		return [];
	}

	$terms = get_terms( is_tag() ? 'post_tag' : 'category' );

	if ( false === $terms || is_wp_error( $terms ) ) {
		return [];
	}

	$tags_group_arg   = convert_terms_to_tags_group_arg( $terms, $color );
	$active_term_slug = is_tag() ? get_query_var( 'tag' ) : ( is_category() ? get_query_var( 'category_name' ) : null );

	if ( $active_term_slug ) {
		foreach ( $terms as $i => $term ) {
			if ( $active_term_slug !== $term->slug ) {
				continue;
			}

			$tags_group_arg[$i]['href']           = get_permalink( get_option( 'page_for_posts' ) );
			$tags_group_arg[$i]['title']          = esc_attr__( 'Retourner à la page des actualités', 'dsfr-theme' );
			$tags_group_arg[$i]['is_dismissable'] = true; 

			break;
		}
	}

	return $tags_group_arg;
}
