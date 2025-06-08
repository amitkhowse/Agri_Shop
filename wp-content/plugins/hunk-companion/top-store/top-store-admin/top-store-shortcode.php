<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function top_store_shortcode_template($section_name=''){
	switch ($section_name){
	case 'top_store_show_frontpage':
	$section = array(
                                                    'front-topslider',
                                                    'front-ribbon',
                                                    'front-tabproduct',
                                                    'front-categoryslider',
                                                    'front-productslider',
                                                    'front-banner',
                                                    'front-productlist',
                                                    'front-brand',
                                                    
    );
    foreach($section as $value):
    require_once (HUNK_COMPANION_DIR_PATH . 'top-store/top-store-front-page/'.$value.'.php');
    endforeach;
    break;
	
	}
}
function top_store_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = top_store_shortcode_template($section_name);
    return $output;
}
add_shortcode('top-store', 'top_store_shortcodeid_data');