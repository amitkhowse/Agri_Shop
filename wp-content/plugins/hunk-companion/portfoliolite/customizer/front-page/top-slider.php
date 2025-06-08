<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

$wp_customize->add_setting(
            'slider_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'slider_tabs', array(
                    'section' => 'portfoliolite_top_slider_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'first_slider_image',
                                'second_slider_image',
                                'third_slider_image',

                                'ovrly_color',
                                'second_slider_image',
                                'third_slider_image',
                                'scroll_down_link','portfoliolite_slider_doc'
                                
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Text', 'portfoliolite' ),
                            'controls' => array(
                                
                                'typer_speed',
                                'parallax_heading',
                                'parallax_subheading_one',
                                'parallax_subheading_two',
                                'parallax_subheading_three',
                                'parallax_button_text1',
                                'parallax_button_link1',
                                'parallax_button_text2',
                                'parallax_button_link2',

                                
                            ),
                        ),
                        'color' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                
                                'parallax_head_color',
                                'parallax_typer_color',
                                'parallax_button_color',
                                
                                
                            ),
                        ),
                    ),
                )
            )
  );
} 
// START BACKGROUND SLIDER IMAGE 
//first slider image
    $wp_customize->add_setting('first_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_upload',
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('First Image Upload', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'first_slider_image',
    )));
//Second slider image
    $wp_customize->add_setting('second_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Second Image Upload', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'second_slider_image',
    )));
//Third slider image
    $wp_customize->add_setting('third_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_upload',
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
        'label'    => __('Third Image Upload', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'third_slider_image',
    )));

$wp_customize->add_setting('ovrly_color',array(
            'default'     => '',
            'capability'  => 'edit_theme_options', 
            'sanitize_callback' => 'portfoliolite_sanitize_color', 
            'transport'      => 'postMessage'
        ) );

    $wp_customize->add_control( new Portfoliolite_Customizer_Color_Control($wp_customize,
            'ovrly_color',
            array(
                'label'     => __('Image Overlay', 'portfoliolite' ),
                'section'   => 'portfoliolite_top_slider_section',
                'settings'  => 'ovrly_color',
            )));
    $wp_customize->add_setting('scroll_down_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('scroll_down_link', array(
        'label'    => __('Scroll Down Link', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'scroll_down_link',
         'type'       => 'text',
    ));
//END BACKGROUND SLIDER IMAGE 
// typerspeed
    $wp_customize->add_setting('typer_speed', array(
        'default'           => 100,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
    $wp_customize->add_control('typer_speed', array(
        'label'    => __('Typewriter Speed', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'typer_speed',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('parallax_heading', array(
        'default'           => __('I am Wordpress Developer','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        'transport'         => 'postMessage'
        
    ));
   $wp_customize->add_control('parallax_heading', array(
        'label'    => __(' Main Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_heading',
         'type'       => 'text',
    )); 
//one
    $wp_customize->add_setting('parallax_subheading_one', array(
        'default'           => 'I Know WordPress Theme Development',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
    $wp_customize->add_control('parallax_subheading_one', array(
        'label'    => __('Typewriter Text 1', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_subheading_one',
         'type'       => 'text',
    ));
//two
$wp_customize->add_setting('parallax_subheading_two', array(
        'default'           => 'I Know WordPress Plugin Development',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
$wp_customize->add_control('parallax_subheading_two', array(
        'label'    => __('Typewriter Text 2', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_subheading_two',
         'type'       => 'text',
    ));
// three
$wp_customize->add_setting('parallax_subheading_three', array(
        'default'           => 'I Know WordPress Support',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
$wp_customize->add_control('parallax_subheading_three', array(
        'label'    => __('Typewriter Text 3', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_subheading_three',
         'type'       => 'text',
    ));

// button1
 $wp_customize->add_setting('parallax_button_text1', array(
        'default'           => __('Show Profile','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         =>  'postMessage'
         
    ));
   $wp_customize->add_control('parallax_button_text1', array(
        'label'    => __('First Button text', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_button_text1',
         'type'       => 'text',
    ));
$wp_customize->add_setting('parallax_button_link1', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
   $wp_customize->add_control('parallax_button_link1', array(
        'label'    => __('First Button Link', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_button_link1',
         'type'       => 'text',
    ));
//button2
$wp_customize->add_setting('parallax_button_text2', array(
        'default'           => __('Read More','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         =>  'postMessage'
         
    ));
   $wp_customize->add_control('parallax_button_text2', array(
        'label'    => __('Second Button text', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_button_text2',
         'type'       => 'text',
    ));
$wp_customize->add_setting('parallax_button_link2', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
   $wp_customize->add_control('parallax_button_link2', array(
        'label'    => __('Second Button Link', 'portfoliolite'),
        'section'  => 'portfoliolite_top_slider_section',
        'settings' => 'parallax_button_link2',
         'type'       => 'text',
));

   // color
    $wp_customize->add_setting('parallax_head_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',

    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'parallax_head_color', array(
        'label'      => __('Heading Text Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_top_slider_section',
        'settings'   => 'parallax_head_color',
    ) ) 
    );   
    $wp_customize->add_setting('parallax_typer_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control( $wp_customize,'parallax_typer_color', array(
        'label'      => __('Typewriter Text Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_top_slider_section',
        'settings'   => 'parallax_typer_color',
    ) ) 
    );
    $wp_customize->add_setting('parallax_button_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'      => 'postMessage'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'parallax_button_color', array(
        'label'      => __('Button Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_top_slider_section',
        'settings'   => 'parallax_button_color',
    ) ) ); 

// doc link
    $wp_customize->add_setting('portfoliolite_slider_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
$wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_slider_doc',
            array(
        'section'    => 'portfoliolite_top_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/portfoliolite-theme/#top-slider',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'   =>100,
    )));