<?php
/**
 * Vertical Category Section Customizer Settings
 */
function open_mart_product_category_list($arr='',$all=true){
    $cats = array();
    if($all == true){
        $cats[0] = 'All Categories';
    }
    foreach ( get_categories($arr) as $categories => $category ){
        $cats[$category->slug] = $category->name;
     }
     return $cats;
}
$wp_customize->add_setting( 'open_mart_disable_vt_cat_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_vt_cat_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_vt_category_tab_section',
                'settings'              => 'open_mart_disable_vt_cat_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_mart_vt_cat_tab_heading', array(
        'default' => __('Vertical Product','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_vt_cat_tab_heading', array(
        'label'    => __('Section Heading', 'open-mart'),
        'section'  => 'open_mart_vt_category_tab_section',
         'type'       => 'text',
));
//= Choose All Category  =   
    if (class_exists( 'open_mart_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('open_mart_vt_category_tab_list', array(
        'default'           => '',
        'sanitize_callback' => 'open_mart_checkbox_explode'
    ));
    $wp_customize->add_control(new open_mart_Customize_Control_Checkbox_Multiple(
            $wp_customize,'open_mart_vt_category_tab_list', array(
        'settings'=> 'open_mart_vt_category_tab_list',
        'label'   => __( 'Choose Categories To Show', 'open-mart' ),
        'section' => 'open_mart_vt_category_tab_section',
        'choices' => open_mart_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

$wp_customize->add_setting('open_mart_vt_category_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_vt_category_optn', array(
        'settings' => 'open_mart_vt_category_optn',
        'label'   => __('Choose Option','open-mart'),
        'section' => 'open_mart_vt_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','open-mart'),
        'featured'   => __('Featured','open-mart'),
        'random'     => __('Random','open-mart'),
            
        ),
    ));

$wp_customize->add_setting( 'open_mart_single_row_slide_cat_vt', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_single_row_slide_cat_vt', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_vt_category_tab_section',
                'settings'              => 'open_mart_single_row_slide_cat_vt',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_vt_cat_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_vt_cat_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_vt_category_tab_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_vt_cat_slider_optn',
  ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_vt_banner_atply', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_vt_banner_atply', array(
    'label'       => esc_html__( 'Banner Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_vt_category_tab_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_vt_banner_atply',
  ) ) );

//Vertical Tab Content Via Repeater
      if ( class_exists( 'open_mart_Repeater' ) ){
            $wp_customize->add_setting(
             'open_mart_vt1_banner_content', array(
             'sanitize_callback' => 'open_mart_Repeater_sanitize',  
             'default'           => '',
                )
            );
            $wp_customize->add_control(
                new open_mart_Repeater(
                    $wp_customize, 'open_mart_vt1_banner_content', array(
                        'label'                                => esc_html__( 'Banner Content', 'open-mart' ),
                        'section'                              => 'open_mart_vt_category_tab_section',
                        'add_field_label'                      => esc_html__( 'Add new Banner', 'open-mart' ),
                        'item_name'                            => esc_html__( 'Banner Image', 'open-mart' ),
                        
                        'customizer_repeater_title_control'    => false,   
                        'customizer_repeater_subtitle_control'    => false, 

                        'customizer_repeater_text_control'    => false,  

                        'customizer_repeater_image_control'    => true, 
                        'customizer_repeater_logo_image_control'    => false, 
                        'customizer_repeater_link_control'     => true,
                        'customizer_repeater_repeater_control' => false,  
                                         
                        
                    ),'open_mart_vertt1_Repeater'
                )
            );
        }

        $wp_customize->add_setting('open_mart_vt_banner_position', array(
        'default'        => 'left',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
       ));
        $wp_customize->add_control( 'open_mart_vt_banner_position', array(
                'settings' => 'open_mart_vt_banner_position',
                'label'   => __('Banner Position','open-mart'),
                'section' => 'open_mart_vt_category_tab_section',
                'type'    => 'select',
                'choices'    => array(
                'left'     => __('Left','open-mart'),
                'right'     => __('Right (Pro)','open-mart'),    
                ),
            ));

$wp_customize->add_setting('open_mart_vt_cat_tab_slider_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_vt_cat_tab_slider_doc',
            array(
        'section'    => 'open_mart_vt_category_tab_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#vertical-tabbed',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));