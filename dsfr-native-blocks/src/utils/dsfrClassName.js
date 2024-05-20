export default function (blockProps, searchSuffix, replacement) {
	blockProps.className = blockProps.className.replace(
		'wp-block-dsfr-' + searchSuffix,
		typeof replacement !== 'undefined' ? replacement : searchSuffix
	);
	blockProps.className = blockProps.className.replace('wp-block', '');
}
