<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$cats = array();
   $cats[0] = 'All Categories';
   foreach ( get_categories() as $categories => $category ){
   $cats[$category->term_id] = $category->name;
 }
$wp_customize->add_setting(
            'blog_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
);
if ( class_exists( 'Portfoliolite_Customize_Control_Tabs' ) ) {
 $wp_customize->add_control(
            new Portfoliolite_Customize_Control_Tabs(
                $wp_customize, 'blog_tabs', array(
                    'section' => 'portfoliolite_blog_section',
                    'tabs'    => array(
                        'general'    => array(
                            'nicename' => esc_html__( 'Setting', 'portfoliolite' ),
                            'controls' => array(
                                'blog_head_',
                                'blog_desc_',
                                'slider_cate',
                                'slider_count','portfoliolite_blog_doc'
                            ),
                        ),
                        'appearance' => array(
                            'nicename' => esc_html__( 'Style', 'portfoliolite' ),
                            'controls' => array(
                                'blog_img_overly_color',
                                'blog_txt_color', 
                                'blog_subtxt_color',
                                'blog_colm_color1',
                                'blog_colm_color2',
                                'blog_colm_color3'   
                            ),
                        ),
                    ),
                )
            )
       );
} 

//  ============================= //
//  S5 = blog sections  =
//  ============================= //

 $wp_customize->add_setting('blog_head_', array(
        'default'           => __('Latest News & Blogs','portfoliolite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
    $wp_customize->add_control('blog_head_', array(
        'label'    => __('Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_blog_section',
        'settings' => 'blog_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('blog_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'portfoliolite_sanitize_textarea',
        
    ));
    $wp_customize->add_control('blog_desc_', array(
        'label'    => __('Sub Heading', 'portfoliolite'),
        'section'  => 'portfoliolite_blog_section',
        'settings' => 'blog_desc_',
         'type'       => 'textarea',
    ));
   
     $wp_customize->add_setting('slider_cate', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_cate', array(
        'settings' => 'slider_cate',
        'label'   => __('Post Category','portfoliolite'),
        'section' => 'portfoliolite_blog_section',
        'type' => 'select',
        'choices' => $cats,
    ) );
    $wp_customize->add_setting('slider_count', array(
        'default'        => 4,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('slider_count', array(
        'settings'  => 'slider_count',
        'label'     => __('Number of post','portfoliolite'),
        'section'   => 'portfoliolite_blog_section',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 50)

    ) );



$wp_customize->add_setting('blog_img_overly_color',array(
            'default'     => 'rgba(0, 0, 0, 0)',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'portfoliolite_sanitize_color',
 ) );
$wp_customize->add_control( 
        new Portfoliolite_Customizer_Color_Control($wp_customize,
            'blog_img_overly_color',
              array(
                'label'     => __('Background Color', 'portfoliolite' ),
                'description'=>__('Image Overlay & Background Color Change','portfoliolite'),
                'section'   => 'portfoliolite_blog_section',
                'settings'  => 'blog_img_overly_color',
            )));

//color option
$wp_customize->add_setting('blog_txt_color', array(
        'default'        => '#000',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_txt_color', array(
        'label'      => __('Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_blog_section',
        'settings'   => 'blog_txt_color',
    ) ) 
    );
 $wp_customize->add_setting('blog_subtxt_color', array(
        'default'        => '#000',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_subtxt_color', array(
        'label'      => __('Sub Heading Color', 'portfoliolite' ),
        'section'    => 'portfoliolite_blog_section',
        'settings'   => 'blog_subtxt_color',
    ) ) 
    );   
//first coloum color   
$wp_customize->add_setting('blog_colm_color1', array(
        'default'        => '#E67E22',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_colm_color1', array(
        'label'      => __('First Column color', 'portfoliolite' ),
        'section'    => 'portfoliolite_blog_section',
        'settings'   => 'blog_colm_color1',
    ) ) 
    );
//second coloum color 
$wp_customize->add_setting('blog_colm_color2', array(
        'default'        => '#C0392B',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_colm_color2', array(
        'label'      => __('Second Column color', 'portfoliolite' ),
        'section'    => 'portfoliolite_blog_section',
        'settings'   => 'blog_colm_color2',
    ) ) 
    );

//third coloum color 
$wp_customize->add_setting('blog_colm_color3', array(
        'default'        => '#2980B9',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'blog_colm_color3', array(
        'label'      => __('Third Column color', 'portfoliolite' ),
        'section'    => 'portfoliolite_blog_section',
        'settings'   => 'blog_colm_color3',
    ) ) ); //-------------End blog heading Panel----------------//

    // doc link
    $wp_customize->add_setting('portfoliolite_blog_doc', array(
    'sanitize_callback' => 'portfoliolite_sanitize_text',
    ));
    $wp_customize->add_control(new Portfoliolite_Misc_Control( $wp_customize, 'portfoliolite_blog_doc',
            array(
        'section'     => 'portfoliolite_blog_section',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/portfoliolite-theme/#blog-section',
        'description' => esc_html__( 'To know more go with this', 'portfoliolite' ),
        'priority'    =>100,
    )));