<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function open_shop_shortcode_template($section_name=''){
	switch ($section_name){
	case 'open_shop_show_frontpage':
	$section = array(
                                                    'front-topslider','front-highlight',
                                                    'front-tabproduct',
                                                    'front-categoryslider',
                                                    'front-productslider',
                                                    'front-ribbon',
                                                    'front-productlist',
                                                    'front-banner',
                                                    
    );
    foreach($section as $value):
    require_once (HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-front-page/'.$value.'.php');
    endforeach;
    break;
	
	}
}
function open_shop_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = open_shop_shortcode_template($section_name);
    return $output;
}
add_shortcode('open-shop', 'open_shop_shortcodeid_data');