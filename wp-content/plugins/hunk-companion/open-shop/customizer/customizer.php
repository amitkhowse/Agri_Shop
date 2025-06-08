<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function open_shop_front_customize_register( $wp_customize ){
//Front Page
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/top-slider.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/category-tab.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/product-slide.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/category-slider.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/product-list.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/ribbon.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/banner.php';
require HUNK_COMPANION_DIR_PATH . '/open-shop/customizer/frontpage/higlight.php';
// product shown in front Page
 $wp_customize->add_setting('open_shop_prd_shw_no', array(
            'default'           =>'20',
            'capability'        =>'edit_theme_options',
            'sanitize_callback' =>'open_shop_sanitize_number',
        )
    );
    $wp_customize->add_control('open_shop_prd_shw_no', array(
            'type'        => 'number',
            'section'     => 'open-shop-woo-shop',
            'label'       => __('No. of product to show in Front Page', 'open-shop' ),
            'input_attrs' => array(
                'min'  => 10,
                'step' => 1,
                'max'  => 1000,
            ),
        )
    );


/*************************/
/* Footer Section for Pro*/
/*************************/

$wp_customize->add_setting('openshop-footer-pro-link', array(
    'sanitize_callback' => 'openshop_store_sanitize_text',
    ));
$wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'openshop-footer-pro-link',
            array(
        'section'     => 'open-shop-bottom-footer',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/open-shop-pro/',
        'label' => esc_html__( 'Get Pro', 'open-shop' ),
        'priority'   =>100,
    )));



}
add_action('customize_register','open_shop_front_customize_register');