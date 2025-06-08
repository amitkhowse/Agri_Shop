<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function gogolite_customize_register( $wp_customize ){
$wp_customize->register_control_type( 'Gogo_Designer_Toggle_Control' );
/***********************/    
// Start sticky header
/***********************/  
//above header
$wp_customize->add_setting( 'gogo_stick_abv_header_active', array(
                'default'               => false,
                'sanitize_callback'     => 'gogo_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gogo_stick_abv_header_active', array(
                'label'                 => esc_html__('Stick Above Header', 'hunk-companion'),
                'type'                  => 'checkbox',
                'section'               => 'gogo-sticky-header',
                'settings'              => 'gogo_stick_abv_header_active',
            ) ) );
//main header
$wp_customize->add_setting( 'gogo_stick_main_header_active', array(
                'default'               => false,
                'sanitize_callback'     => 'gogo_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gogo_stick_main_header_active', array(
                'label'                 => esc_html__('Stick Main Header', 'hunk-companion'),
                'type'                  => 'checkbox',
                'section'               => 'gogo-sticky-header',
                'settings'              => 'gogo_stick_main_header_active',
            ) ) );
//stick bottom
$wp_customize->add_setting( 'gogo_stick_bottom_header_active', array(
                'default'               => false,
                'sanitize_callback'     => 'gogo_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gogo_stick_bottom_header_active', array(
                'label'                 => esc_html__('Stick Bottom Header', 'hunk-companion'),
                'type'                  => 'checkbox',
                'section'               => 'gogo-sticky-header',
                'settings'              => 'gogo_stick_bottom_header_active',
            ) ) );
// animation
$wp_customize->add_setting('gogo_stick_animation', array(
        'default'        => 'fade',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('gogo_stick_animation', array(
        'settings' => 'gogo_stick_animation',
        'label'    => __('Select Animation Effect','hunk-companion'),
        'section'  => 'gogo-sticky-header',
        'type'     => 'select',
        'choices'  => array(
        'fade'     => __('Fade','hunk-companion'),
        'slide'    => __('Slide','hunk-companion'), 
    ),
));
/***********************/    
// End sticky header
/***********************/ 
//=========================================
//******** Front Page Panel Start **************
        $wp_customize->add_panel( 'gogo_frontpage_section', array(
        'priority'       => 8,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Frontpage Section', 'hunk-companion'),
        'description'    => '',
    ) );

//******** Home Page Layout Start 
$wp_customize->add_section('gogo_homepagelayout_section', array(
        'title'    => __('Homepage Layout Settings', 'hunk-companion'),
        'priority' => 1,
        'panel'    => 'gogo_frontpage_section',
));

// Add an option to disable the logo.
  $wp_customize->add_setting( 'gogo_remove_padding', array(
    'default'           => true,
    'sanitize_callback' => 'gogo_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Gogo_Designer_Toggle_Control( $wp_customize, 'gogo_remove_padding', array(
    'label'       => esc_html__( 'Padded Layout', 'hunk-companion' ),
    'section'     => 'gogo_homepagelayout_section',
    'type'        => 'toggle',
    'settings'    => 'gogo_remove_padding',
  ) ) );

$wp_customize->add_setting( 'gogo_remove_number', array(
    'default'           => true,
    'sanitize_callback' => 'gogo_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Gogo_Designer_Toggle_Control( $wp_customize, 'gogo_remove_number', array(
    'label'       => esc_html__( 'Numbered Section', 'hunk-companion' ),
    'section'     => 'gogo_homepagelayout_section',
    'type'        => 'toggle',
    'settings'    => 'gogo_remove_number',
  ) ) );

$wp_customize->add_setting( 'gogo_remove_vertical_navigation', array(
    'default'           => true,
    'sanitize_callback' => 'gogo_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new Gogo_Designer_Toggle_Control( $wp_customize, 'gogo_remove_vertical_navigation', array(
    'label'       => esc_html__( 'Vertical Navigation', 'hunk-companion' ),
    'section'     => 'gogo_homepagelayout_section',
    'type'        => 'toggle',
    'settings'    => 'gogo_remove_vertical_navigation',
  ) ) );

/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_homepagelayout_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_homepagelayout_doc',
            array(
        'section'     => 'gogo_homepagelayout_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#homepage-section')),
        'priority'   =>30,
    )));  
}
    // section ordering
                
 ////////////Slider with Typewriter
