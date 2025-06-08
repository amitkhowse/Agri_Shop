<?php
$wp_customize->add_setting( 'top_store_disable_category_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_category_slide_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_cat_slide_section',
                'settings'              => 'top_store_disable_category_slide_sec',
            ) ) );

// section heading
$wp_customize->add_setting('top_store_cat_slider_heading', array(
        'default' => __('Category Slider','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'top_store_cat_slider_heading', array(
        'label'    => __('Section Heading', 'top-store'),
        'section'  => 'top_store_cat_slide_section',
         'type'       => 'text',
));
/*****************/
// category layout
/*****************/
if(class_exists('Top_Store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'top_store_cat_slide_layout', array(
                'default'           => 'cat-layout-1',
                'sanitize_callback' => 'top_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Top_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'top_store_cat_slide_layout', array(
                    'label'    => esc_html__( 'Category Layout', 'top-store' ),
                    'section'  => 'top_store_cat_slide_section',
                    'choices'  => array(
                        'cat-layout-1'   => array(
                            'url' => TOP_STORE_CAT_SLIDER_LAYOUT_1,
                        ),
                        'cat-layout-2'   => array(
                            'url' => TOP_STORE_CAT_SLIDER_LAYOUT_2,
                        ),
                        'cat-layout-3' => array(
                            'url' => TOP_STORE_CAT_SLIDER_LAYOUT_3,
                        ),
                              
                    ),
                )
            )
        );
} 
//= Choose All Category  =   
    if (class_exists( 'top_store_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('top_store_category_slide_list', array(
        'default'           => '',
        'sanitize_callback' => 'top_store_checkbox_explode'
    ));
    $wp_customize->add_control(new top_store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'top_store_category_slide_list', array(
        'settings'=> 'top_store_category_slide_list',
        'label'   => __( 'Choose Categories To Show', 'top-store' ),
        'section' => 'top_store_cat_slide_section',
        'choices' => top_store_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

// Add an option to disable the logo.
  $wp_customize->add_setting( 'top_store_category_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_category_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'top-store' ),
    'section'     => 'top_store_cat_slide_section',
    'type'        => 'toggle',
    'settings'    => 'top_store_category_slider_optn',
  ) ) );
  

$wp_customize->add_setting('top_store_category_slider_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_category_slider_doc',
            array(
        'section'    => 'top_store_cat_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#woo-category',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));