<?php
$wp_customize->add_setting( 'top_store_disable_brand_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_brand_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_brand',
                'settings'              => 'top_store_disable_brand_sec',
            ) ) );
 //Brand Content Via Repeater
      if ( class_exists( 'Top_Store_Repeater' ) ){
            $wp_customize->add_setting(
             'top_store_brand_content', array(
             'sanitize_callback' => 'top_store_repeater_sanitize',  
             'default'           => Top_Store_Defaults_Models::instance()->get_brand_default(),
                )
            );
            $wp_customize->add_control(
                new Top_Store_Repeater(
                    $wp_customize, 'top_store_brand_content', array(
                        'label'                                => esc_html__( 'Brand Content', 'top-store' ),
                        'section'                              => 'top_store_brand',
                        'add_field_label'                      => esc_html__( 'Add new Brand', 'top-store' ),
                        'item_name'                            => esc_html__( 'Brand', 'top-store' ),
                        
                        'customizer_repeater_title_control'    => false,   
                        'customizer_repeater_subtitle_control'    => false, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false, 
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'Top_Shop_Brand_Repeater'
                )
            );
        }

// Add an option to disable the logo.
  $wp_customize->add_setting( 'top_store_brand_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Top_Store_Toggle_Control( $wp_customize, 'top_store_brand_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'top-store' ),
    'section'     => 'top_store_brand',
    'type'        => 'toggle',
    'settings'    => 'top_store_brand_slider_optn',
  ) ) );

  $wp_customize->add_setting('top_store_brand_slider_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
  $wp_customize->add_control(new Top_Store_Misc_Control( $wp_customize, 'top_store_brand_slider_doc',
            array(
        'section'     => 'top_store_brand',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#brand-section',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));