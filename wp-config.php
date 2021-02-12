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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'geTb+SP0ro0yMOQdSIRqukCKB+FfRghdIEmHjxPdT2AKbVnUkpjZaAiaI9XDTt+uOG9tJZGrMJGqBVaqP+v+XQ==');
define('SECURE_AUTH_KEY',  'RV2aiamdDP1ZG6gmEDnfA24/eHteoPcZyEy+maPZ2myla/jQS3YKZnBJ95fFjtQucGwW66y7AYeRHFDt+0X43A==');
define('LOGGED_IN_KEY',    'pfKJAopST4cCBknWgMxBRE5VRUQ5xraVF1yRVWgZW3Ks1ShdHS7Yw7E8oE5wigYRTQd0zUV2jq/n1j27bm63Tg==');
define('NONCE_KEY',        'UhzfrRnkpfu/AAKQbWKvbSx2ficsOH/6tPbA8oaW9H98y/q4SJWjdbj4RMy5drOt3ABPG2YbRHd71qjRUbvlMg==');
define('AUTH_SALT',        '8dGyWj6wsXEpdJOLZp/fomo9ukTZuk1kZoqzfDGuQp8CpiWJKqJQs0cnC+RW9tSThe5dPKeU0pldTziQQJMi6g==');
define('SECURE_AUTH_SALT', 'e/12GF2INYlu/UR8AEMDrKzeoeSszeq+Tj4OtE6ZYzsDFFJFwoBWjV3icdqHCjSukMx6aan+S1inrZoB31ilXg==');
define('LOGGED_IN_SALT',   'AVwGH+IVES7UtYBPkequXoz8XrtxGWorOhHyCEkqNBI1zpnbJsZvydQr4dyzroCEdDPV/g376Ayu9vkT6xuhbQ==');
define('NONCE_SALT',       'hnBzGC8izFtz5S3wa2kXXPnVgX83tpKg8rCOZZVQ6n/8itV1WG2YUhyiKukrj2oaZLpog6zM/WbrvWndDy1C+w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
