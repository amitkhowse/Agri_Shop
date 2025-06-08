<?php
/**
 * Contact Page/Section Customizer Settings
 *
 * @package     Almaira Shop
 * @author      ThemeHunk
 * @since       Almaira Shop 1.0.0
 */
$wp_customize->add_setting('almaira_shop_contact_heading', array(
        'default' => 'Dont Hesitate To Contact Us',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_contact_heading', array(
        'label'    => __('Big Heading', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'text',
));


    $wp_customize->add_setting('contact_shop_shortcode', array(
            'default'           => '[lead-form form-id=1 title=Contact Us]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'almaira_shop_sanitize_textarea'
            ));

        $wp_customize->add_control('contact_shop_shortcode', array(
            'label'    => __('Contact Us Shortcode', 'almaira'),
            'description' =>__('To generate shortcode install Lead form builder plugin. Go to Apperance > Almaira theme option > Recommended plugins.  Insert Lead Form Builder Plugin Shortcode here.','almaira'),
            'section'  => 'almaira_shop_contact_section',
            'settings' => 'contact_shop_shortcode',
             'type'       => 'textarea',
            ));
    $wp_customize->add_setting('almaira_shop_contact_smallheading', array(
        'default' => 'CONTACT INFORMATION',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control( 'almaira_shop_contact_smallheading', array(
        'label'    => __('Small Heading', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'text',
));

        $wp_customize->add_setting('almaira_shop_contact_address1', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non ex vitae metus pretium euismod. Morbi suscipit tellus sit amet lorem eleifend viverra. Nam nec est elit. Suspendisse vel mattis urna, at hendrerit ex.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_contact_address1', array(
        'label'    => __('Address', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'textarea',
));

    $wp_customize->add_setting('almaira_shop_contact_address2', array(
        'default' => '212-938-3621, 917-204-2105 ',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_contact_address2', array(
        'label'    => __('Mobile Number', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'textarea',
));

    $wp_customize->add_setting('almaira_shop_contact_support', array(
        'default' => 'support@domain.com',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_contact_support', array(
        'label'    => __('Email', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'textarea',
));


    $wp_customize->add_setting('almaira_shop_contact_hours', array(
        'default' => 'Everyday 9:00-17:00',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_contact_hours', array(
        'label'    => __('Working Hours', 'almaira'),
        'section'  => 'almaira_shop_contact_section',
         'type'       => 'textarea',
));

$wp_customize->selective_refresh->add_partial( 'almaira_shop_contact_heading', array(
        'selector' => '.thunk-contact-body-wrap .thunk-heading'
) );
$wp_customize->selective_refresh->add_partial( 'almaira_shop_contact_smallheading', array(
        'selector' => '.thunk-contact-small-heading'
) );
$wp_customize->selective_refresh->add_partial( 'almaira_shop_contact_heading', array(
        'selector' => '.thunk-contact-body-wrap .thunk-heading'
) );
$wp_customize->selective_refresh->add_partial( 'almaira_shop_contact_smallheading', array(
        'selector' => '.thunk-contact-small-heading'
) );

/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_contact_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_contact_doc',
            array(
        'section'     => 'almaira_shop_contact_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#contact-template',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));