$wp_customize->add_section('gogo_backslider_section', array(
        'title'    => __('Big Image with Typewriter', 'hunk-companion'),
        'priority' => 1,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_backslider_hide', array(
                    'default'  => '',
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
$wp_customize->add_control( 'gogo_backslider_hide', array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_backslider_section',
                    'priority'   => 1,
                )
);

   $wp_customize->add_setting('gogo_big-image-background', array(
            'default'        => 'image',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gogo_sanitize_select',
            
));
   $wp_customize->add_control('gogo_big-image-background', array(
            'label'    => __('Select Background Type', 'hunk-companion'),
            'section'  => 'gogo_backslider_section',
            'settings' => 'gogo_big-image-background',
             'type'    => 'select',
                'choices' => array(
                'image' => 'Background Slider',
                'video' => 'Video (Pro)',           
                ),
));
   
$slider_default = Hunk_Companion_Defaults_Models::instance()->get_slider_default();    

      if ( class_exists( 'Gogo_Repeater' ) ) {
            $wp_customize->add_setting(
                'gogo_backslider_image', 
                array(
                    'sanitize_callback' => 'gogo_repeater_sanitize', 
                    'default'=>json_encode( $slider_default ),     
                ));

            $wp_customize->add_control(
                new Gogo_Repeater(
                    $wp_customize, 'gogo_backslider_image', array(
                        'label'                                => esc_html__( 'Select An Image', 'hunk-companion' ),
                        'section'                              => 'gogo_backslider_section',
                        'priority'                             => 10,
                        'add_field_label'                      => esc_html__( 'Add New Image', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Image', 'hunk-companion' ),
                        'customizer_repeater_image_control'    => true,
                    )
                ));   
        }

$wp_customize->add_setting('gogo_ribbon_bg_video', array(
       'default'        => '',
       'sanitize_callback' => 'sanitize_text_field'
   ));
   $wp_customize->add_control( new WP_Customize_Upload_Control(
       $wp_customize, 'gogo_ribbon_bg_video', array(
       'label'    => __('Upload Background Video', 'hunk-companion'),
       'section'  => 'gogo_backslider_section',
       'settings' => 'gogo_ribbon_bg_video',
   )
   ));

      $wp_customize->add_setting('gogo_video_image_upload', array(
        'default'   => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_upload'
    ));

      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'gogo_video_image_upload', array(
        'label'    => __('Video Thumbnail', 'hunk-companion'),
        'description'=> __('This image will appear while the video is loading
','hunk-companion'),
        'section'  => 'gogo_backslider_section',
        'settings' => 'gogo_video_image_upload',
    )));

  // audio muted
      $wp_customize->add_setting('gogo_slider_audio',
                array(
                    'default'           => '1',
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
      $wp_customize->add_control( 'gogo_slider_audio',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Mute Audio ?', 'hunk-companion'),
                    'section'     => 'gogo_backslider_section',
                    'description' => esc_html__('Check here to disable Audio', 'hunk-companion')
                )
            );   
   
   $wp_customize->add_setting('gogo_slider_id', 
      array(
        'default' => 'slider',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_slider_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_backslider_section',
         'type'       => 'text',
         'priority'   => 2,
));

   $wp_customize->add_setting('gogo_before_text', array(
            'default'        => 'Welcome to future, enjoy our',
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'gogo_sanitize_text',
));
   $wp_customize->add_control('gogo_before_text', array(
            'label'    => __('Before Text', 'hunk-companion'),
            'settings' => 'gogo_before_text',
            'section'  => 'gogo_backslider_section',
             'type'       => 'text',
));

   $wp_customize->add_setting('gogo_fancy_text', array(
            'default'        => 'fantastic,great,awesome',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gogo_sanitize_textarea',
));
   $wp_customize->add_control('gogo_fancy_text', array(
            'label'    => __('Fancy Text', 'hunk-companion'),
            'description' =>__('Add  COMMA SYMBOL (,) for multiple words ', 'gogo'),
            'section'  => 'gogo_backslider_section',
            'settings' => 'gogo_fancy_text',
             'type'       => 'textarea',
));
        if (class_exists('Gogo_Customizer_Color_Control')) {
           
        
   $wp_customize->add_setting('gogo_typewriter_fancytext_color', array(
       'default'           => '#c9a420',
       'capability'        => 'edit_theme_options',
       'sanitize_callback' => 'gogo_sanitize_color',
   ));
  $wp_customize->add_control(
   new Gogo_Customizer_Color_Control($wp_customize,'gogo_typewriter_fancytext_color', array(
       'label'      => __('Fancy Text Color', 'hunk-companion' ),
       'section'    => 'gogo_backslider_section',
   ) )
);
}
   $wp_customize->add_setting('gogo_after_text', array(
            'default'        => ' services',
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'gogo_sanitize_text',
));
   $wp_customize->add_control('gogo_after_text', array(
            'label'    => __('After Text', 'hunk-companion'),
            'section'  => 'gogo_backslider_section',
            'settings' => 'gogo_after_text',
             'type'       => 'text',
));

   $wp_customize->add_setting('gogo_button_text1', array(
            'default'        => 'Get Started',
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'gogo_sanitize_text',
));
   $wp_customize->add_control('gogo_button_text1', array(
            'label'    => __('Button Text', 'hunk-companion'),
            'section'  => 'gogo_backslider_section',
            'settings' => 'gogo_button_text1',
             'type'       => 'text',
));

   $wp_customize->add_setting('gogo_button_link1', array(
            'default'        => '#',
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'gogo_sanitize_text',
));
   $wp_customize->add_control('gogo_button_link1', array(
            'label'    => __('Button Link', 'hunk-companion'),
            'section'  => 'gogo_backslider_section',
            'settings' => 'gogo_button_link1',
             'type'       => 'text',
));

   if ( class_exists( 'Gogo_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'gogo_typewriter_size', array(
                'sanitize_callback' => 'gogo_sanitize_range_value',
                'default'           => '48',
                'transport'         =>  'postMessage',        
            )
        );
$wp_customize->add_control(
            new Gogo_WP_Customizer_Range_Value_Control(
                $wp_customize, 'gogo_typewriter_size', array(
                    'label'       => esc_html__( 'Font-Size', 'hunk-companion' ),
                    'section'     => 'gogo_backslider_section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 500,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}

if ( class_exists( 'Gogo_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'gogo_typewriter_lineheight', array(
                'sanitize_callback' => 'gogo_sanitize_range_value',
                'default'           => '54',
                'transport'         =>  'postMessage',
                
            )
        );
$wp_customize->add_control(
            new Gogo_WP_Customizer_Range_Value_Control(
                $wp_customize, 'gogo_typewriter_lineheight', array(
                    'label'       => esc_html__( 'Line Height', 'hunk-companion' ),
                    'section'     => 'gogo_backslider_section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 500,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}

if ( class_exists( 'Gogo_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'gogo_typewriter_letterspacing', array(
                'sanitize_callback' => 'gogo_sanitize_range_value',
                'default'           => '2',
                'transport'         =>  'postMessage',
                
            )
        );
$wp_customize->add_control(
            new Gogo_WP_Customizer_Range_Value_Control(
                $wp_customize, 'gogo_typewriter_letterspacing', array(
                    'label'       => esc_html__( 'LetterSpacing', 'hunk-companion' ),
                    'section'     => 'gogo_backslider_section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 500,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_typewriter_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_typewriter_doc',
            array(
        'section'     => 'gogo_backslider_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#typewriter-section')),
        'priority'   =>30,
    )));     //*****************************************************
}
/////////// INTRODUCTION SECTION STARTS//////////////
    $wp_customize->add_section('gogo_introduction_section', array(
        'title'    => __('About Us', 'gogo'),
        'priority' => 3,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_introduction_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
$wp_customize->add_control( 'gogo_introduction_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_introduction_section',
                )
);
    $wp_customize->add_setting('gogo_introduction_id', 
      array(
        'default' => 'about_us',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_introduction_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_introduction_section',
         'type'       => 'text',
));
    $wp_customize->add_setting('gogo_introduction_name', 
      array(
        'default' => 'Who We Are',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_introduction_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_introduction_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_introduction_heading', array(
        'default' => 'Make your journey beautiful and bright',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_introduction_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_introduction_section',
         'type'       => 'text',
));
    $wp_customize->add_setting('gogo_introduction_description', 
      array(
        'default' => 'fermentum rhoncus, diam ante viverra nulla, at interdum tortor eros nec lectus. Donec tortor orci, pellentesque at finibus sit amet, bibendum quis lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh mi, tempor et dignissim ut, imperdiet eget ante.
',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_introduction_description', array(
        'label'    => __('Section Description', 'hunk-companion'),
        'section'  => 'gogo_introduction_section',
         'type'       => 'textarea',
));

    //For Normal Image Upload
    $wp_customize->add_setting('gogo_introduction_image', array(
       'default'        => HUNK_COMPANION_INTRO_IMAGE,
       'sanitize_callback' => 'sanitize_text_field'
   ));
   $wp_customize->add_control( new WP_Customize_Upload_Control(
       $wp_customize, 'gogo_introduction_image', array(
       'label'    => __('Upload Right Side Image', 'hunk-companion'),
       'section'  => 'gogo_introduction_section',
        )
   ));
      // Color Option For Introduction Section
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_introduction_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_introduction_doc',
            array(
        'section'     => 'gogo_introduction_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#aboutus-section')),
        'priority'   =>30,
    )));    
}
//*****************************************************
///////////// BLOG SECTION STARTS/////////////////
$wp_customize->add_section('gogo_blog_section', array(
        'title'    => __('Blog Section', 'hunk-companion'),
        'priority' => 11,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_blog_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
$wp_customize->add_control( 'gogo_blog_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_blog_section',
                )
);

$wp_customize->add_setting('gogo_blog_id', 
      array(
        'default' => 'blog',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_blog_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_blog_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_blog_name', 
      array(
        'default'           => 'Our blog',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         =>'postMessage',
));
    $wp_customize->add_control( 'gogo_blog_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_blog_section',
         'type'    => 'text',
));

    $wp_customize->add_setting('gogo_blog_heading', array(
        'default' => 'Lets have a look on Modern Technology',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_blog_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_blog_section',
         'type'       => 'text',
));

 $wp_customize->add_setting('gogo_slider_count', array(
        'default'        => 6,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('gogo_slider_count', array(
        'settings'  => 'gogo_slider_count',
        'label'     => __('Number of Post','oneline'),
        'section'   => 'gogo_blog_section',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 12)

    ) );
//side way    
$wp_customize->add_setting( 'gogo_blog_slider',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
$wp_customize->add_control( 'gogo_blog_slider',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Display in a Slide Way', 'hunk-companion'),
                    'section'     => 'gogo_blog_section',
                )
);
    //= Choose All Category Button  =
    $cats = array();
    $cats[0] = 'All Categories Posts';
    foreach ( get_categories() as $categories => $category ){    
    $cats[$category->term_id] = $category->name;
    }
     $wp_customize->add_setting('gogo_blog_cate', array(
        'default'        => 1,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_select',
    ));
    $wp_customize->add_control('gogo_blog_cate', array(
        'label'   => __('Latest Post Category','hunk-companion'),
        'section' => 'gogo_blog_section',
        'type' => 'select',
        'choices' => $cats,
    ) );

    $wp_customize->add_setting('gogo_section_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('gogo_section_blog_post_content', array(
        'settings' => 'gogo_section_blog_post_content',
        'label'   => __('Blog Post Content','gogo'),
        'section' => 'gogo_blog_section',
        'type'    => 'select',
        'choices'    => array(
        'excerpt' => __('Excerpt Content','gogo'), 
        'nocontent' => __('No Content','gogo'), 
        ),
    ));
     // excerpt length
    $wp_customize->add_setting('gogo_section_blog_expt_length', array(
      'default'           =>'20',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' =>'gogo_sanitize_number',
    )
  );
  $wp_customize->add_control('gogo_section_blog_expt_length', array(
      'type'        => 'number',
      'section'     => 'gogo_blog_section',
      'label'       => __( 'Excerpt Length', 'gogo' ),
      'input_attrs' => array(
        'min'  => 0,
        'step' => 1,
        'max'  => 1000,
      ),
    )
  );
//side way    
$wp_customize->add_setting( 'gogo_blog_image_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
              )
            );
$wp_customize->add_control( 'gogo_blog_image_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide Featured Image', 'hunk-companion'),
                    'section'     => 'gogo_blog_section',
                )
);
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_blog_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_blog_doc',
            array(
        'section'     => 'gogo_blog_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#blog-section')),
        'priority'   =>30,
    ))); 
    }  
