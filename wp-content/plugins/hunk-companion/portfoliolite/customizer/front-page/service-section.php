<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'services_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'services_tabs', array(
                    'section' => 'portfoliolite_service_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'our_service_heading',
                                'our_service_subheading',
                                'widgets','portfoliolite_service_doc'
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'service_img_overly_color',
                                'service_heading_color',
                                'service_description_color',
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 
    $wp_customize->add_setting('our_service_heading', array(
        'default'           => 'Our Services',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('our_service_heading', array(
        'label'    => __('Main Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_service_section',
        'settings' => 'our_service_heading',
        'type'     => 'text',
    )); 
    $wp_customize->add_setting('our_service_subheading', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('our_service_subheading', array(
        'label'    => __('Sub Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_service_section',
        'settings' => 'our_service_subheading',
         'type'    => 'textarea',
    ));   

$wp_customize->add_setting('service_img_overly_color', array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
            
 ) );

$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'service_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfoliolite' ),
               
                'section'   => 'portfoliolite_service_section',
                'settings'  => 'service_img_overly_color',
            )));

//color option
  $wp_customize->add_setting('service_heading_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'service_heading_color', array(
        'label'      => __('Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_service_section',
        'settings'   => 'service_heading_color',
    ) ) 
    );
$wp_customize->add_setting('service_description_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'service_description_color', array(
        'label'      => __('Subheading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_service_section',
        'settings'   => 'service_description_color',
    ) ) );
  // doc link
    $wp_customize->add_setting('portfoliolite_service_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
$wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_service_doc',
            array(
        'section'    => 'portfoliolite_service_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/portfoliolite-theme/#service-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'   =>100,
    )));

$control_handle = $wp_customize->get_control( 'services_tabs' );
        if ( ! empty( $control_handle ) ) {
            $control_handle->section  = 'sidebar-widgets-portfolio-service-widget';
            $control_handle->priority = -100;
}

$subscribe_widgets = $wp_customize->get_section( 'sidebar-widgets-portfolio-service-widget' );
    if ( ! empty( $subscribe_widgets ) ) {
        $subscribe_widgets->panel    = 'portfoliolite-panel-frontpage';
        $subscribe_widgets->priority = 3;
                            $controls_to_move = array(
                                'our_service_heading',
                                'our_service_subheading',
                                'service_img_overly_color',
                                'service_heading_color',
                                'service_description_color',
                                'portfoliolite_service_doc',                      
        );
        foreach ( $controls_to_move as $control_id ) {
            $control = $wp_customize->get_control( $control_id );
            if ( ! empty( $control ) ) {
                $control->section  = 'sidebar-widgets-portfolio-service-widget';
                $control->priority = -1;
            }
        }
    }
