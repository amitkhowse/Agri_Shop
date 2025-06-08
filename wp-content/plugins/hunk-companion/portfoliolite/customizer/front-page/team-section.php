<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'team_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'team_tabs', array(
                    'section' => 'portfoliolite_team_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                
                                'our_team_heading',
                                'our_team_subheading',
                                 'widgets','portfoliolite_team_doc'

                                
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'team_img_overly_color',
                                'team_txt_color',
                                'team_subtxt_color',
                            
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 

//  =  Our TEAM sections  =//
//  ============================= //

    $wp_customize->add_setting('our_team_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
       
    ));
   $wp_customize->add_control('our_team_heading', array(
        'label'    => __('Main Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_team_section',
        'settings' => 'our_team_heading',
         'type'       => 'text',
    )); 

    $wp_customize->add_setting('our_team_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
    $wp_customize->add_control('our_team_subheading', array(
        'label'    => __('Sub Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_team_section',
        'settings' => 'our_team_subheading',
         'type'       => 'textarea',
    ));   


  $wp_customize->add_setting('team_img_overly_color',array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
 ) );

$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'team_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfoliolite' ),
                'section'   => 'portfoliolite_team_section',
                'settings'  => 'team_img_overly_color',
            )));  
//color

     $wp_customize->add_setting('team_txt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'team_txt_color', array(
        'label'      => __('Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_team_section',
        'settings'   => 'team_txt_color',
    ) ) 
    );
    $wp_customize->add_setting('team_subtxt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'team_subtxt_color', array(
        'label'      => __('Sub Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_team_section',
        'settings'   => 'team_subtxt_color',
    ) ) 
    ); 
 // doc link
    $wp_customize->add_setting('portfoliolite_team_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_team_doc',
            array(
        'section'     => 'portfoliolite_team_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#team-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));
$control_handle = $wp_customize->get_control( 'team_tabs' );
        if ( ! empty( $control_handle ) ) {
            $control_handle->section  = 'sidebar-widgets-portfolio-team-widget';
            $control_handle->priority = -100;
}

$subscribe_widgets = $wp_customize->get_section( 'sidebar-widgets-portfolio-team-widget' );
    if ( ! empty( $subscribe_widgets ) ) {
        $subscribe_widgets->panel    = 'portfoliolite-panel-frontpage';
        $subscribe_widgets->priority = 5;
                            $controls_to_move = array(
                                'our_team_heading',
                                'our_team_subheading','portfoliolite_team_doc',
                                'team_img_overly_color',
                                'team_txt_color',
                                'team_subtxt_color',                    
        );
        foreach ( $controls_to_move as $control_id ) {
            $control = $wp_customize->get_control( $control_id );
            if ( ! empty( $control ) ) {
                $control->section  = 'sidebar-widgets-portfolio-team-widget';
                $control->priority = -1;
            }
        }
    }
    //-----------End team section-----------//