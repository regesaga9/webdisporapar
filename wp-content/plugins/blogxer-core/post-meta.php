<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use BlogxerTheme;
use BlogxerTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = BLOGXER_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'blogxer-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'blogxer-core' ) ) + BlogxerTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'blogxer-core' ), array( 'page', 'post' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'blogxer-core' ),
			'type'    => 'group',
			'value'  => array(
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'blogxer-core' ),
						'full-width'    => __( 'Full Width', 'blogxer-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'blogxer-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'blogxer-core' ),
					),
					'default'  => 'default',
				),		
				'blogxer_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'blogxer-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'blogxer-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'blogxer-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enabled', 'blogxer-core' ),
						'off'     => __( 'Disabled', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'blogxer-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enabled', 'blogxer-core' ),
						'off'     => __( 'Disabled', 'blogxer-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'blogxer-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'blogxer-core' ),
						'1'       => __( 'Layout 1', 'blogxer-core' ),
						'2'       => __( 'Layout 2', 'blogxer-core' ),
						'3'       => __( 'Layout 3', 'blogxer-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'blogxer-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enabled', 'blogxer-core' ),
						'off'     => __( 'Disabled', 'blogxer-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'1'       => __( 'Layout 1', 'blogxer-core' ),
						'2'       => __( 'Layout 2', 'blogxer-core' ),
						'3'       => __( 'Layout 3', 'blogxer-core' ),
						'4'       => __( 'Layout 4', 'blogxer-core' ),
						'5'       => __( 'Layout 5', 'blogxer-core' ),
						'6'       => __( 'Layout 6', 'blogxer-core' ),
						'7'       => __( 'Layout 7', 'blogxer-core' ),
						'8'       => __( 'Layout 8', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'1'       => __( 'Layout 1', 'blogxer-core' ),
						'2'       => __( 'Layout 2', 'blogxer-core' ),
						'3'       => __( 'Layout 3', 'blogxer-core' ),
						'4'       => __( 'Layout 4', 'blogxer-core' ),
						'5'       => __( 'Layout 5', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'blogxer-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enabled', 'blogxer-core' ),
						'off'     => __( 'Disabled', 'blogxer-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'blogxer-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enabled', 'blogxer-core' ),
						'off'     => __( 'Disabled', 'blogxer-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'0px'     => __( '0px', 'blogxer-core' ),
						'10px'    => __( '10px', 'blogxer-core' ),
						'20px'    => __( '20px', 'blogxer-core' ),
						'30px'    => __( '30px', 'blogxer-core' ),
						'40px'    => __( '40px', 'blogxer-core' ),
						'50px'    => __( '50px', 'blogxer-core' ),
						'60px'    => __( '60px', 'blogxer-core' ),
						'70px'    => __( '70px', 'blogxer-core' ),
						'80px'    => __( '80px', 'blogxer-core' ),
						'90px'    => __( '90px', 'blogxer-core' ),
						'100px'   => __( '100px', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'0px'     => __( '0px', 'blogxer-core' ),
						'10px'    => __( '10px', 'blogxer-core' ),
						'20px'    => __( '20px', 'blogxer-core' ),
						'30px'    => __( '30px', 'blogxer-core' ),
						'40px'    => __( '40px', 'blogxer-core' ),
						'50px'    => __( '50px', 'blogxer-core' ),
						'60px'    => __( '60px', 'blogxer-core' ),
						'70px'    => __( '70px', 'blogxer-core' ),
						'80px'    => __( '80px', 'blogxer-core' ),
						'90px'    => __( '90px', 'blogxer-core' ),
						'100px'   => __( '100px', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'	  => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'blogxer-core' ),
						'bgimg'   => __( 'Background Image', 'blogxer-core' ),
						'bgcolor' => __( 'Background Color', 'blogxer-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'blogxer-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'blogxer-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'blogxer-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'blogxer-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'blogxer-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'blogxer-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'blogxer-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'blogxer-core' ),
				),
		
			)
		)
	),
) );

$Postmeta->add_meta_box( "{$prefix}_ad_settings", __( 'Advertisement Settings', 'blogxer-core' ), array( 'page', 'post' ), '', '', 'high', array(
	'fields' => array(
		
		"{$prefix}_ad_settings" => array(
			'label'   => __( 'Advertisement Settings', 'blogxer-core' ),
			'type'    => 'group',
			'value'  => array(
		
				"{$prefix}_header_top_ad" => array(
					'label'   => __( 'Header Top Ad.', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_header_below_ad" => array(
					'label'   => __( 'Header Below Ad.', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_ad" => array(
					'label'   => __( 'Footer Top Ad.', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(				
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_content_top" => array(
					'label'   => __( 'Content Top Ad.', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_content_below" => array(
					'label'   => __( 'Content Below Ad.', 'blogxer-core' ),
					'type'    => 'select',
					'options' => array(
						'on'      => __( 'Enable', 'blogxer-core' ),
						'off'	  => __( 'Disable', 'blogxer-core' ),
					),
					'default'  => 'default',
				),
			)
		)
	) )
);


/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'blogxer_post_info', __( 'Post Info', 'blogxer-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		'blogxer_post_gallery' => array(
			'label' => __( 'Post Gallery', 'blogxer-core' ),
			'type'  => 'gallery',
		),		
	),
) );

$Postmeta->add_meta_box( "{$prefix}_subtitle_info", __( 'Subtitle', 'blogxer-core' ), array( 'post' ), '', 'advanced','high', array(
	'fields' => array(
		
		//only post meta
		"{$prefix}_subtitle" => array(
			'label'   => __( 'Subtitle', 'blogxer-core' ),
			'type'    => 'text',
			'default'  => '',
		),
		"{$prefix}_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'blogxer-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'blogxer-core' ),
		),
	
	) )
);