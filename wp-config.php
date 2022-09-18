<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thefactorykaikoura' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'G-3e:KFF9)*{&sXoN19h/s*!sxqd6cJDi4iE$wT&4dG={3i0yH]9e#2#$dt`0{(M' );
define( 'SECURE_AUTH_KEY',  'Bv2$#H|W<rgxHYwsf 9x)>FEtDj%F]N&L!oVO0ZmM3#XOi}8&mku{bx<%RZ:y;Xd' );
define( 'LOGGED_IN_KEY',    'DP#3%@/t@es)prHYN!se6g3JU!uy+7;/oyC{!IR ZTZgIO*}_S41yU=(f&Cr0`q<' );
define( 'NONCE_KEY',        'F>/[o_>d41/_H5rsjT`-/(?k8EuiA6vv DlEO/q8xcOs8Yjwu(_nD!L-=cF1X+&2' );
define( 'AUTH_SALT',        'dw&EmnW=c:LO;idV[hxKY_DHJcxy0&`.5vs;#{*ym4h<|.@/v%c,/Pa<3&WD98!4' );
define( 'SECURE_AUTH_SALT', '_b&MBv-ux1Ny&.o<&e<Pecp*l{H}KO^)+Dakc}R.s=qbC)Fk{VE,1G1ThkzeL?T~' );
define( 'LOGGED_IN_SALT',   ']IsiLKB?`= =^^],oL/;FtDcPYjC`$gIDju`]rTT*A,I{SVQs_R_eYg%N|tT+&j[' );
define( 'NONCE_SALT',       'Z%clSjYGi9F&QDctAY/;}c>vZ{Qh)`2>VRW2c^[JTzc]]v,i.{:nF00Q`hdeQFnS' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
