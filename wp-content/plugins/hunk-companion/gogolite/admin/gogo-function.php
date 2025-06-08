<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
* hunk_companion-functions
*/
//Add class in body if Text Align Center in Homepage Layout 
if ( ! function_exists( 'hunk_companion_center_align_class' ) ){
function hunk_companion_center_align_class($thcenter_align){
if (get_theme_mod('gogo_align_center')){
    $thcenter_align[]='th-center-align';
}
return  $thcenter_align;
}
add_filter( 'body_class', 'hunk_companion_center_align_class' );
}
//Add class in body if only Remove Number is selected in Homepage Layout 
if ( ! function_exists( 'hunk_companion_remove_number_class' ) ){
function hunk_companion_remove_number_class($remove_number_align){
if (get_theme_mod('gogo_remove_number',true)==false){
    $remove_number_align[]='th-remove-number';
}
return  $remove_number_align;
}
add_filter( 'body_class', 'hunk_companion_remove_number_class' );
}

//Add class in body if Frame is active in Homepage Layout 
if ( ! function_exists( 'hunk_companion_active_frame_class' ) ){
function hunk_companion_active_frame_class($active_frame){
if (get_theme_mod('gogo_remove_padding',true)==true){
    $active_frame[]='active-frame';
}
return  $active_frame;
}
add_filter( 'body_class', 'hunk_companion_active_frame_class' );
}
/*
 *   Mobile device detection
 */
if( !function_exists('hunk_companion_mobile_user_agent_switch') ){
    function hunk_companion_mobile_user_agent_switch(){
        $device = '';
        
        if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
            $device = "ipad";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
            $device = "iphone";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
            $device = "blackberry";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
            $device = "android";
        }

        if( $device ) {
            return $device; 
        }else{
            return false;
        }
    }
}

/**
 * Display Blog Section Post Excerpt
 */
if ( ! function_exists( 'hunk_companion_section_the_excerpt' ) ){
    /**
     * Display Blog Post Excerpt
     *
     * @since 1.0.0
     */
    function hunk_companion_section_the_excerpt(){?>
        
        <?php $excerpt_type = get_theme_mod( 'gogo_section_blog_post_content','excerpt');
        if('excerpt' == $excerpt_type ){
            the_excerpt();
        } else {
          return false;
        }?>
        
    <?php }
}
/**
 * Allows users to save skype protocol skype: in menu URL
 */
if ( ! function_exists( 'hunk_companion_allow_skype_protocol' ) ){
function hunk_companion_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'hunk_companion_allow_skype_protocol' );
}