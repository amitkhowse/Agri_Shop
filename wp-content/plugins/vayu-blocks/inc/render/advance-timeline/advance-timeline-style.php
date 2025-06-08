<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function generate_inline_advance_timeline_styles($attr) {

    $css = '';

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $wrapper = '.vb-timeline-' . esc_attr($uniqueId);
    $inline = '.vayu_blocks_advance-timeline__wrapper';

    $css .= $OBJ_STYLE->advanceStyle($wrapper);

    //Main div
    $css .= "$wrapper {";

        $css .= "--scroller-width-mode:" . esc_attr($attr['scrollbarwidth']) . ";";
        $css .= "--scroller-height-mode:" . esc_attr($attr['scrollbarheight']) . ";";
        $css .= "--scroller-color-mode:" . esc_attr($attr['thumbbg']) . ";";
        $css .= "--scroller-hvrcolor-mode: " . ( !empty($attr['thumbbghvr']) ? esc_attr($attr['thumbbghvr']) : esc_attr($attr['thumbbg']) ) . ";";
        $css .= "--scroller-track-mode:" . esc_attr($attr['trackbg']) . ";";
        $css .= "--gapchild-margin-timeline-child-tablet:" . ( isset($attr['gapchild']['Tablet']) ? esc_attr($attr['gapchild']['Tablet']) . "px" : "0px" ) . ";";
        $css .= "--gapchild-margin-timeline-child-mobile:" . ( isset($attr['gapchild']['Mobile']) ? esc_attr($attr['gapchild']['Mobile']) . "px" : "0px" ) . ";";        
        $css .= "--icon-size-color-size-tablet:" . esc_attr($attr['iconsizeTablet']) . "px;";
        $css .= "--icon-size-color-size-mobile:" . esc_attr($attr['iconsizeMobile']) . "px;";
        $css .= "--connector-thickness-width-tablet:" . esc_attr($attr['thicknessTablet']) . "px;";
        $css .= "--connector-thickness-width-mobile:" . esc_attr($attr['thicknessMobile']) . "px;";
        $css .= "--date-bnackrgiund-color:" . esc_attr($attr['datebackgroundcolor']) . ";";
        $css .= "--date-bnackrgiund-hover-color: " . ( !empty($attr['datebackgroundcolorhvr']) ? esc_attr($attr['datebackgroundcolorhvr']) : esc_attr($attr['datebackgroundcolor']) ) . ";";
        $css .= "--icon-backgoruond-color-active:" . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-icon-color-fill-mode-active:" . esc_attr($attr['iconiconhvrcolor']) . ";";
        $dateshow = isset($attr['showdate']) && $attr['showdate'] ? 'block' : 'none';
        $connectorshow = isset($attr['connector']) && $attr['connector'] ? 'block' : 'none';
        $css .= "--box-date-hover-color: " . ( !empty($attr['datehvrcolor']) ? esc_attr($attr['datehvrcolor']) : esc_attr($attr['datecolor']) ) . ";";
        $css .= "--date-show-display: " . esc_attr($dateshow) . ";";
        $css .= "--connector-display-true-false: " . esc_attr($connectorshow) . ";";

        $alignment = 'center';
        if (isset($attr['timelinelayout'])) {
            if (in_array($attr['timelinelayout'], ['layout-7', 'layout-11'])) {
                $alignment = 'flex-start';
            } elseif (in_array($attr['timelinelayout'], ['layout-8', 'layout-12'])) {
                $alignment = 'flex-end';
            }
        }
        $css .= "--alignItems-box-main-timeline-child: " . esc_attr($alignment) . ";";

        $css .= "--icon-active-color: " . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-icon-active-color: " . esc_attr($attr['iconiconhvrcolor']) . ";";
        
        $css .= "--box-color-timeline: " . esc_attr($attr['boxcolor']) . ";";
        $css .= "--box-hover-color-timeline: " . ( isset($attr['boxhvrcolor']) && $attr['boxhvrcolor'] ? esc_attr($attr['boxhvrcolor']) : esc_attr($attr['boxcolor']) ) . ";";

        $css .= "--box-padding-box-box: " . esc_attr($attr['boxpadding']['top']) . " " . esc_attr($attr['boxpadding']['left']) . " " . esc_attr($attr['boxpadding']['bottom']) . " " . esc_attr($attr['boxpadding']['right']) . ";";
        $css .= "--box-margin-box-box: " . esc_attr($attr['boxmargin']['top']) . " " . esc_attr($attr['boxmargin']['left']) . " " . esc_attr($attr['boxmargin']['bottom']) . " " . esc_attr($attr['boxmargin']['right']) . ";";

        // Alignment settings
        // Default alignment values
        $datealignmentHorizontal = 'center';
        $datealignmentVertical = 'center';
        $datealignmentTabletHorizontal = 'center';
        $datealignmentTabletVertical = 'center';
        $datealignmentMobileHorizontal = 'center';
        $datealignmentMobileVertical = 'center';

        // Check if 'datealignment' attribute exists and split it for horizontal and vertical alignment
        if (isset($attr['datealignment'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignment']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentHorizontal = $horizontal ?: 'center';
            $datealignmentVertical = $vertical ?: 'center'; 
        }

        // Check if 'datealignmenttablet' attribute exists and split it for tablet horizontal and vertical alignment
        if (isset($attr['datealignmenttablet'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignmenttablet']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentTabletHorizontal = $horizontal ?: 'center'; // Default to 'center' if undefined
            $datealignmentTabletVertical = $vertical ?: 'center';     // Default to 'center' if undefined
        }

        // Check if 'datealignmentmobile' attribute exists and split it for mobile horizontal and vertical alignment
        if (isset($attr['datealignmentmobile'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignmentmobile']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentMobileHorizontal = $horizontal ?: 'center'; // Default to 'center' if undefined
            $datealignmentMobileVertical = $vertical ?: 'center';     // Default to 'center' if undefined
        }

        $css .= "--icon-backgoruond-color: " . esc_attr($attr['iconcolor']) . ";";
        $css .= "--icon-hover-backgoruond-color: " . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-size-color-size: " . esc_attr($attr['iconsize']) . "px;";
        $css .= "--icon-icon-color-fill-mode:" . esc_attr($attr['iconiconcolor']) . ";";

        // Connector settings
        $css .= "--connector-thickness-width: " . esc_attr($attr['thickness']) . "px;";
        $css .= "--connector-backgroound-color: " . esc_attr($attr['connectorcolor']) . ";";
        $css .= "--connector-hover-backgroound-color: " . esc_attr($attr['connectorhvrcolor']) . ";";

        $css .= "--gapchild-margin-timeline-child: " . ( isset($attr['gapchild']['Desktop']) ? esc_attr($attr['gapchild']['Desktop']) . "px" : "0px" ) . ";";

        $css .= "display: flex;";
        $css .= "justify-content: center;";
        $css .= "position:relative;";
        
    $css .= "}";

    if ($attr['touch']!='scroll') {
        
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline {";

            $css .= "display: flex; ";
            $css .= "overflow-x: auto; ";
            $css .= "overflow-y: hidden;";
            $css .= "  scroll-snap-type: x mandatory;";
            $css .= "  -webkit-overflow-scrolling: touch;";
            $css .= "  cursor: grab;";
        $css .= "}";

    
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline:active {";
            $css .= "  cursor: grabbing; /* Show grabbing cursor when active */";
        $css .= "}";
    }

    if($attr['touch']==='touch'){
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline::-webkit-scrollbar {";
            $css .= "  display: none !important; /* Hide scrollbar */";
            $css .= "  width: 0px !important; /* Set width to 0px to hide it */";
        $css .= "}";
    }

    return $css;
}