//*****************************************************
///////////// SERVICE SECTION STARTS/////////////////
$wp_customize->add_section('gogo_service_section', array(
        'title'    => __('Service Section', 'hunk-companion'),
        'priority' => 2,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_service_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                )
            );
$wp_customize->add_control( 'gogo_service_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_service_section',
                )
);

 $wp_customize->add_setting('gogo_service_id', 
      array(
        'default' => 'service',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_service_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_service_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_service_name', 
      array(
        'default' => 'What We Do',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_service_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_service_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_service_heading', array(
        'default' => 'Our services which you find really adaptable.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_service_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_service_section',
         'type'       => 'text',
));
//Display In a slide Way
$wp_customize->add_setting( 'gogo_service_slider', array(
               'default'               => false,
               'sanitize_callback'     => 'gogo_sanitize_checkbox',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gogo_service_slider', array(
               'label'                 => esc_html__('Display in a Slide Way', 'hunk-companion'),
               'type'                  => 'checkbox',
               'section'               => 'gogo_service_section',
) ) );

              //Service Content Via Repeater
      if ( class_exists( 'Gogo_Repeater' ) ) {
            $wp_customize->add_setting(
                'gogo_service_content', array(
                    'sanitize_callback' => 'gogo_repeater_sanitize',  
                    'default'           => Hunk_Companion_Defaults_Models::instance()->get_features_default(),
                )
            );

            $wp_customize->add_control(
                new Gogo_Repeater(
                    $wp_customize, 'gogo_service_content', array(
                        'label'                                => esc_html__( 'Service Content', 'hunk-companion' ),
                        'section'                              => 'gogo_service_section',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Service', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Service', 'hunk-companion' ),
                        'customizer_repeater_icon_control'  => true,
                        'customizer_repeater_image_control'    => false,
                        'customizer_repeater_title_control'    => true,
                        'customizer_repeater_subtitle_control' => false,
                        'customizer_repeater_text_control'     => true,
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,
                        'customizer_repeater_color_control' => true,
                    ),'Gogo_Service_Repeater'
                )
            );
        }  
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_service_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_service_doc',
            array(
        'section'     => 'gogo_service_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#service-section')),
        'priority'   =>30,
    ))); 
}  
//*****************************************************
///////////// SERVICE SECTION END/////////////////

