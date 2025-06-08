<?php
$wp_customize->add_setting( 'open_mart_disable_ribbon_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_ribbon_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                 'priority'   => 1,
                'section'               => 'open_mart_ribbon',
                'settings'              => 'open_mart_disable_ribbon_sec',
            ) ) );


    $wp_customize->add_setting( 'open_mart_ribbon_bg_img_url', array(
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_setting( 'open_mart_ribbon_bg_img_id', array(
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'open_mart_ribbon_bg_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'open_mart_ribbon_bg_background_size', array(
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'open_mart_ribbon_bg_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'open_mart_ribbon_bg_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new open_mart_Customize_Custom_Background_Control(
            $wp_customize,
            'open_mart_ribbon_bg_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'open-mart' ),
                'section'   => 'open_mart_ribbon',
                'priority'   => 2,
                'settings'    => array(
                    'image_url' => 'open_mart_ribbon_bg_img_url',
                    'image_id' => 'open_mart_ribbon_bg_img_id',
                    'repeat' => 'open_mart_ribbon_bg_background_repeat', // Use false to hide the field
                    'size' => 'open_mart_ribbon_bg_background_size',
                    'position' => 'open_mart_ribbon_bg_background_position',
                    'attach' => 'open_mart_ribbon_bg_background_attach'
                )
            )
        )
    );

$wp_customize->add_setting('open_mart_ribbon_text', array(
        'default'           => 'Festive Sale',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('open_mart_ribbon_text', array(
        'label'    => __('Heading', 'open-mart'),
        'section'  => 'open_mart_ribbon',
        'settings' => 'open_mart_ribbon_text',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('open_mart_ribbon_subheading', array(
        'default'           => '90% Off on new products',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('open_mart_ribbon_subheading', array(
        'label'    => __('Sub Heading', 'open-mart'),
        'section'  => 'open_mart_ribbon',
        'settings' => 'open_mart_ribbon_subheading',
         'type'    => 'textarea',
 ));

$wp_customize->add_setting('open_mart_ribbon_btn_text', array(
        'default'           => 'Buy Now',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
        
  ));
$wp_customize->add_control('open_mart_ribbon_btn_text', array(
        'label'    => __('Button Text', 'open-mart'),
        'section'  => 'open_mart_ribbon',
        'settings' => 'open_mart_ribbon_btn_text',
         'type'    => 'text',
 ));

$wp_customize->add_setting('open_mart_ribbon_btn_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        
  ));
$wp_customize->add_control('open_mart_ribbon_btn_link', array(
        'label'    => __('Button Link', 'open-mart'),
        'section'  => 'open_mart_ribbon',
        'settings' => 'open_mart_ribbon_btn_link',
         'type'    => 'text',
 ));

$wp_customize->add_setting('open_mart_ribbon_sideimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_ribbon_sideimg', array(
        'label'          => __('Image', 'open-mart'),
        'section'        => 'open_mart_ribbon',
        'settings'       => 'open_mart_ribbon_sideimg',
 )));

$wp_customize->add_setting('open_mart_ribbon_side', array(
        'default'        => 'right',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_ribbon_side', array(
        'settings' => 'open_mart_ribbon_side',
        'label'   => __('PLace Image On','open-mart'),
        'section' => 'open_mart_ribbon',
        'type'    => 'select',
        'choices'    => array(
        'left'     => __('Left (Pro)','open-mart'),
        'right'     => __('Right','open-mart'),
            
        ),
    ));
  $wp_customize->add_setting('open_mart_ribbon_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_ribbon_doc',
            array(
        'section'     => 'open_mart_ribbon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));