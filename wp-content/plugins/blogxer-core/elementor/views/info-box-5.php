<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

// icon , image
if ( $data['icontype'] == 'image' ) {
	$size = BLOGXER_CORE_THEME_PREFIX . '-size2';
	$img = wp_get_attachment_image( $data['image']['id'], $size );
}

$icon_css ='';
$icon_size = $data['icon_size'];
$icon_color = $data['icon_color'];

if ( $icon_size != '' ) {
   $icon_size       = (int) $icon_size;
   $icon_css  .= " font-size: {$icon_size}px;";
}

if ( $icon_color != '' ) {
	$icon_css  .= " color: {$icon_color};";
}

?>
<div class="info-box media info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['title_align'] ); ?>">
	<div class="rtin-item media rtin-<?php echo esc_attr( $data['icontype'] );?>">
		<div class="rtin-media">
			<span>
				<?php if ( $data['icontype'] == 'image' ): ?>
					<?php echo wp_kses_post( $img );?>
				<?php else: ?>
					<span  style="<?php echo wp_kses_post( $icon_css ); ?>"><i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i></span>
				<?php endif; ?>
			</span>
		</div>
		<div class="media-body rtin-content">
			<?php if ( !empty( $data['title_two'] ) ) { ?>
			<h3 class="rtin-item-title"><?php echo wp_kses_post( $data['title_two'] ); ?></h3>
			<?php } if ( !empty( $data['content'] ) ) { ?>
			<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
			<?php } ?>
		</div>
	</div>
</div>