////// CLIENTS & TESTIMONIALS SECTION STARTS///////////
$wp_customize->add_section('gogo_ct_section', array(
        'title'    => __('Clients & Testimonials Section', 'gogo'),
        'priority' => 9,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_ct_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                ));
$wp_customize->add_control( 'gogo_ct_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_ct_section',
                ));

 $wp_customize->add_setting('gogo_ct_id', 
      array(
        'default' => 'clients',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_ct_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_ct_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_ct_name', 
      array(
        'default' => 'Clients Testimonial',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_ct_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_ct_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_ct_heading', 
      array(
        'default' => 'What people say about us',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_ct_heading', 
      array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_ct_section',
         'type'       => 'text',
));
  //Testimonials Content Via Repeater
      if ( class_exists( 'Gogo_Repeater' ) ) {
            $wp_customize->add_setting(
                'gogo_testimonials_content', array(
                    'sanitize_callback' => 'gogo_repeater_sanitize',  
                    'default'           => Hunk_Companion_Defaults_Models::instance()->get_testimonials_default(),
                )
            );

            $wp_customize->add_control(
                new Gogo_Repeater(
                    $wp_customize, 'gogo_testimonials_content', array(
                        'label'                                => esc_html__( 'Testimonials Content', 'hunk-companion' ),
                        'section'                              => 'gogo_ct_section',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Testimonial', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Testimonial', 'hunk-companion' ),
                        'customizer_repeater_icon_control'  => false,
                        'customizer_repeater_image_control'    => true,
                        'customizer_repeater_title_control'    => true,
                        'customizer_repeater_price_control'    => false,
                        'customizer_repeater_subtitle_control' => true,
                        'customizer_repeater_text_control'     => true,
                       'customizer_repeater_text2_control' => false,
                        'customizer_repeater_link_control'     => false,
                        'customizer_repeater_repeater_control' => false,
                        'customizer_repeater_color_control' => false,
                    ),'Gogo_Testimonials_Repeater'
                )
            );
}
  //Clients Content Via Repeater
      if ( class_exists( 'Gogo_Repeater' ) ) {
            $wp_customize->add_setting(
                'gogo_clients_content', array(
                    'sanitize_callback' => 'gogo_repeater_sanitize',  
                    'default'           => Hunk_Companion_Defaults_Models::instance()->get_clients_default(),
                )
            );

            $wp_customize->add_control(
                new Gogo_Repeater(
                    $wp_customize, 'gogo_clients_content', array(
                        'label'                                => esc_html__( 'Clients Logo', 'hunk-companion' ),
                        'section'                              => 'gogo_ct_section',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Client', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Client', 'hunk-companion' ),
                        'customizer_repeater_image_control'    => true,
                        'customizer_repeater_link_control'     => true,
                    ),'Gogo_Clients_Repeater'
                )
            );
}    
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_ct_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_ct_doc',
            array(
        'section'     => 'gogo_ct_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#clients-section')),
        'priority'   =>30,
    ))); 
  } 
