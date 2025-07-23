<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'blogxer_template_vars' );

if( !function_exists( 'blogxer_template_vars' ) ) {
    
    function blogxer_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'post':
                $prefix = 'single_post';
                break;				
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
             
			$layout_settings = get_post_meta( $post_id, 'blogxer_layout_settings', true );
			            
            BlogxerTheme::$layout = ( empty( $layout_settings['blogxer_layout'] ) || $layout_settings['blogxer_layout'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_layout'] : $layout_settings['blogxer_layout'];

			BlogxerTheme::$sidebar = ( empty( $layout_settings['blogxer_sidebar'] ) || $layout_settings['blogxer_sidebar'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_sidebar'] : $layout_settings['blogxer_sidebar'];
            
			BlogxerTheme::$tr_header = ( empty( $layout_settings['blogxer_tr_header'] ) || $layout_settings['blogxer_tr_header'] == 'default' ) ? BlogxerTheme::$options['tr_header'] : $layout_settings['blogxer_tr_header'];
            
            BlogxerTheme::$top_bar = ( empty( $layout_settings['blogxer_top_bar'] ) || $layout_settings['blogxer_top_bar'] == 'default' ) ? BlogxerTheme::$options['top_bar'] : $layout_settings['blogxer_top_bar'];
            
            BlogxerTheme::$top_bar_style = ( empty( $layout_settings['blogxer_top_bar_style'] ) || $layout_settings['blogxer_top_bar_style'] == 'default' ) ? BlogxerTheme::$options['top_bar_style'] : $layout_settings['blogxer_top_bar_style'];
			
			BlogxerTheme::$header_opt = ( empty( $layout_settings['blogxer_header_opt'] ) || $layout_settings['blogxer_header_opt'] == 'default' ) ? BlogxerTheme::$options['header_opt'] : $layout_settings['blogxer_header_opt'];
            
            BlogxerTheme::$header_style = ( empty( $layout_settings['blogxer_header'] ) || $layout_settings['blogxer_header'] == 'default' ) ? BlogxerTheme::$options['header_style'] : $layout_settings['blogxer_header'];
			
            BlogxerTheme::$footer_style = ( empty( $layout_settings['blogxer_footer'] ) || $layout_settings['blogxer_footer'] == 'default' ) ? BlogxerTheme::$options['footer_style'] : $layout_settings['blogxer_footer'];
			
			BlogxerTheme::$footer_area = ( empty( $layout_settings['blogxer_footer_area'] ) || $layout_settings['blogxer_footer_area'] == 'default' ) ? BlogxerTheme::$options['footer_area'] : $layout_settings['blogxer_footer_area'];
			
			BlogxerTheme::$copyright_area = ( empty( $layout_settings['blogxer_copyright_area'] ) || $layout_settings['blogxer_copyright_area'] == 'default' ) ? BlogxerTheme::$options['copyright_area'] : $layout_settings['blogxer_copyright_area'];
            
            $padding_top = ( empty( $layout_settings['blogxer_top_padding'] ) || $layout_settings['blogxer_top_padding'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_padding_top'] : $layout_settings['blogxer_top_padding'];
			
            BlogxerTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['blogxer_bottom_padding'] ) || $layout_settings['blogxer_bottom_padding'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['blogxer_bottom_padding'];
			
            BlogxerTheme::$padding_bottom = (int) $padding_bottom;
			
            BlogxerTheme::$has_banner = ( empty( $layout_settings['blogxer_banner'] ) || $layout_settings['blogxer_banner'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_banner'] : $layout_settings['blogxer_banner'];
            
            BlogxerTheme::$has_breadcrumb = ( empty( $layout_settings['blogxer_breadcrumb'] ) || $layout_settings['blogxer_breadcrumb'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_breadcrumb'] : $layout_settings['blogxer_breadcrumb'];
            
            BlogxerTheme::$bgtype = ( empty( $layout_settings['blogxer_banner_type'] ) || $layout_settings['blogxer_banner_type'] == 'default' ) ? BlogxerTheme::$options[$prefix . '_bgtype'] : $layout_settings['blogxer_banner_type'];
            
            BlogxerTheme::$bgcolor = empty( $layout_settings['blogxer_banner_bgcolor'] ) ? BlogxerTheme::$options[$prefix . '_bgcolor'] : $layout_settings['blogxer_banner_bgcolor'];
            
            if( !empty( $layout_settings['blogxer_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['blogxer_banner_bgimg'], 'full', true );
                BlogxerTheme::$bgimg = $attch_url[0];
            } elseif( !empty( BlogxerTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( BlogxerTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                BlogxerTheme::$bgimg = $attch_url[0];
            } else {
                BlogxerTheme::$bgimg = BLOGXER_IMG_URL . 'banner.jpg'; 
            }
			
           BlogxerTheme::$pagebgcolor = empty( $layout_settings['blogxer_page_bgcolor'] )
    ? BlogxerTheme::$options[$prefix . '_bgcolor']
    : $layout_settings['blogxer_page_bgcolor'];

if ( !empty( $layout_settings['blogxer_page_bgimg'] ) ) {
    $attch_url = wp_get_attachment_image_src( $layout_settings['blogxer_page_bgimg'], 'full', true );
    BlogxerTheme::$pagebgimg = $attch_url[0];
} elseif (
    isset( BlogxerTheme::$options[$prefix . '_bgimg']['id'] )
) {
    $attch_url = wp_get_attachment_image_src( BlogxerTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
    BlogxerTheme::$pagebgimg = $attch_url[0];
}

        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {

            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                BlogxerTheme::$options[$prefix . '_layout'] = 'full-width';
            } else if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } else {
                $prefix = 'blog';
            }
            
            BlogxerTheme::$layout         	= BlogxerTheme::$options[$prefix . '_layout'];
            BlogxerTheme::$tr_header      	= BlogxerTheme::$options['tr_header'];
            BlogxerTheme::$top_bar        	= BlogxerTheme::$options['top_bar'];
            BlogxerTheme::$header_opt      = BlogxerTheme::$options['header_opt'];
            BlogxerTheme::$footer_area     = BlogxerTheme::$options['footer_area'];
            BlogxerTheme::$top_bar_style  	= BlogxerTheme::$options['top_bar_style'];
            BlogxerTheme::$header_style   	= BlogxerTheme::$options['header_style'];
            BlogxerTheme::$footer_style   	= BlogxerTheme::$options['footer_style'];
            BlogxerTheme::$padding_top    	= BlogxerTheme::$options[$prefix . '_padding_top'];
            BlogxerTheme::$padding_bottom 	= BlogxerTheme::$options[$prefix . '_padding_bottom'];
            BlogxerTheme::$has_banner     	= BlogxerTheme::$options[$prefix . '_banner'];
            BlogxerTheme::$has_breadcrumb 	= BlogxerTheme::$options[$prefix . '_breadcrumb'];
            BlogxerTheme::$bgtype         	= BlogxerTheme::$options[$prefix . '_bgtype'];
            BlogxerTheme::$bgcolor        	= BlogxerTheme::$options[$prefix . '_bgcolor'];
            BlogxerTheme::$copyright_area   = BlogxerTheme::$options['copyright_area'];
			
            if( !empty( BlogxerTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( BlogxerTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                BlogxerTheme::$bgimg = $attch_url[0];
            } else {
                BlogxerTheme::$bgimg = BLOGXER_IMG_URL . 'banner.jpg';
                
            }
			
            BlogxerTheme::$pagebgcolor = BlogxerTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( BlogxerTheme::$options[$prefix . '_page_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( BlogxerTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                BlogxerTheme::$pagebgimg = $attch_url[0];
            }
        }
    }
}

// Add body class
add_filter( 'body_class', 'blogxer_body_classes' );
if( !function_exists( 'blogxer_body_classes' ) ) {
    function blogxer_body_classes( $classes ) {
        
        $classes[] = 'header-style-'. BlogxerTheme::$header_style;		
        $classes[] = 'footer-style-'. BlogxerTheme::$footer_style;

        if ( BlogxerTheme::$top_bar == 1 || BlogxerTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. BlogxerTheme::$top_bar_style;
        }

        if ( BlogxerTheme::$tr_header == 1 || BlogxerTheme::$tr_header == 'on' ){
           $classes[] = 'trheader';
        }
		if ( BlogxerTheme::$has_banner == '0' || BlogxerTheme::$has_banner == 'off' ) {
			$classes[] = 'no-banner';
		}
        
        $classes[] = ( BlogxerTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( BlogxerTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . BlogxerTheme::$options['post_style'];
        }
        return $classes;
    }
}