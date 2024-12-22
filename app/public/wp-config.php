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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'T}><W*n@</%$-:[{LIad4|?sLSuhZ 2Hs2g!We46N0z79:vS+pP4o=h#,#E#Z6 l' );
define( 'SECURE_AUTH_KEY',   'qkA`fr,VP/1BHqRi=h@5@Ww.CrwruW;)m:EpxH@ZZ4B)>e [5z|-XM<^S:irq^9-' );
define( 'LOGGED_IN_KEY',     '@*>Xpe2Mex,)EDCRFmSZj0!{iVCEq[U+WYlot_e2 qE:11G--nyOGw`9iR@m:I4<' );
define( 'NONCE_KEY',         '@P4^aH7dyq.!a?`j7KKh:+CA~DuO}9T]?F0vHuN|pzJ4=:~G?t~&$ydzTaDzPhec' );
define( 'AUTH_SALT',         'c{AKQ1R]cUkb{w@L?4qKc+8]d~Z9f31*!j,U2o9JTUZ(u&p~|0|i:G3H>5z+`i[Q' );
define( 'SECURE_AUTH_SALT',  'Ca9@t8o^.hn#hV1h+>6FB]1q7y}7?AB+h&m!+%3KsLl>NzrTK[lgETc Sn+iUUan' );
define( 'LOGGED_IN_SALT',    '#GK7yc!)Md-vYuEh6_BnLIwgEXVTvkyp,R&OVm^.c&eA9p<IQs_3k+F1Jx4j~z/B' );
define( 'NONCE_SALT',        'S}MxnQ60CcjIefE K_C!I}W6v:bvOnj%Bn7QBjP&`Pm>9H,V@Ba}t-Nd4[Q7{zO;' );
define( 'WP_CACHE_KEY_SALT', '|)aioSG}xtx52.exkfwmhcPWU%uir/`o0$]blKV-CO+oKGI: 7~Up2Fv.t}c6=xP' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
