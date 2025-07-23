<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'blogxer';

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Blogxer Options', 'blogxer' ),
	
    'page_title'           => esc_html__( 'Blogxer Options', 'blogxer' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,   // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'blogxer-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General', 'blogxer' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Primary Color', 'blogxer' ),
            'subtitle' => esc_html__( 'Theme Default: #444444', 'blogxer' ),
            'default'  => '#444444',
        ),
		array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Secondary Color', 'blogxer' ),
            'subtitle' => esc_html__( 'Theme Default: #646464', 'blogxer' ),
            'default'  => '#646464',
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Container width( Bootstrap Grid )', 'blogxer'), 
            'subtitle' => esc_html__( 'Bootstrap Grid Container Width size for site.', 'blogxer' ),
            'options'  => array(
                '1350' => esc_html__( '1350px', 'blogxer' ),
                '1240' => esc_html__( '1240px', 'blogxer' ),
                '1140' => esc_html__( '1140px', 'blogxer' ),
            ),
            'default'  => '1240',
        ),
        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html__( 'Preloader', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => false,
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader Image', 'blogxer' ),
            'subtitle' => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'preloader.gif'
            ),
            'required' => array( 'preloader', 'equals', true )
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Back to Top Arrow', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'display_no_preview_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Blog/Archive', 'blogxer' ),
			'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'display_no_prev_img_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Related Post', 'blogxer' ),
			'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'no_preview_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Alternative Preview Image', 'blogxer' ),
            'subtitle' => esc_html__( 'This image will be used as preview image in some archive pages if no featured image exists', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'noimage.jpg'
            ),
			'required' => array( 'display_no_preview_image', 'equals', true )
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact & Socials', 'blogxer' ),
    'id'               => 'socials_section',
    'heading'          => '',
    'desc'             => esc_html__( 'In case you want to hide any field, keep that field empty', 'blogxer' ),
    'icon'             => 'el el-twitter',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'blogxer' ),
            'validate' => 'email',
            'default'  => '',
        ),
        array(
            'id'       => 'address',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Address', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html__( 'Facebook', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_gplus',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Plus', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html__( 'Linkedin', 'blogxer' ),
            'default'  => ''
        ),
		array(
            'id'       => 'social_behance',
            'type'     => 'text',
            'title'    => esc_html__( 'Behance', 'blogxer' ),
            'default'  => '',
        ),
		array(
            'id'       => 'social_dribbble',
            'type'     => 'text',
            'title'    => esc_html__( 'Dribbble', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html__( 'Youtube', 'blogxer' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html__( 'Pinterest', 'blogxer' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html__( 'Instagram', 'blogxer' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => esc_html__( 'Skype', 'blogxer' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_rss',
            'type'     => 'text',
            'title'    => esc_html__( 'RSS', 'blogxer' ),
            'default'  => '',
        ),
    )            
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'blogxer' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Main Logo', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'logo.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'blogxer' ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Light Logo', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Used when Transparent Header is enabled. Logo height less than 90px is recommended', 'blogxer' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Area Width', 'blogxer'), 
            'subtitle' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'blogxer' ),
            'options'  => array(
                '1' => esc_html__( '1 Column', 'blogxer' ),
                '2' => esc_html__( '2 Column', 'blogxer' ),
                '3' => esc_html__( '3 Column', 'blogxer' ),
                '4' => esc_html__( '4 Column', 'blogxer' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky Header', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Show header when scroll down', 'blogxer' ),
        ),
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Transparent Header', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'blogxer' ),
        ),
		array(
            'id'       => 'header_opt',
            'type'     => 'switch',
            'title'    => esc_html__( 'Header On/Off', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'blogxer' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Top Bar', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'blogxer' ),
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Text Color', 'blogxer' ),
            'default'  => '#444444',
        ),
		array(
            'id'       => 'top_baricon_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Icon Color', 'blogxer' ),
            'default'  => '#444444',
        ),
        array(
            'id'       => 'top_bar_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Text Color', 'blogxer' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'blogxer' ),
            'default'  => '#efefef',
        ),
		array(
            'id'       => 'top_baricon_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Icon Color', 'blogxer' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'blogxer' ),
            'default'  => '#efefef',
        ),
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Background Color', 'blogxer' ),
            'default'  => '#f8f8f8',
        ),
        array(
            'id'       => 'top_bar_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Top Bar Layout', 'blogxer' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'top1.png',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'top2.png',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'top3.png',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'blogxer' ),
        ),
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Header Layout', 'blogxer' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-4.jpg',
                ),
				'5' => array(
                    'title' => '<b>'. esc_html__( 'Layout 5', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-5.jpg',
                ),
				'6' => array(
                    'title' => '<b>'. esc_html__( 'Layout 6', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-6.jpg',
                ),
				'7' => array(
                    'title' => '<b>'. esc_html__( 'Layout 7', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-7.jpg',
                ),
				'8' => array(
                    'title' => '<b>'. esc_html__( 'Layout 8', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'header-8.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'blogxer' ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Search Icon', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Cart Icon', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
		array(
			'id'       => 'vertical_menu_icon',
			'type'     => 'switch',
			'title'    =>  esc_html__( 'Vertical Menu Icon', 'blogxer' ),
			'on'       =>  esc_html__( 'Enabled', 'blogxer' ),
			'off'      =>  esc_html__( 'Disabled', 'blogxer' ),
			'default'  => true,
		),
		
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Main Menu', 'blogxer' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Main Menu Items', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Menu Font', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align' => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' 	 => 'Source Sans Pro',
                'google'      	 => true,
                'font-size'   	 => '15px',
                'font-weight' 	 => '600',
                'line-height' 	 => '22px',
                'text-transform' => 'uppercase',
            ),
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Color', 'blogxer' ),
            'default'  => '#111111',
        ),
		/*menu background color for header style 6,7,8 */
        array(
            'id'       => 'menu_bgcolor_6',
            'type'     => 'color',
            'title'    => esc_html__('Menu Background Color', 'blogxer'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#111111',
			'required' => array( 
				array('header_style','equals','6')
			)
        ),
        array(
            'id'       => 'menu_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Menu Color', 'blogxer' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'blogxer' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Hover Color', 'blogxer' ),
            'default'  => '#929292',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Sub Menu Items', 'blogxer' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Submenu Font', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Source Sans Pro',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '600',
                'line-height' => '22px',
                'text-transform' => 'inherit',
            ),
        ),
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Color', 'blogxer' ),
            'default'  => '#111111',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Background Color', 'blogxer' ),
            'default'  => '#ffffff',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Color', 'blogxer' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Background Color', 'blogxer' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'section-resmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Mobile Menu', 'blogxer' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html__( 'Screen width in which mobile menu activated', 'blogxer' ),
            'subtitle' => esc_html__( 'Recommended value is: 992', 'blogxer' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),
        array(
            'id'       => 'resmenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Mobile Menu Font', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
				'font-family' => 'Source Sans Pro',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '600',
                'line-height' => '22px',
                'text-transform' => 'uppercase',				
            ),
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Banner', 'blogxer' ),
    'id'               => 'banner_section',
    'heading'          => '',
    'icon'             => 'el el-picture',
    'fields' => array(
        array(
            'id'       => 'banner_heading_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Banner Heading Color', 'blogxer' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'breadcrumb_active',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Breadcrumb', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
		array(
			'id'       => 'breadcrumbs_delimiter',
			'type'     => 'text',
			'title'    => esc_html__( 'Breadcrumbs Delimiter', 'blogxer' ),
			'default'  => ' - ',
		),
        array(
            'id'       => 'breadcrumb_hide_mobile',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/Hide Breadcrumb in mobile', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => false,
        ),		
        array(
            'id'       => 'breadcrumb_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Color', 'blogxer' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'breadcrumb_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Hover Color', 'blogxer' ),
            'default'  => '#646464',
        ),
        array(
            'id'       => 'breadcrumb_active_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Active Breadcrumb Color', 'blogxer' ),
            'default'  => '#646464',
        ),
        array(
            'id'       => 'breadcrumb_seperator_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Seperator Color', 'blogxer' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'banner_bg_opacity',
            'type'     => 'text',
            'title'    => esc_html__( 'Banner Background Overlay opacity', 'blogxer' ),
            'default'  => '0',
        ),

    )
) 
);

