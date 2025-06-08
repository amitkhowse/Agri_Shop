<?php
/**
 * Ribbon Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
     // Registers Ribbon_background settings
$wp_customize->add_setting( 'almaira_shop_ribbon_background_image_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_setting( 'almaira_shop_ribbon_background_image_id', array(
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'almaira_shop_ribbon_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'almaira_shop_ribbon_background_size', array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'almaira_shop_ribbon_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'almaira_shop_ribbon_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Almaira_Shop_Customize_Custom_Background_Control(
            $wp_customize,
            'almaira_shop_ribbon_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'almaira-shop' ),
                'section'   => 'almaira_shop_ribbon_section',
                'priority'   => 1,
                'settings'    => array(
                    'image_url' => 'almaira_shop_ribbon_background_image_url',
                    'image_id' => 'almaira_shop_ribbon_background_image_id',
                    'repeat' => 'almaira_shop_ribbon_background_repeat', // Use false to hide the field
                    'size' => 'almaira_shop_ribbon_background_size',
                    'position' => 'almaira_shop_ribbon_background_position',
                    'attach' => 'almaira_shop_ribbon_background_attach',
                )
            )     
));

$wp_customize->add_setting( 'almaira_shop_ribbon_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_ribbon_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_ribbon_section',
                ));

$wp_customize->add_setting('almaira_shop_ribbon_heading', 
      array(
        'default' => 'Listen To Your Customers. They Will Tell You All About.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_ribbon_heading', 
    array(
        'label'    => __('Heading', 'hunk-companion'),
        'section'  => 'almaira_shop_ribbon_section',
         'type'       => 'text',
));

$wp_customize->add_setting('almaira_shop_ribbon_desc', 
      array(
        'default' => 'Listen To Your Customers. They Will Tell You All About.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_ribbon_desc', 
    array(
        'label'    => __('Sub Heading', 'hunk-companion'),
        'section'  => 'almaira_shop_ribbon_section',
         'type'    => 'textarea',
));

    $wp_customize->add_setting('almaira_shop_ribbon_button_text', array(
            'default'        	=> 'Discover Now',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'almaira_shop_sanitize_text',
            'transport'         => 'postMessage',
));
   $wp_customize->add_control('almaira_shop_ribbon_button_text', array(
            'label'		=> __('Button Text', 'hunk-companion'),
            'section'  	=> 'almaira_shop_ribbon_section',
            'settings' 	=> 'almaira_shop_ribbon_button_text',
             'type'		=> 'text',
));

   $wp_customize->add_setting('almaira_shop_ribbon_button_link', array(
            'default'			=> '#',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback' => 'almaira_shop_sanitize_text',
));
   $wp_customize->add_control('almaira_shop_ribbon_button_link', array(
            'label'		=> __('Button Link', 'hunk-companion'),
            'section'	=> 'almaira_shop_ribbon_section',
            'settings'	=> 'almaira_shop_ribbon_button_link',
             'type'		=> 'text',
));

/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_ribbon_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_ribbon_doc',
            array(
        'section'     => 'almaira_shop_ribbon_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#ribbon-setting',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));