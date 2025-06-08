<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function generate_inline_image_styles($attr) {

    $css = '';

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $wrapper = '.vayu-blocks-image-main-container' . esc_attr($uniqueId);

    $inline = '.vb-image-container';

    if ( isset( $attr['parentBlock'] ) && $attr['parentBlock'] !== 'vayu-blocks/advance-slider' ) {
        $css .= $OBJ_STYLE->advanceStyle( $wrapper );
    }

    $css .= ".vayu_blocks_image_flip-duotone-filters {";
        $css .= "display: none;";
        $css .= "height: 0;";
    $css .= "}";

    // Effect 3 CSS rule
    $css .= "$wrapper .vayu_block_styling-effect3::after {";
        $css .= "background:" . esc_attr(isset($attr['animationData']['effect']['effectColor']) ? $attr['animationData']['effect']['effectColor'] : 'transparent') . ";";
        $css .= "box-shadow: 1rem 1rem 2rem " . esc_attr(isset($attr['animationData']['effect']['effectColor']) ? $attr['animationData']['effect']['effectColor'] : 'transparent') . ";";
    $css .= "}";

    // Effect 10 CSS rule
    $css .= "$wrapper .vayu_block_styling-effect10 {";
     $css .= "background:" . esc_attr(isset($attr['animationData']['effect']['effectColor']) ? $attr['animationData']['effect']['effectColor'] : 'transparent') . ";";
    $css .= "}";

    $css .= "$wrapper .vayu_block_styling-effect10 {";
        $effectColor = isset($attr['animationData']['effect']['effectColor']) ? esc_attr($attr['animationData']['effect']['effectColor']) : 'undefined';

        $css .= " box-shadow:
        1px 1px 0 1px {$effectColor},
        -1px 0 28px 0 rgba(34, 33, 81, 0.01),
        28px 28px 28px 0 rgba(34, 33, 81, 0.25) !important;";
    
    $css .= "}";
    
    $css .= "$wrapper .vayu_block_styling-effect10:hover {";
    $effectColor = isset($attr['animationData']['effect']['effectColor']) ? esc_attr($attr['animationData']['effect']['effectColor']) : 'transparent';

    $css .= " box-shadow:
        1px 1px 0 1px {$effectColor},
        -1px 0 28px 0 rgba(34, 33, 81, 0.01),
        54px 54px 28px -10px rgba(34, 33, 81, 0.15) !important;";
    
    $css .= "}";

    // Append CSS rules to $css
    $css .= "$wrapper $inline {";

        $speed = $attr['animationData']['imageAnimation']['speed'] ?? null;

        if (is_numeric($speed)) {
            $css .= "--image-animation-spped: {$speed}s;";
        }

        $imageWidth = isset($attr['imageWidth']['Desktop']) ? esc_attr($attr['imageWidth']['Desktop']) : 'auto';

        $css .= " width: $imageWidth;";

        $imageHeight = isset($attr['imageHeight']['Desktop']) ? esc_attr($attr['imageHeight']['Desktop']) : 'auto';

        $css .= " height: $imageHeight;";
    
        $css .= " position: relative;";
        $css .= "perspective: 1000px;";
        $css .= "transform-style: preserve-3d;";
       
    $css .= "}";

    $css .= "$wrapper .vb-image-rotating-div{";
        $rotation = esc_attr($attr['rotation']) % 360; // This will ensure the value is within 0-359
        $css .= "transform: rotate( " . $rotation . "deg) !important;";
    $css .= "}";
    
    $transitionTime = isset($attr['imagetransitiontime']) ? esc_attr($attr['imagetransitiontime']) : '0.5'; // Default to 0.5s if not set
    
    // Append CSS rules to $css
    $css .= "$wrapper .vb-image-tag {";

        if (!empty($attr['animationData']['hovereffect']) && !empty($attr['animationData']['hovereffect']['value'])) {
            if ($attr['animationData']['hovereffect']['value'] === 'flip-front' || $attr['animationData']['hovereffect']['value']) {
                $css .= "backface-visibility: hidden;";
            }
        }

        $css .= "width: 100%;";
        $css .= "max-width: 100%;";
        $css .= "height: 100%;";

        $css .= "box-sizing: border-box;";
        
        $css .= "    transition: transform {$transitionTime}s ease, filter {$transitionTime}s ease, opacity {$transitionTime}s ease;";

        $css .= "    opacity: 1;"; // Assuming a default opacity value
        $css .= "    object-fit: " . esc_attr($attr['imagebackgroundSize']) . ";"; // Assuming this controls object-fit

        // Apply focal point if it exists, default to center
        $css .= "    object-position: " . (isset($attr['focalPoint']) ? esc_attr($attr['focalPoint']['x'] * 100) : '50') . "% " . (isset($attr['focalPoint']) ? esc_attr($attr['focalPoint']['y'] * 100) : '50') . "%;";

        $aspectRatio = isset($attr['aspectRatio']['Desktop']) ? esc_attr($attr['aspectRatio']['Desktop']) : 'auto';

        $css .= "    aspect-ratio: $aspectRatio;";

        if (isset($attr['duotone']) && !empty($attr['duotone'])) {
            $css .= "    filter: url(#duotone-filter-{$attr['uniqueId']}) !important;";
        }        

        if (!empty($attr['frameData']['radius'])) {
            $radiusData = $attr['frameData']['radius']['Desktop'];
            
            if (!empty($radiusData['width'])) {
                // If a general width is set, apply it to all corners
                $css .= "border-radius: " . $radiusData['width'] . ";";
            } else {
                // Otherwise, check individual values and apply them
                $topLeft     = !empty($radiusData['top-left']) ? $radiusData['top-left'] : "0";
                $topRight    = !empty($radiusData['top-right']) ? $radiusData['top-right'] : "0";
                $bottomRight = !empty($radiusData['bottom-right']) ? $radiusData['bottom-right'] : "0";
                $bottomLeft  = !empty($radiusData['bottom-left']) ? $radiusData['bottom-left'] : "0";
        
                $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
            }
        }
        
        // Box-shadow
        if (!empty($attr['imageboxShadow'])) {
            $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'imageboxShadow', 'Desktop');
        }

    $css .= "}";

    // Append hover effect CSS rules
    $css .= " $wrapper $inline:hover .vb-image-tag {";
        $css .= "    transform: var(--image-hover-effect-transform, none);";
        $css .= "    filter: var(--image-filter-effect, none);";
        $css .= "    opacity: var(--image-hover-effect-opacity, 1);";

        
        // Apply individual border-radius values if all values are set and not empty
        if (
            isset($attr['advanceRadiushvr']['top']) && ($attr['advanceRadiushvr']['top'])!='0px' ||
            isset($attr['advanceRadiushvr']['right']) && ($attr['advanceRadiushvr']['right']) !='0px' ||
            isset($attr['advanceRadiushvr']['bottom']) && ($attr['advanceRadiushvr']['bottom']) !='0px' ||
            isset($attr['advanceRadiushvr']['left']) && ($attr['advanceRadiushvr']['left'])!='0px'
        ) {
            $css .= "border-radius: " . esc_attr($attr['advanceRadiushvr']['top']) . " " . esc_attr($attr['advanceRadiushvr']['right']) . " " . esc_attr($attr['advanceRadiushvr']['bottom']) . " " . esc_attr($attr['advanceRadiushvr']['left']) . ";";
        }
        
    $css .= "}";

    $css .= " $wrapper .vb-image-main-container {";
        $desktopAlignment = !empty($attr['imagealignment']['Desktop']) ? $attr['imagealignment']['Desktop'] : 'center';
        $css .= "justify-content: {$desktopAlignment} !important;";
        $css .= "display:flex;";
        $css .= "width:100%;";
        $css .= "height:inherit;";
    $css .= "}";

    $css .= "$wrapper .flip-front {";
        $css .= "  --image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= "$wrapper .flip-back {";
        $css .= "  --image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";
        
    $css .= "$wrapper .flip-front-left {";
        $css .= "  --image-hover-effect-transform: rotateY(-180deg);";
    $css .= "}";

    $css .= "$wrapper .flip-back-bottom {";
        $css .= "  --image-hover-effect-transform: rotateX(-180deg);";
    $css .= "}";

    /* Grayscale */
    $css .= "$wrapper .grayScale {";
        $css .= "    --image-filter-effect: grayscale(100%);";
    $css .= "}";

    /* Grayscale reverse hover */
    $css .= "$wrapper .grayScalereverse {";
        $css .= "    filter: grayscale(100%);";
        $css .= "    transition: filter " . esc_attr($attr['imagetransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .grayScalereverse:hover {";
        $css .= "filter: none !important;";
    $css .= "}";

    /* Sepia */
    $css .= "$wrapper .sepia {";
        $css .= "--image-filter-effect: sepia(100%);";
    $css .= "}";

    /* Zoom-in and Zoom-out effects */
    $css .= "$wrapper .zoom-in {";
        $css .= "--image-hover-effect-transform: scale(1.5);";
    $css .= "}";

    $css .= "$wrapper .zoom-out {";
        $css .= "--image-hover-effect-transform: scale(0.8);";
    $css .= "}";

    /* Fade-in and Fade-out effects */
    $css .= "$wrapper .fade-in {";
        $css .= "--image-hover-effect-opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .fade-out {";
        $css .= "--image-hover-effect-opacity: 0.5;";
    $css .= "}";

    /* Slide effects */
    $css .= "$wrapper .slide-up {";
        $css .= "--image-hover-effect-transform: translateY(-10px);";
    $css .= "}";

    $css .= "$wrapper .slide-down {";
        $css .= "--image-hover-effect-transform: translateY(10px);";
    $css .= "}";

    $css .= "$wrapper .slide-left {";
        $css .= "--image-hover-effect-transform: translateX(-10px);";
    $css .= "}";

    $css .= "$wrapper .slide-right {";
        $css .= "--image-hover-effect-transform: translateX(10px);";
    $css .= "}";

    /* Flip effects */
    $css .= "$wrapper .flip-horizontal {";
        $css .= "--image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= "$wrapper .flip-vertical {";
        $css .= "--image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";

    /* Rotate */
    $css .= "$wrapper .rotate {";
        $css .= "--image-hover-effect-transform: rotate(-30deg);";
    $css .= "}";

    /* Blur */
    $css .= "$wrapper .blur {";
        $css .= "--image-filter-effect: blur(3px);";
    $css .= "}";

    /* Shine */
    $css .= "$wrapper .shine {";
        $css .= "--image-filter-effect: grayscale(100%);";
    $css .= "}";

    if($attr['overlayshow']){
        $css .= "$wrapper .vb-image-overlay-wrapper:hover:before {";
                if($attr['overlayhvrcolor']){
                    $css .= "background: " . esc_attr($attr['overlayhvrcolor']) . " !important;";
                }
                $css .= "opacity: " . esc_attr($attr['overlayhvrcolor']) . " !important;";
        $css .= "}";
    }

    /* Overlay styles */
    $css .= "$wrapper .vb-image-overlay-wrapper {";
        $css .= "width: " . esc_attr($attr['overlaywidth']) . ";";
        $css .= "height: " . esc_attr($attr['overlayheight']) . ";";
        $css .= "position: absolute;";
        $css .= "top: " . esc_attr($attr['overlaytop']) . ";";
        $css .= "left: " . esc_attr($attr['overlayleft']) . ";";
        $css .= "transition: " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
        $css .= "z-index: 10;";
        $css .= "display: flex;";
        $css .= "box-sizing: border-box;";
        $css .= "overflow:hidden;";
       
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

    $css .= "$wrapper .vb-image-overlay-wrapper:after {";
        
        $css .= 'content: " ";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 10;';

         $css .= "-webkit-mask-image: radial-gradient(circle, white 100%, transparent 100%);";

        if (!empty($attr['advanceglobaldropshadow'])) {
            $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'advanceglobaldropshadow', 'Desktop');
        }
        
        if($attr['parentBlock']==="vayu-blocks/advance-slider" && !$attr['borderframe']){

            $css .= $OBJ_STYLE->borderFrame('sliderframeData','Desktop');

        }else{
            $css .= $OBJ_STYLE->borderFrame('frameData','Desktop');
        }

    $css .= "}";

    $css .= "$wrapper .vb-image-overlay-wrapper:before {";
        if($attr['overlayshow']){
            $css .= "background: " . esc_attr($attr['overlaycolor']) . ";";
            $css .= "opacity: " . esc_attr($attr['overlayopacity']) . " !important;";
        }

        $css .= 'content: " ";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index:-1;';
    $css .= "}";
    
    if (!empty($attr['animationData']['mask']) && isset($attr['animationData']['mask']['maskshape'])) {
        switch (esc_attr($attr['animationData']['mask']['maskshape'])) {
            case 'circle':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><circle cx="240" cy="190" r="184"/></svg>';
                break;
            case 'diamond':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><rect x="106.001" y="56.001" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 275.3553 494.0559)" width="267.998" height="267.999"/></svg>';
                break;
            case 'hexagone':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><polygon points="79.386,97.269 240,4.538 400.614,97.269 400.614,282.73 240,375.462 79.386,282.73 "/></svg>';
                break;
            case 'rounded':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M421,309.436C421,343.437,393.437,371,359.436,371H120.564C86.563,371,59,343.437,59,309.436V70.564C59,36.563,86.563,9,120.564,9h238.871C393.437,9,421,36.563,421,70.564V309.436z"/></svg>';
                break;
            case 'bob1':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M47.846,184.442c-87.942,134.709,80.073,196.702,186.331,196.702c104.494,0,222.582-39.417,222.582-160.557C456.758-91.25,198.783-46.776,47.846,184.442z"/></svg>';
                break;
            case 'bob2':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M393.879,31.896c96.935,41.811,41.553,265.103-29.118,320.414c-74.443,58.259-320.428,32.36-330.586-185.032C29.551,68.561,183.588-58.822,393.879,31.896z"/></svg>';
                break;
            case 'bob3':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M141.699,9.958c37.611-41.211,253.977,90.988,263.995,181.115c10.016,90.134-215.692,232.896-280.453,172.106C69.045,310.428,39.531,121.932,141.699,9.958z"/></svg>';
                break;
            case 'bob4':
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><g><path d="M69.19,26.334C54.496,39.876,42.91,57.185,35.302,75.221c-10.718,25.408-15.268,52.962-18.384,80.363c-10.069,88.57,17.375,190.72,112.557,217.96c63.844,18.273,133.074-0.437,191.492-27.517c85.828-39.789,206.786-163.646,105.685-255.719C372.3,40.81,284.499,59.485,220.248,32.528c-30.103-12.63-58.445-35.896-92.778-33.125C105.078,1.21,85.272,11.517,69.19,26.334z"/></g></svg>';
                break;
            default:
                $svg = '';
                break;
        }
    }else{
        $svg = '';
    }

    // Encode the SVG to Base64
    $svgBase64 = base64_encode($svg);

    // Create a Data URL
    $imagePath = "data:image/svg+xml;base64,{$svgBase64}";

    $css .= "$wrapper .maskshapeimage{";
        $css .= "mask-image: url($imagePath);";
        $css .= "-webkit-mask-image: url($imagePath);";
        $masksize = isset($attr['animationData']['mask']['masksize']) ? esc_attr($attr['animationData']['mask']['masksize']) : 'auto';
        $maskrepeat = isset($attr['animationData']['mask']['maskrepeat']) ? esc_attr($attr['animationData']['mask']['maskrepeat']) : 'no-repeat';
        $maskposition = isset($attr['animationData']['mask']['maskposition']) ? esc_attr($attr['animationData']['mask']['maskposition']) : 'center';
        
        $css .= "mask-size: {$masksize};";
        $css .= "-webkit-mask-size: {$masksize};";
        $css .= "mask-repeat: {$maskrepeat};";
        $css .= "-webkit-mask-repeat: {$maskrepeat};";
        $css .= "mask-position: {$maskposition};";
        $css .= "-webkit-mask-position: {$maskposition};";
        
    $css .= "}";

    /* Custom overlay hover effects */
    $css .= ".overlayfade-in {";
        $css .= "opacity: 0;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in {";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayfade-in-up {";
        $css .= "transform: translateY(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in-up {";
        $css .= "transform: translateY(0); ";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-circle {";
        $css .= "transform: scale(0); ";
        $css .= "opacity: 0;";
        $css .= "border-radius: 50%; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-circle {";
        $css .= "transform: scale(1); ";
        $css .= "opacity: 1;";
        if (!empty($attr['frameData']['radius'])) {
            $radiusData = $attr['frameData']['radius']['Desktop'];
            
            if (!empty($radiusData['width'])) {
                // If a general width is set, apply it to all corners
                $css .= "border-radius: " . $radiusData['width'] . ";";
            } else {
                // Otherwise, check individual values and apply them
                $topLeft     = !empty($radiusData['top-left']) ? $radiusData['top-left'] : "0";
                $topRight    = !empty($radiusData['top-right']) ? $radiusData['top-right'] : "0";
                $bottomRight = !empty($radiusData['bottom-right']) ? $radiusData['bottom-right'] : "0";
                $bottomLeft  = !empty($radiusData['bottom-left']) ? $radiusData['bottom-left'] : "0";
        
                $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
            }
        }
    
    $css .= "}";

    $css .= ".overlayfade-in-down {";
        $css .= "transform: translateY(-100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayfade-in-down {";
        $css .= "transform: translateY(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    $css .= ".overlayfade-in-left {";
        $css .= "transform: translateX(-100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayfade-in-left {";
        $css .= "transform: translateX(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    $css .= ".overlayfade-in-right {";
        $css .= "transform: translateX(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
        $css .= "}";

        $css .= ".$inline:hover .overlayfade-in-right {";
        $css .= "transform: translateX(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    /* Flip effects */
    $css .= ".overlayflip-horizontal {";
        $css .= "transform: rotateY(-90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-horizontal {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= ".overlayflip-horizontal-left {";
        $css .= "transform: rotateY(90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-horizontal-left {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= ".overlayflip-vertical {";
        $css .= "transform: rotateX(-90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-vertical {";
        $css .= "transform: rotateX(0);";
    $css .= "}";

    $css .= ".overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(0);";
    $css .= "}";
    
    /* Zoom effects */
    $css .= ".overlayzoom-in-up {";
        $css .= "transform: scale(0.5) translateY(-50%);";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-up {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-left {";
        $css .= "transform: scale(0.5) translateX(-50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-left {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-right {";
        $css .= "transform: scale(0.5) translateX(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-right {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-down {";
        $css .= "transform: scale(0.5) translateY(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-down {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".vayu_blocks_inner_content-image {";
        $css .= "position: absolute;";
        $css .= "width: 100%;";
        $css .= "height: 100%;";
        $css .= "top: 0;";
        $css .= "left: 0;";
        $css .= "display: flex;";
        $css .= "align-items: center;";
        $css .= "justify-content: center;";
    $css .= "}";

    $transitionTime = isset($attr['overlaytransitiontime']) ? esc_attr($attr['overlaytransitiontime']) : 0;
    $transitionDelay = max(0, $transitionTime - ($transitionTime / 2));
    
    $css .= "$wrapper .vayu_block_animation_overlay_inside {";
        $css .= "    transition-delay: " . $transitionDelay . "s !important;";
        $css .= "    animation-fill-mode: forwards !important;";
        $css .= "    opacity: 0;";
        $css .= "    transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";
    
    $css .= "$wrapper .$inline:hover .vayu_block_animation_overlay_inside {";
        $css .= "    opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .vb-image-tag {";
        $css .= "text-align: {$attr['captionalignment']['Desktop']};";
    $css .= "}";

    $css .= "$wrapper .vb-image-caption-text {";
        $css .= "color: " . esc_attr($attr['captioncolor']) . ";";

        $css .= $OBJ_STYLE->typography('typography','Desktop');

    $css .= "}";

    $overlayalignmenttablet = explode(' ', $attr['overlayalignmenttablet']);
    $vertical = $overlayalignmenttablet[0];
    $horizontal = $overlayalignmenttablet[1]; 

    $overlayalignmentmobile = explode(' ', $attr['overlayalignmentmobile']);
    $verticalmobile = $overlayalignmentmobile[0]; 
    $horizontalmobile = $overlayalignmentmobile[1]; 

    // For tablet
    $css .= "@media (min-width: 768px) and (max-width: 1024px) {";

        // Styles for tablet (merged from both tablet blocks)
        $css .= "$wrapper $inline {";
            $imageWidth = isset($attr['imageWidth']['Tablet']) ? esc_attr($attr['imageWidth']['Tablet']) : 'auto';
            $css .= " width: $imageWidth;";
            $imageHeight = isset($attr['imageHeight']['Tablet']) ? esc_attr($attr['imageHeight']['Tablet']) : 'auto';
            $css .= " height: $imageHeight;";
        $css .= "}";

        $css .= "$wrapper .vb-image-overlay-wrapper:after {";
            // Ensure $attr['parentBlock'] and $attr['borderframe'] are set before accessing
            if (isset($attr['parentBlock']) && $attr['parentBlock'] === "vayu-blocks/advance-slider" && isset($attr['borderframe']) && !$attr['borderframe']) {
                $css .= $OBJ_STYLE->borderFrame('sliderframeData', 'Tablet');
            } else {
                $css .= $OBJ_STYLE->borderFrame('frameData', 'Tablet');
            }
        $css .= "}";

        $css .= " $wrapper .vb-image-main-container {";
            $desktopAlignment = isset($attr['imagealignment']['Tablet']) && !empty($attr['imagealignment']['Tablet']) ? $attr['imagealignment']['Tablet'] : '';
            $css .= "justify-content: {$desktopAlignment} !important;";
        $css .= "}";

        $css .= "$wrapper .vb-image-tag {";
            // Ensure $attr['frameData']['radius'] is set before accessing
            if (isset($attr['frameData']['radius']) && !empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Tablet'];
                if (isset($radiusData['width']) && !empty($radiusData['width'])) {
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    $topLeft = isset($radiusData['top-left']) && !empty($radiusData['top-left']) ? $radiusData['top-left'] : "0";
                    $topRight = isset($radiusData['top-right']) && !empty($radiusData['top-right']) ? $radiusData['top-right'] : "0";
                    $bottomRight = isset($radiusData['bottom-right']) && !empty($radiusData['bottom-right']) ? $radiusData['bottom-right'] : "0";
                    $bottomLeft = isset($radiusData['bottom-left']) && !empty($radiusData['bottom-left']) ? $radiusData['bottom-left'] : "0";
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-image-caption-text {";
            $css .= $OBJ_STYLE->typography('typography','Tablet');
        $css .= "}";

        $css .= "$wrapper .vb-image-tag {";
            $aspectRatio = isset($attr['aspectRatio']['Tablet']) ? esc_attr($attr['aspectRatio']['Tablet']) : 'auto';
            $css .= "aspect-ratio: $aspectRatio;";
        $css .= "}";
        
        $css .= "$wrapper .vb-image-overlay-wrapper {";
            // Ensure $vertical and $horizontal are set before using them
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
            $css .= "width: " . (isset($attr['overlaywidthtablet']) ? esc_attr($attr['overlaywidthtablet']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['overlayheighttablet']) ? esc_attr($attr['overlayheighttablet']) : 'auto') . ";";
            $css .= "left: " . (isset($attr['overlaylefttablet']) ? esc_attr($attr['overlaylefttablet']) : 'auto') . ";";
            $css .= "top: " . (isset($attr['overlaytoptablet']) ? esc_attr($attr['overlaytoptablet']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Tablet']) ? esc_attr($attr['imagealignment']['Tablet']) : 'auto') . ";";
        $css .= "}";
                
        $css .= "$wrapper .vb-image-tag {";
            $css .= "text-align:" . (isset($attr['captionalignment']['Tablet']) ? esc_attr($attr['captionalignment']['Tablet']) : 'auto') . ";";
        $css .= "}";

    $css .= "}"; 

    // For mobile
    $css .= "@media (max-width: 767px) {";

        // Styles for mobile (merged from both mobile blocks)
        $css .= "$wrapper $inline {";
            $imageWidth = isset($attr['imageWidth']['Mobile']) ? esc_attr($attr['imageWidth']['Mobile']) : 'auto';
            $css .= " width: $imageWidth;";
            $imageHeight = isset($attr['imageHeight']['Mobile']) ? esc_attr($attr['imageHeight']['Mobile']) : 'auto';
            $css .= " height: $imageHeight;";
        $css .= "}";

        $css .= "$wrapper .vb-image-overlay-wrapper:after {";
            // Ensure $attr['parentBlock'] and $attr['borderframe'] are set before accessing
            if (isset($attr['parentBlock']) && $attr['parentBlock'] === "vayu-blocks/advance-slider" && isset($attr['borderframe']) && !$attr['borderframe']) {
                $css .= $OBJ_STYLE->borderFrame('sliderframeData','Mobile');
            }else{
                $css .= $OBJ_STYLE->borderFrame('frameData','Mobile');
            }
        $css .= "}";

        $css .= " $wrapper .vb-image-main-container {";
            $desktopAlignment = isset($attr['imagealignment']['Mobile']) && !empty($attr['imagealignment']['Mobile']) ? $attr['imagealignment']['Mobile'] : '';
            $css .= "justify-content: {$desktopAlignment} !important;";
        $css .= "}";

        $css .= "$wrapper .vb-image-tag {";
            // Ensure $attr['frameData']['radius'] is set before accessing
            if (isset($attr['frameData']['radius']) && !empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Mobile'];
                if (isset($radiusData['width']) && !empty($radiusData['width'])) {
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    $topLeft = isset($radiusData['top-left']) && !empty($radiusData['top-left']) ? $radiusData['top-left'] : "0";
                    $topRight = isset($radiusData['top-right']) && !empty($radiusData['top-right']) ? $radiusData['top-right'] : "0";
                    $bottomRight = isset($radiusData['bottom-right']) && !empty($radiusData['bottom-right']) ? $radiusData['bottom-right'] : "0";
                    $bottomLeft = isset($radiusData['bottom-left']) && !empty($radiusData['bottom-left']) ? $radiusData['bottom-left'] : "0";
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-image-caption-text {";
            $css .= $OBJ_STYLE->typography('typography','Mobile');
        $css .= "}";

        $css .= "$wrapper .vb-image-tag {";
            $aspectRatio = isset($attr['aspectRatio']['Mobile']) ? esc_attr($attr['aspectRatio']['Mobile']) : 'auto';
            $css .= "aspect-ratio: $aspectRatio;";
        $css .= "}";

        $css .= "$wrapper .vb-image-overlay-wrapper {";
            // Ensure $verticalmobile and $horizontalmobile are set before using them
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
            $css .= "width: " . (isset($attr['overlaywidthmobile']) ? esc_attr($attr['overlaywidthmobile']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['overlayheightmobile']) ? esc_attr($attr['overlayheightmobile']) : 'auto') . ";";
            $css .= "left: " . (isset($attr['overlayleftmobile']) ? esc_attr($attr['overlayleftmobile']) : 'auto') . ";";
            $css .= "top: " . (isset($attr['overlaytopmobile']) ? esc_attr($attr['overlaytopmobile']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Mobile']) ? esc_attr($attr['imagealignment']['Mobile']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vb-image-tag {";
            $css .= "text-align:" . (isset($attr['captionalignment']['Mobile']) ? esc_attr($attr['captionalignment']['Mobile']) : 'auto') . ";";
        $css .= "}";
                
    $css .= "}";

    return $css;
}