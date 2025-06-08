<?php 
function open_shop_product_category_list($arr='',$all=true){
     $cats = array();
    if($all == true){
        $cats[0] = 'All Categories';
    }
    foreach ( get_categories($arr) as $categories => $category ){
        $cats[$category->slug] = $category->name;
     }
     return $cats;
}
$wp_customize->add_setting( 'open_shop_disable_product_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_disable_product_slide_sec', array(
                'label'                 => esc_html__('Disable Section (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_product_slide_section',
                'settings'              => 'open_shop_disable_product_slide_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_shop_product_slider_heading', array(
	    'default' => __('Product Slider','open-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_shop_product_slider_heading', array(
        'label'    => __('Section Heading', 'open-shop'),
        'section'  => 'open_shop_product_slide_section',
         'type'       => 'text',
));

//control setting for select options
	$wp_customize->add_setting('open_shop_product_slider_cat', array(
	'default' => 0,
	'sanitize_callback' => 'open_shop_sanitize_select',
	) );
	$wp_customize->add_control( 'open_shop_product_slider_cat', array(
	'label'   => __('Select Category (Pro)','open-shop'),
	'section' => 'open_shop_product_slide_section',
	'type' => 'select',
	'choices' => open_shop_product_category_list(array('taxonomy' =>'product_cat'),true),
	) );

$wp_customize->add_setting( 'open_shop_single_row_prdct_slide', array(
                'default'               => false,
                'sanitize_callback'     => 'open_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_shop_single_row_prdct_slide', array(
                'label'                 => esc_html__('Enable Single Row Slide (Pro)', 'open-shop'),
                'type'                  => 'checkbox',
                'section'               => 'open_shop_product_slide_section',
                'settings'              => 'open_shop_single_row_prdct_slide',
            ) ) );

  $wp_customize->add_setting('open_shop_product_slider_doc', array(
    'sanitize_callback' => 'open_shop_sanitize_text',
    ));
$wp_customize->add_control(new Open_Shop_Misc_Control( $wp_customize, 'open_shop_product_slider_doc',
            array(
        'section'    => 'open_shop_product_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-shop/#product-carousel',
        'description' => esc_html__( 'To know more go with this', 'open-shop' ),
        'priority'   =>100,
    )));