//*****************************************************
///////////// CONTACT SECTION STARTS/////////////////
$wp_customize->add_section('gogo_contact_section', array(
        'title'    => __('Contact Section', 'hunk-companion'),
        'priority' => 12,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_contact_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                ));
$wp_customize->add_control( 'gogo_contact_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_contact_section',
                ));

$wp_customize->add_setting('gogo_contact_id', 
      array(
        'default' => 'contact',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_contact_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'text',
));
    $wp_customize->add_setting('gogo_contact_name', 
      array(
        'default' => 'Get in touch',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_contact_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_contact_heading', array(
        'default' => 'We are one mail away from you, feel free to contact us',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_contact_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'text',
));

     $wp_customize->add_setting('contact_shortcode', array(
            'default'           => '[lead-form form-id=1 title=Contact Us]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gogo_sanitize_textarea'
            ));
        $wp_customize->add_control('contact_shortcode', array(
            'label'    => __('Contact Us Shortcode', 'gogo'),
            'description' =>__('Lead Form Builder Plugin Shortcode Insert.','hunk-companion'),
            'section'  => 'gogo_contact_section',
            'settings' => 'contact_shortcode',
             'type'       => 'textarea',
            ));

$wp_customize->add_setting('gogo_contact_address1', array(
        'default' => '4114 Rosewood Lane, New York 10048',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_contact_address1', array(
        'label'    => __('Address', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'textarea',
));

    $wp_customize->add_setting('gogo_contact_address2', array(
        'default' => '212-938-3621, 917-204-2105 ',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_contact_address2', array(
        'label'    => __('Mobile Number', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'textarea',
));


    $wp_customize->add_setting('gogo_contact_support', array(
        'default' => 'For online support please vsit
        support@domain.com',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_textarea',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_contact_support', array(
        'label'    => __('Email', 'hunk-companion'),
        'section'  => 'gogo_contact_section',
         'type'       => 'textarea',
));

    // Registers Contact_background settings  
    $wp_customize->add_setting( 'contact_background_image_url', array(
        'default' => HUNK_COMPANION_CONTACT_BACKGROUND,
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_setting( 'contact_background_image_id', array(
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'contact_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'contact_background_size', array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'contact_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'contact_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
    ) );


    // Registers example_background control
    $wp_customize->add_control(
        new Hunk_Companion_Customize_Custom_Background_Control(
            $wp_customize,
            'contact_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'hunk-companion' ),
                'section'   => 'gogo_contact_section',
                'priority'   => 30,
                'settings'    => array(
                    'image_url' => 'contact_background_image_url',
                    'image_id' => 'contact_background_image_id',
                    'repeat' => 'contact_background_repeat', // Use false to hide the field
                    'size' => 'contact_background_size',
                    'position' => 'contact_background_position',
                    'attach' => 'contact_background_attach',
                )
            )
        
    )); 
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_contact_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_contact_doc',
            array(
        'section'     => 'gogo_contact_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#contact-section')),
        'priority'   =>30,
    ))); 
  } 
