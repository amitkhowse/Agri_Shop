<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function generate_inline_video_styles($attr) {

    $css = '';

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $wrapper = '.vb-video-' . esc_attr($uniqueId);
    $inline = '.vb-video-container';

    $css .= $OBJ_STYLE->advanceStyle($wrapper);

    $css .= "$wrapper .vb-vayu-modal-close{";
        $css .= $OBJ_STYLE->dimensions('cancelpadding', 'padding', 'Desktop');
        $css .= "background: {$attr['cancelbg']};";
        $css .= "color: {$attr['cancelcolor']};";
        $css .= "fill: {$attr['cancelcolor']};";
        $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Desktop');
    $css .= "}";

    $css .= "$wrapper .vb-vayu-modal-close:hover{";
        $css .= "background: {$attr['cancelbghover']};";
        $css .= "color: {$attr['cancelcolorhover']};";
        $css .= "fill: {$attr['cancelcolorhover']};";
        $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Desktop','Hover');
    $css .= "}";

    $css .= "$wrapper .vb-vayu-modal-close svg {";
        $css .= "width: " . $attr['cancelSize']['Desktop'] . ";";
        $css .= "height: " . $attr['cancelSize']['Desktop'] . ";";
    $css .= "}";

    $css .= "$wrapper .vb-vayu-modal {";
        $css .= "background: " . $attr['lightboxcolor'] . ";";
    $css .= "}";

    $css .= ".vb-video-iframe-modal{";
        if ( ! empty( $attr['videoboxcolor'] ) ) {
            $css .= "background: " . esc_attr( $attr['videoboxcolor'] ) . ";";
        }

        $css .= "border: 0;
        display: block;
        height: 100%;
        width: 100%;";
    $css .= "}";
     
    $css .= "$wrapper .vb-vayu-modal .vb-vayu-modal-body{";
        if ( ! empty( $attr['videoboxcolor'] ) ) {
            $css .= "background: " . esc_attr( $attr['videoboxcolor'] ) . ";";
        }
        $css .= "aspect-ratio: 1.77778 / 1;
            width: auto;
            height: 540px;
            max-width: 100%;
            max-height: 100%;";
        $css .= "}";
   

    $css .= "$wrapper .vb-video-poster{";
        if(!$attr['posterOn']) {
            $css .= "display:none;";
         }  
       if ( ! empty( $attr['frameData']['radius'] ) && is_array( $attr['frameData']['radius'] ) ) {
            $radius = $attr['frameData']['radius'];

            // Desktop radius values with fallbacks
            $topLeft     = isset($radius['Desktop']['topLeft']) ? $radius['Desktop']['topLeft'] : '0px';
            $topRight    = isset($radius['Desktop']['topRight']) ? $radius['Desktop']['topRight'] : '0px';
            $bottomRight = isset($radius['Desktop']['bottomRight']) ? $radius['Desktop']['bottomRight'] : '0px';
            $bottomLeft  = isset($radius['Desktop']['bottomLeft']) ? $radius['Desktop']['bottomLeft'] : '0px';

            // Only add border-radius if at least one is not 0
            if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
            }
        }

    $css .= "}";

    $css .= "$wrapper .vb-video-poster:before{";
        if ( ! empty( $attr['frameData']['radius'] ) && is_array( $attr['frameData']['radius'] ) ) {
            $radius = $attr['frameData']['radius'];

            // Desktop radius values with fallbacks
            $topLeft     = isset($radius['Desktop']['topLeft']) ? $radius['Desktop']['topLeft'] : '0px';
            $topRight    = isset($radius['Desktop']['topRight']) ? $radius['Desktop']['topRight'] : '0px';
            $bottomRight = isset($radius['Desktop']['bottomRight']) ? $radius['Desktop']['bottomRight'] : '0px';
            $bottomLeft  = isset($radius['Desktop']['bottomLeft']) ? $radius['Desktop']['bottomLeft'] : '0px';

            // Only add border-radius if at least one is not 0
            if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
            }
        }
    $css .= "}";

    $css .= "$wrapper .vb-video-wrapper-relative{";
        if(!$attr['posterOn']) {
            $css .= "display:none;";
        } 
            $css .="position:relative;";
        if($attr['screenfit']==='screenfit'){
            $css .= "width: inherit !important;";
            $css .= "height: inherit !important;";
        }

        if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
            $aspectRatio = $attr['imageaspectratio']['Desktop'] ?? '16/9';
            $css .= "aspect-ratio: $aspectRatio;";
            $css .= "width:650px;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'screenfit'){
            $css .="width:100vw;";
            $css .="height:100vh;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
            $css .= "width: " . $attr['videowidth']['Desktop'] . ";";
            $css .= "height: " . $attr['videoheight']['Desktop'] . ";";
        }
    $css .= "}";

    $css .= "$wrapper .vb-video-poster img{";

        
        $css .= "object-position: " . (isset($attr['pofocalPoint']) ? esc_attr($attr['pofocalPoint']['x'] * 100) : '50') . "% " . (isset($attr['pofocalPoint']) ? esc_attr($attr['pofocalPoint']['y'] * 100) : '50') . "%;";

        
        if (isset($attr['duotone']) && !empty($attr['duotone'])) {
            $css .= "    filter: url(#duotone-filter-{$attr['uniqueId']}) !important;";
        }   
        if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
            $aspectRatio = $attr['imageaspectratio']['Desktop'] ?? 'auto';
            $css .= "aspect-ratio: $aspectRatio;";
        }

        if ( ! empty( $attr['frameData']['radius'] ) && is_array( $attr['frameData']['radius'] ) ) {
            $radius = $attr['frameData']['radius'];

            // Desktop radius values with fallbacks
            $topLeft     = isset($radius['Desktop']['topLeft']) ? $radius['Desktop']['topLeft'] : '0px';
            $topRight    = isset($radius['Desktop']['topRight']) ? $radius['Desktop']['topRight'] : '0px';
            $bottomRight = isset($radius['Desktop']['bottomRight']) ? $radius['Desktop']['bottomRight'] : '0px';
            $bottomLeft  = isset($radius['Desktop']['bottomLeft']) ? $radius['Desktop']['bottomLeft'] : '0px';

            // Only add border-radius if at least one is not 0
            if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
            }
        }
    $css .= "}";

    $css .= "$wrapper .vb-video-icon{";
         if(!$attr['posterOn']) {
            $css .= "display:none;";
         }  
    $css .= "}";

    $css .= "$wrapper $inline .vb-video-iframe{";
        if($attr['posterOn']){
            $css .= "display:none;";
        }else if($attr['posterOn'] && $attr['lightbox']){
            $css .= "display:none;";
        }else{
            $css .= "display:block;";
        }
    $css .= "}";

    $css .= "$wrapper .vb-video-poster::before {";
        $css .= " background: " . $attr['pooverlaycolor'] . ";";
        $css .= " opacity: " . $attr['pooverlayopacity'] . ";";
    $css .= "}";

    $css .= "$wrapper .vb-video-poster:hover:before {";
        $css .= " background: " . ( !empty($attr['pooverlayhvrcolor']) ? $attr['pooverlayhvrcolor'] : $attr['pooverlaycolor'] ) . ";";
    $css .= "}";

    $css .= "$wrapper .vayu_blocks_image_flip-duotone-filters {";
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
        if ( isset($attr['imagealignment']) && is_array($attr['imagealignment']) && isset($attr['imagealignment']['Desktop']) ) {
            $css .= "justify-content: {$attr['imagealignment']['Desktop']} !important;";
        }

        $speed = $attr['animationData']['imageAnimation']['speed'] ?? null;

        if (is_numeric($speed)) {
            $css .= "--image-animation-spped: {$speed}s;";
        }
        $css .= "display: flex;";
        $css .= "height: auto;";
        $css .= "width: auto;";
        $css .= " position: relative;";
        $css .= " transition: transform 0.5s linear;";
        $css .= "perspective: 1000px;";
        $css .= "transform-style: preserve-3d;";

       // Overlay Width
        if (!empty($attr['overlaywidth'])) {
            $css .= "--border-frame-width-dekstop: {$attr['overlaywidth']};";
        }
        if (!empty($attr['overlaywidthtablet'])) {
            $css .= "--border-frame-width-tablet: {$attr['overlaywidthtablet']};";
        }
        if (!empty($attr['overlaywidthmobile'])) {
            $css .= "--border-frame-width-mobile: {$attr['overlaywidthmobile']};";
        }

        // Overlay Height
        if (!empty($attr['overlayheight'])) {
            $css .= "--border-frame-height-dekstop: {$attr['overlayheight']};";
        }
        if (!empty($attr['overlayheighttablet'])) {
            $css .= "--border-frame-height-tablet: {$attr['overlayheighttablet']};";
        }
        if (!empty($attr['overlayheightmobile'])) {
            $css .= "--border-frame-height-mobile: {$attr['overlayheightmobile']};";
        }

        // Overlay Top
        if (!empty($attr['overlaytop'])) {
            $css .= "--border-frame-top-dekstop: {$attr['overlaytop']};";
        }
        if (!empty($attr['overlaytoptablet'])) {
            $css .= "--border-frame-top-tablet: {$attr['overlaytoptablet']};";
        }
        if (!empty($attr['overlaytopmobile'])) {
            $css .= "--border-frame-top-mobile: {$attr['overlaytopmobile']};";
        }

        // Overlay Left
        if (!empty($attr['overlayleft'])) {
            $css .= "--border-frame-left-dekstop: {$attr['overlayleft']};";
        }
        if (!empty($attr['overlaylefttablet'])) {
            $css .= "--border-frame-left-tablet: {$attr['overlaylefttablet']};";
        }
        if (!empty($attr['overlayleftmobile'])) {
            $css .= "--border-frame-left-mobile: {$attr['overlayleftmobile']};";
        }

    $css .= "}";

    $css .= "$wrapper .vb-video-rotation{";
        $rotation = esc_attr($attr['rotation']) % 360; // This will ensure the value is within 0-359
        $css .= "transform: rotate( " . $rotation . "deg) !important;";
    $css .= "}";
    
    // Assuming $attr['imagetransitiontime'] contains the transition time value
    $transitionTime = isset($attr['imagetransitiontime']) ? esc_attr($attr['imagetransitiontime']) : '0.5'; // Default to 0.5s if not set

    // Append CSS rules to $css
    $css .= "$wrapper .vb-video-cont_image {";
        $css .= "    transition: transform {$transitionTime}s ease, filter {$transitionTime}s ease, opacity {$transitionTime}s ease;";
        $css .= "justify-content: center;";
        $css .= "display: flex;";
        $css .= "align-items: center;";
    
    $css .= "}";

    // Append CSS rules to $css
    $css .= "$wrapper .vb-video-iframe {";

        if (!empty($attr['animationData']['hovereffect']) && !empty($attr['animationData']['hovereffect']['value'])) {
            if ($attr['animationData']['hovereffect']['value'] === 'flip-front' || $attr['animationData']['hovereffect']['value']) {
                $css .= "backface-visibility: hidden;";
            }
        }

        if ( ! empty( $attr['videoboxcolor'] ) ) {
            $css .= "background: " . esc_attr( $attr['videoboxcolor'] ) . ";";
        }
        
        if (isset($attr['duotone']) && !empty($attr['duotone'])) {
            $css .= "    filter: url(#duotone-filter-{$attr['uniqueId']}) !important;";
        }   

        if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
            $aspectRatio = $attr['imageaspectratio']['Desktop'] ?? '16/9';
            $css .= "aspect-ratio: $aspectRatio;";
            $css .= "width:650px;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'screenfit'){
            $css .="width:100vw;";
            $css .="height:100vh;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
            $css .= "width: " . $attr['videowidth']['Desktop'] . ";";
            $css .= "height: " . $attr['videoheight']['Desktop'] . ";";
        }
        
        if (!empty($attr['frameData']['radius'])) {
            $radiusData = !empty($attr['frameData']['radius']['Desktop']) 
                ? $attr['frameData']['radius']['Desktop'] 
                : '0px'; // or any safe default

            if (!empty($radiusData['width'])) {
                // If a general width is set, apply it to all corners
                $css .= "border-radius: " . $radiusData['width'] . ";";
            } else {
                // Otherwise, check individual values and apply them
                $topLeft     = !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                $topRight    = !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                $bottomRight = !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                $bottomLeft  = !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
        
                $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
            }
        }

        
        if (!empty($attr['imageboxShadow'])) {
            $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'imageboxShadow', 'Desktop');
        }
        $css .= "display:inline-block;";

        // if( $attr['screenfit'] != 'custom'){
        //     if (
        //         ($attr['blockValue'] != 'you-tube') && 
        //         !($attr['blockValue'] === 'you-tube' &&
        //             !empty($attr['youtubeshorts']) &&
        //             $attr['screenfit'] === 'custom'
        //         )
        //     ) {
            
        //     }
        // }

        if($attr['blockValue'] === 'you-tube' && $attr['screenfit'] === 'auto' && $attr['youtubeshorts']){
            $css .= "width:100%;";
        }
      
    $css .= "}";

    $css .= "$wrapper .vb-you-tube-iframe{";
       $css .= "
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;";

    $css .= "}";

    
    $css .= "$wrapper .vb-video-iframe-cont{";

        if ( $attr['posterOn'] ) {
            $css .= "display: none;";
        }

        if (!empty($attr['imageboxShadow'])) {
            $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'imageboxShadow', 'Desktop');
        }

        if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
            $aspectRatio = $attr['imageaspectratio']['Desktop'] ?? '16/9';
            $css .= "aspect-ratio: $aspectRatio;";
            $css .= "width:650px;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'screenfit'){
            $css .="width:100vw;";
            $css .="height:100vh;";
        } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
            $css .= "width: " . $attr['videowidth']['Desktop'] . ";";
            $css .= "height: " . $attr['videoheight']['Desktop'] . ";";
        }

        if (!empty($attr['frameData']['radius'])) {
            $radiusData = !empty($attr['frameData']['radius']['Desktop']) 
                ? $attr['frameData']['radius']['Desktop'] 
                : '0px'; // or any safe default

            
            if (!empty($radiusData['width'])) {
                // If a general width is set, apply it to all corners
                $css .= "border-radius: " . $radiusData['width'] . ";";
            } else {
                // Otherwise, check individual values and apply them
                $topLeft     = !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                $topRight    = !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                $bottomRight = !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                $bottomLeft  = !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
        
                $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
            }
        }
        // $css .= "padding-bottom: 56% !important;";
    $css .= "}";

    // Append hover effect CSS rules
    $css .= " $wrapper $inline:hover .vb-video-iframe {";
        $css .= "    transform: var(--image-hover-effect-transform, none);";
        $css .= "    filter: var(--image-filter-effect, none);";
        $css .= "    opacity: var(--image-hover-effect-opacity, 1);";
    $css .= "}";

    if ( isset($attr['imagealignment']) && is_array($attr['imagealignment']) && isset($attr['imagealignment']['Desktop']) ) {
        $css .= " $wrapper .vb-frame-data-video  {";
            $css .= "justify-content: {$attr['imagealignment']['Desktop']} !important;";
        $css .= "}";
    }
    
    $css .= "$wrapper.flip-front {";
        $css .= "  --image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= "$wrapper.flip-back {";
        $css .= "  --image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";
        
    $css .= "$wrapper.flip-front-left {";
        $css .= "  --image-hover-effect-transform: rotateY(-180deg);";
    $css .= "}";

    $css .= "$wrapper.flip-back-bottom {";
        $css .= "  --image-hover-effect-transform: rotateX(-180deg);";
    $css .= "}";

    /* Grayscale */
    $css .= "$wrapper.grayScale {";
        $css .= "    --image-filter-effect: grayscale(100%);";
    $css .= "}";

    /* Grayscale reverse hover */
    $css .= "$wrapper.grayScalereverse {";
        $css .= "    filter: grayscale(100%) !important;";
        $css .= "    transition: filter " . esc_attr($attr['imagetransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper.grayScalereverse:hover {";
        $css .= "filter: none;";
    $css .= "}";

    /* Sepia */
    $css .= "$wrapper.sepia {";
        $css .= "    --image-filter-effect: sepia(100%);";
    $css .= "}";

    /* Zoom-in and Zoom-out effects */
    $css .= "$wrapper.zoom-in {";
        $css .= "    --image-hover-effect-transform: scale(1.5);";
    $css .= "}";

    $css .= "$wrapper.zoom-out {";
        $css .= "    --image-hover-effect-transform: scale(0.8);";
    $css .= "}";

    /* Fade-in and Fade-out effects */
    $css .= "$wrapper.fade-in {";
        $css .= "    --image-hover-effect-opacity: 1;";
    $css .= "}";

    $css .= "$wrapper.fade-out {";
        $css .= "    --image-hover-effect-opacity: 0.5;";
    $css .= "}";

    /* Slide effects */
    $css .= "$wrapper.slide-up {";
        $css .= "    --image-hover-effect-transform: translateY(-10px);";
    $css .= "}";

    $css .= "$wrapper.slide-down {";
        $css .= "    --image-hover-effect-transform: translateY(10px);";
    $css .= "}";

    $css .= "$wrapper .slide-left {";
        $css .= "    --image-hover-effect-transform: translateX(-10px);";
    $css .= "}";

    $css .= "$wrapper .slide-right {";
        $css .= "    --image-hover-effect-transform: translateX(10px);";
    $css .= "}";

    /* Flip effects */
    $css .= "$wrapper .flip-horizontal {";
        $css .= "    --image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= "$wrapper .flip-vertical {";
        $css .= "    --image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";

    /* Rotate */
    $css .= "$wrapper .rotate {";
        $css .= "    --image-hover-effect-transform: rotate(-30deg);";
    $css .= "}";

    /* Blur */
    $css .= "$wrapper .blur {";
        $css .= "    --image-filter-effect: blur(3px);";
    $css .= "}";

    /* Shine */
    $css .= "$wrapper .shine {";
        $css .= "    --image-filter-effect: grayscale(100%);";
    $css .= "}";

    $css .= "$wrapper .vb-frame-data-video:after {";
        
        $css .= 'content: " ";
        position: absolute;
        z-index: 10;
        box-sizing: border-box;
        pointer-events:none;';

        $css .= $OBJ_STYLE->borderFrame('frameData','Desktop');
        $css .= "-webkit-mask-image: radial-gradient(circle, white 100%, transparent 100%);";

    $css .= "}";

    if (!empty($attr['animationData']['mask']) && isset($attr['animationData']['mask']['maskshape'])) {
        // Determine the SVG based on the maskshape attribute
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

        if($svgBase64){
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
        }

    $css .= "}";

    /* Custom overlay hover effects */
    $css .= "$wrapper .overlayfade-in {";
        $css .= "opacity: 0;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in {";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .overlayfade-in-up {";
        $css .= "transform: translateY(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in-up {";
        $css .= "transform: translateY(0); ";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .overlayzoom-in-circle {";
        $css .= "transform: scale(0); ";
        $css .= "opacity: 0;";
        $css .= "border-radius: 50%; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-circle {";
        $css .= "transform: scale(1); ";
        $css .= "opacity: 1;";
        if (!empty($attr['frameData']['radius'])) {
            $radiusData = !empty($attr['frameData']['radius']['Desktop']) 
            ? $attr['frameData']['radius']['Desktop'] 
            : '0px';
            
            if (!empty($radiusData['width'])) {
                // If a general width is set, apply it to all corners
                $css .= "border-radius: " . $radiusData['width'] . ";";
            } else {
                // Otherwise, check individual values and apply them
                $topLeft     = !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                $topRight    = !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                $bottomRight = !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                $bottomLeft  = !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
        
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

    $css .= "$wrapper .overlayfade-in-right {";
        $css .= "transform: translateX(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
        $css .= "}";

        $css .= ".$inline:hover .overlayfade-in-right {";
        $css .= "transform: translateX(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    $css .= "$wrapper .overlayflip-horizontal {";
        $css .= "transform: rotateY(-90deg);";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayflip-horizontal {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= "$wrapper .overlayflip-horizontal-left {";
        $css .= "transform: rotateY(90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-horizontal-left {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= "$wrapper .overlayflip-vertical {";
        $css .= "transform: rotateX(-90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-vertical {";
        $css .= "transform: rotateX(0);";
    $css .= "}";

    $css .= "$wrapper .overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(90deg);";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(0);";
    $css .= "}";
    
    $css .= "$wrapper .overlayzoom-in-up {";
        $css .= "transform: scale(0.5) translateY(-50%);";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-up {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .overlayzoom-in-left {";
        $css .= "transform: scale(0.5) translateX(-50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-left {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .overlayzoom-in-right {";
        $css .= "transform: scale(0.5) translateX(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-right {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .overlayzoom-in-down {";
        $css .= "transform: scale(0.5) translateY(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-down {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .vayu_blocks_inner_content-image {";
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

    $css .= "$wrapper .vayu_block_caption {";
        $css .= "text-align: " . esc_attr($attr['captionalignment']) . ";";
    $css .= "}";

    $overlayalignmenttablet = explode(' ', $attr['overlayalignmenttablet']); // Split the string
    $vertical = $overlayalignmenttablet[0]; // First part (vertical)
    $horizontal = $overlayalignmenttablet[1]; // Second part (horizontal)

    
    $overlayalignmentmobile = explode(' ', $attr['overlayalignmentmobile']); // Split the string
    $verticalmobile = $overlayalignmentmobile[0]; // First part (vertical)
    $horizontalmobile = $overlayalignmentmobile[1]; // Second part (horizontal)

   // For tablet (max-width: 1024px)
    $css .= "@media (max-width: 1024px) {";

        $css .= "$wrapper .vb-video-iframe-cont{";

            if (!empty($attr['imageboxShadow'])) {
                $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'imageboxShadow', 'Tablet');
            }

            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = $attr['imageaspectratio']['Tablet'] ?? '16/9';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:600px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'screenfit'){
                $css .="width:100vw;";
                $css .="height:100vh;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . $attr['videowidth']['Tablet'] . ";";
                $css .= "height: " . $attr['videoheight']['Tablet'] . ";";
            }

            if (!empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Tablet'];
                
                if (!empty($radiusData['width'])) {
                    // If a general width is set, apply it to all corners
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    // Otherwise, check individual values and apply them
                    $topLeft     = !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                    $topRight    = !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                    $bottomRight = !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                    $bottomLeft  = !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
            
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close{";
            $css .= $OBJ_STYLE->dimensions('cancelpadding', 'padding', 'Tablet');
            $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Tablet');
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close:hover{";
            $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Tablet','Hover');
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close svg {";
            $css .= "width: " . (isset($attr['cancelSize']['Tablet']) ? esc_attr($attr['cancelSize']['Tablet']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['cancelSize']['Tablet']) ? esc_attr($attr['cancelSize']['Tablet']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vb-video-wrapper-relative{";
            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Tablet']) ? esc_attr($attr['imageaspectratio']['Tablet']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:600px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . (isset($attr['videowidth']['Tablet']) ? esc_attr($attr['videowidth']['Tablet']) : 'auto') . ";";
                $css .= "height: " . (isset($attr['videoheight']['Tablet']) ? esc_attr($attr['videoheight']['Tablet']) : 'auto') . ";";
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-poster{";
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Tablet']['topLeft']) ? $radius['Tablet']['topLeft'] : '0px';
                $topRight    = isset($radius['Tablet']['topRight']) ? $radius['Tablet']['topRight'] : '0px';
                $bottomRight = isset($radius['Tablet']['bottomRight']) ? $radius['Tablet']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Tablet']['bottomLeft']) ? $radius['Tablet']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-poster:before{";
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Tablet']['topLeft']) ? $radius['Tablet']['topLeft'] : '0px';
                $topRight    = isset($radius['Tablet']['topRight']) ? $radius['Tablet']['topRight'] : '0px';
                $bottomRight = isset($radius['Tablet']['bottomRight']) ? $radius['Tablet']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Tablet']['bottomLeft']) ? $radius['Tablet']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";
        
        $css .= "$wrapper .vb-video-poster img{";
            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Tablet']) ? esc_attr($attr['imageaspectratio']['Tablet']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
            }
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Tablet']['topLeft']) ? $radius['Tablet']['topLeft'] : '0px';
                $topRight    = isset($radius['Tablet']['topRight']) ? $radius['Tablet']['topRight'] : '0px';
                $bottomRight = isset($radius['Tablet']['bottomRight']) ? $radius['Tablet']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Tablet']['bottomLeft']) ? $radius['Tablet']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";

        $css .= "$wrapper $inline {";
            if ( isset($attr['imagealignment']) && is_array($attr['imagealignment']) && isset($attr['imagealignment']['Tablet']) ) { // Changed from Mobile to Tablet
                $css .= "justify-content: {$attr['imagealignment']['Tablet']} !important;";
            }
        $css .= "}";

        $css .= "$wrapper $inline .vb-frame-data-video{";
            if ( isset($attr['imagealignment']) && is_array($attr['imagealignment']) && isset($attr['imagealignment']['Tablet']) ) { // Changed from Mobile to Tablet
                $css .= "justify-content: {$attr['imagealignment']['Tablet']} !important;";
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-iframe {";
            if (isset($attr['frameData']['radius']) && !empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Tablet']; // Changed from Mobile to Tablet
                
                if (isset($radiusData['width']) && !empty($radiusData['width'])) {
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    $topLeft     = isset($radiusData['topLeft']) && !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                    $topRight    = isset($radiusData['topRight']) && !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                    $bottomRight = isset($radiusData['bottomRight']) && !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                    $bottomLeft  = isset($radiusData['bottomLeft']) && !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
                
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }   
            }

            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Tablet']) ? esc_attr($attr['imageaspectratio']['Tablet']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:600px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . (isset($attr['videowidth']['Tablet']) ? esc_attr($attr['videowidth']['Tablet']) : 'auto') . ";";
                $css .= "height: " . (isset($attr['videoheight']['Tablet']) ? esc_attr($attr['videoheight']['Tablet']) : 'auto') . ";";
            }
        $css .= "}";

        $css .= "$wrapper{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Tablet']) ? esc_attr($attr['imagealignment']['Tablet']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vb-frame-data-video{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Tablet']) ? esc_attr($attr['imagealignment']['Tablet']) : 'auto') . ";";
        $css .= "}";
                
        $css .= "$wrapper .vayu_block_caption {";
            $css .= "text-align:" . (isset($attr['captionalignmentTablet']) ? esc_attr($attr['captionalignmentTablet']) : 'center') . ";";
        $css .= "}";

        $css .= "$wrapper .vayu_block_caption_text_para {";
            $css .= "font-size:" . (isset($attr['captionsizeTablet']) ? esc_attr($attr['captionsizeTablet']) : '') . ";";
            $css .= "font-weight:" . (isset($attr['captionfontweightTablet']) ? esc_attr($attr['captionfontweightTablet']) : '') . ";";
        $css .= "}";

    $css .= "}";

    // For mobile (max-width: 767px, assuming 400px is part of this range)
    $css .= "@media (max-width: 767px) {";

        $css .= "$wrapper .vb-video-iframe-cont{";

            if (!empty($attr['imageboxShadow'])) {
                $css .= $OBJ_STYLE->borderRadiusShadow('', '', 'imageboxShadow', 'Mobile');
            }

            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = $attr['imageaspectratio']['Mobile'] ?? '16/9';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:280px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'screenfit'){
                $css .="width:100vw;";
                $css .="height:100vh;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . $attr['videowidth']['Mobile'] . ";";
                $css .= "height: " . $attr['videoheight']['Mobile'] . ";";
            }

            if (!empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Mobile'];
                
                if (!empty($radiusData['width'])) {
                    // If a general width is set, apply it to all corners
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    // Otherwise, check individual values and apply them
                    $topLeft     = !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                    $topRight    = !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                    $bottomRight = !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                    $bottomLeft  = !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
            
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close{";
            $css .= $OBJ_STYLE->dimensions('cancelpadding', 'padding', 'Mobile');
            $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Mobile');
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close:hover{";
            $css .= $OBJ_STYLE->borderRadiusShadow('cancelBorder', 'cancelRadius', 'cancelDropShadow', 'Mobile','Hover');
        $css .= "}";

        $css .= "$wrapper .vb-vayu-modal-close svg {";
            $css .= "width: " . (isset($attr['cancelSize']['Mobile']) ? esc_attr($attr['cancelSize']['Mobile']) : 'auto') . ";";
            $css .= "height: " . (isset($attr['cancelSize']['Mobile']) ? esc_attr($attr['cancelSize']['Mobile']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vb-video-wrapper-relative{";
            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Mobile']) ? esc_attr($attr['imageaspectratio']['Mobile']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:280px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . (isset($attr['videowidth']['Mobile']) ? esc_attr($attr['videowidth']['Mobile']) : 'auto') . ";";
                $css .= "height: " . (isset($attr['videoheight']['Mobile']) ? esc_attr($attr['videoheight']['Mobile']) : 'auto') . ";";
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-poster{";
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Mobile']['topLeft']) ? $radius['Mobile']['topLeft'] : '0px';
                $topRight    = isset($radius['Mobile']['topRight']) ? $radius['Mobile']['topRight'] : '0px';
                $bottomRight = isset($radius['Mobile']['bottomRight']) ? $radius['Mobile']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Mobile']['bottomLeft']) ? $radius['Mobile']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-poster:before{";
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Mobile']['topLeft']) ? $radius['Mobile']['topLeft'] : '0px';
                $topRight    = isset($radius['Mobile']['topRight']) ? $radius['Mobile']['topRight'] : '0px';
                $bottomRight = isset($radius['Mobile']['bottomRight']) ? $radius['Mobile']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Mobile']['bottomLeft']) ? $radius['Mobile']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";
        
        $css .= "$wrapper .vb-video-poster img{";
            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Mobile']) ? esc_attr($attr['imageaspectratio']['Mobile']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
            }
            if (isset($attr['frameData']['radius']) && is_array($attr['frameData']['radius'])) {
                $radius = $attr['frameData']['radius'];
                $topLeft     = isset($radius['Mobile']['topLeft']) ? $radius['Mobile']['topLeft'] : '0px';
                $topRight    = isset($radius['Mobile']['topRight']) ? $radius['Mobile']['topRight'] : '0px';
                $bottomRight = isset($radius['Mobile']['bottomRight']) ? $radius['Mobile']['bottomRight'] : '0px';
                $bottomLeft  = isset($radius['Mobile']['bottomLeft']) ? $radius['Mobile']['bottomLeft'] : '0px';

                if ($topLeft !== '0px' || $topRight !== '0px' || $bottomRight !== '0px' || $bottomLeft !== '0px') {
                    $css .= "border-radius: " . esc_attr($topLeft) . " " . esc_attr($topRight) . " " . esc_attr($bottomRight) . " " . esc_attr($bottomLeft) . ";";
                }
            }
        $css .= "}";

        $css .= "$wrapper $inline {";
            if ( isset($attr['imagealignment']) && is_array($attr['imagealignment']) && isset($attr['imagealignment']['Mobile']) ) {
                $css .= "justify-content: {$attr['imagealignment']['Mobile']} !important;";
            }
        $css .= "}";

        $css .= "$wrapper .vb-video-iframe {";
            if (isset($attr['screenfit']) && $attr['screenfit'] === 'auto') {
                $aspectRatio = isset($attr['imageaspectratio']['Mobile']) ? esc_attr($attr['imageaspectratio']['Mobile']) : 'auto';
                $css .= "aspect-ratio: $aspectRatio;";
                $css .= "width:280px;";
            } else if(isset($attr['screenfit']) && $attr['screenfit'] === 'custom'){
                $css .= "width: " . (isset($attr['videowidth']['Mobile']) ? esc_attr($attr['videowidth']['Mobile']) : 'auto') . ";";
                $css .= "height: " . (isset($attr['videoheight']['Mobile']) ? esc_attr($attr['videoheight']['Mobile']) : 'auto') . ";";
            }

            if (isset($attr['frameData']['radius']) && !empty($attr['frameData']['radius'])) {
                $radiusData = $attr['frameData']['radius']['Mobile'];
                
                if (isset($radiusData['width']) && !empty($radiusData['width'])) {
                    $css .= "border-radius: " . $radiusData['width'] . ";";
                } else {
                    $topLeft     = isset($radiusData['topLeft']) && !empty($radiusData['topLeft']) ? $radiusData['topLeft'] : "0";
                    $topRight    = isset($radiusData['topRight']) && !empty($radiusData['topRight']) ? $radiusData['topRight'] : "0";
                    $bottomRight = isset($radiusData['bottomRight']) && !empty($radiusData['bottomRight']) ? $radiusData['bottomRight'] : "0";
                    $bottomLeft  = isset($radiusData['bottomLeft']) && !empty($radiusData['bottomLeft']) ? $radiusData['bottomLeft'] : "0";
                
                    $css .= "border-radius: $topLeft $topRight $bottomRight $bottomLeft;";
                }   
            }
        $css .= "}";

        $css .= "$wrapper{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Mobile']) ? esc_attr($attr['imagealignment']['Mobile']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vb-frame-data-video{";
            $css .= "justify-content:" . (isset($attr['imagealignment']['Mobile']) ? esc_attr($attr['imagealignment']['Mobile']) : 'auto') . ";";
        $css .= "}";

        $css .= "$wrapper .vayu_block_caption {";
            $css .= "text-align:" . (isset($attr['captionalignmentMobile']) ? esc_attr($attr['captionalignmentMobile']) : 'center') . ";";
        $css .= "}";

        $css .= "$wrapper .vayu_block_caption_text_para {";
            $css .= "font-size:" . (isset($attr['captionsizeMobile']) ? esc_attr($attr['captionsizeMobile']) : '') . ";";
            $css .= "font-weight:" . (isset($attr['captionfontweightMobile']) ? esc_attr($attr['captionfontweightMobile']) : '') . ";";
        $css .= "}";
                
    $css .= "}";
    
    return $css;
}