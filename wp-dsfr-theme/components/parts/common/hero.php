<?php
/**
 * COMPONENT - CARD POST
 *
 * @param array $args = [
 *     'title' => ''
 * ]
 *
 */

$title = ! empty( $args['title'] ) ? $args['title'] : get_the_title( get_queried_object_id() );
?>
<header class="hero">
	<div class="fr-container">
		<h1 class="hero__title"><?php echo wp_kses_post( $title ); ?></h1>
	</div>
</header>
