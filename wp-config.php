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
define('DB_NAME', 'mks');

/** MySQL database username */
define('DB_USER', 'mks');

/** MySQL database password */
define('DB_PASSWORD', 'mks');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Du1i[~@IA~9L~_5 :`r5NaC9iya&}D!).)Xvr4|JetQou0rf]h9MF727u6lGYYHr');
define('SECURE_AUTH_KEY',  'wC>&wWGUf1g{3vBxY)!Er]^[5y9FH$;JQDRsY<W>mrD@NrA^2A};}0e&?h#$?mY{');
define('LOGGED_IN_KEY',    'HYtioYsR5(O}NNFZaj*FvlTn9LZZ_A )@HRV6XPgm;hFHZo#hjg4>EgHj0k8bT~!');
define('NONCE_KEY',        '@2Y?=V?|]o?% /SH-jSx|-85v #Wsa8 @ v3L{^JaX#^q&&+AzHPS1Gq:bJa|`Lc');
define('AUTH_SALT',        'HSC lv6 TGZuHh4ze(H]@17=A[Iv-7V?8pXzK&!4Z-37$|h<yO5~/T*:liB]!f~w');
define('SECURE_AUTH_SALT', '}]SY$KET_nKD2aY_/1JZ4xh?/<S%9{|eRy{+.H!D+[4BsIc~pjY-#v3TVwFK-OGG');
define('LOGGED_IN_SALT',   'oGHg-;{ve_]Yp|t{)q~mwdMls6TdNMf}3:^&s5{OLt tsN?#|fV?ZZuOG,KavXjS');
define('NONCE_SALT',       '9:gK}Gxym%D{cm7/]wp<!i2b.}_-I]#v)Lx!xmPK{@fVmT4fxf{)j4_H*7izTtp=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mks_';

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

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
