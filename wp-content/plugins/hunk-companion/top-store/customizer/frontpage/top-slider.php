<?php
$wp_customize->add_setting( 'top_store_disable_top_slider_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_top_slider_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_top_slider_section',
                'settings'              => 'top_store_disable_top_slider_sec',
            ) ) );

if(class_exists('Top_Store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'top_store_top_slide_layout', array(
                'default'           => 'slide-layout-5',
                'sanitize_callback' => 'top_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Top_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'top_store_top_slide_layout', array(
                    'label'    => esc_html__( 'Slider Layout', 'top-store' ),
                    'section'  => 'top_store_top_slider_section',
                    'choices'  => array(
                         'slide-layout-5' => array(
                            'url' => TOP_STORE_SLIDER_LAYOUT_1,
                        ),
                        'slide-layout-2'   => array(
                            'url' =>TOP_STORE_SLIDER_LAYOUT_2,
                        ),
                        'slide-layout-3' => array(
                            'url' => TOP_STORE_SLIDER_LAYOUT_3,
                        ),
                        'slide-layout-4' => array(
                            'url' => TOP_STORE_SLIDER_LAYOUT_4,
                        ),          
                    ),
                )
            )
        );
} 
//Slider Content Via Repeater
      if ( class_exists( 'Top_Store_Repeater' ) ){
            $wp_customize->add_setting(
             'top_store_top_slide_content', array(
             'sanitize_callback' => 'top_store_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new Top_Store_Repeater(
                    $wp_customize, 'top_store_top_slide_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'top-store' ),
                        'section'                              => 'top_store_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'top-store' ),
                        'item_name'                            => esc_html__( 'Slide', 'top-store' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => true,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'top_store_top_slide_content'
                )
            );
        }
//Slider 5th Content Via Repeater
      if ( class_exists( 'Top_Store_Repeater' ) ){
            $wp_customize->add_setting(
             'top_store_top_slide_lay5_content', array(
             'sanitize_callback' => 'top_store_repeater_sanitize',  
             'default'           => Top_Store_Defaults_Models::instance()->get_top_slider_default(),
                )
            );
            $wp_customize->add_control(
                new Top_Store_Repeater(
                    $wp_customize, 'top_store_top_slide_lay5_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'top-store' ),
                        'section'                              => 'top_store_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'top-store' ),
                        'item_name'                            => esc_html__( 'Slide', 'top-store' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'top_store_top_slide_lay5_content'
                )
            );
        }
        // Add an option to disable the logo.
  $wp_customize->add_setting( 'top_store_top_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_top_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'top-store' ),
    'section'     => 'top_store_top_slider_section',
    'type'        => 'toggle',
    'settings'    => 'top_store_top_slider_optn',
  ) ) );

  $wp_customize->add_setting('top_store_top_slider_speed', array(
            'default'           => 1000,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'top_store_sanitize_number',
        )
    );
    $wp_customize->add_control('top_store_top_slider_speed', array(
            'type'        => 'number',
            'section'     => 'top_store_top_slider_section',
            'label'       => __( 'Slider Speed', 'top-store' ),
            'input_attrs' => array(
                'min'  => 100,
                'step' => 1,
                'max'  => 20000,
            ),
        )
    ); 


// slider-layout-2
$wp_customize->add_setting('top_store_lay2_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay2_adimg', array(
        'label'          => __('Image 1', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay2_adimg',
 )));
$wp_customize->add_setting('top_store_lay2_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay2_url', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));

// slider-layout-3
$wp_customize->add_setting('top_store_lay3_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay3_adimg', array(
        'label'          => __('Image 1', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay3_adimg',
 )));
$wp_customize->add_setting('top_store_lay3_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay3_url', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));
$wp_customize->add_setting('top_store_lay3_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay3_adimg2', array(
        'label'          => __('Image 2', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay3_adimg2',
 )));
$wp_customize->add_setting('top_store_lay3_2url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay3_2url', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('top_store_lay3_adimg3', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay3_adimg3', array(
        'label'          => __('Image 3', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay3_adimg3',
 )));
$wp_customize->add_setting('top_store_lay3_3url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay3_3url', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));

// slider-layout-4
$wp_customize->add_setting('top_store_lay4_adimg1', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay4_adimg1', array(
        'label'          => __('Image 1', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay4_adimg1',
 )));
$wp_customize->add_setting('top_store_lay4_url1', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay4_url1', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('top_store_lay4_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_lay4_adimg2', array(
        'label'          => __('Image 2', 'top-store'),
        'section'        => 'top_store_top_slider_section',
        'settings'       => 'top_store_lay4_adimg2',
 )));
$wp_customize->add_setting('top_store_lay4_url2', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
));
$wp_customize->add_control( 'top_store_lay4_url2', array(
        'label'    => __('url', 'top-store'),
        'section'  => 'top_store_top_slider_section',
         'type'    => 'text',
));
$wp_customize->add_setting('top_store_top_slider_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_top_slider_doc',
            array(
        'section'    => 'top_store_top_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#top-slider',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));