<?php
/**
 * Type:  Site Import Builder
 *
 */

//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (defined( 'AI_SITE_BUILDER_PLUGIN_PRO' ) ) return;


define('VAYU_BLOCKS_SITES_PLUGIN', 'vauy-blocks-sites');

define('VAYU_BLOCKS_SITES_URL', plugin_dir_url(__FILE__));  //AI_SITE_BUILDER_PLUGIN_URL


if ( ! defined( 'VAYU_BLOCKS_DIR_SITES' ) ) {
	define( 'VAYU_BLOCKS_DIR_SITES', VAYU_BLOCKS_DIR_PATH.'inc/vayu-sites/' ); 
}

require_once(VAYU_BLOCKS_DIR_SITES . 'admin/init.php');
require_once(VAYU_BLOCKS_DIR_SITES . 'core/inc.php');
require_once(VAYU_BLOCKS_DIR_SITES . 'app.php');
require_once VAYU_BLOCKS_DIR_SITES . 'core/class-core.php';


