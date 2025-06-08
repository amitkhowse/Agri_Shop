<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_swiper_slider_style($attr){

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

    $css = '';

    if(isset( $attr['uniqueId'] )){

        $css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']}{";
		//padding
		if (isset($attr['Padding']) && is_array($attr['Padding'])){
			$css .= $OBJ_STYLE ->dimensions('Padding', 'padding', 'Desktop');	
		}
        //margin
		if (isset($attr['Margin']) && is_array($attr['Margin'])){
			$css .= $OBJ_STYLE ->dimensions('Margin', 'margin', 'Desktop');
		}
        
        //background
        if ( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'image' ) {
			$css .= isset( $attr['backgroundImage']['url'] ) ? "background-image: url({$attr['backgroundImage']['url']});" : '';
			$css .= isset( $attr['backgroundAttachment']) ? "background-attachment: {$attr['backgroundAttachment']};" : 'background-attachment:scroll;';
			$css .= isset( $attr['backgroundRepeat']) ? "background-repeat: {$attr['backgroundRepeat']};" : 'background-repeat:repeat;';
			$css .= isset( $attr['backgroundSize']) ? "background-size: {$attr['backgroundSize']};" : 'background-size:auto;';
			$css .= isset( $attr['backgroundPosition']) ? "background-position-x: " . ($attr['backgroundPosition']['x'] * 100) . "%; background-position-y: " . ($attr['backgroundPosition']['y'] * 100) . "%;" : '';
		}elseif( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'gradient' ){
			$css .= isset( $attr['backgroundGradient'] ) ? "background-image:{$attr['backgroundGradient']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
		}else{
			$css .= isset( $attr['backgroundColor'] ) ? "background-color:{$attr['backgroundColor']};" : '';
		}
        //z-index
		$css .= isset( $attr['zindex'] ) ? "z-index:{$attr['zindex'] };" : '';

		//border// border-radius//box shadow
		$css .= $OBJ_STYLE->borderRadiusShadow('advBorder','advBorderRadius','advDropShadow','Desktop');
        //transition duration
		$css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";
        //position property

		$css .= "position: " . (isset($attr['position']) ? $attr['position'] : 'relative' ). ";";
		
		if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'relative' !== $attr['position']){
			$horizontalOrientationOffset = isset($attr['horizontalOrientationOffset']) ? $attr['horizontalOrientationOffset'] : '0';
			$horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
            $css .= "left: {$horizontalOrientationOffset}{$horizontalOrientationOffsetUnit};";
		}
		if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'relative' !== $attr['position']){
			$horizontalOrientationOffsetRight = isset($attr['horizontalOrientationOffsetRight']) ? $attr['horizontalOrientationOffsetRight'] : '0';
			$horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
            $css .= "right: {$horizontalOrientationOffsetRight}{$horizontalOrientationOffsetRightUnit};";
		}
		if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
			$verticalOrientationOffsetTop = isset($attr['verticalOrientationOffsetTop']) ? $attr['verticalOrientationOffsetTop'] : '0';
			$verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
            $css .= "top: {$verticalOrientationOffsetTop}{$verticalOrientationOffsetTopUnit};";
		}
		if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
			$verticalOrientationOffsetBottom = isset($attr['verticalOrientationOffsetBottom']) ? $attr['verticalOrientationOffsetBottom'] : '0';
			$verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
            $css .= "bottom: {$verticalOrientationOffsetBottom}{$verticalOrientationOffsetBottomUnit};";
		}

        // flex properties
		$css .= "align-self: " . (isset($attr['alignSelf']) ? $attr['alignSelf'] : 'inherit;' ). ";";
        if(isset($attr['order']) && $attr['order'] === 'start'){
			$css .= "order:-9999;";
		}elseif(isset($attr['order']) && $attr['order'] === 'end'){
			$css .= "order:9999;";
		}elseif(isset($attr['order']) && $attr['order'] === 'custom'){
		$css .= isset( $attr['customOrder'] ) ? "order:{$attr['customOrder']};" : '';
		}

		//flex size
        if(isset($attr['flexSize']) && $attr['flexSize'] === 'none'){
			
			$css .= "flex-grow:0;
				flex-shrink:0;";
		
		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'grow'){
			$css .= "flex-grow:1;
			flex-shrink:0;";

		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'shrink'){
			$css .= "flex-grow:0;
			flex-shrink:1;";
		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'custom'){
			$css .= isset( $attr['FlexGrowSize'] ) ? "flex-grow:{$attr['FlexGrowSize']};" : '';
            $css .= isset( $attr['FlexShrinkSize'] ) ? "flex-shrink:{$attr['FlexShrinkSize']};" : '';
		}

		$css .="}";


        /*******************/ 
        // slide option
		/*******************/ 

		if(isset($attr['swipeStartGap'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel{";
			$swipeStartGapUnit = isset($attr['swipeStartGapUnit']) ? $attr['swipeStartGapUnit'] : 'px';
			$css .= "padding-left: {$attr['swipeStartGap']}{$swipeStartGapUnit};";
			$css .="}";
		}
		
		if (isset($attr['swipeslideWidth']) || isset($attr['swipeslideGap'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel .slide-item{";
			if (isset($attr['swipeslideWidth'])) {
				$swipeslideWidthUnit = isset($attr['swipeslideWidthUnit']) ? $attr['swipeslideWidthUnit'] : 'px';
				$css .= "width: {$attr['swipeslideWidth']}{$swipeslideWidthUnit};";
			}
			if (isset($attr['swipeslideGap'])) {
				$swipeslideGapUnit = isset($attr['swipeslideGapUnit']) ? $attr['swipeslideGapUnit'] : 'px';
				$css .= "margin-right: {$attr['swipeslideGap']}{$swipeslideGapUnit};";
			}
			$css .="}";
	    }

        /**************************/ 
        // slide navigation option
		/***************************/ 

		if(isset($attr['swipeNavSize'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button span{";
			$swipeNavSizeUnit = isset($attr['swipeNavSizeUnit']) ? $attr['swipeNavSizeUnit'] : 'px';
			$css .= "height: {$attr['swipeNavSize']}{$swipeNavSizeUnit};
			         width: {$attr['swipeNavSize']}{$swipeNavSizeUnit};
					 font-size:{$attr['swipeNavSize']}{$swipeNavSizeUnit};";
			$css .="}";
		}

		if(isset($attr['swipeNavPostion'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.left{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "left: {$attr['swipeNavPostion']}{$swipeNavPostionUnit};";
			$css .="}";
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.right{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "right: {$attr['swipeNavPostion']}{$swipeNavPostionUnit};";
			$css .="}";
		}

		//navcolor

		if(isset($attr['navcolor'])){
		$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button span{";
		$css .= isset( $attr['navcolor'] ) ? "color:{$attr['navcolor']};" : '';
		$css .="}";
		}

		$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button{";
		$css .= isset( $attr['navbgcolor'] ) ? "background:{$attr['navbgcolor']};" : '';
		$css .= $OBJ_STYLE->borderRadiusShadow('naviconsBorder','naviconsRadius','','Desktop');
		$css .="}"; 
	
		/**************************/ 
        // slide pagination option
		/***************************/ 
		if(isset($attr['swipePagiSize'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .pagination-container .pagination-dot{";
			$swipePagiSizeUnit = isset($attr['swipePagiSizeUnit']) ? $attr['swipePagiSizeUnit'] : 'px';
			$css .= "width:{$attr['swipePagiSize']}{$swipePagiSizeUnit};height: {$attr['swipePagiSize']}{$swipePagiSizeUnit};";
			$css .="}";
		}

		//pagicolor
		if(isset($attr['pagicolor'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .pagination-dot{";
			$css .= isset( $attr['pagicolor'] ) ? "background:{$attr['pagicolor']};" : '';
			$css .="}";
			}
			if(isset($attr['pagiActivecolor'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .pagination-dot.active{";
			$css .= isset( $attr['pagiActivecolor'] ) ? "background:{$attr['pagiActivecolor']};" : '';
			$css .="}";
		    }

      //tablet view
      $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px){";
	  $css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']}{";
	  //padding
	  if (isset($attr['Padding']) && is_array($attr['Padding'])){
		  $css .= $OBJ_STYLE ->dimensions('Padding', 'padding', 'Tablet');	
	  }
	  //margin
	  if (isset($attr['Margin']) && is_array($attr['Margin'])){
		  $css .= $OBJ_STYLE ->dimensions('Margin', 'margin', 'Tablet');
	  }
	  //z-index
	  $css .= isset( $attr['zindexTablet'] ) ? "z-index:{$attr['zindexTablet'] };" : '';
	  //border// border-radius//box shadow
	  $css .= $OBJ_STYLE->borderRadiusShadow('advBorder','advBorderRadius','advDropShadow','Tablet');
	  $css .="}";

	     /*******************/ 
        // slide option Tablet
		/*******************/ 

		if(isset($attr['swipeStartGapTablet'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel{";
			$swipeStartGapUnit = isset($attr['swipeStartGapUnit']) ? $attr['swipeStartGapUnit'] : 'px';
			$css .= "padding-left: {$attr['swipeStartGapTablet']}{$swipeStartGapUnit};";
			$css .="}";
		}
		
		if (isset($attr['swipeslideWidthTablet']) || isset($attr['swipeslideGapTablet'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel .slide-item{";
			if (isset($attr['swipeslideWidthTablet'])) {
				$swipeslideWidthUnit = isset($attr['swipeslideWidthUnit']) ? $attr['swipeslideWidthUnit'] : 'px';
				$css .= "width: {$attr['swipeslideWidthTablet']}{$swipeslideWidthUnit};";
			}
			if (isset($attr['swipeslideGapTablet'])) {
				$swipeslideGapUnit = isset($attr['swipeslideGapUnit']) ? $attr['swipeslideGapUnit'] : 'px';
				$css .= "margin-right: {$attr['swipeslideGapTablet']}{$swipeslideGapUnit};";
			}
			$css .="}";
	    }

       /**************************/ 
        // slide navigation option
		/***************************/ 

		if(isset($attr['swipeNavSizeTablet'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button span{";
			$swipeNavSizeUnit = isset($attr['swipeNavSizeUnit']) ? $attr['swipeNavSizeUnit'] : 'px';
			$css .= "height: {$attr['swipeNavSizeTablet']}{$swipeNavSizeUnit};
			         width: {$attr['swipeNavSizeTablet']}{$swipeNavSizeUnit};
					 font-size:{$attr['swipeNavSizeTablet']}{$swipeNavSizeUnit};";
			$css .="}";
		}

		if(isset($attr['swipeNavPostionTablet'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.left{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "left: {$attr['swipeNavPostionTablet']}{$swipeNavPostionUnit};";
			$css .="}";
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.right{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "right: {$attr['swipeNavPostionTablet']}{$swipeNavPostionUnit};";
			$css .="}";
		}

		$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button{";
		$css .= $OBJ_STYLE->borderRadiusShadow('naviconsBorder','naviconsRadius','','Tablet');
		$css .="}"; 
	
		/**************************/ 
        // slide pagination option
		/***************************/ 
		if(isset($attr['swipePagiSizeTablet'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .pagination-container .pagination-dot{";
			$swipePagiSizeUnit = isset($attr['swipePagiSizeUnit']) ? $attr['swipePagiSizeUnit'] : 'px';
			$css .= "width:{$attr['swipePagiSizeTablet']}{$swipePagiSizeUnit};height: {$attr['swipePagiSizeTablet']}{$swipePagiSizeUnit};";
			$css .="}";
		}

	  
	  $css .="}";//tablet end

	  //mobile view
      $css .= "@media only screen and (max-width: 767px){";

	  $css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']}{";
	  //padding
	  if (isset($attr['Padding']) && is_array($attr['Padding'])){
		  $css .= $OBJ_STYLE ->dimensions('Padding', 'padding', 'Mobile');	
	  }
	  //margin
	  if (isset($attr['Margin']) && is_array($attr['Margin'])){
		  $css .= $OBJ_STYLE ->dimensions('Margin', 'margin', 'Mobile');
	  }
	  //z-index
	  $css .= isset( $attr['zindexMobile'] ) ? "z-index:{$attr['zindexMobile'] };" : '';
	  //border// border-radius//box shadow
	  $css .= $OBJ_STYLE->borderRadiusShadow('advBorder','advBorderRadius','advDropShadow','Mobile');
	  $css .="}";
      
	   /*******************/ 
        // slide option Mobile
		/*******************/ 

		if(isset($attr['swipeStartGapMobile'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel{";
			$swipeStartGapUnit = isset($attr['swipeStartGapUnit']) ? $attr['swipeStartGapUnit'] : 'px';
			$css .= "padding-left: {$attr['swipeStartGapMobile']}{$swipeStartGapUnit};";
			$css .="}";
		}
		
		if (isset($attr['swipeslideWidthMobile']) || isset($attr['swipeslideGapMobile'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .swipe-carousel .slide-item{";
			if (isset($attr['swipeslideWidthMobile'])) {
				$swipeslideWidthUnit = isset($attr['swipeslideWidthUnit']) ? $attr['swipeslideWidthUnit'] : 'px';
				$css .= "width: {$attr['swipeslideWidthMobile']}{$swipeslideWidthUnit};";
			}
			if (isset($attr['swipeslideGapMobile'])) {
				$swipeslideGapUnit = isset($attr['swipeslideGapUnit']) ? $attr['swipeslideGapUnit'] : 'px';
				$css .= "margin-right: {$attr['swipeslideGapMobile']}{$swipeslideGapUnit};";
			}
			$css .="}";
	    }

       /**************************/ 
        // slide navigation option
		/***************************/ 

		if(isset($attr['swipeNavSizeMobile'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button span{";
			$swipeNavSizeUnit = isset($attr['swipeNavSizeUnit']) ? $attr['swipeNavSizeUnit'] : 'px';
			$css .= "height: {$attr['swipeNavSizeMobile']}{$swipeNavSizeUnit};
			         width: {$attr['swipeNavSizeMobile']}{$swipeNavSizeUnit};
					 font-size:{$attr['swipeNavSizeMobile']}{$swipeNavSizeUnit};";
			$css .="}";
		}

		if(isset($attr['swipeNavPostionMobile'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.left{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "left: {$attr['swipeNavPostionMobile']}{$swipeNavPostionUnit};";
			$css .="}";
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button.right{";
			$swipeNavPostionUnit = isset($attr['swipeNavPostionUnit']) ? $attr['swipeNavPostionUnit'] : 'px';
			$css .= "right: {$attr['swipeNavPostionMobile']}{$swipeNavPostionUnit};";
			$css .="}";
		}

		$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .scroll-button{";
		$css .= $OBJ_STYLE->borderRadiusShadow('naviconsBorder','naviconsRadius','','Mobile');
		$css .="}"; 
	
		/**************************/ 
        // slide pagination option
		/***************************/ 
		if(isset($attr['swipePagiSizeMobile'])){
			$css .=".wp-block-vayu-blocks-swipe-slider.{$attr['uniqueId']} .pagination-container .pagination-dot{";
			$swipePagiSizeUnit = isset($attr['swipePagiSizeUnit']) ? $attr['swipePagiSizeUnit'] : 'px';
			$css .= "width:{$attr['swipePagiSizeMobile']}{$swipePagiSizeUnit};height: {$attr['swipePagiSizeMobile']}{$swipePagiSizeUnit};";
			$css .="}";
		}
	  $css .="}";


    }

    return $css;

}