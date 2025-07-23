<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = BlogxerTheme_Helper::nav_menu_args();

// Logo
$blogxer_dark_logo = empty( BlogxerTheme::$options['logo']['url'] ) ? BLOGXER_IMG_URL . 'logo-dark.png' : BlogxerTheme::$options['logo']['url'];
$blogxer_light_logo = empty( BlogxerTheme::$options['logo_light']['url'] ) ? BLOGXER_IMG_URL . 'logo-light.png' : BlogxerTheme::$options['logo_light']['url'];

?>
<div class="masthead-container header-controll" id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">	
				<?php if ( BlogxerTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ) { ?>
				<div class="header-icon-area">
					<?php get_template_part( 'template-parts/header/icon', 'menu' ); ?>
				</div>
				<?php } ?>
			</div>
			<div class="col-lg-4 d-flex justify-content-center">
				<div class="site-branding">
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				</div>
			</div>			
			<div class="header-icon-area col-lg-4 d-flex justify-content-end">				
				<?php if ( BlogxerTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>
				<?php if ( BlogxerTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
				<?php } ?>				
			</div>
		</div>
	</div>
</div>
<div class="masthead-container header-menu-controll">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="container">
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