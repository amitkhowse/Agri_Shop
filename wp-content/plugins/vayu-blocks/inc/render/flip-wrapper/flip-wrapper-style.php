<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function generate_inline_flip_wrapper_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];
    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vb-flip-innerblock-' . esc_attr($uniqueId);

    $css .= ".wp_block_vayu-blocks-front-image-main {";
        $css .= "backface-visibility: hidden;";
    $css .= "}";
    
    //Main div
    $css .= "$wrapper {";

        $css .= "box-sizing:border-box;";
        $css .= "perspective: 1000px;";
        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "max-width:100%;";
        $css .= "margin-left:auto !important;";
        $css .= "margin-right:auto !important;";
        
        $css .= $OBJ_STYLE->borderFrame('frameData','Desktop');
    
        if (!empty($attr['boxShadow'])) {
            $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'boxShadow', 'Desktop');
        }

        $css .= $OBJ_STYLE->background('flipBackground');
       // Transition
       $css .= "transition-duration: " . (isset($attr['transitionAll']) ? esc_attr($attr['transitionAll']) : '0') . "s;";
  
    $css .= "}";
     

    // Tablet Styles
$tabletFrame = $OBJ_STYLE->borderFrame('frameData', 'Tablet');
if (!empty(trim($tabletFrame))) {
    $css .= "@media (min-width: 768px) and (max-width: 1024px) {";
        $css .= "$wrapper {";
            $css .= $tabletFrame;
        $css .= "}";
    $css .= "}";
}

// Mobile Styles
$mobileFrame = $OBJ_STYLE->borderFrame('frameData', 'Mobile');
if (!empty(trim($mobileFrame))) {
    $css .= "@media (max-width: 767px) {";
        $css .= "$wrapper {";
            $css .= $mobileFrame;
        $css .= "}";
    $css .= "}";
}

    return $css;
}