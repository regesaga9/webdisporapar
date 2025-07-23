<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

?>
<div class="sec-title <?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['title_align'] ); ?> <?php echo esc_attr( $data['showhide'] ); ?>">
	<div class="sec-title-holder">
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?><?php if ( $data['showhide'] == 'barshow' ) { ?><span class="title-bar"></span><?php } ?></h2>
		<?php if( !empty ( $data['sub_title'] ) ) { ?>
		<p class="sub-title"><?php echo wp_kses_post( $data['sub_title'] ); ?></p>
		<?php } ?>
	</div>
</div>
