<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-admin/open-mart-front-page-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-admin/open-mart-shortcode.php';
// woo
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-admin/woo/woo-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-admin/woo/woo-ajax-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/open-mart-custom-style.php';
// customizer
// focus section
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/customize-focus-section/open-mart-focus-section.php';
// repeater-models
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/models/class-open-mart-singleton.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/models/class-open-mart-defaults-models.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/repeater/class-open-mart-repeater.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-mart/customizer/customizer.php';

//widget
require_once HUNK_COMPANION_DIR_PATH .'open-mart/widget/widget-input.php';
require_once HUNK_COMPANION_DIR_PATH .'open-mart/widget/about-us-widget.php';