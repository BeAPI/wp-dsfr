<?php
// ----
// from wp-include/general-template.php function paginate_links
// ----
global $wp_query, $wp_rewrite;

// Setting up default values based on the current URL.
$pagenum_link = html_entity_decode( get_pagenum_link() );
$url_parts    = explode( '?', $pagenum_link );

// Get max pages and current page out of the current query, if available.
$total_pages  = isset( $wp_query->max_num_pages ) ? (int) $wp_query->max_num_pages : 1;
$current_page = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;

if ( 1 >= $total_pages ) {
	return;
}

// Append the format placeholder to the base URL.
$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

// URL base depends on permalink settings.
$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

// Merge additional query vars found in the original URL into 'add_args' array.
if ( isset( $url_parts[1] ) ) {
	// Find the format argument.
	$format_array = explode( '?', str_replace( '%_%', $format, $pagenum_link ) );
	$format_query = isset( $format_array[1] ) ? $format_array[1] : '';
	wp_parse_str( $format_query, $format_args );

	// Find the query args of the requested URL.
	wp_parse_str( $url_parts[1], $url_query_args );

	// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
	foreach ( $format_args as $format_arg => $format_arg_value ) {
		unset( $url_query_args[ $format_arg ] );
	}

	$url_query_args = urlencode_deep( $url_query_args );
}

// ----
// build pagination
// ----
$offset     = 2; // max number of item to display before and after current page (page or ellipse)
$start_page = max( min( $current_page - $offset, $total_pages - $offset * 2 ), 1 );
$end_page   = min( $start_page + $offset * 2, $total_pages );
$items      = [];

// first page link
$items[] = [
	'page_number' => 1,
	'class'       => 'fr-pagination__link fr-pagination__link--first',
	'content'     => 'Première page',
];

// previous page link
$items[] = [
	'page_number' => max( $current_page - 1, 1 ),
	'class'       => 'fr-pagination__link fr-pagination__link--prev fr-pagination__link--lg-label',
	'content'     => 'Page précédente',
];

// intermediate link
for ( $i = $start_page; $i <= $end_page; $i++ ) {
	$items[] = [
		'page_number' => $i,
		'class'       => 'fr-pagination__link',
		'title'       => 'Page ' . $i,
		'content'     => $i,
	];
}

// next link
$items[] = [
	'page_number' => min( $current_page + 1, $total_pages ),
	'class'       => 'fr-pagination__link fr-pagination__link--next fr-pagination__link--lg-label',
	'content'     => 'Page suivante',
];

// last link
$items[] = [
	'page_number' => $total_pages,
	'class'       => 'fr-pagination__link fr-pagination__link--last',
	'content'     => 'Dernière page',
];

// if first intermediate link isn't page 1 link
// ellipse will be inserted
if ( 1 < $start_page ) {
	$items[2] = null;
}

$length = count( $items );

// if last intermediate link isn't last page link
// ellipse will be inserted
if ( $total_pages > $end_page ) {
	$items[ $length - 3 ] = null;
}

$output = '';

foreach ( $items as $i => $item ) {
	$output .= '<li>';

	if ( ! empty( $item ) ) {
		$page_number          = (int) $item['page_number'];
		$is_current_page_link = $page_number === $current_page;
		$link_title           = ! empty( $item['title'] ) ? ' title="' . $item['title'] . '"' : '';
		$aria_disabled        = $is_current_page_link ? ' aria-disabled="true"' : '';
		$aria_current         = 1 < $i && $length - 2 > $i && $is_current_page_link ? ' aria-current="page"' : '';
		$class                = ' class="' . $item['class'] . '"';

		$href = str_replace( '%_%', $format, $pagenum_link );
		$href = str_replace( '%#%', $page_number, $href );

		if ( $url_query_args ) {
			$href = add_query_arg( $url_query_args, $href );
		}

		$href = ! $is_current_page_link ? ' href="' . $href . '"' : '';

		$output .= '<a' . $href . $class . $link_title . $aria_disabled . $aria_current . '>' . $item['content'] . '</a>';
	} else {
		$output .= '<a class="fr-pagination__link fr-displayed-lg" aria-disabled="true">...</a>';
	}

	$output .= '</li>';
}
?>
<nav role="navigation" class="fr-pagination" aria-label="Pagination">
	<ul class="fr-pagination__list">
		<?php echo $output; // phpcs:ignore ?>
	</ul>
</nav>
