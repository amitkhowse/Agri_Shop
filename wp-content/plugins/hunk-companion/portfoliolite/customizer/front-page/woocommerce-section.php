<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'woo_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'woo_tabs', array(
                    'section' => 'portfoliolite_woocommerce_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'our_woocommerce_heading',
                                'our_woocommerce_subheading',
                                'portfoliolite_woocommerce_shortcode','portfoliolite_woo_doc'
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'woocommerce_img_overly_color',
                                'woocommerce_heading_color',
                                'woocommerce_description_color',
                                
                            ),
                        ),
                    ),
                )
            )
       );
} 

    $wp_customize->add_setting('our_woocommerce_heading', array(
        'default'           => 'Our Products',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('our_woocommerce_heading', array(
        'label'    => __('Main Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_woocommerce_section',
        'settings' => 'our_woocommerce_heading',
        'type'     => 'text',
    )); 
    $wp_customize->add_setting('our_woocommerce_subheading', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('our_woocommerce_subheading', array(
        'label'    => __('Sub Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_woocommerce_section',
        'settings' => 'our_woocommerce_subheading',
         'type'    => 'textarea',
    ));   

$wp_customize->add_setting('portfoliolite_woocommerce_shortcode', array(
        'default'           => '[products limit="3" columns="3"]',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
    ));
    $wp_customize->add_control('portfoliolite_woocommerce_shortcode', array(
        'label'    => __('Enter WooCommerce Shortcode', 'portfoliolite'),
        'section'  => 'portfoliolite_woocommerce_section',
        'settings' => 'portfoliolite_woocommerce_shortcode',
         'type'    => 'textarea',
    ));   
//background option

$wp_customize->add_setting('woocommerce_img_overly_color', array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
 ) );

$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'woocommerce_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfoliolite' ),
                'section'   => 'portfoliolite_woocommerce_section',
                'settings'  => 'woocommerce_img_overly_color',
            )));

//color option
  $wp_customize->add_setting('woocommerce_heading_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'woocommerce_heading_color', array(
        'label'      => __('Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_woocommerce_section',
        'settings'   => 'woocommerce_heading_color',
    ) ) );
$wp_customize->add_setting('woocommerce_description_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'woocommerce_description_color', array(
        'label'      => __('Subheading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_woocommerce_section',
        'settings'   => 'woocommerce_description_color',
    ) ) 
    );
    // doc link
    $wp_customize->add_setting('portfoliolite_woo_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_woo_doc',
            array(
        'section'     => 'portfoliolite_woocommerce_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#woo-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));