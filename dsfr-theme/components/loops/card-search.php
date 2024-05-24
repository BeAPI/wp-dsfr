<?php
get_template_part(
	'components/loops/fr-card',
	'',
	[
		'is_thumbnail_hidden' => true,
		'is_horizontal'       => true,
		'tags'                => [ get_post_type_object( get_post_type() )->label ],
		'end_detail_content'  => sprintf(
			/* translators: date de publication */
			'<p class="fr-card__detail">' . esc_html__( 'Publié le %s', 'dsfr-theme' ) . '</p>',
			get_the_date()
		),
		'heading_level'       => $args['heading_level'],
	]
);
