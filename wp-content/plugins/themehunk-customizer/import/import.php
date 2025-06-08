<?php
/**
 * Type:  Themehunk Customizer Site Import Builder
 *
 */

//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('THEMEHUNK_CUSTOMIZER_WEBSITE_URL', plugin_dir_url(__FILE__));  //AI_SITE_BUILDER_PLUGIN_URL


if ( ! defined( 'THEMEHUNK_CUSTOMIZER_DIR_WEBSITE' ) ) {
	define( 'THEMEHUNK_CUSTOMIZER_DIR_WEBSITE', THEMEHUNK_CUSTOMIZER_PLUGIN_PATH.'import/' ); 
}

require_once(THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'admin/init.php');
require_once(THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/inc.php');
require_once(THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'app/app.php');
require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/class-core.php';


