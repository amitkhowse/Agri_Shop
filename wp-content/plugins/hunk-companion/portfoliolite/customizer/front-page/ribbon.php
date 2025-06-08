<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wp_customize->add_setting(
            'ribbon_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'ribbon_tabs', array(
                    'section' => 'portfoliolite_ribbon_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'hb_heading_bottom',
                                'hb_button_text_bottom',
                                'hb_button_link_bottom','portfoliolite_ribbon_doc'
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                'ribbonbtm_bg_image',
                                'ribbonbtm_img_overly_color',
                                'ribbon_txt_color',
                                'ribbon_bnt_color',
                                'ribbon_bnt_hvr_color'
                                
                            ),
                        ),
                    ),
                )
            )
       );
} 

 $wp_customize->add_setting('hb_heading_bottom', array(
         'default'           => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
         'capability'        => 'edit_theme_options',
         'sanitize_callback' => 'portfoliolite_sanitize_textarea',
         'transport'         => 'postMessage',
        
     ));
    $wp_customize->add_control('hb_heading_bottom', array(
         'label'    => __('Title', 'portfoliolite'),
         'section'  => 'portfoliolite_ribbon_section',
         'settings' => 'hb_heading_bottom',
          'type'       => 'textarea',
     ));
 $wp_customize->add_setting('hb_button_text_bottom', array(
         'default'           => __('Buy Now','portfoliolite'),
         'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
       
     ));
     $wp_customize->add_control('hb_button_text_bottom', array(
         'label'    => __('Button Text', 'portfoliolite'),
        'section'  => 'portfoliolite_ribbon_section',
         'settings' => 'hb_button_text_bottom',
          'type'       => 'text',
     ));

     $wp_customize->add_setting('hb_button_link_bottom', array(
         'default'           => '#',
         'capability'        => 'edit_theme_options',
         'sanitize_callback' => 'esc_url',
     ));
     $wp_customize->add_control('hb_button_link_bottom', array(
         'label'    => __('Button Link', 'portfoliolite'),
         'section'  => 'portfoliolite_ribbon_section',
         'settings' => 'hb_button_link_bottom',
          'type'       => 'text',
     ));
$wp_customize->add_setting('ribbonbtm_bg_image', array(
        'default'        => PORTFOLIOLITE_RESUME_SECTION_BG,
        'sanitize_callback' => 'portfoliolite_sanitize_upload'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'ribbonbtm_bg_image', array(
        'label'    => __('Upload Background Image', 'portfoliolite'),
        'section'  => 'portfoliolite_ribbon_section',
        'settings' => 'ribbonbtm_bg_image',
))); 

  $wp_customize->add_setting('ribbonbtm_img_overly_color', array(
       'default'           => '',
       'capability'        => 'edit_theme_options',
       'sanitize_callback' => 'portfoliolite_sanitize_color',
       'transport'         => 'postMessage',
   ));

  $wp_customize->add_control(
     new Portfoliolite_Customizer_Color_Control($wp_customize,'ribbonbtm_img_overly_color', array(
         'label'      => __('Background Color', 'portfoliolite' ),
         'section'    => 'portfoliolite_ribbon_section',
     ) )
  );
//color option
  $wp_customize->add_setting('ribbon_txt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_txt_color', array(
        'label'      => __('Title Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_ribbon_section',
        'settings'   => 'ribbon_txt_color',
    ) ) 
    );
$wp_customize->add_setting('ribbon_bnt_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_bnt_color', array(
        'label'      => __('Button Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_ribbon_section',
        'settings'   => 'ribbon_bnt_color',
    ) ) );
$wp_customize->add_setting('ribbon_bnt_hvr_color', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'ribbon_bnt_hvr_color', array(
        'label'      => __('Button hover Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_ribbon_section',
        'settings'   => 'ribbon_bnt_hvr_color',
    ) ) 
 );   
  // doc link
    $wp_customize->add_setting('portfoliolite_ribbon_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_ribbon_doc',
            array(
        'section'     => 'portfoliolite_ribbon_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#ribbon-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));
  
 //------------ bottom ribbon button----------------//