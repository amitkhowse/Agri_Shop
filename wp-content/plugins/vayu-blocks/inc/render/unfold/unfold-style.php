<?php 

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_unfold_style($attr){

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);
    $uniqueId = isset($attr['uniqueId']) ? $attr['uniqueId'] : '';
    $wrapper = '#' . esc_attr($uniqueId) . '.wp-block-vayu-blocks-unfold';

    $css = "";

    $css .= $OBJ_STYLE->advanceStyle($wrapper);

    $css .= "{$wrapper} {";

    if (isset($attr['trans'])) {
        $css .= "--fold-transition: 0s;";
        $css .= "--fold-transition-function: ease;";
        
    } else {
        $duration = !empty($attr['transition']) ? $attr['transition'] : '1';
        $css .= "--fold-transition: {$duration}s;";
        $foldTrans = !empty($attr['foldTrans']) ? $attr['foldTrans'] : 'ease';
        $css .= "--fold-transition-function: {$foldTrans};";
    }

    $css .= "}";

    //button content
    if (isset($attr['contentheight'])) {
        $css .= "$wrapper .unfold-content:not(.unfolded){max-height: {$attr['contentheight']['Desktop']}; }";
    }else{
        $css .= "$wrapper .unfold-content:not(.unfolded){max-height: 100px; }";
    }

    if (isset($attr['contentGradient']) && isset($attr['contentGradientbo'])) {
        $gradient   = !empty($attr['contentGradient']) ? esc_attr($attr['contentGradient']) : 'transparent';
        $gradientbo = !empty($attr['contentGradientbo']) ? esc_attr($attr['contentGradientbo']) : 'transparent';

        $css .= $wrapper . " .vb-bg-unfold-full-button:not(.unfolded)::after { 
            background: linear-gradient(0deg, $gradientbo 10%, $gradient 100%); 
        }";
    }else if (isset($attr['contentGradient'])) {
        $gradient   = !empty($attr['contentGradient']) ? esc_attr($attr['contentGradient']) : 'transparent';
        $gradientbo = 'transparent';

        $css .= $wrapper . " .vb-bg-unfold-full-button:not(.unfolded)::after { 
            background: linear-gradient(0deg, $gradientbo 10%, $gradient 100%); 
        }";
    }else if (isset($attr['contentGradientbo'])) {
        $gradientbo   = !empty($attr['contentGradientbo']) ? esc_attr($attr['contentGradientbo']) : 'transparent';
        $gradient = 'transparent';

        $css .= $wrapper . " .vb-bg-unfold-full-button:not(.unfolded)::after { 
            background: linear-gradient(0deg, $gradientbo 10%, $gradient 100%); 
        }";
    } else {
        $css .= $wrapper . " .vb-bg-unfold-full-button:not(.unfolded)::after { 
            background: linear-gradient(0deg, #ffffff00 10%, #ffffff00 100%);
        }";
    }

    $fadeHeight = isset($attr['contentfade']['Desktop']) ? $attr['contentfade']['Desktop'] : '50%';

    $css .= "$wrapper .vb-bg-unfold-full-button:not(.unfolded)::after { 
        height: $fadeHeight;
    }";

    $css .= "$wrapper .unfold-content:not(.unfolded)::after { 
        height: $fadeHeight;
    }";


    if (isset($attr['align']['Desktop'])) {
        $css .= "$wrapper .unfold-content-btn .unfold-button { text-align: " . esc_attr($attr['align']['Desktop']) . "; }";
    }        

    $css .= "$wrapper .unfold-content-btn .unfold-button{";
    
        $css .= isset( $attr['btnClr'] ) ? "color:{$attr['btnClr']};" : 'color:#fff;';
        $css .= isset( $attr['backgroundBtncolor'] ) ? "background:{$attr['backgroundBtncolor']};" : 'background:#111;';
        
        //padding
        if (isset($attr['PaddingBtn']) && is_array($attr['PaddingBtn'])){
            $css .= $OBJ_STYLE ->dimensions('PaddingBtn', 'padding', 'Desktop');	
        }else{
            $css .="padding: 5px 15px;";
        }
       
        //margin
        if (isset($attr['MarginBtn']) && is_array($attr['MarginBtn'])){
            $css .= $OBJ_STYLE ->dimensions('MarginBtn', 'margin', 'Desktop');;	
        }

        //border
        $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Desktop');
        
        // typography
        $css .= $OBJ_STYLE->typography('typography','Desktop');

        $css .= "justify-content: center;";
        $css .= "display: flex;";

    $css .= "}";

    $css .= "$wrapper .unfold-content-btn .unfold-button:hover{";

            $css .= isset( $attr['btnHvrClr'] ) ? "color:{$attr['btnHvrClr']};" : 'color:#fff;';
            $css .= isset( $attr['backgroundBtnhoverColor'] ) ? "background:{$attr['backgroundBtnhoverColor']};" : 'background:#111;';
            $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Desktop','Hover');
    
    $css .= "}";

    $css .= "$wrapper .unfold-content-btn .unfold-button span span{";
        if (isset($attr['typography']['fontSize']['Desktop'])) {
            $fontSize = $attr['typography']['fontSize']['Desktop'];
            $css .= "font-size: {$fontSize};";
        }else {
            $css .= "font-size: 16px;";
        }
        $css .= "width:auto !important; ";
        $css .= "height:auto !important;";
        $css .= isset( $attr['btnClr'] ) ? "fill:{$attr['btnClr']};" : 'fill:#fff;';
    $css .= "}";

    // Tablet style
    $css .= "@media only screen (max-width: 1023px) {";
    
        if (isset($attr['contentheight'])) {
            $css .= "$wrapper .unfold-content:not(.unfolded){max-height: {$attr['contentheight']['Tablet']}; }";
        }else{
            $css .= "$wrapper .unfold-content:not(.unfolded){max-height: 150px; }";
        }
        if (isset($attr['alignTablet'])) {
            $css .= "$wrapper .unfold-content-btn .unfold-button{ text-align: {$attr['alignTablet']} }";
        } 

        $css .= "$wrapper .unfold-content-btn .unfold-button{";
            //Btnpadding
            //padding
            if (isset($attr['PaddingBtn']) && is_array($attr['PaddingBtn'])){
                $css .= $OBJ_STYLE ->dimensions('PaddingBtn', 'padding', 'Tablet');	
            } 
            //margin
            if (isset($attr['MarginBtn']) && is_array($attr['MarginBtn'])){
                $css .= $OBJ_STYLE ->dimensions('MarginBtn', 'margin', 'Tablet');;	
            }
            //button border
            //border
            $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Tablet');
            // typography
            $css .= $OBJ_STYLE->typography('typography','Tablet');
            
        $css .= "}";

        $css .= "$wrapper .unfold-content-btn .unfold-button:hover{";
        
            //border
            $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Tablet','Hover');
            
        $css .= "}";

        $css .= "$wrapper .unfold-content-btn .unfold-button span span{";
            if (isset($attr['typography']['fontSize']['Tablet'])) {
                $fontSize = $attr['typography']['fontSize']['Tablet'];
                $css .= "font-size: {$fontSize};";
            }
        $css .= "}";

        $fadeHeightTablet = isset($attr['contentfade']['Tablet']) ? $attr['contentfade']['Tablet'] : '50%';

        $css .= "$wrapper .unfold-content:not(.unfolded)::after { 
            height: $fadeHeightTablet;
        }";
        $css .= "$wrapper .vb-bg-unfold-full-button:not(.unfolded)::after { 
            height: $fadeHeight;
        }";
    $css .= "}";

    // Mobile style
    $css .= "@media only screen and (max-width: 400px) {";

        if (isset($attr['contentheight'])) {
            $css .= "$wrapper .unfold-content:not(.unfolded){max-height: {$attr['contentheight']['Mobile']}; }";
        } else {
            $css .= "$wrapper .unfold-content:not(.unfolded){max-height: 150px; }";
        }

    
        if (isset($attr['alignMobile'])) {
            $css .= "$wrapper .unfold-content-btn .unfold-button{ text-align: {$attr['alignMobile']} }";
        } 

        $css .= "$wrapper .unfold-content-btn .unfold-button{";
    
    
            //padding
            if (isset($attr['PaddingBtn']) && is_array($attr['PaddingBtn'])){
                $css .= $OBJ_STYLE ->dimensions('PaddingBtn', 'padding', 'Mobile');	
            } 
            //margin
            if (isset($attr['MarginBtn']) && is_array($attr['MarginBtn'])){
                $css .= $OBJ_STYLE ->dimensions('MarginBtn', 'margin', 'Mobile');
            }

            //border
            $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Mobile');
            // typography
            $css .= $OBJ_STYLE->typography('typography','Mobile');
    
        $css .= "}";
    
        $css .= "$wrapper .unfold-content-btn .unfold-button:hover {";
        
            $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder','btnRadius','btnShadow','Mobile','Hover');
    
        $css .= "}";

        $css .= "$wrapper .unfold-content-btn .unfold-button span span{";
            if (isset($attr['typography']['fontSize']['Mobile'])) {
                $fontSize = $attr['typography']['fontSize']['Mobile'];
                $css .= "font-size: {$fontSize};";
            }
        $css .= "}";

        $fadeHeightMobile = isset($attr['contentfade']['Mobile']) ? $attr['contentfade']['Mobile'] : '50%';

        $css .= "$wrapper .unfold-content:not(.unfolded)::after { 
            height: $fadeHeightMobile;
        }";

        $css .= "$wrapper .vb-bg-unfold-full-button:not(.unfolded)::after { 
            height: $fadeHeight;
        }";

    
    $css .= "}";

    return $css;
}