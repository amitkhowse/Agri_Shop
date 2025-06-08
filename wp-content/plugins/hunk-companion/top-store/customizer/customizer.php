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
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/top-slider.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/category-tab.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/product-slide.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/category-slider.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/product-list.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/ribbon.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/banner.php';
require HUNK_COMPANION_DIR_PATH . '/top-store/customizer/frontpage/brand.php';
$wp_customize->add_setting('top_store_prd_shw_no', array(
            'default'           =>'20',
            'capability'        =>'edit_theme_options',
            'sanitize_callback' =>'top_store_sanitize_number',
        )
    );
    $wp_customize->add_control('top_store_prd_shw_no', array(
            'type'        => 'number',
            'section'     => 'top-store-woo-shop',
            'label'       => __('No. of product to show in Front Page', 'top-store' ),
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

$wp_customize->add_setting('topstore-footer-pro-link', array(
    'sanitize_callback' => 'topstore_store_sanitize_text',
    ));
$wp_customize->add_control(new Top_Store_Misc_Control( $wp_customize, 'topstore-footer-pro-link',
            array(
        'section'     => 'top-store-bottom-footer',
        'type'        => 'pro-link',
        'url'         => 'https://themehunk.com/product/top-store-pro/',
        'label' => esc_html__( 'Get Pro', 'top-store' ),
        'priority'   =>100,
    )));


}
add_action('customize_register','top_store_front_customize_register');