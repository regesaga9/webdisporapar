<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
	<?php
		// Preloader
		if ( BlogxerTheme::$options['preloader'] == '1' ){ 
			if ( !empty( BlogxerTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = BlogxerTheme::$options['preloader_image']['url'];
				echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
			}
			else { ?>
			<div id="preloader">
				<div class="preloader-wrap">
					<div class="preloader-content">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<?php }
		}
	?>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogxer' ); ?></a>		
		<header id="masthead" class="site-header">			
			<div id="header-<?php echo esc_attr( BlogxerTheme::$header_style ); ?>" class="header-area header-fixed ">			
				<?php					
					$all_ad_setting = get_post_meta( get_the_ID(), 'blogxer_ad_settings', true );
					
					$is_ad_active1 = ( empty( $all_ad_setting['blogxer_header_top_ad'] ) || $all_ad_setting['blogxer_header_top_ad'] == 'default' ) ? 'on' : 'off';
					
					if ( $is_ad_active1 == 'on' ) { do_action( 'blogxer_header_top' ); }
				?>
				<?php if ( BlogxerTheme::$top_bar == 1 || BlogxerTheme::$top_bar == 'on' ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', BlogxerTheme::$top_bar_style ); ?>
				<?php } ?>
				
				<?php if ( BlogxerTheme::$header_opt == 1 || BlogxerTheme::$header_opt == 'on' ){ ?>
				<?php get_template_part( 'template-parts/header/header', BlogxerTheme::$header_style ); ?>
				<?php } ?>
			</div>
		</header>
		<div id="meanmenu"></div>
		<div id="header-area-space"></div>
		<div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <?php get_search_form(); ?>
        </div>
		<?php
			$is_ad_active2 = ( empty( $all_ad_setting['blogxer_header_below_ad'] ) || $all_ad_setting['blogxer_header_below_ad'] == 'default' ) ? 'on' : 'off';
			if ( $is_ad_active2 == 'on' || $is_ad_active2 == '1' ) { do_action( 'blogxer_header_below' ); }
		?>
		<div id="content" class="site-content">	
			<?php
				if ( BlogxerTheme::$has_banner == '1' || BlogxerTheme::$has_banner == 'on' ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>