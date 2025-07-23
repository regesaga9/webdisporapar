
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_error_img = empty( BlogxerTheme::$options['error_bodybanner']['url'] ) ? BLOGXER_IMG_URL . '404.png' : BlogxerTheme::$options['error_bodybanner']['url'];

?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
		<div class="error-page-content">
			<img src="<?php echo esc_url($blogxer_error_img); ?>">
			<h2 class="text-1"><?php echo wp_kses_post( BlogxerTheme::$options['error_text1'] );?></h2>
			<p class="text-2"><?php echo wp_kses_post( BlogxerTheme::$options['error_text2'] );?></p>
			<div class="go-home">
			  <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( BlogxerTheme::$options['error_buttontext'] );?><i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>