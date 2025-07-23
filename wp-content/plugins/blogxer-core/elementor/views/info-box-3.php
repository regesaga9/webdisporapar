<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="blogxer-button-2" ' . $attr . '>' . $data['buttontext'] . '<i class="fa fa-angle-right" aria-hidden="true"></i>' . '</a>';
}


?>
<div class="info-box info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['title_align'] ); ?>">
	<div class="item-sl">
		<?php if ( !empty( $data['title'] ) ) { ?>
		<h3 class="rtin-item-title"><?php echo wp_kses_post( $title );?></h3>
		<?php } ?>
	</div>
	<div class="rtin-content">
		<?php if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></div>
		<?php } ?>
		<?php if ( !empty( $btn ) ){ ?>
			<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
		<?php } ?>
	</div>
</div>