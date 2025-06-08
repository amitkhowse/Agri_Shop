<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'news_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'news_tabs', array(
                    'section' => 'portfoliolite_news_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                
                                'cf_head_',
                                'cf_button_text_',
                                'cf_button_icon_',
                                'contactus_shortcode',
                                'portfoliolite_news_doc'

                                
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'news_bg_background',
                                'news_bg_image',
                                'news_img_overly_color',
                                'news_title_color',
                                'news_button_color',
                                'news_button_hvr_color'
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 
//heading-text    
    $wp_customize->add_setting('cf_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('cf_head_', array(
        'label'    => __('NewsLetter Title', 'portfoliolite'),
        'section'  => 'portfoliolite_news_section',
        'settings' => 'cf_head_',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('cf_button_text_', array(
        'default'           => __('SUBSCRIBE','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
         
    ));
    $wp_customize->add_control('cf_button_text_', array(
        'label'    => __('Button Text', 'portfoliolite'),
        'section'  => 'portfoliolite_news_section',
        'settings' => 'cf_button_text_',
         'type'       => 'text',
    ));
   $wp_customize->add_setting('cf_button_icon_', array(
        'default'           => __('fa fa-envelope-o','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
         
    ));
    $wp_customize->add_control('cf_button_icon_', array(
        'label'    => __('Button Icon', 'portfoliolite'),
        'section'  => 'portfoliolite_news_section',
        'settings' => 'cf_button_icon_',
         'type'       => 'text',
    ));
 $wp_customize->add_setting('contactus_shortcode', array(
            'default'           => '[lead-form form-id=1 title=Contact Us]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_shortcode', array(
            'label'    => __('Contact Us Shortcode', 'portfoliolite'),
            'description' =>__('Lead Form Builder Plugin Shortcode Insert.','portfoliolite'),
            'section'  => 'portfoliolite_news_section',
            'settings' => 'contactus_shortcode',
             'type'       => 'textarea',
            )); //---------End News Letter Panel----// 
    $wp_customize->add_setting('news_bg_background', array(
        'default'        => 'image',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'news_bg_background', array(
        'settings' => 'news_bg_background',
        'label'   => __('Background Options','portfoliolite'),
        'section' => 'portfoliolite_news_section',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
//images
$wp_customize->add_setting('news_bg_image', array(
        'default'        => PORTFOLIOLITE_TESTIM_SECTION_BG,
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'news_bg_image', array(
        'label'    => __('Upload Background Image', 'portfoliolite'),
        'section'  => 'portfoliolite_news_section',
        'settings' => 'news_bg_image',
)));

//color option  
$wp_customize->add_setting('news_img_overly_color',array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
 ) );

$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'news_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfoliolite' ),
                'description'=>__('Image Overlay & Background Color Change','portfoliolite'),
                'section'   => 'portfoliolite_news_section',
                'settings'  => 'news_img_overly_color',
            )));

$wp_customize->add_setting('news_title_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'news_title_color', array(
        'label'      => __('Text Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_news_section',
        'settings'   => 'news_title_color',
    ) ) );
$wp_customize->add_setting('news_button_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'news_button_color', array(
        'label'      => __('Button Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_news_section',
        'settings'   => 'news_button_color',
    ) ) 
);
$wp_customize->add_setting('news_button_hvr_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'news_button_hvr_color', array(
        'label'      => __('Button Hover Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_news_section',
        'settings'   => 'news_button_hvr_color',
    ) ) );

// doc link
    $wp_customize->add_setting('portfoliolite_news_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_news_doc',
            array(
        'section'     => 'portfoliolite_news_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#newsletter-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));