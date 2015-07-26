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
define('DB_NAME', 'moneyiq_wp1');

/** MySQL database username */
define('DB_USER', 'moneyiq_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'C#[M^[9J9h89~@3');

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
define('AUTH_KEY',         'XG0UZPaTcRVsZyLrsGf2iVXb1EJVXvERiEmk8GCkOFPv1SWSThAOUEvbmBBtn4m6');
define('SECURE_AUTH_KEY',  'yVE8A9iQoJxj8PWEE3L5y0Nl29INZY9IYYd3eOluZLgkO703w0UAgXM9lceBQYHl');
define('LOGGED_IN_KEY',    'sJp6blDFEitX6WjZXtvSho1hBkOcE7Z68Yy5vtLY5x23flBIlXZHUiOp9GBqCts8');
define('NONCE_KEY',        'a8QRg7Gvf3b1TMzcvKCgB8bNuUSTNvggwbp5GxwFNZJIQnDQLc4V6KREmwzpqUNF');
define('AUTH_SALT',        'mjn9JQv0KWmd7dqr0dgpCRPyfdpWxgFKilZgiKLfiDIaMLFPqHi7cJwKc5e41drt');
define('SECURE_AUTH_SALT', 'ti6wRh9Z4f2gg5ZnUOmctPPIuzRHEObV69G5hoIfYIh4GjgJQZMZeVjYxz1xVh0q');
define('LOGGED_IN_SALT',   'eNmPAvkqLh2qOJbUAf9zvJsu7ULEB18Aybe9TPOTjRX6aLM4gRs34ytjzMW60RDt');
define('NONCE_SALT',       'bUT0LO8Fe2JZgLlcHo5fQ9wSUdAzLpKVMLX22ExcyFoDp7KoOOKGnBshKH7LpNdV');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
