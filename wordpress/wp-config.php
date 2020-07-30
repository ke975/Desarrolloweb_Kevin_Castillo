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
define( 'DB_NAME', 'examenwordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y6>trYn!},{#TKQ[NN F}z5!Vz-]_$2lM]._m8O:<mZ?yHzaQEw^8*s@a->Jn{ym' );
define( 'SECURE_AUTH_KEY',  'M Uqn7->c8FdrQ]9;dx;P@{j?;.:tkj(esG0Bmui/@Ma1oE%p8k.G.pG^>l6c/AX' );
define( 'LOGGED_IN_KEY',    '3=V@2Ia{H|F$W6D_OkEs2D,-X311,l%(@Hf.)gV~~i4-qA<)FX@db /Xn[WF:Pjr' );
define( 'NONCE_KEY',        '#=nI.Rc=o|h^JT?30ZV}N*G1K;XYJR9`qZgifA6-*ceu+`]#qX&yQ3thG/7B*MOY' );
define( 'AUTH_SALT',        'i!_fY@78~-z{QwK(#[@q3~{hjFLD2d&Y/r&eA|gWw&iwl#t!v/,qb>sTsj,${7xP' );
define( 'SECURE_AUTH_SALT', 'SD#y/- Z$@GLK_.TCLBDu8#+U{[IcOUCfK*4`6k!>GIUDj8JJiKxh3#:ICL.:WG:' );
define( 'LOGGED_IN_SALT',   'T7at0*X=&1JXc4,9!&J ?uyEeStRj1R7]dFmxX>Um{=t[C>sI%l!M7eD/KdF<:8~' );
define( 'NONCE_SALT',       'b*Fr O,0xI>!Q%#)CUx^o&KZg]~TuNLXE.{.+mfw6TYH$TEV-N0Z-<pSfDpPR?ky' );

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

add_filter( 'wp_nav_menu_items', 'dcms_items_login_logout', 10, 2);

function dcms_items_login_logout( $items, $args ) {

	if ($args->theme_location == 'primary') {
		if (is_user_logged_in())
		{
			$items .= '<li class="menu-item btn-menu btn-logout">
						<a href="'. wp_logout_url(get_permalink()) .'">'. __("Log Out") .'</a>
						</li>';
		}
		else
		{
			$items .= '<li class="menu-item btn-menu btn-login">
						<a href="'. wp_login_url(get_permalink()) .'">'. __("Log In") .'</a>
						</li>';
		}
	}

	return $items;

}