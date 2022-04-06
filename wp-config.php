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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'districtaisnebillard' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3w3j5n5oRdwOE4g2vICwydpMdIWq6GQQ4Tptdv7JumkeXbuEhm8uZppEboCs0X7A' );
define( 'SECURE_AUTH_KEY',  'QEQocTYBXhimkKOdDjHX4TxqTDe1nryU14eo0YiKD6xn9xjBFDJ3RrmcptyhXTv2' );
define( 'LOGGED_IN_KEY',    'ysibJQuYQJvxVzqUYhAVX5kEU1nhRoB5igegvHIgLnFdDQC5iuLH72xkFP1X2VnW' );
define( 'NONCE_KEY',        'fNFe2u15raiLaovzJfaJyeXggKw5RPZqO2KEvujEY7sltCYnWxxyvcLOM1iU47BY' );
define( 'AUTH_SALT',        'eC7VUX74vwBmlbHRxTIRteSA8IF6V6oj397G5JE8d3WC4hdL1e9G9Eas660ZgMjF' );
define( 'SECURE_AUTH_SALT', 'eIYqqm4wVwKvEcENnV9wRaynNsD9W48Jtc9HnQ1QmUhbJeir2BE6uRf9NLNyc44S' );
define( 'LOGGED_IN_SALT',   '0kNIKPumczHQDxTRRKS5NssAYMfsAqPXFOzbu0MdwI420SJKdpc47YfKL9AL50Cc' );
define( 'NONCE_SALT',       '5WD15iUcsBFbCT9VlyDDJLnN07SMfNxcRqZFCryAFvPSzxb4peL3I7fmJvnXWfbw' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
