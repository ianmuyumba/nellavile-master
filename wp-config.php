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
define( 'DB_NAME', 'nellavil_wp853' );

/** MySQL database username */
define( 'DB_USER', 'nellavil_wp853' );

/** MySQL database password */
define( 'DB_PASSWORD', '55-27Sp64)' );

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
define( 'AUTH_KEY',         '0h1fez3z3egvggw9z6ubml3xbql26scwduk8bvyeaprrojes3ef4yj4smtltvroq' );
define( 'SECURE_AUTH_KEY',  'smfhs1k3q3dtepexahqlkdnk1zktfl1eshrvbgcv58hyvprcceqpzgrq0sgvr67b' );
define( 'LOGGED_IN_KEY',    'aqhiufzbii16dpfoab3hgchme5luxnaorewzvvjlwkrzxet3mw6pmj1el2g2kifw' );
define( 'NONCE_KEY',        'bdef0tvlr7r6lafcthss2hp7upw9kdx1wzukltcwmwvcybfnugyhimfey3v68eqj' );
define( 'AUTH_SALT',        'rnagajtp0algepjforruvs4xetun0zlensmy1hal9vu0cwpymlwb7d0xzf92zrwh' );
define( 'SECURE_AUTH_SALT', 'kdjyxnmwfrmqve2mh0ni7ranmrokctodu9nd9dbpeffqngbvpbk6nsmnos3sxmu5' );
define( 'LOGGED_IN_SALT',   '72qlxou0hzrsqkxunkz58il2kcgduu7iiljhgfblmrnrjnpkamwm3l9o4ic8rivy' );
define( 'NONCE_SALT',       'wlns2oshyh8jtvtadck16immbjmh6s6wucwwgsennza1estuirihtgylham4l7fm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpx2_';

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
define( 'WP_MEMORY_LIMIT', '96M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
