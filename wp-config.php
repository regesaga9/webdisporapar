<?php
define( 'WP_CACHE', true );
define('RELOCATE',true);
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'disporapar_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '?;A~UveMY7583}3>[HQQ>bMd6@E.ruDv0@TrD6~JjkH5t#G |!%L=_KclCcQ>>8m' );
define( 'SECURE_AUTH_KEY',   'z1uOiA2Z`T>v[^Vx:BL=AxMieh/IsjlX.-W*ZeeM|PnC-#[TdQIU8VXxXK5?Z+T;' );
define( 'LOGGED_IN_KEY',     '# %sx&+_Z#K+5[9Znwy+780lt@KJA+H=DYk4i=0^~UxFI}W4Y-wL/plO6[09] 1$' );
define( 'NONCE_KEY',         'VFzp(?aB&f7RxLyvS9;aMPkd(_+FTE=Jr^9, Cg~(}0||syd< R<5gn,I}HN]I,r' );
define( 'AUTH_SALT',         ';[I(my!dMaVO&V23r,d%LCq@A1ssRzdYy(kHW^0sdvjO)kKLu:9OTDmTb%)-*6n2' );
define( 'SECURE_AUTH_SALT',  'X,7}JJNm+^c)yCv>< w%NsfyE#J{,utF/FR|=uPN8aF5?jmBj./N5#0eAsEnM<NF' );
define( 'LOGGED_IN_SALT',    'hEan0{g1LP6]J$u77I$DPBbo+Q9kx0-4c.sSfR{ c[.:i:n0AJw{=875#X (ZLA_' );
define( 'NONCE_SALT',        '4+G@^*]1)%22OY{c!k1T0v>#8&Y>C?k@/#!d5|Vnr|i0X];Zw30jilLj*9QapijK' );
define( 'WP_CACHE_KEY_SALT', 'L_RVa*}7G]v`0 mA9qI,k1_s|OwcW*&sTMD3]/:L@MI.fA:PS:qa>La#+k+xbr@H' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */
//  define( 'WP_HOME', 'https://disporapar.kuningankab.go.id/web' );
//  define( 'WP_SITEURL', 'https://disporapar.kuningankab.go.id/web' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


