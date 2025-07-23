<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_theme_data = wp_get_theme();
	$action  = 'blogxer_theme_init';
	do_action( $action );

	define( 'BLOGXER_VERSION', ( WP_DEBUG ) ? time() : $blogxer_theme_data->get( 'Version' ) );
	define( 'BLOGXER_AUTHOR_URI', $blogxer_theme_data->get( 'AuthorURI' ) );
	define( 'BLOGXER_PREFIX', 'blogxer' );

	// DIR
	define( 'BLOGXER_BASE_DIR',    get_template_directory(). '/' );
	define( 'BLOGXER_INC_DIR',     BLOGXER_BASE_DIR . 'inc/' );
	define( 'BLOGXER_VIEW_DIR',    BLOGXER_INC_DIR . 'views/' );
	define( 'BLOGXER_LIB_DIR',     BLOGXER_BASE_DIR . 'lib/' );
	define( 'BLOGXER_WID_DIR',     BLOGXER_INC_DIR . 'widgets/' );
	define( 'BLOGXER_PLUGINS_DIR', BLOGXER_INC_DIR . 'plugins/' );
	define( 'BLOGXER_MODULES_DIR', BLOGXER_INC_DIR . 'modules/' );
	define( 'BLOGXER_ASSETS_DIR',  BLOGXER_BASE_DIR . 'assets/' );
	define( 'BLOGXER_CSS_DIR',     BLOGXER_ASSETS_DIR . 'css/' );
	define( 'BLOGXER_JS_DIR',      BLOGXER_ASSETS_DIR . 'js/' );

	// URL
	define( 'BLOGXER_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'BLOGXER_ASSETS_URL',  BLOGXER_BASE_URL . 'assets/' );
	define( 'BLOGXER_CSS_URL',     BLOGXER_ASSETS_URL . 'css/' );
	define( 'BLOGXER_JS_URL',      BLOGXER_ASSETS_URL . 'js/' );
	define( 'BLOGXER_IMG_URL',     BLOGXER_ASSETS_URL . 'img/' );
	define( 'BLOGXER_LIB_URL',     BLOGXER_BASE_URL . 'lib/' );

	//Other Plugins active or not
	define( 'BLOGXER_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );

	// Includes
	require_once BLOGXER_INC_DIR . 'helper-functions.php';
	require_once BLOGXER_INC_DIR . 'redux-config.php';
	require_once BLOGXER_INC_DIR . 'blogxer.php';
	require_once BLOGXER_INC_DIR . 'general.php';
	require_once BLOGXER_INC_DIR . 'scripts.php';
	require_once BLOGXER_INC_DIR . 'template-vars.php';
	require_once BLOGXER_INC_DIR . 'sidebar-generator.php';
	/*require_once BLOGXER_INC_DIR . 'lc-helper.php';
	require_once BLOGXER_INC_DIR . 'lc-utility.php';*/

	// Includes Modules
	require_once BLOGXER_MODULES_DIR . 'rt-post-related.php';
	require_once BLOGXER_MODULES_DIR . 'rt-breadcrumbs.php';
	require_once BLOGXER_MODULES_DIR . 'rt-ad-management.php';

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		require_once BLOGXER_INC_DIR . 'woo-functions.php';
		require_once BLOGXER_INC_DIR . 'woo-hooks.php';
	}

	// TGM Plugin Activation
	require_once BLOGXER_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once BLOGXER_INC_DIR . 'tgm-config.php';

	function blogxer_loadtemplate($templateurl, $data = array()){
		extract($data);
		include( locate_template( $templateurl.'.php', false, false ) );
	}

	add_editor_style( 'style-editor.css' );



