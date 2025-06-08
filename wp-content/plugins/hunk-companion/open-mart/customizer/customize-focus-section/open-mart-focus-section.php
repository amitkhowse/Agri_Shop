<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
if( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
add_action( 'customize_preview_init', 'open_mart_focus_section_enqueue');
add_action( 'customize_controls_init', 'open_mart_focus_section_helper_script_enqueue' );
function open_mart_focus_section_enqueue(){
	   wp_enqueue_style( 'open-mart-focus-section-style',HUNK_COMPANION_PLUGIN_DIR_URL . 'open-mart/customizer/customize-focus-section/css/focus-section.css');
		wp_enqueue_script( 'open-mart-focus-section-script',HUNK_COMPANION_PLUGIN_DIR_URL  . 'open-mart/customizer/customize-focus-section/js/focus-section.js', array('jquery'),'',false);
	}
function open_mart_focus_section_helper_script_enqueue(){
		wp_enqueue_script( 'open-mart-focus-section-addon-script', HUNK_COMPANION_PLUGIN_DIR_URL  . 'open-mart/customizer/customize-focus-section/js/addon-focus-section.js', array('jquery'),'',false);
	}

