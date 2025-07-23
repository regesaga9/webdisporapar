<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;
use BlogxerTheme_Helper;

$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}

?>
<div class="rt-video">
	<div class="rtin-video">
		<a class="rtin-play rt-popup-youtube" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fa fa-play" aria-hidden="true"></i></a>
		
		<?php if ( !empty( $data['image']['id'] ) ) { 
			echo wp_get_attachment_image( $data['image']['id'], 'full' ); 
		} else {
			echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
		} ?>
	</div>
</div>