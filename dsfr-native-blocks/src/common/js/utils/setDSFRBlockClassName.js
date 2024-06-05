export default function (blockProps, searchSuffix, replacement) {
	if (!blockProps.className) {
		blockProps.className = '';
	}

	blockProps.className = blockProps.className.replace(
		'wp-block-dsfr-' + searchSuffix,
		typeof replacement !== 'undefined' ? replacement : searchSuffix
	);

	blockProps.className = blockProps.className.replace('wp-block', '');
}
