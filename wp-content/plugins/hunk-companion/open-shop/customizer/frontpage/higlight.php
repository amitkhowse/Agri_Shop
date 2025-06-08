<?php 
$wp_customize->add_setting( 'open_shop_disable_highlight_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_highlight_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_highlight',
                'settings'              => 'open_shop_disable_highlight_sec',
            ) ) );

// section heading
// $wp_customize->add_setting('open_shop_hglgt_heading', array(
//         'default' => __('Highlight Feature','open-shop'),
//         'capability'        => 'edit_theme_options',
//         'sanitize_callback' => 'open_shop_sanitize_text',
//         'transport'         => 'postMessage',
// ));
// $wp_customize->add_control( 'open_shop_hglgt_heading', array(
//         'label'    => __('Section Heading', 'open-shop'),
//         'section'  => 'open_shop_highlight',
//          'type'       => 'text',
// ));

//Highlight Content Via Repeater
      if ( class_exists( 'Open_Shop_Repeater' ) ) {
            $wp_customize->add_setting(
        'open_shop_highlight_content', array(
        'sanitize_callback' => 'open_shop_repeater_sanitize',  
        'default'           => Open_Shop_Defaults_Models::instance()->get_feature_default(),
                )
            );

            $wp_customize->add_control(
                new Open_Shop_Repeater(
                    $wp_customize, 'open_shop_highlight_content', array(
                        'label'                                => esc_html__( 'Highlight Content', 'open-shop' ),
                        'section'                              => 'open_shop_highlight',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Feature', 'open-shop' ),
                        'item_name'                            => esc_html__( 'Feature', 'open-shop' ),
                        
                        'customizer_repeater_title_control'    => true, 
                        'customizer_repeater_color_control'		=>	false, 
                        'customizer_repeater_color2_control' 	=> false,
                        'customizer_repeater_icon_control'	   => true,
                        'customizer_repeater_subtitle_control' => true, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => false,  
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'Open_Shop_Ship_Repeater'
                )
            );
        }


  $wp_customize->add_setting('open_shop_highlight_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
  $wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_highlight_doc',
            array(
        'section'     => 'open_shop_highlight',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-shop/#highlight-section',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));