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
define( 'DB_NAME', 'element' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'qn@X;lzi]/`|Po,A7v,.5p/Q2gkkKe=x<gQ</h1I;;Zy2k}m9@aR:6+D/QFm4;Qe' );
define( 'SECURE_AUTH_KEY',  'vT(6hX-y{=Vs@qY|M=4{]$a;;y7RL2=9/=hXmM)S*cg-wju*opY,Y.lXhuDxhZ/`' );
define( 'LOGGED_IN_KEY',    'PXS#CIepJ0-=Y%3#/*2+Y>;7OMgwEt0-W#s-O8Q<[:E-c$<clib$%wRYsHn{9=[r' );
define( 'NONCE_KEY',        '+{B(dna6x|bDbs%:1tvt` d$rc^LkWtR6.kvst,~g?<yz :?CxL.hy|9nM/Rz%,R' );
define( 'AUTH_SALT',        '=*+{{CA)(TQ`g4$FE,MO6>#<14WcLuzLuj0n#Kg*0xDcE*/6[% 9T{doped?grey' );
define( 'SECURE_AUTH_SALT', 'o!|u@lQXevi8BX,lrAN >}4QYfzs+(:2[`tw$dk|O}Y~QEIWc=1CzO;t[nz|kpQ ' );
define( 'LOGGED_IN_SALT',   '@Bu3|KRLWInw~*`<bhrU9fv<v1n~dfKI{}[MeiZ7msaR1Znis[,V;n?V7txW}pz3' );
define( 'NONCE_SALT',       'bZ2%/%c*}<,_CP+Te`D+lj~woMT3gAC^bU1ZNQZb6l 2.35o2#K*F=H@34X|/{pd' );

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
