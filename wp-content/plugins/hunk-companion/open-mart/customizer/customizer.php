<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function top_store_front_customize_register( $wp_customize ){
//Front Page
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/top-slider.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/higlight.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/category-tab.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/category-vertical-tab.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/category-slider.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/product-list.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/ribbon.php';
require HUNK_COMPANION_DIR_PATH . '/open-mart/customizer/frontpage/banner.php';
}
add_action('customize_register','top_store_front_customize_register');