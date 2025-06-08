<?php
$wp_customize->add_setting( 'open_shop_disable_category_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_category_slide_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_cat_slide_section',
                'settings'              => 'open_shop_disable_category_slide_sec',
            ) ) );

// section heading
$wp_customize->add_setting('open_shop_cat_slider_heading', array(
	    'default' => __('Category Slider','open-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_shop_cat_slider_heading', array(
        'label'    => __('Section Heading', 'open-shop'),
        'section'  => 'open_shop_cat_slide_section',
         'type'       => 'text',
));
/*****************/
// category layout
/*****************/
if(class_exists('Open_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_shop_cat_slide_layout', array(
                'default'           => 'cat-layout-1',
                'sanitize_callback' => 'open_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Open_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_shop_cat_slide_layout', array(
                    'label'    => esc_html__( 'Category Layout', 'open-shop' ),
                    'section'  => 'open_shop_cat_slide_section',
                    'choices'  => array(
                        'cat-layout-1'   => array(
                            'url' => OPEN_SHOP_CAT_SLIDER_LAYOUT_1,
                        ),
                        'cat-layout-2'   => array(
                            'url' => OPEN_SHOP_CAT_SLIDER_LAYOUT_2,
                        ),
                        'cat-layout-3' => array(
                            'url' => OPEN_SHOP_CAT_SLIDER_LAYOUT_3,
                        ),
                              
                    ),
                )
            )
        );
} 
//= Choose All Category  =   
    if (class_exists( 'Open_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('open_shop_category_slide_list', array(
        'default'           => '',
        'sanitize_callback' => 'open_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Open_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'open_shop_category_slide_list', array(
        'settings'=> 'open_shop_category_slide_list',
        'label'   => __( 'Choose Categories To Show', 'open-shop' ),
        'section' => 'open_shop_cat_slide_section',
        'choices' => open_shop_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

$wp_customize->add_setting('open_shop_category_slider_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
$wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_category_slider_doc',
            array(
        'section'    => 'open_shop_cat_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-shop/#woo-category',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));