<?php
/**
 * COMPONENT - FR LINK DOWNLOAD
 * 
 * $args array keys :
 * 	
 * @param int    $file_id
 * @param string $content
 * @param string $target
 * 
 */
use function \Beapi\Theme\Dsfr\Helpers\Misc\get_file_detail;
use function \Beapi\Theme\Dsfr\Helpers\Misc\get_file_infos;

if ( empty( $args['file_id'] ) || empty( $args['content'] ) ) {
	return;
}

$target     = ! empty( $args['target'] ) ? $args['target'] : '_self';
$file_infos = \Beapi\Theme\Dsfr\Helpers\Misc\get_file_infos( $args['file_id'] );

if ( empty( $file_infos['href'] ) ) {
	return;
}
?>
<a class="fr-link--download fr-link" download="true" href="<?php echo esc_url( $file_infos['href'] ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php echo esc_html( $args['content'] ); ?> <span class="fr-link__detail"><?php echo esc_html( get_file_detail( $file_infos ) ); ?></span>
</a>
