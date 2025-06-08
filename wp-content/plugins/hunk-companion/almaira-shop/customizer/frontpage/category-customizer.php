<?php
/**
 * Category Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
if(!function_exists('almaira_shop_get_category_list')){
function almaira_shop_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->term_id] = $category->name;
     }
     return $cats;
  }
}
$wp_customize->add_setting( 'almaira_shop_category_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_category_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_category_section',
                ));

$wp_customize->add_setting('almaira_shop_category_heading', 
      array(
        'default' => 'CATEGORY',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almaira_shop_sanitize_text',
        'transport'         => 'postMessage',
));
    $wp_customize->add_control( 'almaira_shop_category_heading', 
    array(
        'label'    => __('Heading', 'hunk-companion'),
        'section'  => 'almaira_shop_category_section',
         'type'       => 'text',
));

   //= Choose All Category  =   
    if (class_exists('Almaira_Shop_Customize_Control_Checkbox_Multiple')){
   $wp_customize->add_setting('almaira_shop_category_cate', array(
        'default'           => '',
        'sanitize_callback' => 'almaira_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Almaira_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'almaira_shop_category_cate', array(
        'settings'=> 'almaira_shop_category_cate',
        'label'   => __( 'Choose Categories To Show', 'hunk-companion' ),
        'section' => 'almaira_shop_category_section',
        'choices' => almaira_shop_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

} 

/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_cat_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_cat_doc',
            array(
        'section'     => 'almaira_shop_category_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#categories-setting',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));