/*advertisement*/
function blogxer_redux_advertisement_fields( $prefix, $title, $subtitle = '' ){
    return array(
        array(
            'id'       =>  $prefix. '_sec',
            'type'     => 'section',
            'title'    => $title,
            'subtitle' => $subtitle,
            'indent'   => true,
        ),
        array(
            'id'       => $prefix. '_activate',
            'type'     => 'switch',
            'title'    => esc_html__( 'Activate Ad', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => false,
        ),
        array(
            'id'       => $prefix. '_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Ad Type', 'blogxer' ),
            'options'  => array(
                'image'  => esc_html__( 'Image Link', 'blogxer' ),
                'code'   => esc_html__( 'Custom Code', 'blogxer' ),
            ),
            'default' => 'image',
            'required' => array(  $prefix. '_activate', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Image', 'blogxer' ),
            'default'  => '',
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_url',
            'type'     => 'text',
            'title'    => esc_html__( 'Link', 'blogxer' ),
            'default'  => '',
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_newtab',
            'type'     => 'switch',
            'title'    => esc_html__( 'Open Link in New Tab', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_nofollow',
            'type'     => 'switch',
            'title'    => esc_html__( 'Nofollow', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Make Link Nofollow', 'blogxer' ),
            'required' => array(  $prefix. '_type', 'equals', 'image' )
        ),
        array(
            'id'       => $prefix. '_code',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Custom Code', 'blogxer' ),
            'default'  => '',
            'subtitle' => esc_html__( 'Supports: Shortcode, Adsense, Text, HTML, Scripts', 'blogxer' ),
            'required' => array(  $prefix. '_type', 'equals', 'code' )
        ),
    );
}


Redux::setSection( $opt_name,
    array(
        'title' => esc_html__( 'Advertisements', 'blogxer' ),
        'id'    => 'ad_settings_section',
        'icon'  => 'el el-speaker',
    )
);

// Single Post
$field1 = blogxer_redux_advertisement_fields( 'ad_post_header', esc_html__( 'Header Top', 'blogxer') );
$field2 = blogxer_redux_advertisement_fields( 'ad_post_header_below', esc_html__( 'Header Below', 'blogxer') );
$field4 = blogxer_redux_advertisement_fields( 'ad_post_footer', esc_html__( 'Footer', 'blogxer') );
$field5 = blogxer_redux_advertisement_fields( 'ad_post_before_content', esc_html__( 'Before Post Contents', 'blogxer') );
$field6 = blogxer_redux_advertisement_fields( 'ad_post_after_content', esc_html__( 'After Post Contents', 'blogxer') );

$fields = array_merge( $field1, $field2, $field4, $field5, $field6 );
Redux::setSection( $opt_name,
    array(
        'title'   => esc_html__( 'Single Post', 'blogxer' ),
        'id'      => 'ad_settings_post_section',
        'heading' => '',
        'subsection' => true,
        'fields'  => $fields
    )
);

// Page
$field1 = blogxer_redux_advertisement_fields( 'ad_page_header', esc_html__( 'Header', 'blogxer') );
$field2 = blogxer_redux_advertisement_fields( 'ad_page_header_below', esc_html__( 'Header Below', 'blogxer') );
$field4 = blogxer_redux_advertisement_fields( 'ad_page_footer', esc_html__( 'Footer', 'blogxer') );
$field5 = blogxer_redux_advertisement_fields( 'ad_page_before_content', esc_html__( 'Before Page Contents', 'blogxer') );
$field6 = blogxer_redux_advertisement_fields( 'ad_page_after_content', esc_html__( 'After Page Contents', 'blogxer') );

$fields = array_merge( $field1, $field2, $field4, $field5, $field6 );
Redux::setSection( $opt_name,
    array(
        'title'   => esc_html__( 'Page', 'blogxer' ),
        'id'      => 'ad_settings_page_section',
        'heading' => '',
        'subsection' => true,
        'fields'  => $fields
    )
);

// Blog/Archive
$field1 = blogxer_redux_advertisement_fields( 'ad_blog_header', esc_html__( 'Header', 'blogxer') );
$field2 = blogxer_redux_advertisement_fields( 'ad_blog_header_below', esc_html__( 'Header Below', 'blogxer') );
$field3 = blogxer_redux_advertisement_fields( 'ad_blog_footer', esc_html__( 'Footer', 'blogxer') );

$fields = array_merge( $field1, $field2, $field3 );
Redux::setSection( $opt_name,
    array(
        'title'   => esc_html__( 'Blog/Archive', 'blogxer' ),
        'id'      => 'ad_settings_blog_section',
        'heading' => '',
        'subsection' => true,
        'fields'  => $fields
    )
);


Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer', 'blogxer' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
		/*main footer part*/
		array( 
            'id'       => 'footer_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Footer Layout', 'blogxer' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'footer-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'footer-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'footer-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'footer-4.jpg',
                ),
                '5' => array(
                    'title' => '<b>'. esc_html__( 'Layout 5', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'footer-5.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'blogxer' ),
        ),				
        array(
            'id'       => 'section-footer-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Footer Area', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'footer_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Footer Area', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_column_2',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 2', 'blogxer' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '3',
            'required' => array( 'footer_style', 'equals', '2' )
        ),
        array(
            'id'       => 'footer_column_4',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 2', 'blogxer' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '3',
            'required' => array( 'footer_style', 'equals', '4' )
        ),
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Background Color', 'blogxer' ),
            'default'  => '#1b1d1f',
            'required' => array( 'footer_area', 'equals', true ),
        ),
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Title Text Color', 'blogxer' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Text Color', 'blogxer' ),
            'default'  => '#b0b0b0',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Color', 'blogxer' ),
            'default'  => '#b0b0b0',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Hover Color', 'blogxer' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ),		
        array(
            'id'       => 'footer_logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Logo', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'blogxer' ),
			'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Copyright Area', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Copyright Area', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Background Color', 'blogxer' ),
            'default'  => '#111111',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Text Color', 'blogxer' ),
            'default'  => '#b0b0b0',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Copyright Text', 'blogxer' ),
            'default'  => '&copy; 2019 blogxer. All Rights Reserved.',
            'required' => array( 'copyright_area', 'equals', true )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'blogxer' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Source Sans Pro',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '400',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h1', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '36px',
                'font-weight' => '700',
                'line-height'   => '42px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h2', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '28px',
                'font-weight' => '700',
                'line-height' => '36px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h3', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '22px',
                'font-weight' => '700',
                'line-height' => '30px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h4', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => '700',
                'line-height' => '28px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h5', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '18px',
                'font-weight' => '700',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h6', 'blogxer' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Playfair Display',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '700',
                'line-height' => '24px',
            ),
        ),
    )
) );

