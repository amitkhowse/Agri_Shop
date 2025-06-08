<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function vayu_pin_child_style($attr){
  
    $css = '';
    
    if(isset( $attr['uniqueId'] )){

        $css .= "#{$attr['uniqueId']} .vayu-pin-spot-wrapper7.tooltip-onHover .th-container-outside-wrapper{";
        $css .= " opacity: 0;";
        $css .= " visibility: hidden;";
        $css .= " transition: opacity 0.3s ease, visibility 0.3s ease;"; 
        
        $css .= "}";

        $css .= "#{$attr['uniqueId']} .vayu-pin-spot-wrapper7.tooltip-onHover:hover .th-container-outside-wrapper{";
        $css .= " opacity: 1;";
        $css .= " visibility: visible;"; 
        $css .= "}";

    }

    return $css;
}
