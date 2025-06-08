<?php
/**
 * Sortby Section Customizer Settings
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
$wp_customize->add_setting( 'almaira_shop_sortby_hide',
                array(
                    'default'  => '',
                    'sanitize_callback' => 'almaira_shop_sanitize_checkbox',
                 ));
$wp_customize->add_control( 'almaira_shop_sortby_hide',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable section', 'hunk-companion'),
                    'priority'   => 1,
                    'section'     => 'almaira_shop_sortby_section',
                ));

if(!function_exists('almaira_shop_get_category_list')){
function almaira_shop_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->term_id] = $category->name;
     }
     return $cats;
  }
}
//= Choose All Category  =   
    if (class_exists( 'Almaira_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('almaira_shop_sortby_cate', array(
        'default'           => '',
        'sanitize_callback' => 'almaira_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new Almaira_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'almaira_shop_sortby_cate', array(
        'settings'=> 'almaira_shop_sortby_cate',
        'label'   => __( 'Show Sort By Category ', 'hunk-companion' ),
        'section' => 'almaira_shop_sortby_section',
        'choices' => almaira_shop_get_category_list(array('taxonomy' =>'product_cat'),false),
        ) 
    ));

}  
// No. of Products To Show
if ( class_exists( 'Almaira_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'almaira_shop_prd_shw', array(
                'sanitize_callback' => 'almaira_shop_sanitize_range_value',
                'default'           => '10',
            )
        );
$wp_customize->add_control(
            new Almaira_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'almaira_shop_prd_shw', array(
                    'label'       => esc_html__( 'No. of Products To Show', 'hunk-companion' ),
                    'section'     => 'almaira_shop_sortby_section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
            )
    );
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('almaira_shop_sortby_doc', array(
    'sanitize_callback' => 'almaira_shop_sanitize_text',
    ));
$wp_customize->add_control(new Almaira_Shop_Misc_Control( $wp_customize, 'almaira_shop_sortby_doc',
            array(
        'section'     => 'almaira_shop_sortby_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/almaira-shop-theme/#home-shop',
        'description' => esc_html__( 'To know more go with this', 'almaira-shop' ),
        'priority'   =>30,
    )));