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
define('DB_NAME', 'kiitelab_db');

/** MySQL database username */
define('DB_USER', 'kiitelab_root');

/** MySQL database password */
define('DB_PASSWORD', 'SagnikPaul 28');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'REJv99;g-2zzOL!bW3t.Cq7_VP{[=6w3*z:D6&0:ieF!GBaYW4 1Xg*9YB@-h5<E');
define('SECURE_AUTH_KEY',  '593jyU+RplJHB+F)oj5P=Dw<8Fqj>FzYAmOPYKAF{zQ{nz ^&~%^E&Y/76wJ1!.R');
define('LOGGED_IN_KEY',    'cDPCJ3}V&CP9^^k$Q=D#ww_Te$WXSX8Tr}?iXS{0pxhCyNqyw /+AZ;XQFg:AWxb');
define('NONCE_KEY',        '>It7Rd&jllF(&ZOkd0.Dzdril/a@2GZ,lz#:N:LN3mqa*7RYhq)_c+nWsg@rGaM3');
define('AUTH_SALT',        ',|bxTZhWHz@-4P&I2uFunX^f(*B@MnzWaBT;D=fbAmGQW%cZT).a_vVQ&W>O+>KZ');
define('SECURE_AUTH_SALT', 'loiU;zme%[NyMriV~;Y>+(z5}*^S%UOkm`*OZj<,-4D|5[u2e;A(QXqK&dx9jz}}');
define('LOGGED_IN_SALT',   'b0KZ|^tbcW(Hsg7UEAQfXc<a6F3x#j DIyVQ/QOY6@XBb3_@Ja]o8?5%f5pHY95r');
define('NONCE_SALT',       '{WPLyL.B j*jo&!{{v-0GUw5%V: )(L|@-Y&~q=WE{ES15@)KMSl3??K,Ywb!=1e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
