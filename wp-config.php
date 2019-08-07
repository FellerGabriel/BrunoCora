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
define('DB_NAME', 'bruno');

/** MySQL database username */
define('DB_USER', 'gabriel');

/** MySQL database password */
define('DB_PASSWORD', '1111');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '~0*U|m#YkT[Vr+./k>h$b.Xx^e2}.g}w+8&LT>}zUCn5J^z{Vd1BxC?YyxV7x!&c');
define('SECURE_AUTH_KEY',  '0h=1S&:T75!G@^@p:+[5s7D]g-IKz^niI0GF#U;S(B=B.-^c&*pK!n#WQZl@c2VL');
define('LOGGED_IN_KEY',    'E:gG?)6=y1Q>Qi&o_-qSPJjDoi:/7P.4N*i7j=o4>nt|Y*3F+y/m]i7oWg(7jlP_');
define('NONCE_KEY',        '[_h=7X)~FgB=[j~e2Cx!<!a`Z+@Q}TfqK_IaFix#)[|@,C!*v#-P5!>u*Ua7GV|e');
define('AUTH_SALT',        'mgXIa>K&<p`Uc!k,X4AdK{YHgQupp&s}}cy]V&nA,M1m0%{bYQY}F^b~|292CYqc');
define('SECURE_AUTH_SALT', 'T.D;yttd]G-y6c{KX!$$ !_XPJC@lvkmI~AVhSfr#I J2Wukvpwq{aj~k!p41X^x');
define('LOGGED_IN_SALT',   'a)F#x{lh$Mw^:ogsTpFKBv*tavz!VC|,RCZ.r4)r=Q2RS%aaWyN7|+:aVf-g/N|A');
define('NONCE_SALT',       '1V67w(P;%j<?v=~g~1dV/p~JU9S23o)[PHu(% PKcJ:pG+Uzuml,@D{|bD-PtN&Z');

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
