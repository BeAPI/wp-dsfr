<?php
get_template_part(
	'components/parts/common/tags-group',
	'',
	[
		'tags' => Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_terms_name( get_the_ID(), 'category' ),
	]
);