// Generate Common post type fields 
function blogxer_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Layout', 'blogxer' ),
            'options'  => array(
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'blogxer' ),
                'full-width'    => esc_html__( 'Full Width', 'blogxer' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'blogxer' ),
            ),
            'default' => 'right-sidebar'
        ),		
        array(
            'id'       => $prefix. '_sidebar',
            'type'     => 'select',
            'title'    => __( 'Custom Sidebar', 'blogxer' ),
            'options'  => BlogxerTheme_Helper::custom_sidebar_fields(),
            'default'  => 'sidebar',
            'required' => array( $prefix. '_layout', '!=', 'full-width' ),
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Top', 'blogxer' ),
            'validate'  => 'numeric',
            'default' => '100',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Bottom', 'blogxer' ),
            'validate'  => 'numeric',
            'default' => '100'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => esc_html__( 'Banner', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__( 'Breadcrumb', 'blogxer' ),
            'on'       => esc_html__( 'Enabled', 'blogxer' ),
            'off'      => esc_html__( 'Disabled', 'blogxer' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Banner Background Type', 'blogxer' ),
            'options'  => array(
                'bgcolor'  => esc_html__( 'Background Color', 'blogxer' ),
                'bgimg'    => esc_html__( 'Background Image', 'blogxer' ),
            ),
            'default' => 'bgcolor',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Banner Background Image', 'blogxer' ),
            'default'  => array(
                'url'=> BLOGXER_IMG_URL . 'banner.jpg'
            ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Banner Background Color', 'blogxer'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#f8f8f8',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Page/Post Background Image', 'blogxer' ),
            'default'  => array(
                'url'=> '',
            ),
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Page/Post Background Color', 'blogxer'), 
            'validate' => 'color',
            'transparent' => true,
            'default' => '#ffffff',
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Layout Defaults', 'blogxer' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$blogxer_page_fields = blogxer_redux_post_type_fields( 'page' );
$blogxer_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page', 'blogxer' ),
	'id'               => 'pages_section',
	'subsection' => true,
	'fields' => $blogxer_page_fields
	) );

//Post Archive
$blogxer_post_archive_fields = blogxer_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog / Archive', 'blogxer' ),
	'id'         => 'blog_section',
	'subsection' => true,
	'fields' 	 => $blogxer_post_archive_fields
	) );

