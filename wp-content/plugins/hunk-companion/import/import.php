<?php
/**
 * Type:  Hunk Companion Site Import Builder
 *
 */

//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('HUNK_COMPANION_WEBSITE_URL', plugin_dir_url(__FILE__));  //AI_SITE_BUILDER_PLUGIN_URL


if ( ! defined( 'HUNK_COMPANION_DIR_WEBSITE' ) ) {
	define( 'HUNK_COMPANION_DIR_WEBSITE', HUNK_COMPANION_DIR_PATH.'import/' ); 
}

require_once(HUNK_COMPANION_DIR_WEBSITE . 'admin/init.php');
require_once(HUNK_COMPANION_DIR_WEBSITE . 'core/inc.php');
require_once(HUNK_COMPANION_DIR_WEBSITE . 'app/app.php');
require_once HUNK_COMPANION_DIR_WEBSITE . 'core/class-core.php';


