<?php
//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ALLOW_UNFILTERED_UPLOADS' ) ) {
	define( 'ALLOW_UNFILTERED_UPLOADS', true );
}

if ( ! function_exists( 'hunk_companion_sites_admin_load' ) ) :

	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	/**
	 * Themehunk Sites Setup
	 *
	 * @since 1.0.5
	 */
	function hunk_companion_sites_admin_load() {
	require_once(HUNK_COMPANION_DIR_WEBSITE . 'core/class-installation.php');
	require_once(HUNK_COMPANION_DIR_WEBSITE . 'core/class-admin-load.php');

	}

	add_action( 'init', 'hunk_companion_sites_admin_load' );

endif;