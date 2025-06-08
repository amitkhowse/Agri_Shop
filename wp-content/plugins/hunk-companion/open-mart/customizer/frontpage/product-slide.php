<?php 
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
$wp_customize->add_setting( 'open_mart_disable_product_slide_sec', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_disable_product_slide_sec', array(
                'label'                 => esc_html__('Disable Section', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_product_slide_section',
                'settings'              => 'open_mart_disable_product_slide_sec',
            ) ) );
// section heading
$wp_customize->add_setting('open_mart_product_slider_heading', array(
	    'default' => __('Product Carousel','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_product_slider_heading', array(
        'label'    => __('Section Heading', 'open-mart'),
        'section'  => 'open_mart_product_slide_section',
         'type'       => 'text',
));

//control setting for select options
	$wp_customize->add_setting('open_mart_product_slider_cat', array(
	'default' => 0,
	'sanitize_callback' => 'open_mart_sanitize_select',
	) );
	$wp_customize->add_control( 'open_mart_product_slider_cat', array(
	'label'   => __('Select Category','open-mart'),
	'section' => 'open_mart_product_slide_section',
	'type' => 'select',
	'choices' => open_mart_product_category_list(array('taxonomy' =>'product_cat'),true),
	) );

$wp_customize->add_setting('open_mart_product_slide_optn', array(
        'default'        => 'recent',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_product_slide_optn', array(
        'settings' => 'open_mart_product_slide_optn',
        'label'   => __('Choose Option','open-mart'),
        'section' => 'open_mart_product_slide_section',
        'type'    => 'select',
        'choices'    => array(
        'recent'     => __('Recent','open-mart'),
        'featured'   => __('Featured','open-mart'),
        'random'     => __('Random','open-mart'),
            
        ),
    ));

$wp_customize->add_setting( 'open_mart_single_row_prdct_slide', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_single_row_prdct_slide', array(
                'label'                 => esc_html__('Enable Single Row Slide', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_product_slide_section',
                'settings'              => 'open_mart_single_row_prdct_slide',
            ) ) );


// Add an option to disable the logo.
  $wp_customize->add_setting( 'open_mart_product_slider_optn', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_product_slider_optn', array(
    'label'       => esc_html__( 'Slide Auto Play', 'open-mart' ),
    'section'     => 'open_mart_product_slide_section',
    'type'        => 'toggle',
    'settings'    => 'open_mart_product_slider_optn',
  ) ) );
$wp_customize->add_setting( 'open_mart_product_slider_zero_padding', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_product_slider_zero_padding', array(
                'label'                 => esc_html__('Disable Content Padding', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open_mart_product_slide_section',
                'settings'              => 'open_mart_product_slider_zero_padding',
            ) ) );

  $wp_customize->add_setting('open_mart_product_slider_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_product_slider_doc',
            array(
        'section'    => 'open_mart_product_slide_section',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#product-carousel',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));