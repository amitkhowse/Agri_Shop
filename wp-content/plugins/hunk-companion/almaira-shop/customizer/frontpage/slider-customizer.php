<?php
/**
 * Slider Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
$wp_customize->add_setting( 'almaira_shop_slider_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_slider_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_slider_section',
                ));

$wp_customize->add_setting('almaira_shop_slider_responsive',
                array(
                    'default'           => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                )
            );
      $wp_customize->add_control( 'almaira_shop_slider_responsive',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Responsive Slider', 'hunk-companion'),
                    'section'     => 'almaira_shop_slider_section',
                    'description' => esc_html__('( Slider mobile behavior )', 'hunk-companion')
                ));   
//Slider Content Via Repeater
      if ( class_exists( 'Almaira_Shop_Repeater' ) ) {
            $wp_customize->add_setting(
        'almaira_shop_slider_content', array(
        'sanitize_callback' => 'almaira_shop_repeater_sanitize',  
        'default'           => json_encode(Almaira_Shop_Defaults_Models::instance()->get_slider_default()),
                )
            );

            $wp_customize->add_control(
                new Almaira_Shop_Repeater(
                    $wp_customize, 'almaira_shop_slider_content', array(
                        'label'                                => esc_html__( 'Slider Content', 'hunk-companion' ),
                        'section'                              => 'almaira_shop_slider_section',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Slide', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Slide', 'hunk-companion' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 

                        'customizer_repeater_text_control'    => true,  

                        'customizer_repeater_image_control'    => true,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'Almaira_Shop_Slider_Repeater'
                )
            );
        }
/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_slider_desc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_slider_desc',
            array(
        'section'     => 'almaira_shop_slider_section',
        'type'        => 'custom_message',
        'description' => esc_html__( 'Upload same size images.
Recommended size for slider is 1600*900','hunk-companion'),
        'priority'   =>30
    )));

$wp_customize->add_setting('almaira_shop_slider_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_slider_doc',
            array(
        'section'     => 'almaira_shop_slider_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#slider-settings',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));
// scroller
if ( class_exists( 'Almaira_Shop_Customize_Control_Scroll' ) ){
      $scroller = new Almaira_Shop_Customize_Control_Scroll();
}