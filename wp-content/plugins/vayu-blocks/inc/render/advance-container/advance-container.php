<?php

 if ( ! defined( 'ABSPATH' ) ) {

	exit;
	
} 

function vayu_advance_container_style($attr){

	$OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $css = '';

    if(isset( $attr['uniqueId'] )){

		$options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option();
		$container_width = $options['global']['containerWidth'];
		$wrapper = ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']}";
        $css .= $OBJ_STYLE->advanceStyle($wrapper,'container');
		
		// Access the box container settings
		$css .= ".{$attr['uniqueId']}.boxed-content > .th-inside-container.th-con{";
        // boxed-width
		if (isset($attr['boxedcontentWidth'])) {
			$css .= "max-width: {$attr['boxedcontentWidth']['Desktop']};width:100%;; 
			margin-right:auto;margin-left:auto;";
		}else{
            $css .= "max-width:{$container_width}px;margin-right:auto;margin-left:auto;;width:100%;";
        }
        $css .= "}";

		// Access the fullwidth container settings
		$css .= ".{$attr['uniqueId']}.fullwidth-content{";
        // boxed-width

		if (isset($attr['fullcontentWidth'])) {
			$css .= "width: {$attr['fullcontentWidth']['Desktop']};";
		}
        $css .= "}";
       
		// innerflexproperties

		$css .= ".{$attr['uniqueId']}.fullwidth-content > .vb-block-wrap{";
		$css .= $OBJ_STYLE->ContFlex('contFlex','Desktop');
        $css .= "}";

        // background
		if (isset($attr['advBackground'])) {
		$css .= ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']}{";
		$css .= $OBJ_STYLE->background('advBackground');
		$css .= "}";
		}
		if (isset($attr['advBackgroundHover'])) {
		$css .= ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']}:hover{";
		$css .= $OBJ_STYLE->background('advBackgroundHover');
		$css .= "}";
		}

        // overlay
		if ( isset( $attr['overlaybackground'] ) ) {
			$css .= ".{$attr['uniqueId']}:before {";
			$css .= $OBJ_STYLE->background( 'overlaybackground' );
			$css .= "border-radius: inherit;
					 position: absolute;
					 top: 0;
					 left: 0;
					 width: 100%;
					 height: 100%;
					 max-width: 100%;
					 content: \"\";";
			$css .= "}";
		}
	
        // overlay hover
		if (isset($attr['overlaybackgroundHover'])){
        $css .= ".{$attr['uniqueId']}:hover > .wp-block-th-blocks-container-overlay{";
        $css .= $OBJ_STYLE->background('overlaybackgroundHover');
        $css .= "}";
		}

        //inside wrap
        $css .= ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']}, .{$attr['uniqueId']} > .th-inside-container.th-con{";
			// min-height
			if (isset($attr['contentMinHgt'])) {
				$css .= "min-height: {$attr['contentMinHgt']['Desktop']};";
			}else{
				$css .= "min-height:auto;";
			}
			$css .= $OBJ_STYLE->ContFlex('contFlex','Desktop');
        $css .= "}";

	    //shaper
	    $css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-top svg{";	
		$css .= isset( $attr['shapeTopWidth']['Desktop'] ) ? "width:{$attr['shapeTopWidth']['Desktop'] };" : '';
		$css .= isset( $attr['shapeTopHeight']['Desktop'] ) ? "height:{$attr['shapeTopHeight']['Desktop'] };" : '';
	    $css .= "}";

		$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-bottom svg{";	
		$css .= isset( $attr['shapeBottomWidth']['Desktop'] ) ? "width:{$attr['shapeBottomWidth']['Desktop'] };" : '';
		$css .= isset( $attr['shapeBottomHeight']['Desktop'] ) ? "height:{$attr['shapeBottomHeight']['Desktop'] };" : '';
		$css .= "}";

		$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-top {";
		$css .= isset( $attr['shapeTopFront'] ) ? "z-index:1" : 'z-index:0';	
		$css .= "}";

		$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-bottom {";
		$css .= isset( $attr['shapeBottomFront'] ) ? "z-index:1" : 'z-index:0';	
		$css .= "}";

    //   //    tablet view
      $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) { ";
      
        // Access the box container settings
		$css .= ".{$attr['uniqueId']}.boxed-content > .th-inside-container.th-con{";
        // boxed-width
		if (isset($attr['boxedcontentWidth'])) {
			$css .= "max-width: {$attr['boxedcontentWidth']['Tablet']};width:100%; 
			margin-right:auto;margin-left:auto;";
			
		}else{
            $css .= "max-width:{$container_width}px;margin-right:auto;margin-left:auto;width:100%;";
        }
        $css .= "}";

		// Access the fullwidth container settings
		$css .= ".{$attr['uniqueId']}.fullwidth-content{";
        // boxed-width
		if (isset($attr['fullcontentWidth'])) {
			$css .= "width: {$attr['fullcontentWidth']['Tablet']}; ";
		}
		
        $css .= "}";

		// innerflexproperties
		$css .= ".{$attr['uniqueId']}.fullwidth-content > .vb-block-wrap{";
		$css .= $OBJ_STYLE->ContFlex('contFlex','Tablet');
        $css .= "}";


            //inside wrap
            $css .= ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']},.{$attr['uniqueId']} > .th-inside-container.th-con{";
			
				// min-height
			
				if (isset($attr['contentMinHgt'])) {
					$css .= "min-height: {$attr['contentMinHgt']['Tablet']}; ";
				}else{
					$css .= "min-height: auto;";
				}
    
                $css .= $OBJ_STYLE->ContFlex('contFlex','Tablet');

            $css .= "}";


		//shaper
		$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-top svg{";	
		$css .= isset( $attr['shapeTopWidth']['Tablet'] ) ? "width:{$attr['shapeTopWidth']['Tablet'] };" : '';
		$css .= isset( $attr['shapeTopHeight']['Tablet'] ) ? "height:{$attr['shapeTopHeight']['Tablet'] };" : '';
		$css .= "}";

		$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-bottom svg{";	
		$css .= isset( $attr['shapeBottomWidth']['Tablet'] ) ? "width:{$attr['shapeBottomWidth']['Tablet'] };" : '';
		$css .= isset( $attr['shapeBottomHeight']['Tablet'] ) ? "height:{$attr['shapeBottomHeight']['Tablet'] };" : '';
		$css .= "}";


      $css .= " }";

    //    mobile view
      $css .= "@media only screen and (max-width: 767px){";
      
        // Access the box container settings
		$css .= ".{$attr['uniqueId']}.boxed-content > .th-inside-container.th-con{";
        // boxed-width
		if (isset($attr['boxedcontentWidth'])) {
			$css .= "max-width: {$attr['boxedcontentWidth']['Mobile']};width:100%;; 
			margin-right:auto;margin-left:auto;";
		}else{
            $css .= "max-width:{$container_width}px;margin-right:auto;margin-left:auto;;width:100%;";
        }
        $css .= "}";

		// Access the fullwidth container settings
		$css .= ".{$attr['uniqueId']}.fullwidth-content{";
        // boxed-width
		if (isset($attr['fullcontentWidth'])) {
			$css .= "width: {$attr['fullcontentWidth']['Mobile']};";
		}
        $css .= "}";

		// innerflexproperties
		$css .= ".{$attr['uniqueId']}.fullwidth-content > .vb-block-wrap{";
		$css .= $OBJ_STYLE->ContFlex('contFlex','Mobile');
        $css .= "}";

    //inside wrap
            $css .= ".wp-block-vayu-blocks-advance-container.{$attr['uniqueId']},.{$attr['uniqueId']} > .th-inside-container.th-con{";
				// min-height
				if (isset($attr['contentMinHgt'])) {
					
					$css .= "min-height: {$attr['contentMinHgt']['Mobile']}; ";
				}else{
					$css .= "min-height: auto;";
				}
				
                $css .= $OBJ_STYLE->ContFlex('contFlex','Mobile');
            $css .= "}";

			//shaper
			$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-top svg{";	
			$css .= isset( $attr['shapeTopWidth']['Mobile'] ) ? "width:{$attr['shapeTopWidth']['Mobile'] };" : '';
			$css .= isset( $attr['shapeTopHeight']['Mobile'] ) ? "height:{$attr['shapeTopHeight']['Tablet'] };" : '';
			$css .= "}";

			$css .= ".{$attr['uniqueId']} > .th-shaper .th-shape-bottom svg{";	
			$css .= isset( $attr['shapeBottomWidth']['Mobile'] ) ? "width:{$attr['shapeBottomWidth']['Mobile'] };" : '';
			$css .= isset( $attr['shapeBottomHeight']['Mobile'] ) ? "height:{$attr['shapeBottomHeight']['Mobile'] };" : '';
			$css .= "}";

			$css .= "}";

			if (isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] == true){
				$css .= "@media only screen and (min-width: 1024px){.{$attr['uniqueId']}{display:none;} }";
			}
			
			if (isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] == true){
				$css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {.{$attr['uniqueId']}{display:none;}}";
			}
			
			if (isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] == true){
				$css .= "@media only screen and (max-width: 767px) {.{$attr['uniqueId']}{display:none;}}";
			}


			}

    return $css;

}