<?php
/**
 * Category Section Customizer Settings
 */
if(!function_exists('top_store_get_category_list')){
function top_store_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->slug] = $category->name;
     }
     return $cats;
  }
}

$wp_customize->add_setting( 'top_store_disable_cat_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_disable_cat_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_category_tab_section',
                'settings'              => 'top_store_disable_cat_sec',
            ) ) );
// section heading
$wp_customize->add_setting('top_store_cat_tab_heading', array(
        'default' => __('Hot Products','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'top_store_cat_tab_heading', array(
        'label'    => __('Section Heading', 'top-store'),
        'section'  => 'top_store_category_tab_section',
         'type'       => 'text',
));
//= Choose All Category  =   
    if (class_exists( 'top_store_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('top_store_category_tab_list', array(
        'default'           => '',
        'sanitize_callback' => 'top_store_checkbox_explode'
    ));
    $wp_customize->add_control(new top_store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'top_store_category_tab_list', array(
        'settings'=> 'top_store_category_tab_list',
        'label'   => __( 'Choose Categories To Show', 'top-store' ),
        'section' => 'top_store_category_tab_section',
        'choices' => top_store_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

$wp_customize->add_setting('top_store_category_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_category_optn', array(
        'settings' => 'top_store_category_optn',
        'label'   => __('Choose Option','top-store'),
        'section' => 'top_store_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','top-store'),
        'featured'   => __('Featured','top-store'),
        'random'     => __('Random','top-store'),
            
        ),
    ));

$wp_customize->add_setting( 'top_store_single_row_slide_cat', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_single_row_slide_cat', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top_store_category_tab_section',
                'settings'              => 'top_store_single_row_slide_cat',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'top_store_cat_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_cat_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play (Pro)', 'top-store' ),
    'section'     => 'top_store_category_tab_section',
    'type'        => 'toggle',
    'settings'    => 'top_store_cat_slider_optn',
  ) ) );

$wp_customize->add_setting('top_store_cat_tab_slider_doc', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_cat_tab_slider_doc',
            array(
        'section'    => 'top_store_category_tab_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#tabbed-product',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));

//= Choose All Category  =   
    if (class_exists( 'top_store_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('top_store_sidebar_category_list', array(
        'default'           => '',
        'sanitize_callback' => 'top_store_checkbox_explode'
    ));
    $wp_customize->add_control(new top_store_Customize_Control_Checkbox_Multiple(
            $wp_customize,'top_store_sidebar_category_list', array(
        'settings'=> 'top_store_sidebar_category_list',
        'label'   => __( 'Choose Categories To Show', 'top-store' ),
        'section' => 'top-store-section-sidebar-group',
        'choices' => top_store_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

} 