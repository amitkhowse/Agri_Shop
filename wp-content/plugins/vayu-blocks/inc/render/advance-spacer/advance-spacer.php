<?php 

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_advance_spacer_style($attr){
    
  $css = '';


   // THESE  4 LINES to be add to implement NEW Advance tab styles
   $uniqueId = $attr['uniqueId'];
   $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);
   $wrapper = '.vayu-spacer-' . esc_attr($uniqueId);
   $css .= $OBJ_STYLE->advanceStyle($wrapper);
   // THESE  4 LINES to be add to implement NEW Advance tab styles

      $css .= ".vayu-spacer-{$uniqueId}{";
        //Height
		    $css .= isset($attr['height']['Desktop']) ? "height: {$attr['height']['Desktop']};" : "height: 50px;";
      
      $css .= "}"; 

     //    tablet view
     $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";

          $css .= ".vayu-spacer-{$uniqueId}{";
          $css .= isset($attr['height']['Tablet']) ? "height: {$attr['height']['Tablet']};" : "";
          $css .= "}";

     $css .= "}";

     //    Mobile view
    $css .= "@media screen and (max-width: 767px){";

          $css .= ".vayu-spacer-{$uniqueId}{";
	        $css .= isset($attr['height']['Mobile']) ? "height: {$attr['height']['Mobile']};" : "";
          $css .= "}";

    $css .= "}";

    return $css;

}