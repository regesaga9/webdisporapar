<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'blogxer_register_required_plugins' );
function blogxer_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Blogxer Core',
			'slug'         => 'blogxer-core',
			'source'       => 'blogxer-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.6.1'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.0.1'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '6.0.1'
		),
		array(
			'name'         => 'WP Seo Structured Data Schema Pro',
			'slug'         => 'wp-seo-structured-data-schema-pro',
			'source'       => 'wp-seo-structured-data-schema-pro.zip',
			'required'     =>  false,
			'external_url' => 'https://wpsemplugins.com/',
			'version'      => '1.4.9'
		),

		// Repository
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name'     => 'Instagram Feed',
			'slug'     => 'instagram-feed',
			'required' => false,
		),
		array(
			'name'     => 'WP Social',
			'slug'     => 'wp-social',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'blogxer',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => BLOGXER_PLUGINS_DIR,       // Default absolute path to bundled plugins.
		'menu'         => 'blogxer-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}