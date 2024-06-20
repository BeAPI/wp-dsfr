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
 * Create array of tag params
 * See : components/parts/common/tags-group.php
 * @usage Beapi\Theme\Dsfr\Helpers\Misc\get_tags_group_arg( $terms );
 *
 * @param array  $terms = [ $term_name, $wp_term, $partial_param, ... ]
 * @param string $size
 * @param string $color
 *
 * @return array
 */
function get_tags_group_arg( array $terms, string $size = '', string $color = '' ): array {
	$items = [];

	foreach ( $terms as $term ) {
		$params = [
			'is_dismissable' => false,
			'label'          => '',
			'href'           => '',
			'title'          => '',
			'color'          => $color,
			'size'           => $size,
		];

		if ( is_string( $term ) ) {
			$params['label'] = $term;
		} else if ( $term instanceof \WP_Term ) {
			$params['label'] = $term->name;
			$params['href']  = get_term_link( $term );
		} else if ( is_aray( $term ) ) {
			$params = array_merge( $params, $term );
		}

		$items[] = $params;
	}

	return $items;
}

/**
 * Get archive tags group arg
 * @usage Beapi\Theme\Dsfr\Helpers\Misc\get_archive_tags_group_arg( 'category' );
 *
 * @param string        $taxonomy.
 * @param \WP_Term|null $active_term
 * @param string        $color
 *
 * @return array
 */
function get_archive_tags_group_arg( string $taxonomy, ?\WP_Term $active_term = null, string $color = '' ): array {
	$terms = get_terms( $taxonomy );

	if ( false === $terms || is_wp_error( $terms ) ) {
		return [];
	}

	$tags_group_arg = get_tags_group_arg( $terms, $color );

	if ( $active_term instanceof \WP_Term ) {
		$page_for_posts_id = get_option( 'page_for_posts' );

		foreach ( $terms as $i => $term ) {
			if ( $active_term->slug !== $term->slug ) {
				continue;
			}

			if ( ! empty( $page_for_posts_id ) ) {
				$tags_group_arg[$i]['href'] = get_permalink( $page_for_posts_id );
			}

			$tags_group_arg[$i]['title']          = esc_attr__( 'Retourner à la page des actualités', 'dsfr-theme' );
			$tags_group_arg[$i]['is_dismissable'] = true; 

			break;
		}
	}

	return $tags_group_arg;
}
