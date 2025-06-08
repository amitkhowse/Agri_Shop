<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function open_mart_shortcode_template($section_name=''){
	switch ($section_name){
	case 'open_mart_show_frontpage':
	$section = array(
                                                    'front-topslider',
                                                    'front-highlight',
                                                    'front-verticaltabproduct',
                                                    'front-categoryslider',
                                                    'front-tabproduct',
                                                    'front-ribbon',
                                                    'front-productlist',
                                                    'front-banner',                                                
    );
    foreach($section as $value):
    require_once (HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-front-page/'.$value.'.php');
    endforeach;
    break;
	
	}
}
function open_mart_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = open_mart_shortcode_template($section_name);
    return $output;
}
add_shortcode('open-mart', 'open_mart_shortcodeid_data');