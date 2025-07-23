<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_socials = BlogxerTheme_Helper::socials();
$nav_menu_args   = BlogxerTheme_Helper::nav_menu_args();

// Logo
$blogxer_dark_logo = empty( BlogxerTheme::$options['logo']['url'] ) ? BLOGXER_IMG_URL . 'logo-dark.png' : BlogxerTheme::$options['logo']['url'];
$blogxer_light_logo = empty( BlogxerTheme::$options['logo_light']['url'] ) ? BLOGXER_IMG_URL . 'logo-light.png' : BlogxerTheme::$options['logo_light']['url'];

// Menu and Icon wrapper classes
$blogxer_icon_count = 0;
if ( BlogxerTheme::$options['search_icon'] ) {
	$blogxer_icon_count++;
}
if ( BlogxerTheme::$options['cart_icon'] && class_exists( 'WooCommerce' ) ) {
	$blogxer_icon_count++;
}
if ( BlogxerTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ) {
	$blogxer_icon_count++;
}
?>
<div class="masthead-container header-controll" id="sticker">
	<div class="row">
		<div class="col-lg-2 d-flex justify-content-start">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="col-lg-7 d-flex justify-content-center">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
		<div class="col-lg-3 d-flex justify-content-end">
			<?php if ( $blogxer_icon_count ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			<?php } ?>
			<?php if ( $blogxer_socials ): ?>
			<ul class="header-social">
				<?php foreach ( $blogxer_socials as $blogxer_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $blogxer_social['url'] );?>"><i class="fa <?php echo esc_attr( $blogxer_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="sticky-container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				</div>
			</div>
			<div class="col-lg-8 d-flex justify-content-end">
				<div class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args ); ?>
				</div>
			</div>
		</div>
	</div>
</div>