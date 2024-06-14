<?php
get_template_part(
	'components/loops/fr-card',
	'',
	[
		'is_horizontal'      => true,
		'tags'               => Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_name( get_the_ID(), 'category' ),
		'end_detail_content' => '<p class="fr-card__detail">' . get_the_date() . '</p>',
		'heading_level'      => $args['heading_level'],
	]
);
