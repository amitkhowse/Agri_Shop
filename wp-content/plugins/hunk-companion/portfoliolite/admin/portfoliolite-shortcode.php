<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function portfoliolite_shortcode_template($section_name=''){
	switch ($section_name){
	case 'portfoliolite_show_frontpage':
	$section = array(
                     'section_slider',
                     'section_services',
                     'section_ribbon',
                     'section_portfolio',
                     'section_team',
                     'section_testimonial',
                     'section_woocommerce',
                     'section_news',
                     'section_blog',                                              
    );
    foreach($section as $value):
    require_once (HUNK_COMPANION_DIR_PATH . 'portfoliolite/front-page-template/'.$value.'.php');
    endforeach;
    break;
	
	}
}
function portfoliolite_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = portfoliolite_shortcode_template($section_name);
    return $output;
}
add_shortcode('portfoliolite', 'portfoliolite_shortcodeid_data');