<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
</div><!--#content-->
<!-- ad start -->
<?php
	$all_ad_setting = get_post_meta( get_the_ID(), 'blogxer_ad_settings', true );
	$is_ad_active5 = ( empty( $all_ad_setting['blogxer_footer_ad'] ) || $all_ad_setting['blogxer_footer_ad'] == 'default' ) ? 'on' : 'off';
	if ( $is_ad_active5 == 'on' ) {
		do_action( 'blogxer_before_footer' );
	}		
?>
<!-- ad end -->
<footer>
	<div id="footer-<?php echo esc_attr( BlogxerTheme::$footer_style ); ?>" class="footer-area">
		<?php
			get_template_part( 'template-parts/footer/footer', BlogxerTheme::$footer_style );
		?>
	</div>
</footer>
</div>
<?php wp_footer();?>
</body>
</html>