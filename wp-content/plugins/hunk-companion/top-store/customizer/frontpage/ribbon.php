<?php
$wp_customize->add_setting( 'top_store_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'top_store_ribbon',
                'settings'              => 'top_store_disable_ribbon_sec',
            ) ) );


    $wp_customize->add_setting( 'top_store_ribbon_bg_img_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_setting( 'top_store_ribbon_bg_img_id', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'top_store_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'top_store_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'top_store_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'top_store_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Top_Store_Customize_Custom_Background_Control(
            $wp_customize,
            'top_store_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'top-store' ),
                'section'   => 'top_store_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'top_store_ribbon_bg_img_url',
                    'image_id' => 'top_store_ribbon_bg_img_id',
                    'repeat' => 'top_store_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'top_store_ribbon_bg_background_size',
                    'position' => 'top_store_ribbon_bg_background_position',
                    'attach' => 'top_store_ribbon_bg_background_attach'
                )
            )
        )
    );

$wp_customize->add_setting('top_store_ribbon_text', array(
        'default'           => 'Big offers on new collection',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('top_store_ribbon_text', array(
        'label'    => __('Text', 'top-store'),
        'section'  => 'top_store_ribbon',
        'settings' => 'top_store_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('top_store_ribbon_btn_text', array(
        'default'           => 'Call To Action',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('top_store_ribbon_btn_text', array(
        'label'    => __('Button Text', 'top-store'),
        'section'  => 'top_store_ribbon',
        'settings' => 'top_store_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('top_store_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        
  ));
$wp_customize->add_control('top_store_ribbon_btn_link', array(
        'label'    => __('Button Link', 'top-store'),
        'section'  => 'top_store_ribbon',
        'settings' => 'top_store_ribbon_btn_link',
         'type'    => 'text',
 ));


  $wp_customize->add_setting('top_store_ribbon_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_ribbon_doc',
            array(
        'section'     => 'top_store_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));