//*****************************************************
///////////// TEAM SECTION STARTS/////////////////
$wp_customize->add_section('gogo_team_section', array(
        'title'    => __('Team Section', 'gogo'),
        'priority' => 7,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_team_hide',
                array(
                    'default'  => '',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                ));
$wp_customize->add_control( 'gogo_team_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_team_section',
                ));

$wp_customize->add_setting('gogo_team_id', 
      array(
        'default' => 'team',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_team_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_team_section',
         'type'       => 'text',
));
    $wp_customize->add_setting('gogo_team_name', 
      array(
        'default' => 'OUR TEAM',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_team_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_team_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_team_heading', array(
        'default' => 'We have the team of highly talented people.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'gogo_team_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_team_section',
         'type'       => 'text',
));

//Display In a slide Way
$wp_customize->add_setting( 'gogo_team_slider', array(
               'default'               => false,
               'sanitize_callback'     => 'gogo_sanitize_checkbox',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gogo_team_slider', array(
               'label'                 => esc_html__('Display in a Slide Way', 'hunk-companion'),
               'type'                  => 'checkbox',
               'section'               => 'gogo_team_section',
) ) );
               //Team Content Via Repeater
      if ( class_exists( 'Gogo_Repeater' ) ) {
            $wp_customize->add_setting(
                'gogo_team_content', array(
                    'sanitize_callback' => 'gogo_repeater_sanitize',  
                    'default'           => Hunk_Companion_Defaults_Models::instance()->get_team_default(),
                )
            );

            $wp_customize->add_control(
                new Gogo_Repeater(
                    $wp_customize, 'gogo_team_content', array(
                        'label'                                => esc_html__( 'Team Content', 'hunk-companion' ),
                        'section'                              => 'gogo_team_section',
                        'priority'                             => 15,
                        'add_field_label'                      => esc_html__( 'Add new Team', 'hunk-companion' ),
                        'item_name'                            => esc_html__( 'Team', 'hunk-companion' ),
                        
                        'customizer_repeater_title_control'    => true,   
                        'customizer_repeater_subtitle_control'    => true, 

                        'customizer_repeater_text_control'    => true,  

                        'customizer_repeater_image_control'    => true,  
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => true,  
                                         
                        
                    ),'Gogo_Team_Repeater'
                )
            );
        }  
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_team_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_team_doc',
            array(
        'section'     => 'gogo_team_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#team-section')),
        'priority'   =>30,
    ))); 
}
//*****************************************************
///////////// TEAM SECTION END/////////////////

///////////// WOOCOMMERCE SECTION STARTS/////////////////
$wp_customize->add_section('gogo_woocommerce_section', array(
        'title'    => __('WooCommerce Section', 'hunk-companion'),
        'priority' => 4,
        'panel'  => 'gogo_frontpage_section',
));

$wp_customize->add_setting( 'gogo_woocommerce_hide',
                array(
                    'default'  => '1',
                    'priority'   => 1,
                    'sanitize_callback' => 'gogo_sanitize_checkbox',
                ));
$wp_customize->add_control( 'gogo_woocommerce_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'section'     => 'gogo_woocommerce_section',
                ));

