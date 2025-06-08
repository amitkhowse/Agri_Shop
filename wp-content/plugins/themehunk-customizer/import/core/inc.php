<?php
//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ALLOW_UNFILTERED_UPLOADS' ) ) {
	define( 'ALLOW_UNFILTERED_UPLOADS', true );
}

if ( ! function_exists( 'themehunk_customizer_sites_admin_load' ) ) :

	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	/**
	 * Themehunk Sites Setup
	 *
	 * @since 1.0.5
	 */
	function themehunk_customizer_sites_admin_load() {
	require_once(THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/class-installation.php');
	require_once(THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/class-admin-load.php');

	}

	add_action( 'init', 'themehunk_customizer_sites_admin_load' );

endif;