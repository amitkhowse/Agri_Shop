<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function hunk_companion_shortcode_template($section_name=''){
	switch ($section_name){
	case 'gogo_show_frontpage':
	$section = array('section_slider-typewriter',
    'section_service',
    'section_first',
    'section_woocommerce',
    'section_thunk-call-to',
    'section_team',
    'section_clients-and-testimonials',
    'section_blog',
    'section_contact-us'
    );
    foreach($section as $value):
    // get_template_part( 'gogo-template/'.$value); 
    require_once (HUNK_COMPANION_DIR_PATH . 'gogolite/gogo-template/'.$value.'.php');
    endforeach;
    break;
	default:
	require_once (HUNK_COMPANION_DIR_PATH . 'gogolite/gogo-template/section_blog.php');
	}
}
function hunk_companion_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => 'blog'
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = hunk_companion_shortcode_template($section_name);
    return $output;
}
add_shortcode('gogo', 'hunk_companion_shortcodeid_data');