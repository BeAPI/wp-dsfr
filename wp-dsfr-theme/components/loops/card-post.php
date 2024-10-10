<?php
/**
 * COMPONENT - CARD POST
 *
 * @param array $args = [
 *     'heading_level' => ''
 * ]
 *
 */

use function Beapi\Theme\Dsfr\Helpers\Misc\get_tags_group_arg;
use function Beapi\Theme\Dsfr\Helpers\Formatting\Term\get_the_terms_name;

get_template_part(
	'components/loops/fr-card',
	'',
	[
		'tags'               => get_tags_group_arg( get_the_terms_name( get_the_ID(), 'category' ) ),
		'end_detail_content' => '<p class="fr-card__detail">' . get_the_date() . '</p>',
		'heading_level'      => $args['heading_level'],
	]
);
