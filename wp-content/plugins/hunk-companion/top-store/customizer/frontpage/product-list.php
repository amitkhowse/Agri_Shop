<?php
$wp_customize->add_setting( 'top_store_disable_product_list_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_product_list_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_product_slide_list',
                'settings'              => 'top_store_disable_product_list_sec',
            ) ) );
// section heading
$wp_customize->add_setting('top_store_product_list_heading', array(
        'default' => __('Product List','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'top_store_product_list_heading', array(
        'label'    => __('Section Heading', 'top-store'),
        'section'  => 'top_store_product_slide_list',
         'type'       => 'text',
));
//control setting for select options
    $wp_customize->add_setting('top_store_product_list_cat', array(
    'default' => 0,
    'sanitize_callback' => 'top_store_sanitize_select',
    ) );
    $wp_customize->add_control( 'top_store_product_list_cat', array(
    'label'   => __('Select Category','top-store'),
    'section' => 'top_store_product_slide_list',
    'type' => 'select',
    'choices' => top_store_product_category_list(array('taxonomy' =>'product_cat'),true),
    ) );

$wp_customize->add_setting('top_store_product_list_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control('top_store_product_list_optn', array(
        'settings' => 'top_store_product_list_optn',
        'label'   => __('Choose Option','top-store'),
        'section' => 'top_store_product_slide_list',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','top-store'),
        'featured'   => __('Featured','top-store'),
        'random'     => __('Random','top-store'),   
        ),
    ));

$wp_customize->add_setting( 'top_store_single_row_prdct_list', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_single_row_prdct_list', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_product_slide_list',
                'settings'              => 'top_store_single_row_prdct_list',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'top_store_product_list_slide_optn', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_product_list_slide_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'top-store' ),
    'section'     => 'top_store_product_slide_list',
    'type'        => 'toggle',
    'settings'    => 'top_store_product_list_slide_optn',
  ) ) );
  
  $wp_customize->add_setting('top_store_product_list_slide_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
  $wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_product_list_slide_doc',
            array(
        'section'    => 'top_store_product_slide_list',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#product-list',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));