$wp_customize->add_setting('gogo_woocommerce_id', 
      array(
        'default' => 'woocommerce',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
));
    $wp_customize->add_control( 'gogo_woocommerce_id', 
    array(
        'label'    => __('Section Id', 'hunk-companion'),
        'section'  => 'gogo_woocommerce_section',
         'type'       => 'text',
));
    $wp_customize->add_setting('gogo_woocommerce_name', 
      array(
        'default' => 'Store',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         =>  'postMessage',
));
    $wp_customize->add_control( 'gogo_woocommerce_name', 
    array(
        'label'    => __('Small Heading', 'hunk-companion'),
        'section'  => 'gogo_woocommerce_section',
         'type'       => 'text',
));

    $wp_customize->add_setting('gogo_woocommerce_heading', array(
        'default' => 'Showcase your products.',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'gogo_sanitize_text',
        'transport'         =>  'postMessage',
));
    $wp_customize->add_control( 'gogo_woocommerce_heading', array(
        'label'    => __('Big Heading', 'hunk-companion'),
        'section'  => 'gogo_woocommerce_section',
         'type'       => 'text',
));

     $wp_customize->add_setting('woocommerce_shortcode', array(
            'default'           => '[products limit="3" columns="3"]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'gogo_sanitize_textarea',
            ));
        $wp_customize->add_control('woocommerce_shortcode', array(
            'label'    => __('WooCommerce Shortcode', 'hunk-companion'),
            'description' =>__('WooCommerce Shortcode Insert.','hunk-companion'),
            'section'  => 'gogo_woocommerce_section',
            'settings' => 'woocommerce_shortcode',
             'type'       => 'textarea',
            ));   

/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_woocommerce_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_woocommerce_doc',
            array(
        'section'     => 'gogo_woocommerce_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#woo-section')),
        'priority'   =>30,
    ))); 
}
        ///////////// CALL_TO SECTION STARTS/////////////////
        $wp_customize->add_section('gogo_call_to_section', array(
                'title'    => __('Call To Action Section', 'hunk-companion'),
                'priority' => 5,
                'panel'  => 'gogo_frontpage_section',
        ));

        $wp_customize->add_setting( 'gogo_call_to_hide',
                        array(
                'default'  => '',
                'priority'   => 1,
                'sanitize_callback' => 'gogo_sanitize_checkbox',
                        )
                    );
        $wp_customize->add_control( 'gogo_call_to_hide',
                        array(
                            'type'        => 'checkbox',
                            'label'       => esc_html__('Disable section', 'hunk-companion'),
                            'section'     => 'gogo_call_to_section',
                        )
        );

        $wp_customize->add_setting('gogo_call_to_id', 
              array(
                'default' => 'call_to',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'gogo_sanitize_text',
        ));
            $wp_customize->add_control( 'gogo_call_to_id', 
            array(
                'label'    => __('Section Id', 'hunk-companion'),
                'section'  => 'gogo_call_to_section',
                 'type'       => 'text',
        ));

        $wp_customize->add_setting('gogo_call_to_heading', array(
                'default' => 'Maecenas lacinia tortor vel justo  gravida.',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'gogo_sanitize_text',
                'transport'         =>  'postMessage',
        ));
            $wp_customize->add_control( 'gogo_call_to_heading', array(
                'label'    => __('Heading', 'hunk-companion'),
                'section'  => 'gogo_call_to_section',
                 'type'       => 'text',
        ));

        $wp_customize->add_setting('gogo_call_to_button_text', array(
                'default' => 'call to action',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'gogo_sanitize_text',
                'transport'         =>  'postMessage',
        ));
            $wp_customize->add_control( 'gogo_call_to_button_text', array(
                'label'    => __('Button Text', 'hunk-companion'),
                'section'  => 'gogo_call_to_section',
                 'type'       => 'text',
        ));

        $wp_customize->add_setting('gogo_call_to_button_link', array(
                'default' => '#',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'gogo_sanitize_text',
                
        ));
            $wp_customize->add_control( 'gogo_call_to_button_link', array(
                'label'    => __('Button Link', 'hunk-companion'),
                'section'  => 'gogo_call_to_section',
                 'type'       => 'text',
        ));

        // Registers call_to_background settings
