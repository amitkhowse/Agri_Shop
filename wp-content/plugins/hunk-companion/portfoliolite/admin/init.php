<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
define('PORTFOLIOLITE_RESUME_SECTION_BG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/2.jpg');
define('PORTFOLIOLITE_TESTIM_SECTION_BG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/2.jpg');
define('PORTFOLIOLITE_SLIDER_IMG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/slider.jpeg');
define('PORTFOLIOLITE_BRAND_IMG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/logo.png');
define('PORTFOLIOLITE_ABOUT_IMG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/aboutus.png');
define('PORTFOLIOLITE_TESTIMONIAL_IMG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/sat.jpg');
define('PORTFOLIOLITE_TEAM_IMG',HUNK_COMPANION_PLUGIN_DIR_URL.'portfoliolite/assets/images/team.jpg');
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/admin/portfoliolite-shortcode.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/admin/portfoliolite-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/admin/custom-taxonomy.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/admin/custom-style.php';

// widgets
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/widgets/widgets.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/widgets/service-widget.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/widgets/team-widget.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/widgets/testimonial-widget.php';

//customizer
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/customizer/customizer-scroll/class/class-themehunk-customize-control-scroll.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/customizer/customizer.php';

// customizer
// focus section
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/customizer/customize-focus-section/portfoliolite-focus-section.php';
require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/demo/import-data.php';