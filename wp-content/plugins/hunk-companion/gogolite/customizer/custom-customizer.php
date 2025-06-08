<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
//Enqueing customizer js in the customizer style
add_action('customize_controls_enqueue_scripts', 'hunk_companion_customizer_script_registers' );
function hunk_companion_customizer_script_registers(){
 wp_enqueue_script( 'gogo_select_background_type', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/customizer/js/customizer-control-toggle/customize-big-image-background-toggle.js', array("jquery"), '', true  );

 wp_enqueue_script( 'gogo_custom_js_customizer_script', HUNK_COMPANION_PLUGIN_DIR_URL.'gogolite/customizer/js/customizer.js', array("jquery"), '', true  );
}