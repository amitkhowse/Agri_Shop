<?php
/**
 * Product Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
$wp_customize->add_setting( 'almaira_shop_product_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_product_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_product_section',
                ));
//= Choose All Category  =   
    if (class_exists( 'Almaira_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('almaira_shop_product_cate', array(
        'default'           => '',
        'sanitize_callback' => 'almaira_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Almaira_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'almaira_shop_product_cate', array(
        'settings'=> 'almaira_shop_product_cate',
        'label'   => __( 'Choose Categories ', 'hunk-companion' ),
        'section' => 'almaira_shop_product_section',
        'choices' => almaira_shop_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  
//Note //
//almaira-shop_get_category_list() alredy defined in another file
// No. of Products To Show
if ( class_exists( 'Almaira_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'almaira_shop_cate_prd_shw', array(
                'sanitize_callback' => 'almaira_shop_sanitize_range_value',
                'default'           => 8,
            )
        );
$wp_customize->add_control(
            new Almaira_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'almaira_shop_cate_prd_shw', array(
                    'label'       => esc_html__( 'No. of Products To Show', 'hunk-companion' ),
                    'section'     => 'almaira_shop_product_section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
            )
    );
}
/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_prdct_filtr_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_prdct_filtr_doc',
            array(
        'section'     => 'almaira_shop_product_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#product-filter',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));