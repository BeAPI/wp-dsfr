<?php
// FR SHARE
$share_title = ! empty( $args['title'] ) ? $args['title'] : __( 'Partager la page', 'wp-dsfr-theme' );

$queried_object_id = get_queried_object_id();
$url               = rawurlencode( get_permalink( $queried_object_id ) );
$page_title        = rawurlencode( get_the_title( $queried_object_id ) );
?>
<div class="fr-share">
	<p class="fr-share__title"><?php echo esc_html( $share_title ); ?></p>
	<ul class="fr-btns-group">
		<li>
			<a 
				class="fr-btn--facebook fr-btn"
				title="<?php esc_attr_e( 'Partager sur Facebook - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				aria-label="<?php esc_attr_e( 'Partager sur Facebook - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				href="<?php echo esc_url( sprintf( 'https://www.facebook.com/sharer.php?u=%s', $url ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur Facebook','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=450'); event.preventDefault();"
				><?php esc_html_e( 'Partager sur Facebook', 'wp-dsfr-theme' ); ?></a>
		</li>
		<li>
			<a
				class="fr-btn--twitter-x fr-btn"
				title="<?php esc_attr_e( 'Partager sur Twitter - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				aria-label="<?php esc_attr_e( 'Partager sur Twitter - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				href="<?php echo esc_url( sprintf( 'https://twitter.com/intent/tweet?url=%s&text=%s', $url, $page_title ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur Twitter','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=420'); event.preventDefault();"
				><?php esc_html_e( 'Partager sur Twitter', 'wp-dsfr-theme' ); ?></a>
		</li>
		<li>
			<a
				class="fr-btn--linkedin fr-btn"
				title="<?php esc_attr_e( 'Partager sur LinkedIn - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				aria-label="<?php esc_attr_e( 'Partager sur LinkedIn - nouvelle fenêtre', 'wp-dsfr-theme' ); ?>"
				href="<?php echo esc_url( sprintf( 'https://www.linkedin.com/shareArticle?url=%s&title=%s', $url, $page_title ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur LinkedIn','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=550,height=550'); event.preventDefault();"
				><?php esc_html_e( 'Partager sur LinkedIn', 'wp-dsfr-theme' ); ?></a>
		</li>
		<li>
			<a
				class="fr-btn--mail fr-btn"
				href="<?php echo esc_url( sprintf( 'mailto:?subject=%2$s&body=%2$s %1$s', $url, $page_title ) ); ?>"
				title="<?php esc_attr_e( 'Partager par email', 'wp-dsfr-theme' ); ?>"
				aria-label="<?php esc_attr_e( 'Partager par email', 'wp-dsfr-theme' ); ?>"
				target="_blank"
				><?php esc_html_e( 'Partager par email', 'wp-dsfr-theme' ); ?></a>
		</li>
		<li>
			<button class="fr-btn--copy fr-btn" title="<?php esc_attr_e( 'Copier dans le presse-papier', 'wp-dsfr-theme' ); ?>" onclick="navigator.clipboard.writeText(window.location);alert('Adresse copiée dans le presse papier.');"><?php esc_html_e( 'Copier dans le presse-papier', 'wp-dsfr-theme' ); ?></button>
		</li>
	</ul>
</div>