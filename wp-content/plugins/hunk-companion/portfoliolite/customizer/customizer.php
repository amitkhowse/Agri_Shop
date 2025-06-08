<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function portfoliolite_plug_customize_register( $wp_customize ){
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'portfoliolite-panel-frontpage', array(
                'priority' => 3,
                'title'    => __( 'Frontpage Sections', 'portfoliolite' ),
) );
$portfoliolite_top_slider_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_top_slider_section', array(
    'title'    => __( 'Top Slider', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 1,
  ));
$wp_customize->add_section( $portfoliolite_top_slider_section );

// service
$portfoliolite_service_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_service_section', array(
    'title'    => __( 'Service', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 2,
  ));
$wp_customize->add_section( $portfoliolite_service_section );
// Ribbon
$portfoliolite_ribbon_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_ribbon_section', array(
    'title'    => __( 'Ribbon', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 3,
  ));
$wp_customize->add_section( $portfoliolite_ribbon_section );

// portfolio
$portfoliolite_portfolio_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_portfolio_section', array(
    'title'    => __( 'Portfolio', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $portfoliolite_portfolio_section );
// team
$portfoliolite_team_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_team_section', array(
    'title'    => __( 'Team', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 5,
  ));
$wp_customize->add_section( $portfoliolite_team_section );

// team
$portfoliolite_testimonial_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_testimonial_section', array(
    'title'    => __( 'Testimonial', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 6,
  ));
$wp_customize->add_section( $portfoliolite_testimonial_section );

// woocommerce
$portfoliolite_woocommerce_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_woocommerce_section', array(
    'title'    => __( 'Woocommerce', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 7,
  ));
$wp_customize->add_section( $portfoliolite_woocommerce_section );

// news
$portfoliolite_news_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_news_section', array(
    'title'    => __( 'Newsletter', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 8,
  ));
$wp_customize->add_section( $portfoliolite_news_section );

// blog
$portfoliolite_blog_section = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_blog_section', array(
    'title'    => __( 'Blog', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 9,
  ));
$wp_customize->add_section( $portfoliolite_blog_section );
 


$portfoliolite_section_settings = new Portfoliolite_WP_Customize_Section( $wp_customize, 'portfoliolite_section_settings', array(
    'title'    => __( 'Section On/Off', 'portfoliolite' ),
    'panel'    => 'portfoliolite-panel-frontpage',
    'priority' => 9,
  ));
$wp_customize->add_section( $portfoliolite_section_settings );
//= Choose Post Meta  =
$wp_customize->add_setting('section_on_off', array(
        'default'           =>array(),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_checkbox_explode',
    ));
 $wp_customize->add_control(new Portfoliolite_Customize_Control_Checkbox_Multiple(
            $wp_customize,'section_on_off', array(
        'settings' => 'section_on_off',
        'label'   => __( 'Section On/Off Options', 'portfoliolite' ),
        'section' => 'portfoliolite_section_settings',
         'choices' => array(
                    'services'        => __( 'Services Section off', 'portfoliolite' ),
                    'ribbon'          => __( 'Ribbon Section off','portfoliolite' ),
                    'portfolio'       => __( 'portfoliolite Section off', 'portfoliolite' ),
                    'team'            => __( 'Team Section off', 'portfoliolite' ),
                    'testimonial'     => __( 'Testimonial Section off', 'portfoliolite' ),
                    'th_woocommerce'  => __( 'WooCommerce Section off', 'portfoliolite'),
                    'news'            => __( 'News Letter Section off', 'portfoliolite' ),
                    'blog'            => __( 'Blog Section off','portfoliolite' ),  
            )
        ) 
    )
);
  //= Choose Post Meta  =
    $wp_customize->add_setting('section_animation', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'section_animation', array(
        'settings' => 'section_animation',
        'label'    => __('Animation On/Off Option','portfoliolite'),
        'section'  => 'portfoliolite_section_settings',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
    // doc link
    $wp_customize->add_setting('portfoliolite_section_on_off_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_section_on_off_doc',
            array(
        'section'     => 'portfoliolite_section_settings',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#section-on',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));

//Front Page
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/top-slider.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/portfolio-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/service-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/news-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/team-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/testimonial-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/woocommerce-section.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/ribbon.php';
require HUNK_COMPANION_DIR_PATH . '/portfoliolite/customizer/front-page/blog-section.php';
}
add_action('customize_register','portfoliolite_plug_customize_register');