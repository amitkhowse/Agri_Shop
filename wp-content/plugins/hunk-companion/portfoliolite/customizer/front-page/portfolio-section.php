<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

$wp_customize->add_setting(
            'portfolio_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'portfolio_tabs', array(
                    'section' => 'portfoliolite_portfolio_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'our_port_heading',
                                'our_port_subheading',
                                'dynamic_wdth',
                                'dynamic_grid',
                                'our_port_default_images',
                                'our_port_category',
                                'portfoliolite_port_doc'
                                
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'portfolio_overly_color',
                                'portfo_txt_color',
                                'portfo_subtxt_color',
                                'portfo_category_color',
                                'portfo_category_hvr_color',
                                'portfo_img_ovrly_color',
                                'portfo_img_capn_color'
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 
// start portfoliolite //
  $wp_customize->add_setting('our_port_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
       
    ));
   $wp_customize->add_control('our_port_heading', array(
        'label'    => __('Main Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_portfolio_section',
        'settings' => 'our_port_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('our_port_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('our_port_subheading', array(
        'label'    => __('Sub Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_portfolio_section',
        'settings' => 'our_port_subheading',
         'type'       => 'textarea',
    ));   

//= Choose Grid Layout  =
     $wp_customize->add_setting('dynamic_grid', array(
        'default'        => 'four-grid-zero-padding',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'dynamic_grid', array(
        'settings' => 'dynamic_grid',
        'label'   => __('Choose Portfolio Layout','portfoliolite'),
        'section' => 'portfoliolite_portfolio_section',
        'type'    => 'select',
        'choices'    => array(
            
            'two-grid'               => __('Two Grid (Pro)','portfoliolite'),
            'standard-layout'        => __('Three Grid (Pro)','portfoliolite'),
            'four-grid'              => __('Four Grid (Pro)','portfoliolite'),
            'three-grid-zero-padding'=> __('Three Grid No Gutter (Pro)','portfoliolite'),
            'four-grid-zero-padding' => __('Four Grid No Gutter','portfoliolite'),
            'three-Masnory' => __('Three Grid Masonry (Pro)','portfoliolite'),
            'four-Masnory' => __('Four Grid Masonry (Pro)','portfoliolite'),
        ),
    ));

$wp_customize->add_setting('our_port_default_images', array(
        'default'           => 8,
        'sanitize_callback' => 'portfoliolite_sanitize_int',
       
));
$wp_customize->add_control('our_port_default_images', array(
        'label'    => __('Number of Portfolio Images To Show', 'portfoliolite'),
        'section'  => 'portfoliolite_portfolio_section',
        'settings' => 'our_port_default_images',
        'type'     => 'number',
    )); 
// This will show only portfolio category
   $portcats = array();
    foreach ( get_categories(array(
    'orderby' => 'name',
    'taxonomy' => 'portfolio-cate'
) ) as $categories => $category ){
        $portcats[$category->slug] = $category->name;
    }
   $wp_customize->add_setting('our_port_category', array(
        'default'           =>'',
        'sanitize_callback' => 'portfoliolite_checkbox_explode'
    ));
    $wp_customize->add_control(new Portfoliolite_Customize_Control_Checkbox_Multiple(
            $wp_customize,'our_port_category', array(
        'settings' => 'our_port_category',
        'label'   => __( 'Check Category To Display', 'portfoliolite' ),
        'section' => 'portfoliolite_portfolio_section',
        'choices' => $portcats
        ) 
    )
);

$wp_customize->add_setting('portfolio_overly_color',array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
 ) );
$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'portfolio_overly_color',
            array(
                'label'     => __('Background Color', 'portfoliolite' ),
                'section'   => 'portfoliolite_portfolio_section',
                'settings'  => 'portfolio_overly_color',
                )));


    $wp_customize->add_setting('portfo_txt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_txt_color', array(
        'label'      => __('Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_txt_color',
    ) ) );

$wp_customize->add_setting('portfo_subtxt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_subtxt_color', array(
        'label'      => __('Sub Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_subtxt_color',
    ) ) );

    $wp_customize->add_setting('portfo_category_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_category_color', array(
        'label'      => __('Category Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_category_color',
    ) ) );

    $wp_customize->add_setting('portfo_category_hvr_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_category_hvr_color', array(
        'label'      => __('Selected Category & Hover Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_category_hvr_color',
    ) ) );

    $wp_customize->add_setting('portfo_img_ovrly_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_img_ovrly_color', array(
        'label'      => __('Image Overlay Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_img_ovrly_color',
    ) ) );

    $wp_customize->add_setting('portfo_img_capn_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'portfo_img_capn_color', array(
        'label'      => __('Caption Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_portfolio_section',
        'settings'   => 'portfo_img_capn_color',
    ) ) );

    // doc link
    $wp_customize->add_setting('portfoliolite_port_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_port_doc',
            array(
        'section'     => 'portfoliolite_portfolio_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#portfolio-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));
// end portfolioline //  