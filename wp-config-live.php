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
define('DB_NAME', 'jamesredwards_lo');

/** MySQL database username */
define('DB_USER', 'jamesredwards_lo');

/** MySQL database password */
define('DB_PASSWORD', 'Ocb1Db77sPo46il');

/** MySQL hostname */
define('DB_HOST', 'jamesredwards.dns-systems.net');

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
define('AUTH_KEY',         '(U++c6~Vp|xPc;vMVA%U[p?eNN[b9$I0]P+-?GK~J}[+{!bpPFp%s0D/`-+6Ok3C');
define('SECURE_AUTH_KEY',  '8hU%=}2,UjlWX*;%W6b QrN|Z-7UW+MMR?tCjn|{(hOQ*x(l[_=/fJIHnvRw)}q-');
define('LOGGED_IN_KEY',    'N-p*%4~L[ph)kZVE eZ 8Xn8ZcX-7sV]cvQx22OgM29-|t;MirOnsoP{LPZ@~EP7');
define('NONCE_KEY',        ' }I1d-0eq+*g$1%2z|/-vrGObaDTc~x+&m1ShkZ+X>w~*E(p3lzyqFEW9:n2wt=+');
define('AUTH_SALT',        'lcd!8Jv p~@U~E80p$+h1IWp-|U;55q<pT`1y^POD$d?S.~_Ol![Gv]XHlYu+6C0');
define('SECURE_AUTH_SALT', 'g+R!dN6H*iOSF+k[I4`}}6>OFh-D+]^vn|Mh?-p%x.krUI6Hb0Z;e(yZQ1Ue>mrh');
define('LOGGED_IN_SALT',   'orFQtM7*3!ET{%/0,^sJ8._-les>~uaZAnfHMR#}B*p-uBEZ|h+AHwEFdFByPHfo');
define('NONCE_SALT',       '8FB6i+kc?R+#|srI+nqi{wV-XUy<|ab?7^-0+/K(.)+0l&V52:AqIIm&<-,$l<@?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