$wp_customize->add_setting( 'call_to_background_image_url', array(
        'default' => HUNK_COMPANION_CALL_TO_BACKGROUND,
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_setting( 'call_to_background_image_id', array(
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'call_to_background_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'call_to_background_size', array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'call_to_background_position', array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'call_to_background_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    // Registers example_background control
    $wp_customize->add_control(
        new Hunk_Companion_Customize_Custom_Background_Control(
            $wp_customize,
            'call_to_background_image',
            array(
                'label'     => esc_html__( 'Background Image', 'hunk-companion' ),
                'section'   => 'gogo_call_to_section',
                'priority'   => 30,
                'settings'    => array(
                    'image_url' => 'call_to_background_image_url',
                    'image_id' => 'call_to_background_image_id',
                    'repeat' => 'call_to_background_repeat', // Use false to hide the field
                    'size' => 'call_to_background_size',
                    'position' => 'call_to_background_position',
                    'attach' => 'call_to_background_attach',
                )
            )     
    ));
/****************/
//doc link
/****************/
if ( class_exists( 'Gogo_Misc_Control' ) ){
$wp_customize->add_setting('gogo_call_to_doc', array(
    'sanitize_callback' => 'gogo_sanitize_text',
    ));
$wp_customize->add_control(new Gogo_Misc_Control( $wp_customize, 'gogo_call_to_doc',
            array(
        'section'     => 'gogo_call_to_section',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'hunk-companion' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/gogo-theme/#calltoaction-section')),
        'priority'   =>30,
    )));
}
// selective-refresh option added
$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title h1'
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-title p'
) );
//slider
$wp_customize->selective_refresh->add_partial( 'gogo_backslider_image', array(
        'selector' => '.type-text-wrap'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_before_text', array(
        'selector' => '.slider-typewriter .type-button'
) );
// service
$wp_customize->selective_refresh->add_partial( 'gogo_service_heading', array(
        'selector' => '.thunk-service .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_service_name', array(
        'selector' => '.thunk-service .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_service_content', array(
        'selector' => '.thunk-service .service-wrapper'
) );
// about
$wp_customize->selective_refresh->add_partial( 'gogo_introduction_heading', array(
        'selector' => '.thunk-first .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_introduction_name', array(
        'selector' => '.thunk-first .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_introduction_description', array(
        'selector' => '.thunk-first .description'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_introduction_image', array(
        'selector' => '.thunk-first .thunk-intro-image'
) );
// woocommerce
$wp_customize->selective_refresh->add_partial( 'gogo_woocommerce_heading', array(
        'selector' => '.thunk-woocommerce .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_woocommerce_name', array(
        'selector' => '.thunk-woocommerce .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'woocommerce_shortcode', array(
        'selector' => '.thunk-woocommerce .woocommerce-wrapper'
) );
// Call to action
$wp_customize->selective_refresh->add_partial( 'gogo_call_to_heading', array(
        'selector' => '.thunk-call-to .call-to-heading-wrap'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_call_to_button_text', array(
        'selector' => '.thunk-call-to .type-button'
) );
// Portfolio
$wp_customize->selective_refresh->add_partial( 'gogo_portfolio_name', array(
        'selector' => '.thunk-portfolio .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_portfolio_heading', array(
        'selector' => '.thunk-portfolio .short-heading'
) );
// Team
$wp_customize->selective_refresh->add_partial( 'gogo_team_name', array(
        'selector' => '.thunk-team .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_team_heading', array(
        'selector' => '.thunk-team .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_team_content', array(
        'selector' => '.thunk-team .team-wrapper'
) );
// Price
$wp_customize->selective_refresh->add_partial( 'gogo_pricing_name', array(
        'selector' => '.thunk-pricing .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_pricing_heading', array(
        'selector' => '.thunk-pricing .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_pricing_content', array(
        'selector' => '.thunk-pricing .pricing-box'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_pricing_t_c', array(
        'selector' => '.thunk-pricing .pricing-subheading'
) );
// Testimonial
$wp_customize->selective_refresh->add_partial( 'gogo_ct_name', array(
        'selector' => '.thunk-clients-and-testimonials .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_ct_heading', array(
        'selector' => '.thunk-clients-and-testimonials .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_testimonials_content', array(
        'selector' => '.thunk-clients-and-testimonials .clients-and-testimonials-wrapper'
) );
//video ribbon
$wp_customize->selective_refresh->add_partial( 'gogo_video_ribbon_heading', array(
        'selector' => '.thunk-video-ribbon .video-window h4'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_video_ribbon_subheading', array(
        'selector' => '.thunk-video-ribbon .video-window p'
) );
//Blog
$wp_customize->selective_refresh->add_partial( 'gogo_blog_name', array(
        'selector' => '.thunk-blog .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_blog_heading', array(
        'selector' => '.thunk-blog .short-heading'
) );
// contact
$wp_customize->selective_refresh->add_partial( 'gogo_contact_name', array(
        'selector' => '.thunk-contact-us .vertical-text'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_contact_heading', array(
        'selector' => '.thunk-contact-us .short-heading'
) );
$wp_customize->selective_refresh->add_partial( 'contact_shortcode', array(
        'selector' => '.thunk-contact-us .contact-form-wrapper'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_contact_address1', array(
        'selector' => '.thunk-contact-us .fa-map-marker'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_contact_address2', array(
        'selector' => '.thunk-contact-us .fa-mobile'
) );
$wp_customize->selective_refresh->add_partial( 'gogo_contact_support', array(
        'selector' => '.thunk-contact-us .fa-envelope'
) );
// social
$wp_customize->selective_refresh->add_partial( 'gogo_social_content', array(
        'selector' => '.thunk-social-wrapper'
) );
//copyright
$wp_customize->selective_refresh->add_partial( 'gogo_footer_bottom_col1_texthtml', array(
        'selector' => '.bottom-footer-col1 .content-html'
) );
//******** Front Page Panel End **************
// scroller
if ( class_exists( 'Hunk_Companion_Customize_Control_Scroll' ) ){
      $scroller = new Hunk_Companion_Customize_Control_Scroll();
}
$wp_customize->register_section_type( 'Hunk_Companion_Customize_Custom_Background_Control' );
  
}
add_action('customize_register','gogolite_customize_register');