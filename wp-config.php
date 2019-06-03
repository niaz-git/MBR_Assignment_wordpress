<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Sarnaik_wpdb' );

/** MySQL database username */
define( 'DB_USER', 'Sarna_wpdb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root1234' );

/** MySQL hostname */
define( 'DB_HOST', '69.167.149.247' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Rn=N&{&VOD<mTiTax2a]7DpbMHq.u*!ch`5>GQ@E]ggYIfHf~3ciWi|3)m#XJEY~' );
define( 'SECURE_AUTH_KEY',  '7SOE7}k8^I[k[jLN|@Q/fa&Pp[R8~=3T$}d2|*8z12(<leR]1BZ+J%_K]8X])MXz' );
define( 'LOGGED_IN_KEY',    'uGI4|cWxLRV1 )Vz|^a<(zI/]##<qXhlPHrBBz}`!4I02Th[lm`U5:f8P.HF=(R5' );
define( 'NONCE_KEY',        '9:gn}@(-gsLNtW;hwZ94uCxy!Hfr<8x}4A4#Hh._Kpxy|!+hIj1$eE114D^*dDT[' );
define( 'AUTH_SALT',        '.9YW8M]k4zOoV*GzP.4~pH4%,lBeny)R?Es)xWV,b3%(mnxb[?W(`bt9Br]Wlh|7' );
define( 'SECURE_AUTH_SALT', '&<+=>gH%#i<:P`%wH60MZ}dlKT.bI;0]q{WmmZ=QHjIW5-B0-5L}Pw$:m#>E0)+a' );
define( 'LOGGED_IN_SALT',   '8(MpZ<0+/E%-&,:JWbRY$<w1Q%AsG|K;^_>0b0q&UfuEni%#x18g~iofjBnH1Gd ' );
define( 'NONCE_SALT',       'tbd7S-1JvCqT ~vb}wGN6`]?Eyb?1s3b9hOtl,XKC8=NW-x+K*i59:=#3g%+4Ap%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
