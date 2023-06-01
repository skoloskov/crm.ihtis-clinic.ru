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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u1527040_crmdb' );

/** Database username */
define( 'DB_USER', 'u1527040_crmdb' );

/** Database password */
define( 'DB_PASSWORD', 'hC3wK8hB9ojK7mI4' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'J n%nNm/9^3*[h=Y|BL4mfM}-DOA?z;q%qQ[ud_FSAI:AX3bQG<np%y8~|]T$Li=' );
define( 'SECURE_AUTH_KEY',  'K<Wn%W_3eY(TR+-=H_af5|d@a26~$]Y-YiA]7K&}UexUuLXX&?fGFO/JR@d5PfdW' );
define( 'LOGGED_IN_KEY',    'us^(G ` ,m;@Sy)~`+gu:_(:@i&k3c&@Z*e%*+Va^Wx89rY{/D%||1qz(sk.|3NV' );
define( 'NONCE_KEY',        'w>&,TJocPK7[FzM(u(EV2/J;nB+9g(^}rit,*(eJbW<}JHg4}~=#E?pj!3?82:qm' );
define( 'AUTH_SALT',        'SH)GtKT>^`cZ,_Xl @is;(ai|wRQo4H&dddh+/=f>BpOM{fk^su:# $?.pUdu./X' );
define( 'SECURE_AUTH_SALT', 'l>}a 7$rtIhVWs[(nDE/|&WkEC7?dIN1&$Cr -e~U,v2cE386f4@>{0khG8k5shf' );
define( 'LOGGED_IN_SALT',   '}Us1;[>oyuTV;JqWK(Vnn)kZ}q^UqV<D=vbY*`.Bqe|IsXN/g3#f^z[iV-cxIjAh' );
define( 'NONCE_SALT',       'ajK1;/RbTNUp-#rt7}DlM-!&nJ;Lp/7CIH,hE~42ef[jXnZ&dLT$@[nXyQD>HjP]' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
