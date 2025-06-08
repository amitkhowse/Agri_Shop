<?php
$wp_customize->add_setting( 'open_mart_disable_category_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_category_slide_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_cat_slide_section',
                'settings'              => 'open_mart_disable_category_slide_sec',
            ) ) );

// section heading
$wp_customize->add_setting('open_mart_cat_slider_heading', array(
	    'default' => __('Category Slider','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_cat_slider_heading', array(
        'label'    => __('Section Heading', 'open-mart'),
        'section'  => 'open_mart_cat_slide_section',
         'type'       => 'text',
));
/*****************/
// category layout
/*****************/
if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_mart_cat_slide_layout', array(
                'default'           => 'cat-layout-1',
                'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_cat_slide_layout', array(
                    'label'    => esc_html__( 'Category Layout', 'open-mart' ),
                    'section'  => 'open_mart_cat_slide_section',
                    'choices'  => array(
                        'cat-layout-1'   => array(
                            'url' => open_mart_CAT_SLIDER_LAYOUT_1,
                        ),
                        'cat-layout-2'   => array(
                            'url' => open_mart_CAT_SLIDER_LAYOUT_2,
                        ),
                        'cat-layout-3' => array(
                            'url' => open_mart_CAT_SLIDER_LAYOUT_3,
                        ),
                              
                    ),
                )
            )
        );
}
$wp_customize->add_setting('open_mart_cat_item_no', array(
            'default'           =>10,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'open_mart_sanitize_number',
        )
    );
    $wp_customize->add_control('open_mart_cat_item_no', array(
            'type'        => 'number',
            'section'     => 'open_mart_cat_slide_section',
            'label'       => __( 'No. of Column to show', 'open-mart' ),
            'input_attrs' => array(
                'min'  => 0,
                'step' => 1,
                'max'  => 10,
            ),
        )
    ); 
//= Choose All Category  =   
    if (class_exists( 'open_mart_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('open_mart_category_slide_list', array(
        'default'           => '',
        'sanitize_callback' => 'open_mart_checkbox_explode'
    ));
    $wp_customize->add_control(new open_mart_Customize_Control_Checkbox_Multiple(
            $wp_customize,'open_mart_category_slide_list', array(
        'settings'=> 'open_mart_category_slide_list',
        'label'   => __( 'Choose Categories To Show', 'open-mart' ),
        'section' => 'open_mart_cat_slide_section',
        'choices' => open_mart_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

// Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_category_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_category_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_cat_slide_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_category_slider_optn',
  ) ) );

  $wp_customize->add_setting('open_mart_category_slider_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_category_slider_doc',
            array(
        'section'    => 'open_mart_cat_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#woo-category',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));