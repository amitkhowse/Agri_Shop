<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'agri_shop_db' );

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
define( 'AUTH_KEY',         '+8v~g4/!A-+X:2[~T_}_+9pfX0R~@;QX;-nP@G!WMf5f5WB5lu yB9=zf)%n45Dz' );
define( 'SECURE_AUTH_KEY',  'Ja)M4:eIL>Pf[`<}m8^(#`iFVsmxGQ SUWTWv!YG%P9<DS85R/>!BzNS8L3;SZHJ' );
define( 'LOGGED_IN_KEY',    '? qNEQ.o9K)ojU:~GK!oz>j HZ7t!Eu+ yTA>{}(4!A8&gbLT*K{Lxr#=BG5PV-0' );
define( 'NONCE_KEY',        'F_,Tcn2j*8^wft+TeG$}BxEQe)v|God`*F&wr&Vk~U~D0t@qNbi+E/2}mdw3pLA9' );
define( 'AUTH_SALT',        'ZabQt3Hn%O#$23SlaaS2l$`51R0fdSudn@c.sL4&D(lRs*x[Rf~UovVecqe&MBT~' );
define( 'SECURE_AUTH_SALT', 'TB>mk ag2P5w#D`(`YP_zU_m|W:c|>gIg[5>!REj|OYn@Ayh}z0GBU3d90bLW+|m' );
define( 'LOGGED_IN_SALT',   'S~b#:fZQVQhz}J=fT%K13y_Vt224(YN$&YcbfGZXt^:,b(aEK3}|IV]:%&$&=U&A' );
define( 'NONCE_SALT',       'J_/z{Rbd(TlLrxtDU=Ct3wEP#l<=7d9^-?CMOb9MzW YPL<NQ_WmUnssG5^a/?{:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
