<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function generate_inline_icon_styles($attr) {
    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);
    
    $wrapper = '.vayu-blocks-icon-main-container-' . esc_attr($uniqueId);
    $inline = '.vayu_blocks_icon__wrapper';

    $css .= $OBJ_STYLE->advanceStyle($wrapper);

    $style1 = $OBJ_STYLE->borderRadiusShadow('iconsBorder','iconsRadius','iconsDropShadow','Desktop');
    $style1 .= $OBJ_STYLE->dimensions('iconpadding','padding');
    if (!empty($style1)) {
        $css .= $wrapper . " .vb-icon-block-main-container { $style1 }";
    }

    $style2 = $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Desktop');
    if (!empty($style2)) {
        $css .= $wrapper . " .vb-icon-animation { $style2 }";
    }

    $style3 = $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Desktop', 'Hover');
    if (!empty($style3)) {
        $css .= $wrapper . " .vayu_blcoks_icon_main_blocks_icon:hover .vb-icon-animation { $style3 }";
    }

    $style4 = $OBJ_STYLE->borderRadiusShadow('iconsBorder', 'iconsRadius', 'iconsDropShadow', 'Desktop','Hover','Hover');
    if (!empty($style4)) {
        $css .= $wrapper . " .vb-icon-block-main-container:hover { $style4 }";
    }

    //Main div
    $css .= "$wrapper {";

        if ( ! empty( $attr['animationData']['background']['bg'] ) ) {
            $bg = esc_attr( $attr['animationData']['background']['bg'] );
            $css .= '--animation-box-icon: ' . $bg . ';';
            $css .= '--icon-box-shadow-glow-half: 0 0 15px 15px ' . $bg . ';';
        }
        $css .= '--icon-size-font: ' . $attr['iconSize']['Desktop'] . ';';    
        $css .= '--icon-size-font-tablet: ' . (isset($attr['iconSize']['Tablet']) ? esc_attr($attr['iconSize']['Tablet']) . '' : '') . ';';
        $css .= '--icon-size-font-mobile: ' . (isset($attr['iconSize']['Mobile']) ? esc_attr($attr['iconSize']['Mobile']) . '' : '') . ';';
        $css .= '--icon-rotate-degree: ' . $attr['rotate'] . 'deg;';
        $css .= '--icon-color-svg: ' . $attr['color'] . ';';
        $css .= '--icon-hover-color-svg: ' . (isset($attr['hoverColor']) && !empty($attr['hoverColor']) ? $attr['hoverColor'] : (isset($attr['color']) ? $attr['color'] : 'defaultColor')) . ' ;';

        if($attr['backgroundcolor']){
            $css .= '--backgorund-box-icon: ' . $attr['backgroundcolor'] . ';';
        }
        if($attr['backgroundhoverColor']){
            $css .= '--backgorund-hover-box-icon: ' . $attr['backgroundhoverColor'] . ';';
        }else{
            $css .= '--backgorund-hover-box-icon: ' . $attr['backgroundcolor'] . ';';
        }

        $css .= '--color-hover-box-icon: ' . (isset($attr['hoverColor']) ? $attr['hoverColor'] : $attr['color']) . ' ;';

        $css .= "display: flex;";
        $css .= "align-items: center;";

        if ( !empty($attr['alignment']['Desktop']) ) {
            $css .= "justify-content: {$attr['alignment']['Desktop']};";
        }
        
    $css .= "}";

    $css .="$wrapper .vb-icon-text text{";
        $css .= $OBJ_STYLE->typography('typography','Desktop');
        $css  .= '-webkit-text-stroke: ' . $attr['strokeWidthtext'] . 'px ' . $attr['stroketext'] . ';';
        $css  .= 'text-stroke: ' . $attr['strokeWidthtext'] . 'px ' . $attr['stroketext'] . ';';
    $css .= "}";

    $css .= "$wrapper .vb-icon-text {";
        if ( ! empty( $attr['textbgcolor'] ) ) {
            $css .= "background: {$attr['textbgcolor']};";
        }
        $css .= $OBJ_STYLE->dimensions('textpadding','padding');
        $css .= 'color: ' . $attr['textcolor'] . ';';
        $css .= 'top: ' . $attr['textx'] . ';';
        $css .= 'left: ' . $attr['texty'] . ';';
        $css .= "position: absolute;";

    $css .= "}";

    $css .= ! empty( $attr['textcolorhover'] ) ? "$wrapper .vb-icon-text:hover { color: {$attr['textcolorhover']}; }" : '';
    
    $style = '';
    if ( ! empty( $attr['textbgcolorhvr'] ) ) {
        $style .= "background: {$attr['textbgcolorhvr']};";
    }

    if ( ! empty( $style ) ) {
        $css .= "$wrapper .vb-icon-text:hover { $style }";
    }
    

    $css .= ".vb-icon-front-svg{";
        $css .= "transform: " . 
            ($attr['flipHorizontal'] ? "scaleX(-1) " : "") . 
            ($attr['flipVertical'] ? "scaleY(-1)" : "") . " !important;";

    $css .= "}";

    // For tablet
    $css .= "@media (min-width: 768px) and (max-width: 1024px) {";

        $css .= "$wrapper .vb-icon-text text{";
            $css .= $OBJ_STYLE->typography('typography','Tablet');
        $css .= "}";

        $style = $OBJ_STYLE->dimensions('textpadding','padding', 'Tablet');
        if ( ! empty( $style ) ) {
            $css .= "$wrapper .vb-icon-text { $style }";
        }

        $borderStyle = $OBJ_STYLE->borderRadiusShadow('iconsBorder','iconsRadius','iconsDropShadow','Tablet');
        $paddingStyle = $OBJ_STYLE->dimensions('iconpadding','padding','Tablet');
        $style = $borderStyle . $paddingStyle;

        if ( ! empty( $style ) ) {
            $css .= $wrapper . " .vb-icon-block-main-container { $style }";
        }

        $css .= $wrapper." .vb-icon-block-main-container:hover {";
            $css .= $OBJ_STYLE->borderRadiusShadow('iconsBorder', 'iconsRadius', 'iconsDropShadow','Tablet','Hover', 'Hover');
        $css .= "}";

        $css .= $wrapper." .vb-icon-animation {";
            $css .= $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Tablet');
        $css .= "}";

        $css .= $wrapper.".vayu_blcoks_icon_main_blocks_icon:hover .vb-icon-animation{";
            $css .= $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Tablet', 'Hover');
        $css .= "}";

        $css .= "$wrapper {";
            $css .= "justify-content: " . (isset($attr['alignment']['Tablet']) ? esc_attr($attr['alignment']['Tablet']) : '') . ";";
        $css .= "}";

        $css .= "$wrapper $inline {";
            $css .= "width: " . (isset($attr['imagewidthtablet']) ? esc_attr($attr['imagewidthtablet']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['imageheighttablet']) ? esc_attr($attr['imageheighttablet']) : 'auto') . ";";
        $css .= "}";

    $css .= "}";

    // For mobile
    $css .= "@media (max-width: 767px) {";

        // Apply typography styles for .vb-icon-text
        $css .= "$wrapper .vb-icon-text {";
            $css .= $OBJ_STYLE->typography('typography','Mobile');
        $css .= "}";

        // Apply padding styles for .vb-icon-text
        $style = $OBJ_STYLE->dimensions('textpadding','padding','Mobile');
        if ( ! empty( $style ) ) {
            $css .= "$wrapper .vb-icon-text { $style }";
        }
        
        $css .= "$wrapper {";
            $css .= "justify-content: " . (isset($attr['alignment']['Mobile']) ? esc_attr($attr['alignment']['Mobile']) : '') . ";";
        $css .= "}";

        $css .= "$wrapper $inline {";
            $css .= "width: " . (isset($attr['imagewidthmobile']) ? esc_attr($attr['imagewidthmobile']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['imageheightmobile']) ? esc_attr($attr['imageheightmobile']) : 'auto') . ";";
        $css .= "}";

        $borderStyle = $OBJ_STYLE->borderRadiusShadow('iconsBorder','iconsRadius','iconsDropShadow','Mobile');
        $paddingStyle = $OBJ_STYLE->dimensions('iconpadding','padding','Mobile');
        $style = $borderStyle . $paddingStyle;

        if ( ! empty( $style ) ) {
            $css .= "$wrapper .vb-icon-block-main-container { $style }";
        }

        $hoverStyle = $OBJ_STYLE->borderRadiusShadow('iconsBorder', 'iconsRadius', 'iconsDropShadow','Mobile','Hover','Hover');
        if ( ! empty( $hoverStyle ) ) {
            $css .= "$wrapper .vb-icon-block-main-container:hover { $hoverStyle }";
        }

        $iconAnimationStyle = $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Mobile'); // Changed from Tablet to Mobile
        if ( ! empty( $iconAnimationStyle ) ) {
            $css .= "$wrapper .vb-icon-animation { $iconAnimationStyle }";
        }

        $hoverIconAnimationStyle = $OBJ_STYLE->borderRadiusShadow('','iconsRadius','','Mobile', 'Hover'); // Changed from Tablet to Mobile
        if ( ! empty( $hoverIconAnimationStyle ) ) {
            $css .= "$wrapper .vayu_blcoks_icon_main_blocks_icon:hover .vb-icon-animation { $hoverIconAnimationStyle }";
        }

    $css .= "}";
    
    return $css;
}
