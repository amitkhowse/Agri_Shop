<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'test_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'test_tabs', array(
                    'section' => 'portfoliolite_testimonial_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                            'testimonial_bg_image',
                            'testimonial_img_overly_color',
                            'testimonial_title_color',
                            'testimonial_desc_color',
                            'testimonial_dots_color',
                            'widgets','portfoliolite_testimonial_doc'
                                
                            ),
                        ),
                        
                    ),
                )
            )
  );
} 
$wp_customize->add_setting('testimonial_bg_image', array(
        'default'        => PORTFOLIOLITE_RESUME_SECTION_BG,
        'sanitize_callback' => 'portfoliolite_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'testimonial_bg_image', array(
        'label'    => __('Upload Background Image', 'portfoliolite'),
        'section'  => 'portfoliolite_testimonial_section',
        'settings' => 'testimonial_bg_image',
))); 
$wp_customize->add_setting('testimonial_img_overly_color',array(
            'default'     => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
            'transport'         => 'postMessage',
 ) );

$wp_customize->add_control(
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'testimonial_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfolioline' ),
                'section'   => 'portfoliolite_testimonial_section',
                'settings'  => 'testimonial_img_overly_color',
)));

    $wp_customize->add_setting('testimonial_title_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'testimonial_title_color', array(
        'label'      => __('Title Color', 'portfolioline' ),
        'section'    => 'portfoliolite_testimonial_section',
        'settings'   => 'testimonial_title_color',
    ) ) );

    $wp_customize->add_setting('testimonial_desc_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'testimonial_desc_color', array(
        'label'      => __('Description & Border Color', 'portfolioline' ),
        'section'    => 'portfoliolite_testimonial_section',
        'settings'   => 'testimonial_desc_color',
    ) ) );

    $wp_customize->add_setting('testimonial_dots_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'testimonial_dots_color', array(
        'label'      => __('Dots Color', 'portfolioline' ),
        'section'    => 'portfoliolite_testimonial_section',
        'settings'   => 'testimonial_dots_color',
    ) ) );  
// doc link
    $wp_customize->add_setting('portfoliolite_testimonial_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_testimonial_doc',
            array(
        'section'     => 'portfoliolite_testimonial_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#testimonial-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));
$control_handle = $wp_customize->get_control( 'test_tabs' );
        if ( ! empty( $control_handle ) ){
            $control_handle->section  = 'sidebar-widgets-portfolio-testimonial-widget';
            $control_handle->priority = -100;
}
$subscribe_widgets = $wp_customize->get_section( 'sidebar-widgets-portfolio-testimonial-widget' );
    if ( ! empty( $subscribe_widgets ) ) {
        $subscribe_widgets->panel    = 'portfoliolite-panel-frontpage';
        $subscribe_widgets->priority = 6;
                            $controls_to_move = array(
                                'testimonial_bg_image',
                                'testimonial_img_overly_color',
                                'testimonial_title_color',
                                'testimonial_desc_color',
                                'testimonial_dots_color','portfoliolite_testimonial_doc'                     
        );
        foreach ( $controls_to_move as $control_id ) {
            $control = $wp_customize->get_control( $control_id );
            if ( ! empty( $control ) ) {
                $control->section  = 'sidebar-widgets-portfolio-testimonial-widget';
                $control->priority = -1;
            }
        }
 }