<?php
//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ALLOW_UNFILTERED_UPLOADS' ) ) {
	define( 'ALLOW_UNFILTERED_UPLOADS', true );
}

if ( ! function_exists( 'vayu_blocks_sites_admin_load' ) ) :

	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	/**
	 * Themehunk Sites Setup
	 *
	 * @since 1.0.5
	 */
	function vayu_blocks_sites_admin_load() {
	require_once(VAYU_BLOCKS_DIR_SITES . 'core/class-installation.php');
	require_once(VAYU_BLOCKS_DIR_SITES . 'core/class-admin-load.php');

	}

	add_action( 'init', 'vayu_blocks_sites_admin_load' );

endif;