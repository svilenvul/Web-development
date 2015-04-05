<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '!5N_s~B;h$1@ F5MFRI=aL:.-:N<gMSYM,_!3xy,DKY;+mA=ax-@VT-gBL5^+*OB');
define('SECURE_AUTH_KEY',  'ZuDAEZs&F>vLK>+e|n2p{n$ux/HRf-(/Hih~a+i*d^z+jRRBa&OW=a`hLUZ&aXOw');
define('LOGGED_IN_KEY',    'SKOirne<kl+b =7vP-6~bvX]paX#:rI7+!RT3||Pp38Y_28[]vcR/I&b>YFCakg>');
define('NONCE_KEY',        'xBV`{vkQf|~-$NSW`^*>5aP^`K!|;2M);94~s*P?hGfdiYd8mb1~+5GPO8].5H-I');
define('AUTH_SALT',        'GjRV@2fW=|k++7+mGd[}ENcO13o,oO-n5LTYGkCiRC.HfP?LYTF(zXld6Jiu#d _');
define('SECURE_AUTH_SALT', '*E{ad2)rJSl^^HV^E8+x1;@Y?U-pIuDd]Q4#g//bdkRQKb!?45U4K1*f=7w%/[cD');
define('LOGGED_IN_SALT',   '{FAn;~CS(-y+]<LL+&ZKR7#3@Nn&Go~%:~f%-rRA)b;g7<K]S@F>FIA)IcliR@5Y');
define('NONCE_SALT',       'v~qm=W@YjP4r?&&#WP*):%/yHho+3~8A?y?;*+X+G]3cc&0:~, 5?X]5hl)I*4XO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('DEVENV', true);