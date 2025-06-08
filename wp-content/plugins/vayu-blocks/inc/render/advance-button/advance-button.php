<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_advance_button_style($attr){
    $css = '';

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    // THESE  4 LINES to be add to implement NEW Advance tab styles
    $uniqueId = $attr['uniqueID'];
    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);
    $wrapper = '.th-button-wrapper' . esc_attr($uniqueId);
    $css .= $OBJ_STYLE->advanceStyle($wrapper);
    // THESE  4 LINES to be add to implement NEW Advance tab styles

      $css .= ".th-button-wrapper{$uniqueId}{";

          $css .= "box-sizing: border-box;";

          $css .= isset( $attr['alignment'] )  ? "text-align:{$attr['alignment']['Desktop'] };" : '';

      $css .= "}";

      // Button Inside Style
    $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside{";
  
     if (isset($attr['alignment']) && $attr['alignment']['Desktop']=='justify'){
      $css .= "width: 100%;justify-content: center;";
    }
    $css .= isset( $attr['color']) ? "color: {$attr['color']};" : '';

    // New Latest style
      // Typography
      $css .= $OBJ_STYLE->typography('typography','Desktop');

  // Border, Radius, Shadow
  if (isset($attr['btnBorder']) || isset($attr['btnBorderRadius']) || isset($attr['btnDropShadow'])) {
    $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder', 'btnBorderRadius', 'btnDropShadow', 'Desktop');
}
if (isset($attr['btnBackground'])) {
  $css .= $OBJ_STYLE->background('btnBackground');
}

// Padding
  if (!empty($attr['btnPadding'])) {
  $css .= $OBJ_STYLE->dimensions('btnPadding', 'padding', 'Desktop');
}
else{
    $css .= "padding: 12px 18px 12px 18px;";
}


    $css .= "}";

    $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside:hover{";

    $css .= isset( $attr['hoverColor']) ? "color: {$attr['hoverColor']};" : '';
        // New Latest style
          if (isset($attr['btnBackgroundHover'])) {
            $css .= $OBJ_STYLE->background('btnBackgroundHover');
          }

          // Border, Radius, Shadow
  if (isset($attr['btnBorderHover']) || isset($attr['btnBorderRadiusHover']) || isset($attr['btnDropShadowHover'])) {
    $css .= $OBJ_STYLE->borderRadiusShadow('btnBorderHover', 'btnBorderRadiusHover', 'btnDropShadowHover', 'Desktop');
}

      $css .= "}";

    // Icon Position & Spacing
      $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside > span.vayu-icon{";
      if(isset( $attr['iconPosition'] ) && $attr['iconPosition'] == 'after' ){
      
        $css .= isset( $attr['iconSpacing'] )  ? "margin:0 0 0 {$attr['iconSpacing'] };" : '';
        $css .= "order: 15; display: flex; align-items: center;";
      }
      else{ 
        $css .= isset( $attr['iconSpacing'] ) ? "margin:0 {$attr['iconSpacing'] } 0 0;" : '';
        $css .= "order: 5; display: flex; align-items: center;";
      }
  
      $css .= "}";

      $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside span:nth-of-type(2){";
      $css .= "order: 10;";
      $css .= "}";
    // Icon Position & Spacing End

    if (
      isset($attr['typography']) &&
      isset($attr['typography']['fontSize']) &&
      isset($attr['typography']['fontSize']['Desktop'])
  ) {
      $css .= ".th-button-wrapper{$uniqueId} .vayu_blocks_icon_block_main_icon_svg {";
      $css .= "width: {$attr['typography']['fontSize']['Desktop']};";
      $css .= "}";
  }

            //    tablet view
     $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";
    
          $css .= ".th-button-wrapper{$uniqueId}{";
          
          $css .= isset( $attr['alignment'] )  ? "text-align:{$attr['alignment']['Tablet'] };" : '';   

          $css .= "}";

                      //************************************************** */
                      // Button Style TablET
                      //************************************************** */

          $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside{";
  
              if (isset($attr['alignment']) && $attr['alignment']['Tablet']=='justify'){
                $css .= "width: 100%;justify-content: center;";
              }
              // Typography
            $css .= $OBJ_STYLE->typography('typography','Tablet');

              // Border, Radius, Shadow
              if (isset($attr['btnBorder']) || isset($attr['btnBorderRadius']) || isset($attr['btnDropShadow'])) {
              $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder', 'btnBorderRadius', 'btnDropShadow', 'Tablet');
              }

              // Padding
              if (!empty($attr['btnPadding'])) {
              $css .= $OBJ_STYLE->dimensions('btnPadding', 'padding', 'Tablet');
              }
    
          $css .= "}";

              if (
                isset($attr['typography']) &&
                isset($attr['typography']['fontSize']) &&
                isset($attr['typography']['fontSize']['Tablet'])
              ) {
                $css .= ".th-button-wrapper{$uniqueId} .vayu_blocks_icon_block_main_icon_svg {";
                $css .= "width: {$attr['typography']['fontSize']['Tablet']};";
                $css .= "}";
                }

    $css .= "}"; 

     //    Mobile view
    $css .= "@media screen and (max-width: 767px){";

          $css .= ".th-button-wrapper{$uniqueId}{";
                
                $css .= isset( $attr['alignment'] )  ? "text-align:{$attr['alignment']['Mobile'] };" : '';      

          $css .= "}";


        $css .= ".th-button-wrapper{$uniqueId}:hover{";
          
        $css .= "}";

        //************************************************** */
        // Button Style Mobile
        //************************************************** */
        $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside{";

        if (isset($attr['alignment']) && $attr['alignment']['Mobile']=='justify'){
          $css .= "width: 100%;justify-content: center;";
        }
        // Typography
        $css .= $OBJ_STYLE->typography('typography','Mobile');

        // Border, Radius, Shadow
        if (isset($attr['btnBorder']) || isset($attr['btnBorderRadius']) || isset($attr['btnDropShadow'])) {
        $css .= $OBJ_STYLE->borderRadiusShadow('btnBorder', 'btnBorderRadius', 'btnDropShadow', 'Mobile');
        }

        // Padding
        if (!empty($attr['btnPadding'])) {
        $css .= $OBJ_STYLE->dimensions('btnPadding', 'padding', 'Mobile');
        }

        $css .= "}";

          if (
            isset($attr['typography']) &&
            isset($attr['typography']['fontSize']) &&
            isset($attr['typography']['fontSize']['Mobile'])
        ) {
            $css .= ".th-button-wrapper{$uniqueId} .vayu_blocks_icon_block_main_icon_svg {";
            $css .= "width: {$attr['typography']['fontSize']['Mobile']};";
            $css .= "}";
        }
    

    $css .= "}";
    
    $css .= ".th-button-wrapper{$uniqueId}:focus{
              outline: none;
              text-decoration: none;
              }"; 

    //Icon Style
    $css .= ".th-button-wrapper{$uniqueId} .vayu_blocks_icon_block_main_icon_svg svg{";
    $css .= isset( $attr['color']) ? "fill: {$attr['color']};" : 'fill: #FFF;';
    $css .= isset( $attr['color']) ? "color: {$attr['color']};" : 'color: #FFF;';
    $css .= "}";

    //Icon Style Hover
    $css .= ".th-button-wrapper{$uniqueId} .th-button.th-button-inside:hover .vayu_blocks_icon_block_main_icon_svg svg{";
    $css .= isset( $attr['hoverColor'] ) ? "fill:{$attr['hoverColor'] };" : '';
    $css .= isset( $attr['hoverColor'] ) ? "color:{$attr['hoverColor'] };" : '';
    $css .= "}";

    

    return $css;
}