// Single Post
$blogxer_single_post_fields = blogxer_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Post Single', 'blogxer' ),
	'id'         => 'single_post_section',
	'subsection' => true,
	'fields' 	 => $blogxer_single_post_fields          
	) );

// Search
$blogxer_search_fields = blogxer_redux_post_type_fields( 'search' );

$excerpt_length = array (
	array(
		'id'       => 'search_excerpt_length',
		'type'     => 'text',
		'title'    => esc_html__( 'Search Excerpt Length', 'blogxer' ),
		'validate'  => 'numeric',
		'default' => '25',
	)       
);
$blogxer_search_field_2 = array_merge ( $blogxer_search_fields , $excerpt_length );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Search Layout', 'blogxer' ),
	'id'         => 'search_section',
	'heading'    => '',
	'subsection' => true,
	'fields' 	 => $blogxer_search_field_2
));

// Error 404 Layout
$blogxer_error_fields = blogxer_redux_post_type_fields( 'error' );
unset($blogxer_error_fields[0]);
$blogxer_error_fields[2]['default'] = 'full-width';
$blogxer_error_fields[2]['default'] = '120';
$blogxer_error_fields[3]['default'] = '120';
Redux::setSection( $opt_name, array(
    'title'   	 => esc_html__( 'Error 404 Layout', 'blogxer' ),
    'id'      	 => 'error_section',
    'heading' 	 => '',
    'subsection' => true,
    'fields'  	 => $blogxer_error_fields           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $blogxer_shop_archive_fields = blogxer_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Shop Archive', 'blogxer' ),
        'id'         => 'shop_section',
        'subsection' => true,
        'fields' 	 => $blogxer_shop_archive_fields
        ) );

    // Woocommerce Product
    $blogxer_product_fields = blogxer_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product Single', 'blogxer' ),
        'id'         => 'product_section',
        'subsection' => true,
        'fields' 	 => $blogxer_product_fields
        ) );
}

