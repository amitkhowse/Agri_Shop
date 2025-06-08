<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function generate_inline_flip_box_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];
    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    // Check if the 'innerBlockUniqueIds' attribute is set and has the required index
    if (!empty($attr['innerBlockUniqueIds']) && isset($attr['innerBlockUniqueIds'][1])) {
        $uniqueIdback = $attr['innerBlockUniqueIds'][1];
    } else {
        $uniqueIdback = 'default-value'; // Fallback value if index is missing
    }

    // Check if the 'innerBlockUniqueIds' attribute is set and has the required index
    if (!empty($attr['innerBlockUniqueIds']) && isset($attr['innerBlockUniqueIds'][0])) {
        $uniqueIdfront = $attr['innerBlockUniqueIds'][0];
    } else {
        $uniqueIdfront = 'default-value'; // Fallback value if index is missing
    }

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vb-flip-' . esc_attr($uniqueId);

    $css .= $OBJ_STYLE->advanceStyle($wrapper);
    //Main div
    $css .= "$wrapper {";

        $css .= "perspective: 1000px;";

        $css .= "height: " . $attr['advheight']['Desktop'] . ";";
        $css .= "max-height: " . $attr['advheight']['Desktop'] . ";";

        $css .= "overflow:hidden;";

        $css .= "box-sizing: border-box;";
    
    $css .= "}";

    $css .= "$wrapper .vb-flip-box-wrapper{";

            if ($attr['imageborderradiuscircle'] === 'circle') {
                // Apply a border-radius of 50% for circular images
                $css .= "border-radius: 50%;";
            } else {
                // Apply individual border-radius values if not a circle
                if (isset($attr['imageborderRadius']['top'], $attr['imageborderRadius']['right'], $attr['imageborderRadius']['bottom'], $attr['imageborderRadius']['left'])) {
                    $css .= "border-radius: " . esc_attr($attr['imageborderRadius']['top']) . " " . esc_attr($attr['imageborderRadius']['right']) . " " . esc_attr($attr['imageborderRadius']['bottom']) . " " . esc_attr($attr['imageborderRadius']['left']) . ";";
                }
            }

            $css .= "height: 100%;";

            // Top border
            if (isset($attr['imageborder']['topwidth'], $attr['imageborder']['topstyle'], $attr['imageborder']['topcolor'])) {
                $css .= "border-top: " . esc_attr($attr['imageborder']['topwidth']) . " " . esc_attr($attr['imageborder']['topstyle']) . " " . esc_attr($attr['imageborder']['topcolor']) . ";";
            }

            // Bottom border
            if (isset($attr['imageborder']['bottomwidth'], $attr['imageborder']['bottomstyle'], $attr['imageborder']['bottomcolor'])) {
                $css .= "border-bottom: " . esc_attr($attr['imageborder']['bottomwidth']) . " " . esc_attr($attr['imageborder']['bottomstyle']) . " " . esc_attr($attr['imageborder']['bottomcolor']) . ";";
            }

            // Left border
            if (isset($attr['imageborder']['leftwidth'], $attr['imageborder']['leftstyle'], $attr['imageborder']['leftcolor'])) {
                $css .= "border-left: " . esc_attr($attr['imageborder']['leftwidth']) . " " . esc_attr($attr['imageborder']['leftstyle']) . " " . esc_attr($attr['imageborder']['leftcolor']) . ";";
            }

            // Right border
            if (isset($attr['imageborder']['rightwidth'], $attr['imageborder']['rightstyle'], $attr['imageborder']['rightcolor'])) {
                $css .= "border-right: " . esc_attr($attr['imageborder']['rightwidth']) . " " . esc_attr($attr['imageborder']['rightstyle']) . " " . esc_attr($attr['imageborder']['rightcolor']) . ";";
            }

            $overlayalignmenttablet = explode(' ', $attr['overlayalignment']); // Split the string
            $vertical = $overlayalignmenttablet[0]; // First part (vertical)
            $horizontal = $overlayalignmenttablet[1]; // Second part (horizontal)

            $css .= "align-items: " . (
                $vertical === 'center' ? 'center' :
                ($vertical === 'top' ? 'self-start' :
                ($vertical === 'bottom' ? 'self-end' : 'center'))
            ) . ";";

            $css .= "justify-content: " . (
                $horizontal === 'center' ? 'center' :
                ($horizontal === 'left' ? 'flex-start' :
                ($horizontal === 'right' ? 'flex-end' : 'center'))
            ) . ";";
            
    $css .= "}";

    $transformstyle = 'none';

    if($attr['imagehvreffect'] === 'flip'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'rotateY(180deg)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'rotateY(-180deg)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'rotateX(180deg)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'rotateX(-180deg)';
        } 
    }elseif ($attr['imagehvreffect'] === 'flip-z') {
        $transformstyle = 'rotateX(180deg) rotateZ(90deg)';
    } elseif ($attr['imagehvreffect'] === 'flip-x') {
        $transformstyle = 'rotateY(180deg) rotateZ(90deg)';
    } elseif ($attr['imagehvreffect'] === 'zoom-in') {
        $transformstyle = 'scale(0.5)';
    } else if($attr['imagehvreffect'] === 'slide'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'translateX(105%)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'translateX(-105%)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'translateY(-105%)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'translateY(105%)';
        } 
    } else if($attr['imagehvreffect'] === 'push'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'translateX(90%)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'translateX(-90%)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'translateY(90%)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'translateY(-90%)';
        } 
    }

    
    $css .= "$wrapper .vayu_blocks_flip-box-back {";
        $css .= "transform: $transformstyle;"; // Ensure $transformstyle is valid
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdback{";
        $css .= "transform: unset !important;";
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdback .wp-block-vayu-blocks-flip-wrapper{";
        $css .= "transform: unset !important;";
    $css .= "}";

     $css .=".vb-flip-box-wrapper:hover .vayu_blocks_flip-box-inner_animation_div_push_animation-top .vayu_blocks_front_image_wrapper-for-front .vayu_blocks_flip-box-front{";
         $css .= "transform: unset !important;";
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdfront{";
        $css .= "transform: unset !important;";
    $css .= "}";

   $overlayalignmenttablet = explode(' ', $attr['overlayalignmenttablet']);
   $vertical = $overlayalignmenttablet[0];
   $horizontal = $overlayalignmenttablet[1];
    
    $overlayalignmentmobile = explode(' ', $attr['overlayalignmentmobile']);
    $verticalmobile = $overlayalignmentmobile[0];
    $horizontalmobile = $overlayalignmentmobile[1];

    // For tablet
    $css .= "@media (min-width: 768px) and (max-width: 1024px) {";

        $css .= $wrapper . " {";
            $css .= "height: " . (isset($attr['advheight']['Tablet']) ? esc_attr($attr['advheight']['Tablet']) : 'auto') . ";";
        $css .= "}";
        
        $css .= $wrapper . " .vb-flip-box-wrapper {";
            $css .= "align-items: " . (
                (isset($vertical) && $vertical === 'center') ? 'center' :
                ((isset($vertical) && $vertical === 'top') ? 'self-start' :
                ((isset($vertical) && $vertical === 'bottom') ? 'self-end' : 'center'))
            ) . ";";
            $css .= "justify-content: " . (
                (isset($horizontal) && $horizontal === 'center') ? 'center' :
                ((isset($horizontal) && $horizontal === 'left') ? 'flex-start' :
                ((isset($horizontal) && $horizontal === 'right') ? 'flex-end' : 'center'))
            ) . ";";
        $css .= "}";

    $css .= "}";

    // For mobile
    $css .= "@media (max-width: 767px) {";

        $css .= $wrapper . " {";
            $css .= "height: " . (isset($attr['advheight']['Mobile']) ? esc_attr($attr['advheight']['Mobile']) : 'auto') . ";";
        $css .= "}";
        
        $css .= "$wrapper .vb-flip-box-wrapper{";
            $css .= "align-items: " . (
                (isset($verticalmobile) && $verticalmobile === 'center') ? 'center' :
                ((isset($verticalmobile) && $verticalmobile === 'top') ? 'self-start' :
                ((isset($verticalmobile) && $verticalmobile === 'bottom') ? 'self-end' : 'center'))
            ) . ";";
            $css .= "justify-content: " . (
                (isset($horizontalmobile) && $horizontalmobile === 'center') ? 'center' :
                ((isset($horizontalmobile) && $horizontalmobile === 'left') ? 'flex-start' :
                ((isset($horizontalmobile) && $horizontalmobile === 'right') ? 'flex-end' : 'center'))
            ) . ";";
        $css .= "}";

    $css .= "}";
    
    return $css;
}