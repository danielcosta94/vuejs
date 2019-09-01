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
define('DB_NAME', 'vue');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'k$^/=A~qOW5`gDw(7gV1](jMTV7aq@<nwP(kr%rAdJ@+ds<i!;p[HW]WC*&z&(f*');
define('SECURE_AUTH_KEY',  ' ,{,/Db[tnUAvi]1j1sdf/5()brq^*En~`if^oXb7.Y]k%iQy3gmKjANPnbmUgb2');
define('LOGGED_IN_KEY',    'Ut<fZ,iOXoPu*azG#e-[*Nr29CMjQe05v5].d_2h#07u2H]SRMNvyWO,.o5k_!}g');
define('NONCE_KEY',        'Cn[bnswqtQ;Ma8^.2eMkr9VZMP]fDuJ>;&t$H|}U.<qiS$2!>|.w]tLIv.fYJ?tj');
define('AUTH_SALT',        'i$nm2|4 prc#^n{trx8li8Rh5#$IbY^KY>a^~d#+m05w&j%)$.,37@siV~8u=7*V');
define('SECURE_AUTH_SALT', '6.qpq>7(%!J[42]DbH}5RP[(r7.vci,S,/wvN)cw/}rkQXVarSAuxI-9bZCub1-N');
define('LOGGED_IN_SALT',   '6:O4BAF/VEN(2cb4&UC,+;Q=VF^0c|>Xu9<0/~<MlgSgj=nYF%{g8:Z^r_8[E$YR');
define('NONCE_SALT',       '*|/eGc16v+v%zF5tdum<0Hch`gm%hA=/0yvzp_4_qy~o`asuWk*fOF%>pVbZ84Yq');

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