// Blog Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog Settings', 'blogxer' ),
    'id'               => 'blog_settings_section',
    'icon'             => 'el el-tags',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       =>'blog_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog/Archive Layout', 'blogxer' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'blog2.png',
                ),
                'style3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'blog3.png',
                ),
				'style4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'blog1.png',
                ),
            ),
        ),
		array(
			'id'       => 'post_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Enter the Post Banner Title', 'blogxer' ),
			'default'  => esc_html__( '', 'blogxer' ),			
		),
		array(
			'id'       => 'post_content_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Content Limit', 'blogxer' ),
			'default'  => 20,
		),
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Date', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
		array(
            'id'       => 'blog_view',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Views', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
		array(
            'id'       => 'blog_length',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Reading Length Active', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
    )            
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Settings', 'blogxer' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-2',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Post/news Layout Style', 'blogxer' ),
            'indent'   => true,
        ),	
        array(
            'id'       =>'post_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Post Layout', 'blogxer' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'post-style-1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'post-style-3.png',
                ),
				'style3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'blogxer' ) . '</b>',
                    'img' => BLOGXER_IMG_URL . 'post-style-3.png',
                ),
            ),
        ),		
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html__( 'single Post info Settings', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_featured_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Featured Image', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),		
        array(
            'id'       => 'post_author_social',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Social Links', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Date', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'time_format',
            'type'     => 'select',
            'title'    => esc_html__( 'Modern', 'blogxer'), 
            'subtitle' => esc_html__( 'Simple Date format', 'blogxer' ),
            'options'  => array(
                'modern' => esc_html__( 'Modern', 'blogxer' ),
                'none'   => esc_html__( 'None', 'blogxer' ),
            ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
		array(
            'id'       => 'post_share',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Share', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_links',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Next Post / Previous post', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_bio',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Bio', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_view',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/hide Post View', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
			'subtitle' => esc_html__( 'Show or hide post views count number', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_length',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Reading Length Active', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'section_post_related',
            'type'     => 'section',
            'title'    => esc_html__( 'Related Post Settings', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'show_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related product', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
		array(
			'id'       => 'show_related_post_number',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Number', 'blogxer' ),
			'default'  => esc_html__( '5', 'blogxer' ),
		),
		array(
			'id'       => 'related_post_query',
			'type'     => 'radio',
			'title'    => esc_html__('Query Type', 'blogxer'), 
			'subtitle' => esc_html__('Post Query', 'blogxer'),		
			'options'  => array(
				'cat' => esc_html__( 'Posts in the same Categories', 'blogxer' ), 
				'tag' => esc_html__( 'Posts in the same Tags', 'blogxer' ), 
				'author' => esc_html__( 'Posts by the same Author', 'blogxer' ),
			),
			'default' => 'cat'
		),
		array(
			'id'       => 'related_post_sort',
			'type'     => 'radio',
			'title'    => esc_html__('Sort Order', 'blogxer'), 
			'subtitle' => esc_html__('Display post Order', 'blogxer'),
			'options'  => array(
				'recent' => esc_html__( 'Recent Posts', 'blogxer' ), 
				'rand' => esc_html__( 'Random Posts', 'blogxer' ), 
				'modified' => esc_html__( 'Last Modified Posts', 'blogxer' ),
				'popular' => esc_html__( 'Most Commented posts', 'blogxer' ),
				'views' => esc_html__( 'Most Viewed posts', 'blogxer' ),
			),
			'default' => 'recent'
		),
		array(
			'id'       => 'show_related_post_title_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Title Length', 'blogxer' ),
			'default'  => esc_html__( '8', 'blogxer' ),
		),
		array(
            'id'       => 'section-submenu-6',
            'type'     => 'section',
            'title'    => esc_html__( 'Place of the Caption', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'show_caption',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show caption', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => false,
        ),
		array(
			'id'       => 'show_caption_place',
			'type'     => 'radio',
			'title'    => esc_html__('Place of the Caption', 'blogxer'), 
			'subtitle' => esc_html__('Display Caption in Post', 'blogxer'),
			'options'  => array(
				'underimage' => esc_html__( 'Under Image', 'blogxer' ),
				'overimage' => esc_html__( 'Over Image', 'blogxer' ),
			),
			'default' => 'underimage',
			'required' => array( 'show_caption', 'equals', true )
		),
		array(
			'id'       => 'show_caption_align',
			'type'     => 'radio',
			'title'    => esc_html__('Caption alignment', 'blogxer'),
			'subtitle' => esc_html__('Alignment of the caption', 'blogxer'),
			'options'  => array(
				'cap_right' => esc_html__( 'Right', 'blogxer' ),
				'cap_left' => esc_html__( 'Left', 'blogxer' ),
				'cap_center' => esc_html__( 'Center', 'blogxer' ),
			),
			'default' => 'cap_right',
			'required' => array( 'show_caption', 'equals', true )
		),
    ),
)
);

// Post Sharing Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Sharing Option', 'blogxer' ),
    'id'               => 'post_sharing_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Post/news Sharing Option', 'blogxer' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_share_facebook',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Facebook Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_twitter',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Twitter Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_google',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Google Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Linkedin Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_whatsapp',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Whatsapp Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_stumbleupon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Stumbleupon Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_tumblr',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tumblr Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Pinterest Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_reddit',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Reddit Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_email',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Email Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_share_print',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Print Share Button', 'blogxer' ),
            'on'       => esc_html__( 'On', 'blogxer' ),
            'off'      => esc_html__( 'Off', 'blogxer' ),
            'default'  => true,
        ),
    ),
)
);

