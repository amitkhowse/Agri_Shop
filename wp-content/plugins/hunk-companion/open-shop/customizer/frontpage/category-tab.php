<?php
/**
 * Category Section Customizer Settings
 */
if(!function_exists('open_shop_get_category_list')){
function open_shop_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->slug] = $category->name;
     }
     return $cats;
  }
}

$wp_customize->add_setting( 'open_shop_disable_cat_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_cat_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_category_tab_section',
                'settings'              => 'open_shop_disable_cat_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_shop_cat_tab_heading', array(
        'default' => __('Category Slider','open-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_shop_cat_tab_heading', array(
        'label'    => __('Section Heading', 'open-shop'),
        'section'  => 'open_shop_category_tab_section',
         'type'       => 'text',
));
//= Choose All Category  =   
    if (class_exists( 'Open_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('open_shop_category_tab_list', array(
        'default'           => '',
        'sanitize_callback' => 'open_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Open_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'open_shop_category_tab_list', array(
        'settings'=> 'open_shop_category_tab_list',
        'label'   => __( 'Choose Categories To Show', 'open-shop' ),
        'section' => 'open_shop_category_tab_section',
        'choices' => open_shop_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  

$wp_customize->add_setting('open_shop_category_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_select',
    ));
$wp_customize->add_control( 'open_shop_category_optn', array(
        'settings' => 'open_shop_category_optn',
        'label'   => __('Choose Option','open-shop'),
        'section' => 'open_shop_category_tab_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','open-shop'),
        'featured'   => __('Featured (Pro)','open-shop'),
        'random'     => __('Random (Pro)','open-shop'),
            
        ),
    ));

$wp_customize->add_setting( 'open_shop_single_row_slide_cat', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_single_row_slide_cat', array(
                'label'                 => esc_html__('Enable Single Row Slide (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_category_tab_section',
                'settings'              => 'open_shop_single_row_slide_cat',
            ) ) );


$wp_customize->add_setting('open_shop_cat_tab_slider_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
$wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_cat_tab_slider_doc',
            array(
        'section'    => 'open_shop_category_tab_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-shop/#tabbed-product',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));