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

define('WP_SITEURL', 'https://vnifood.com');
define('WP_HOME', 'https://vnifood.com');
#define('DISABLE_WP_CRON', 'true');


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vnifood_a0onhdc26h' );

/** MySQL database username */
define( 'DB_USER', 'vnifooda0onhdc26h' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xmh3nypiuj' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'CZ3O!?O&U~[%}Z5uNvW~ehI!Y 3%:hLW(2yG5lUq0&CAS B&<4?%X(KNqXeTB/Vk' );
define( 'SECURE_AUTH_KEY',  'Exi[NQ[MZh34m`+U*q>%o5rTJJow+Tt}X4A[+F=(H*9D$A?wnfU#g@|eYqtZ+D`G' );
define( 'LOGGED_IN_KEY',    'vc er:oA3f2)b6F53~8T0&Y&7O,dft|)DUS&Ei@=a!`%fDp4 Y|:Bg)D->0k2kIS' );
define( 'NONCE_KEY',        'f;TjAp|8y glUp2IC<9OeEDFEj:R}M.)EN)(+=>!`g|H1FVVmogHoV8^L0Z@Af7s' );
define( 'AUTH_SALT',        'f!Vg:^0kA.oX]/$UZ^os7-FBpv=aJpGfcH(^:_Rp4P{eiAvmn1eq3E^Vo.#x0Me1' );
define( 'SECURE_AUTH_SALT', '44]C?WfT]5[K%7CG6.l[C|3 euDY{=gd6w{nn9Mh3?mzy_dGcmUPbOs?tC>88n[+' );
define( 'LOGGED_IN_SALT',   '6A^F4w>8CZ%yrL]NQY|rT!dA:3qrhU<:cWY9K]Juo^]aYDS)eTfV[c) f +:}j0V' );
define( 'NONCE_SALT',       'i5K!cnQwWlH^`.w{cR+1OdB?0+ x+qE_/g=qNz1)e~AsR`ai.aFi Ym[YL<#~NmW' );

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
