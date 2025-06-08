<?php
/**
 * Instafeed Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
$wp_customize->add_setting( 'almaira_shop_instafeed_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_instafeed_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_instafeed_section',
 ));

$wp_customize->add_setting('almaira_shop_instafeed_shortcode', 
      array(
        'default' => '[instagram-feed]',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
));
    $wp_customize->add_control( 'almaira_shop_instafeed_shortcode', 
    array(
        'label'    => __('Shortcode', 'hunk-companion'),
        'description'  => __('To generate shortcode install Instagram feed plugin. Go to Apperance > Almaira theme option > Recommended plugins. Insert it here.', 'hunk-companion'),
        'section'  => 'almaira_shop_instafeed_section',
         'type'       => 'textarea',
));

    $wp_customize->add_setting('almaira_shop_instafeed_heading', 
      array(
        'default' => 'FOLLOW ME ON INSTAGRAM',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_instafeed_heading', 
    array(
        'label'    => __('Heading', 'hunk-companion'),
        'section'  => 'almaira_shop_instafeed_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('almaira_shopp_instafeed_link', 
      array(
        'default' => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
));
    $wp_customize->add_control( 'almaira_shopp_instafeed_link', 
    array(
        'label'    => __('Enter Link', 'hunk-companion'),
        'section'  => 'almaira_shop_instafeed_section',
         'type'       => 'text',
));
/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_insta_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_insta_doc',
            array(
        'section'     => 'almaira_shop_instafeed_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#instagram-setting',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));