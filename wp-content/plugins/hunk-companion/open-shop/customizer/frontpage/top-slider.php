<?php
$wp_customize->add_setting( 'open_shop_disable_top_slider_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_top_slider_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_top_slider_section',
                'settings'              => 'open_shop_disable_top_slider_sec',
            ) ) );

if(class_exists('Open_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_shop_top_slide_layout', array(
                'default'           => 'slide-layout-1',
                'sanitize_callback' => 'open_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Open_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_shop_top_slide_layout', array(
                    'label'    => esc_html__( 'Slider Layout', 'open-shop' ),
                    'section'  => 'open_shop_top_slider_section',
                    'choices'  => array(
                        'slide-layout-1'   => array(
                            'url' => OPEN_SHOP_SLIDER_LAYOUT_1,
                        ),
                         'slide-layout-5' => array(
                            'url' => OPEN_SHOP_SLIDER_LAYOUT_5,
                        ),
                        'slide-layout-2'   => array(
                            'url' =>OPEN_SHOP_SLIDER_LAYOUT_2,
                        ),
                        'slide-layout-3' => array(
                            'url' => OPEN_SHOP_SLIDER_LAYOUT_3,
                        ),
                        'slide-layout-4' => array(
                            'url' => OPEN_SHOP_SLIDER_LAYOUT_4,
                        ),
                       
                        
                                 
                    ),
                )
            )
        );
} 
//Slider Content Via Repeater
      if ( class_exists( 'Open_Shop_Repeater' ) ){
            $wp_customize->add_setting(
             'open_shop_top_slide_content', array(
             'sanitize_callback' => 'open_shop_repeater_sanitize',  
             'default'           => Open_Shop_Defaults_Models::instance()->get_top_slider_default(),
                )
            );
            $wp_customize->add_control(
                new Open_Shop_Repeater(
                    $wp_customize, 'open_shop_top_slide_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-shop' ),
                        'section'                              => 'open_shop_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-shop' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-shop' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 
                        'customizer_repeater_text_control'    => true,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => true,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_shop_top_slide_content'
                )
            );
        }
//Slider 5th Content Via Repeater
      if ( class_exists( 'Open_Shop_Repeater' ) ){
            $wp_customize->add_setting(
             'open_shop_top_slide_lay5_content', array(
             'sanitize_callback' => 'open_shop_repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new Open_Shop_Repeater(
                    $wp_customize, 'open_shop_top_slide_lay5_content', array(
                        'label'                                => esc_html__( 'Slide Content', 'open-shop' ),
                        'section'                              => 'open_shop_top_slider_section',
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'open-shop' ),
                        'item_name'                            => esc_html__( 'Slide', 'open-shop' ),
                        
                        'customizer_repeater_title_control'    => false,   
                        'customizer_repeater_subtitle_control'    => false, 
                        'customizer_repeater_text_control'    => false,  
                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_shop_top_slide_lay5_content'
                )
            );
        }
        // Add an option to disable the logo.
  $wp_customize->add_setting( 'open_shop_top_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Open_Shop_Toggle_Control( $wp_customize, 'open_shop_top_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'open-shop' ),
    'section'     => 'open_shop_top_slider_section',
    'type'        => 'toggle',
    'settings'    => 'open_shop_top_slider_optn',
  ) ) );


$wp_customize->add_setting('open_shop_top_slider_speed', array(
            'default'           => 1000,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'open_shop_sanitize_number',
        )
    );
    $wp_customize->add_control('open_shop_top_slider_speed', array(
            'type'        => 'number',
            'section'     => 'open_shop_top_slider_section',
            'label'       => __( 'Slider Speed (Pro)', 'open-shop' ),
            'input_attrs' => array(
                'min'  => 100,
                'step' => 1,
                'max'  => 20000,
            ),
        )
    );
// slider-layout-2
$wp_customize->add_setting('open_shop_lay2_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay2_adimg', array(
        'label'          => __('Image 1', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay2_adimg',
 )));
$wp_customize->add_setting('open_shop_lay2_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay2_url', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));

// slider-layout-3
$wp_customize->add_setting('open_shop_lay3_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay3_adimg', array(
        'label'          => __('Image 1', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay3_adimg',
 )));
$wp_customize->add_setting('open_shop_lay3_url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay3_url', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));
$wp_customize->add_setting('open_shop_lay3_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay3_adimg2', array(
        'label'          => __('Image 2', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay3_adimg2',
 )));
$wp_customize->add_setting('open_shop_lay3_2url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay3_2url', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('open_shop_lay3_adimg3', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay3_adimg3', array(
        'label'          => __('Image 3', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay3_adimg3',
 )));
$wp_customize->add_setting('open_shop_lay3_3url', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay3_3url', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));

// slider-layout-4
$wp_customize->add_setting('open_shop_lay4_adimg1', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay4_adimg1', array(
        'label'          => __('Image 1', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay4_adimg1',
 )));
$wp_customize->add_setting('open_shop_lay4_url1', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay4_url1', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));

$wp_customize->add_setting('open_shop_lay4_adimg2', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_shop_lay4_adimg2', array(
        'label'          => __('Image 2', 'open-shop'),
        'section'        => 'open_shop_top_slider_section',
        'settings'       => 'open_shop_lay4_adimg2',
 )));
$wp_customize->add_setting('open_shop_lay4_url2', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
));
$wp_customize->add_control( 'open_shop_lay4_url2', array(
        'label'    => __('url', 'open-shop'),
        'section'  => 'open_shop_top_slider_section',
         'type'    => 'text',
));


$wp_customize->add_setting('open_shop_top_slider_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
$wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_top_slider_doc',
            array(
        'section'    => 'open_shop_top_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-shop/#top-slider',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));