<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-admin/open-shop-front-page-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-admin/open-shop-shortcode.php';
// woo
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-admin/woo/woo-function.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-admin/woo/woo-ajax-function.php';
// customizer
// focus section
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/customizer/customize-focus-section/open-shop-focus-section.php';
// repeater-models
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/customizer/models/class-open-shop-singleton.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/customizer/models/class-open-shop-defaults-models.php';
require_once HUNK_COMPANION_DIR_PATH . 'open-shop/customizer/repeater/class-open-shop-repeater.php';

require_once HUNK_COMPANION_DIR_PATH . 'open-shop/customizer/customizer.php';

//widget
require_once HUNK_COMPANION_DIR_PATH .'open-shop/widget/widget-input.php';
require_once HUNK_COMPANION_DIR_PATH .'open-shop/widget/about-us-widget.php';
require_once HUNK_COMPANION_DIR_PATH .'open-shop/widget/post-single-slide-widget.php';

