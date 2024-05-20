<?php
// FR SHARE
$share_title = ! empty( $args['title'] ) ? $args['title'] : 'Partager la page';

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
				title="Partager sur Facebook - nouvelle fenêtre"
				aria-label="Partager sur Facebook - nouvelle fenêtre"
				href="<?php echo esc_url( sprintf( 'https://www.facebook.com/sharer.php?u=%s', $url ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur Facebook','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=450'); event.preventDefault();"
				>Partager sur Facebook</a>
		</li>
		<li>
			<a
				class="fr-btn--twitter-x fr-btn"
				title="Partager sur Twitter - nouvelle fenêtre"
				aria-label="Partager sur Twitter - nouvelle fenêtre"
				href="<?php echo esc_url( sprintf( 'https://twitter.com/intent/tweet?url=%s&text=%s', $url, $page_title ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur Twitter','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=420'); event.preventDefault();"
				>Partager sur Twitter</a>
		</li>
		<li>
			<a
				class="fr-btn--linkedin fr-btn"
				title="Partager sur LinkedIn - nouvelle fenêtre"
				aria-label="Partager sur LinkedIn - nouvelle fenêtre"
				href="<?php echo esc_url( sprintf( 'https://www.linkedin.com/shareArticle?url=%s&title=%s', $url, $page_title ) ); ?>"
				target="_blank"
				rel="noopener"
				onclick="window.open(this.href,'Partager sur LinkedIn','toolbar=no,location=yes,status=no,menubar=no,scrollbars=yes,resizable=yes,width=550,height=550'); event.preventDefault();"
				>Partager sur LinkedIn</a>
		</li>
		<li>
			<a
				class="fr-btn--mail fr-btn"
				href="<?php echo esc_url( sprintf( 'mailto:?subject=%2$s&body=%2$s %1$s', $url, $page_title ) ); ?>"
				title="Partager par email"
				aria-label="Partager par email"
				target="_blank"
				>Partager par email</a>
		</li>
		<li>
			<button class="fr-btn--copy fr-btn" title="Copier dans le presse-papier" onclick="navigator.clipboard.writeText(window.location);alert('Adresse copiée dans le presse papier.');">Copier dans le presse-papier</button>
		</li>
	</ul>
</div>