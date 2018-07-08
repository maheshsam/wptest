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
define('DB_NAME', 'codeline');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'AlnARH[%~}a&#o~ctvQeUq9f=S?X+E>b9/Y)x(iWO?M^-sy|.:p)7}8k(;]OUpS|');
define('SECURE_AUTH_KEY',  's,x#1]/xJp[X[0=%]{;^6o1+*4Axx]BN.8uX1;~%QA[>L*r9M+-48_Bc!&<vn6_B');
define('LOGGED_IN_KEY',    'UP~$oXGp9A~r21X:S] -L[Yh-{E;e9g6QVLSAYd;uAw13%@6FCoUBc}/JIy9?..%');
define('NONCE_KEY',        '-.H2W_Wj`VI]kpS.h@!+d`Nx?+XdcLW2.Q<l[WW-Hn&/6)Qfg@H]EWGp3/h.f:xD');
define('AUTH_SALT',        '`ORRr,3pgD;+xR*7%~u0EG4,V`49>RQ7u6PNT2;I`62l&6W|}1P%7pY%R#:2sG>|');
define('SECURE_AUTH_SALT', '/R[VNu:WjR)aviNk>Vx7aJ}8Fr#&%KoT%=K?z]Y#&yAuo2XQZDSu,CFoH.%=xs6/');
define('LOGGED_IN_SALT',   '>Tj%hm{5Ekhv=3wW%#DZ0vI(t*qK2)5{AN^)g|qC1Gq)321jrl~-vw^40@0L99yz');
define('NONCE_SALT',       'N6JlN(z%Stf]7QtgcXKMeu|4d<LDaP96{vQ5m*n((,v}CA82zrr4y;*Iy_S8>^0h');

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
