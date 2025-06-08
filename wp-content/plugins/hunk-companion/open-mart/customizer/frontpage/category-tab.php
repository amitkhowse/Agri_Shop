<?php
/**
 * Category Section Customizer Settings
 */
if(!function_exists('open_mart_get_category_list')){
function open_mart_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->slug] = $category->name;
     }
     return $cats;
  }
}

$wp_customize->add_setting( 'open_mart_disable_cat_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_cat_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_category_tab_section',
                'settings'              => 'open_mart_disable_cat_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_mart_cat_tab_heading', array(
        'default' => __('Tabbed Product Caraousel','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_cat_tab_heading', array(
        'label'    => __('Section Heading', 'open-mart'),
        'section'  => 'open_mart_category_tab_section',
         'type'       => 'text',
));
//= Choose All Category  =   
    if (class_exists( 'open_mart_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('open_mart_category_tab_list', array(
        'default'           => '',
        'sanitize_callback' => 'open_mart_checkbox_explode'
    ));
    $wp_customize->add_control(new open_mart_Customize_Control_Checkbox_Multiple(
            $wp_customize,'open_mart_category_tab_list', array(
        'settings'=> 'open_mart_category_tab_list',
        'label'   => __( 'Choose Categories To Show', 'open-mart' ),
        'section' => 'open_mart_category_tab_section',
        'choices' => open_mart_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

$wp_customize->add_setting('open_mart_category_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_category_optn', array(
        'settings' => 'open_mart_category_optn',
        'label'   => __('Choose Option','open-mart'),
        'section' => 'open_mart_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','open-mart'),
        'featured'   => __('Featured','open-mart'),
        'random'     => __('Random','open-mart'),
            
        ),
    ));

// Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_cat_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_cat_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_category_tab_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_cat_slider_optn',
  ) ) );

$wp_customize->add_setting('open_mart_cat_adimg', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'open_mart_cat_adimg', array(
        'label'          => __('Upload Image', 'open-mart'),
        'section'        => 'open_mart_category_tab_section',
        'settings'       => 'open_mart_cat_adimg',
 )));

$wp_customize->add_setting('open_mart_cat_adimg_side', array(
        'default'        => 'left',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_cat_adimg_side', array(
        'settings' => 'open_mart_cat_adimg_side',
        'label'   => __('PLace Image On','open-mart'),
        'section' => 'open_mart_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'left'     => __('Left','open-mart'),
        'right'     => __('Right (Pro)','open-mart'),
            
        ),
    ));

$wp_customize->add_setting('open_mart_cat_tab_slider_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_cat_tab_slider_doc',
            array(
        'section'    => 'open_mart_category_tab_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#tabbed-product',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));