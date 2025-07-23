<?php
$blogxer_footer_column = 1;
switch ( $blogxer_footer_column ) {
	case '1':
	$blogxer_footer_class = 'col-lg-12 col-sm-12 col-12';
	break;
	case '2':
	$blogxer_footer_class = 'col-lg-6 col-sm-6 col-12';
	break;
	case '3':
	$blogxer_footer_class = 'col-lg-4 col-sm-4 col-12';
	break;		
	default:
	$blogxer_footer_class = 'col-lg-3 col-sm-6 col-12';
	break;
}
// Logo
$blogxer_light_logo = empty( BlogxerTheme::$options['footer_logo_light']['url'] ) ? BLOGXER_IMG_URL . 'logo-light.png' : BlogxerTheme::$options['footer_logo_light']['url'];
$blogxer_socials = BlogxerTheme_Helper::socials();
?>
<?php if ( BlogxerTheme::$footer_area == 1 || BlogxerTheme::$footer_area == 'on' ){ ?>
	<div class="footer-top-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4">
					<div class="copyright"><?php echo wp_kses_post( BlogxerTheme::$options['copyright_text'] );?></div>
				</div>
				<div class="col-md-4">
					<?php
					for ( $i = 1; $i <= $blogxer_footer_column; $i++ ) {
						echo '<div class="' . $blogxer_footer_class . '">';
						dynamic_sidebar( 'footer-style-4' );
						echo '</div>';
					}
					?>
				</div>
				<div class="col-md-4">
					<div class="footer-social">
					<?php if ( $blogxer_socials ): ?>
						<ul>
							<?php foreach ( $blogxer_socials as $blogxer_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $blogxer_social['url'] );?>"><i class="fa <?php echo esc_attr( $blogxer_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
