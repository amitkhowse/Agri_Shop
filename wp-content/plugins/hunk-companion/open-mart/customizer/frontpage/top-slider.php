<?php
$wp_customize->add_setting( 'open_mart_disable_top_slider_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_top_slider_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_top_slider_section',
                'settings'              => 'open_mart_disable_top_slider_sec',
                'priority'    => 1,
            ) ) );

if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_mart_top_slide_layout', array(
                'default'           => 'slide-layout-4',
                'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_top_slide_layout', array(
                    'label'    => esc_html__( 'Slider Layout', 'open-mart' ),
                    'section'  => 'open_mart_top_slider_section',
                    'choices'  => array(
                        'slide-layout-1'   => array(
                            'url' => open_mart_SLIDER_LAYOUT_1,
                        ),
                        'slide-layout-2'   => array(
                            'url' =>open_mart_SLIDER_LAYOUT_2,
                        ),
                        'slide-layout-3' => array(
                            'url' => open_mart_SLIDER_LAYOUT_3,
                        ),
                        'slide-layout-4' => array(
                            'url' => open_mart_SLIDER_LAYOUT_4,
                        ),
                        'slide-layout-5' => array(
                            'url' => open_mart_SLIDER_LAYOUT_5,
                        ),
                        
                                 
                    ),
                )
            )
        );
} 

//Slider Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_top_slide_lay1_content', array(
             'sanitize_callback' => 'open_mart_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_top_slide_lay1_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-mart' ),
                        'section'                              => 'open_mart_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_top_slide_content'
                )
            );
        }
        // slider-layout-1 background image
 $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_image_url', array(
        'sanitize_callback' => 'esc_url',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_image_id', array(
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_size', array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_setting( 'open_mart_top_slide_lay1_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    // Registers example_background control
    $wp_customize->add_control(
        new open_mart_Customize_Custom_Background_Control(
            $wp_customize,
            'open_mart_top_slide_lay1_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'open-mart' ),
                'section'   => 'open_mart_top_slider_section',
                'settings'    => array(
                    'image_url' => 'open_mart_top_slide_lay1_background_image_url',
                    'image_id' => 'open_mart_top_slide_lay1_background_image_id',
                    'repeat' => 'open_mart_top_slide_lay1_background_repeat', // Use false to hide the field
                    'size' => 'open_mart_top_slide_lay1_background_size',
                    'position' => 'open_mart_top_slide_lay1_background_position',
                    'attach' => 'open_mart_top_slide_lay1_background_attach'
                )
            )
        )
    );

//Slider 5th Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_top_slide_lay5_content', array(
             'sanitize_callback' => 'open_mart_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_top_slide_lay5_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-mart' ),
                        'section'                              => 'open_mart_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-mart' ),
                        
                       'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_top_slide_lay5_content'
                )
            );
        }

//Slider Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_top_slide_lay2_content', array(
             'sanitize_callback' => 'open_mart_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_top_slide_lay2_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-mart' ),
                        'section'                              => 'open_mart_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_top_slide_content'
                )
            );
        }


//Slider Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_top_slide_lay3_content', array(
             'sanitize_callback' => 'open_mart_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_top_slide_lay3_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-mart' ),
                        'section'                              => 'open_mart_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_top_slide_content'
                )
            );
        }


//Slider Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_top_slide_lay4_content', array(
             'sanitize_callback' => 'open_mart_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_top_slide_lay4_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-mart' ),
                        'section'                              => 'open_mart_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_top_slide_content'
                )
            );
        }

  // Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_top_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_top_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_top_slider_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_top_slider_optn',
  ) ) );

$wp_customize->add_setting('open_mart_slider_speed', array(
        'default' =>'3000',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_number',
));
$wp_customize->add_control( 'open_mart_slider_speed', array(
        'label'    => __('Speed', 'open-mart'),
        'description' =>__('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000','open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'        => 'number',
));
// slider-layout-2
$wp_customize->add_setting('open_mart_lay2_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay2_adimg', array(
        'label'          => __('Image 1', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay2_adimg',
 )));
$wp_customize->add_setting('open_mart_lay2_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay2_url', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));

// slider-layout-3
$wp_customize->add_setting('open_mart_lay3_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay3_adimg', array(
        'label'          => __('Image 1', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay3_adimg',
 )));
$wp_customize->add_setting('open_mart_lay3_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay3_url', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));
$wp_customize->add_setting('open_mart_lay3_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay3_adimg2', array(
        'label'          => __('Image 2', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay3_adimg2',
 )));
$wp_customize->add_setting('open_mart_lay3_2url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay3_2url', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('open_mart_lay3_adimg3', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay3_adimg3', array(
        'label'          => __('Image 3', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay3_adimg3',
 )));
$wp_customize->add_setting('open_mart_lay3_3url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay3_3url', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));

// slider-layout-4
$wp_customize->add_setting('open_mart_lay4_adimg1', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay4_adimg1', array(
        'label'          => __('Image 1', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay4_adimg1',
 )));
$wp_customize->add_setting('open_mart_lay4_url1', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay4_url1', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('open_mart_lay4_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_lay4_adimg2', array(
        'label'          => __('Image 2', 'open-mart'),
        'section'        => 'open_mart_top_slider_section',
        'settings'       => 'open_mart_lay4_adimg2',
 )));
$wp_customize->add_setting('open_mart_lay4_url2', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_lay4_url2', array(
        'label'    => __('url', 'open-mart'),
        'section'  => 'open_mart_top_slider_section',
         'type'    => 'text',
));


$wp_customize->add_setting('open_mart_top_slider_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_top_slider_doc',
            array(
        'section'    => 'open_mart_top_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#top-slider',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));