// Error
$blogxer_fields2 = array(
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => esc_html__( 'Page Title', 'blogxer' ),
        'default'  => esc_html__( 'Error 404', 'blogxer' ),
    ),
    array(
        'id'       => 'error_bodybg',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Background Color', 'blogxer' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_bodybanner',
        'type'     => 'media',
        'title'    => esc_html__( 'Body Banner', 'blogxer' ),
        'default'  => array(
            'url'=> BLOGXER_IMG_URL . '404.png'
        ),
    ),
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 1', 'blogxer' ),
        'default'  => esc_html__( 'Oops! That page can’t be found.', 'blogxer' ),
    ),
	array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 2', 'blogxer' ),
        'default'  => esc_html__( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'blogxer' ),
    ),
    array(
        'id'       => 'error_text1_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 1 Color', 'blogxer' ),
        'default'  => '#111111',
    ),
    array(
        'id'       => 'error_text2_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 2 Color', 'blogxer' ),
        'default'  => '#444444',
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => esc_html__( 'Button Text', 'blogxer' ),
        'default'  => esc_html__( 'GO TO HOME', 'blogxer' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Error Page Settings', 'blogxer' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $blogxer_fields2           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => esc_html__( 'WooCommerce', 'blogxer' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => esc_html__( 'General', 'blogxer' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'blogxer' ),
                'default'  => '9',
            ),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Hover Effect', 'blogxer' ),
                'on'       => esc_html__( 'Enabled', 'blogxer' ),
                'off'      => esc_html__( 'Disabled', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Add to Wishlist Icon', 'blogxer' ),
                'on'       => esc_html__( 'Enabled', 'blogxer' ),
                'off'      => esc_html__( 'Disabled', 'blogxer' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Quickview Icon', 'blogxer' ),
                'on'       => esc_html__( 'Enabled', 'blogxer' ),
                'off'      => esc_html__( 'Disabled', 'blogxer' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => esc_html__( 'Product Single Page', 'blogxer' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => esc_html__( "Show excerpt when short description doesn't exist", 'blogxer' ),
                'on'       => esc_html__( 'Enabled', 'blogxer' ),
                'off'      => esc_html__( 'Disabled', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => esc_html__( 'Cart Page', 'blogxer' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'blogxer' ),
                'on'       => esc_html__( 'Show', 'blogxer' ),
                'off'      => esc_html__( 'Hide', 'blogxer' ),
                'default'  => true,
            ),
        )
	) 
);
}

// -> END Fields
