<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_timeline_child_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    $wrapper = '.vb-timeline-child' . esc_attr($uniqueId);

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    //Main div
    $css .= "$wrapper {";
        $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Desktop');
        $css .= $OBJ_STYLE->dimensions('layoutmargin', 'margin', 'Desktop');
        $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Desktop');

        if($attr['globalbg']){
            if (isset($attr['advBackground'])) {
                $css .= $OBJ_STYLE->background('advBackground');
            }
        }else{
            if (isset($attr['gbadvBackground'])) {
                $css .= $OBJ_STYLE->background('gbadvBackground');
            }
        }
        
        if (($attr['globalcontent'])) {
            $css .= "--box-color-timeline: {$attr['gbboxcolor']};";
            $css .= "--box-hover-color-timeline: {$attr['gbboxhvrcolor']};";
        }
        
        if (($attr['iconglobal'])) {
            $css .= "--icon-backgoruond-color: {$attr['gbiconcolor']};";
            $css .= "--icon-icon-color-fill-mode: {$attr['gbiconiconcolor']};";
        }
        
        if (($attr['globaldate'])) {
            $css .= "--box-date-color: {$attr['gbdatecolor']};";
            $css .= "--box-date-hover-color: {$attr['gbdatehvrcolor']};";
        }

        $css .= "display: flex;";
        $css .= "justify-content: center;";
        $css .= "height: 100%;";

        $css .= "position:relative;";
        
    $css .= "}";
    //Hover 
    $css .= "$wrapper:hover {";

        if($attr['globalbg']){
            if (isset($attr['advBackgroundHover'])) {
                $css .= $OBJ_STYLE->background('advBackgroundHover');
            }
        }else{
            if (isset($attr['gbadvBackgroundHover'])) {
                $css .= $OBJ_STYLE->background('gbadvBackgroundHover');
            }
        }
        
    $css .= "}";

    $css .= "$wrapper .vb-timeline-icom-main-layout-1-4 .vb-timeline-icon {";
        if ( isset($attr['iconleft']) && ( $attr['iconleft'] > 0 || !empty($attr['iconleft']) ) ) {
            $css .= "left: calc({$attr['iconleft']}px + 35px);";
        }
    $css .= "}";

    $css .= "$wrapper .vb-connetor-child {";
        $css .= "position: absolute;";
        $css .= "background-color: var(--connector-backgroound-color);";
        $css .= "overflow: hidden;";
        $css .= "z-index: 10;";
        $css .= "transition:all 0.2s ease;";
        $css .= "top: 0%;";
        if ( isset($attr['iconleft']) && ( $attr['iconleft'] > 0 || !empty($attr['iconleft']) ) ) {
            $css .= "left: calc({$attr['iconleft']}px + 35px);";
        }else{
            $css .= "left:50%;";
        }
        $css .= "width: 100%;";
        $css .= "position: absolute;";
        $css .= "height: var(--connector-thickness-width);";
    $css .= "}";

    $left = 0;
    if (!empty($attr['layoutborder']['Desktop']['left']['width'])) {
        $left = (int) $attr['layoutborder']['Desktop']['left']['width'];
    } elseif (!empty($attr['layoutborder']['Desktop']['width'])) {
        $left = (int) $attr['layoutborder']['Desktop']['width'];
    }
    
    $right = 0;
    if (!empty($attr['layoutborder']['Desktop']['right']['width'])) {
        $right = (int) $attr['layoutborder']['Desktop']['right']['width'];
    } elseif (!empty($attr['layoutborder']['Desktop']['width'])) {
        $right = (int) $attr['layoutborder']['Desktop']['width'];
    }

    $gapchild = isset($attr['gapchild']['Desktop']) ? $attr['gapchild']['Desktop'] . 'px' : '0px';
    $gapchildtablet = isset($attr['gapchild']['Tablet']) ? $attr['gapchild']['Tablet'] . 'px' : '0px';
    $gapchildmobile = isset($attr['gapchild']['Mobile']) ? $attr['gapchild']['Mobile'] . 'px' : '0px';

    $css .= $wrapper . " .vb-connetor-1-3-4 {";
       if ( isset($attr['iconleft']) && ( $attr['iconleft'] > 0 || !empty($attr['iconleft']) ) ) {
            $css .= "left: calc({$attr['iconleft']}px + 35px);";
        }else{
            $css .= "left:50%;";
        }
        $css .= "transform: translateX(-50%);";
        $css .= "height: calc(" . $attr['containerHeight'] . "px / 2 + " . $attr['nextChildHeight'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . " - 36px/2);";
        $css .= "width: " . $attr['thickness'] . "px;";
        $css .= "top: 50%;";
    $css .= "}";


    $css .= "$wrapper .vb-connetor-2 {";
       if ( isset($attr['iconleft']) && ( $attr['iconleft'] > 0 || !empty($attr['iconleft']) ) ) {
            $css .= "left: calc({$attr['iconleft']}px + 35px);";
        }else{
            $css .= "left:50%;";
        }
        $css .= "transform: translateX(-50%);";
        $css .= "height: calc(" . $attr['containerHeight'] . "px / 2 + " . $attr['nextChildHeight'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . " - 36px/2);";
        $css .= "width: {$attr['thickness']}px;";
        $css .= "top: 50%;";
    $css .= "}";

    $containerLeft = $attr['containerLeft'] ?? 0;
    $widthDistance = $attr['widthDistance'] ?? 0;

    $leftPosition = $containerLeft + ($widthDistance) + $attr['thickness'];

    $leftPositionQA = $containerLeft + ($widthDistance/2) + $attr['thickness'];

    $css .= "$wrapper .vb-connetor-5-6 {";
        $css .= "left: {$leftPositionQA}px;";
        $css .= "transform: translateX(-50%);";
        $css .= "height: calc(" . $attr['containerHeight'] . "px / 2 + " . $attr['nextChildHeight'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . " - 36px/2);";
        $css .= "width: {$attr['thickness']}px;";
        $css .= "top: 50%;";
    $css .= "}";

    $leftPositionw = $containerLeft + ($widthDistance/2);

    $css .= "$wrapper .vb-connetor-5 {";
        $css .= "left: {$leftPositionw}px;";
        $css .= "transform: translateX(-50%);";
        $css .= "height: calc(" . $attr['containerHeight'] . "px / 2 + " . $attr['nextChildHeight'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . " - 36px/2);";
        $css .= "width: {$attr['thickness']}px;";
        $css .= "top: 50%;";
    $css .= "}";

    $iconTop = $attr['iconTop'] ?? 0;
    $heightDistance = $attr['HeightDistance'] ?? 0;

    $thickness = $attr['thickness'] ?? 0;
   
    $topPosition = $heightDistance/2;

    $css .= "$wrapper .vb-connetor-7-11 {";
        $css .= "top: calc(44% + ({$topPosition}px - {$thickness}px));";
        $css .= "transform: translateY(-50%);";
        $css .= "width: calc(" . $attr['containerWidth'] . "px / 2 + " . $attr['nextChildWidth'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . ");";
    $css .= "}";

    $css .= "$wrapper .vb-connetor-11 {";
        $css .= "top: calc(2% + ({$topPosition}px - {$thickness}px));";
    $css .= "}";

    $css .= "$wrapper .vb-connetor-8-12 {";
        $css .= "top: calc(100% - ( 5% +  ({$topPosition}px - {$thickness}px)));";
        $css .= "transform: translateY(-50%);";
        $css .= "width: calc(" . $attr['containerWidth'] . "px / 2 + " . $attr['nextChildWidth'] . "px / 2 + " . $left . "px + " . $right . "px + " . $gapchild . ");";
    $css .= "}";
     
    // Tablet styles
    $css .= "@media  (min-width: 768px) and (max-width: 1024px) {";
        $css .= "$wrapper {";
            $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Tablet');
            $css .= $OBJ_STYLE->dimensions('layoutmargin', 'margin', 'Tablet');
            $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Tablet');
        $css .= "}";

        $css .= "$wrapper .vb-connetor-child {";
            $css .= "height: var(--connector-thickness-width-tablet);";
        $css .= "}";

        $left = 0;
        if (!empty($attr['layoutborder']['Tablet']['left']['width'])) {
            $left = (int) $attr['layoutborder']['Tablet']['left']['width'];
        } elseif (!empty($attr['layoutborder']['Tablet']['width'])) {
            $left = (int) $attr['layoutborder']['Tablet']['width'];
        }
    
        $right = 0;
        if (!empty($attr['layoutborder']['Tablet']['right']['width'])) {
            $right = (int) $attr['layoutborder']['Tablet']['right']['width'];
        } elseif (!empty($attr['layoutborder']['Tablet']['width'])) {
            $right = (int) $attr['layoutborder']['Tablet']['width'];
        }
        
        $css .= "$wrapper .vb-connetor-1-3-4 {";
            $css .= "left: calc(50% - {$attr['thicknesstablet']}px);";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildtablet);";
            $css .= "width: {$attr['thicknesstablet']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-2 {";
            $css .= "left: 50%;";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildtablet);";
            $css .= "width: {$attr['thicknesstablet']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-5-6 {";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildtablet);";
            $css .= "width: {$attr['thicknesstablet']}px;";
        $css .= "}";

        
        $css .= "$wrapper .vb-connetor-5 {";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildtablet);";
            $css .= "width: {$attr['thicknesstablet']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-7-11 {";
            $css .= "width: calc(100% + {$left}px + {$right}px + $gapchildtablet);";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-8-12 {";
            $css .= "width: calc(100% + {$left}px + {$right}px + $gapchildtablet );";
        $css .= "}";

    $css .= "}";

    // Mobile styles
    $css .= "@media screen and (max-width: 767px) {";
        $css .= "$wrapper {";
            $css .= $OBJ_STYLE->borderRadiusShadow('layoutborder', 'layoutradius', 'layoutShadow', 'Mobile');
            $css .= $OBJ_STYLE->dimensions('layoutmargin', 'margin', 'Mobile');
            $css .= $OBJ_STYLE->dimensions('layoutpadding', 'padding', 'Mobile');
        $css .= "}";

        $css .= "$wrapper .vb-connetor-child {";
            $css .= "height: var(--connector-thickness-width-mobile);";
        $css .= "}";

        $left = 0;
        if (!empty($attr['layoutborder']['Mobile']['left']['width'])) {
            $left = (int) $attr['layoutborder']['Mobile']['left']['width'];
        } elseif (!empty($attr['layoutborder']['Mobile']['width'])) {
            $left = (int) $attr['layoutborder']['Mobile']['width'];
        }
        
        $right = 0;
        if (!empty($attr['layoutborder']['Mobile']['right']['width'])) {
            $right = (int) $attr['layoutborder']['Mobile']['right']['width'];
        } elseif (!empty($attr['layoutborder']['Mobile']['width'])) {
            $right = (int) $attr['layoutborder']['Mobile']['width'];
        }
        
        $css .= "$wrapper .vb-connetor-1-3-4 {";
            $css .= "left: calc(50% - {$attr['thicknessmobile']}px);";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
            $css .= "width: {$attr['thicknessmobile']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-2 {";
            $css .= "left: 50%;";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
            $css .= "width: {$attr['thicknessmobile']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-5-6 {";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
            $css .= "width: {$attr['thicknessmobile']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-5 {";
            $css .= "height: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
            $css .= "width: {$attr['thicknessmobile']}px;";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-7-11 {";
            $css .= "width: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
        $css .= "}";

        $css .= "$wrapper .vb-connetor-8-12 {";
            $css .= "width: calc(100% + {$left}px + {$right}px + $gapchildmobile);";
        $css .= "}";
        
    $css .= "}";

    return $css;
}