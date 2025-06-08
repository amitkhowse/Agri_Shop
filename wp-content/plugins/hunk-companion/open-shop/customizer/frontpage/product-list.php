<?php
$wp_customize->add_setting( 'open_shop_disable_product_list_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_product_list_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_product_slide_list',
                'settings'              => 'open_shop_disable_product_list_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_shop_product_list_heading', array(
	    'default' => __('Product List','open-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_shop_product_list_heading', array(
        'label'    => __('Section Heading', 'open-shop'),
        'section'  => 'open_shop_product_slide_list',
         'type'       => 'text',
));
//control setting for select options
	$wp_customize->add_setting('open_shop_product_list_cata', array(
	'default' => 0,
	'sanitize_callback' => 'open_shop_sanitize_select',
	) );
	$wp_customize->add_control( 'open_shop_product_list_cata', array(
	'label'   => __('Select Category','open-shop'),
	'section' => 'open_shop_product_slide_list',
	'type' => 'select',
	'choices' =>open_shop_product_category_list(array('taxonomy' =>'product_cat'),true),
	) );


$wp_customize->add_setting( 'open_shop_single_row_prdct_list', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_single_row_prdct_list', array(
                'label'                 => esc_html__('Enable Single Row Slide (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_product_slide_list',
                'settings'              => 'open_shop_single_row_prdct_list',
            ) ) );

  $wp_customize->add_setting('open_shop_product_list_slide_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
  $wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_product_list_slide_doc',
            array(
        'section'    => 'open_shop_product_slide_list',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-shop/#product-list',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));