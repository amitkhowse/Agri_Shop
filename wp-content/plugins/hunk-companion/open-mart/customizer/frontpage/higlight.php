<?php 
$wp_customize->add_setting( 'open_mart_disable_highlight_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_highlight_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_highlight',
                'settings'              => 'open_mart_disable_highlight_sec',
            ) ) );

//Highlight Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ) {
            $wp_customize->add_setting(
        'open_mart_pro_highlight_content', array(
        'sanitize_callback' => 'open_mart_repeater_sanitize',  
        'default'           => open_mart_Defaults_Models::instance()->get_feature_default(),
                )
            );

            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_pro_highlight_content', array(
                        'label'                                => esc_html__( 'Highlight Content', 'open-mart' ),
                        'section'                              => 'open_mart_highlight',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Feature', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Feature', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => true, 
                        'customizer_repeater_color_control'		=>	false, 
                        'customizer_repeater_color2_control' 	=> false,
                        'customizer_repeater_icon_control'	   => true,
                        'customizer_repeater_subtitle_control' => true, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => false,  
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_Ship_Repeater'
                )
            );
        }


  $wp_customize->add_setting('open_mart_highlight_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
  $wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_highlight_doc',
            array(
        'section'     => 'open_mart_highlight',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#highlight-section',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));