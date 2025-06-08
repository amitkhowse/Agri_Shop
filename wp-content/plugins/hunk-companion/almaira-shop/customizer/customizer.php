<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function almaira_shop_front_customize_register( $wp_customize ){

require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/category-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/instafeed-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/product-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/ribbon-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/slider-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/sortby-customizer.php';
require_once HUNK_COMPANION_DIR_PATH . 'almaira-shop/customizer/frontpage/contact-page-customizer.php';

}
add_action('customize_register','almaira_shop_front_customize_register');
