<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_cycle_through_blocks( $blocks, $post_id ) {
	$css = '';
	foreach ( $blocks as $block ) {
		if ( $block['blockName'] === 'vayu-blocks/advance-timeline' ) {
			$css .= generate_inline_advance_timeline_styles($block['attrs']);
		}

		if ( $block['blockName'] === 'vayu-blocks/post-grid' ) {
			$css .= generate_inline_post_styles($block['attrs']);
		}

		if ( $block['blockName'] === 'vayu-blocks/timeline-child' ) {
			$css .= generate_inline_timeline_child_styles($block['attrs']);
		}

		if ( $block['blockName'] === 'vayu-blocks/flip-wrapper' ) {
			$css .= generate_inline_flip_wrapper_styles($block['attrs']);
		}

	 	if ( $block['blockName'] === 'vayu-blocks/advance-slider' ) {
			$css .= generate_inline_slider_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/flip-box' ) {
			$css .= generate_inline_flip_box_styles($block['attrs']);
		} 
		
		if ( $block['blockName'] === 'vayu-blocks/image' ) {
			$css .= generate_inline_image_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/video' ) {
			$css .= generate_inline_video_styles($block['attrs']);
		} 
		
		if ( $block['blockName'] === 'vayu-blocks/icon' ) {
			$css .= generate_inline_icon_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-heading' ) {
	
            $css .= vayu_advance_heading_style($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-container' ) {
			
			 $css .= vayu_advance_container_style($block['attrs']);
	    } 

		if ( $block['blockName'] === 'vayu-blocks/advance-query-loop' ) {
			
			$css .= vayu_advance_loop_style($block['attrs']);
	   } 

	   if ( $block['blockName'] === 'vayu-blocks/blurb' ) {

		$css .= vayu_blurb_style($block['attrs']);

        } 

		if ( $block['blockName'] === 'vayu-blocks/unfold' ) {

			if ( isset($block['attrs']['fontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['fontFamily']);
			}
			
			$css .= vayu_unfold_style($block['attrs']);
	
		} 
		
		if ( $block['blockName'] === 'vayu-blocks/swipe-slider' ) {
			
			$css .= vayu_swiper_slider_style($block['attrs']);
	
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-product' ){

			if ( isset($block['attrs']['tabfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['tabfontFamily']);
			  }

			if ( isset($block['attrs']['catfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['catfontFamily']);
			  } 
			
			if ( isset($block['attrs']['titlefontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['titlefontFamily']);
			  }
			
			if ( isset($block['attrs']['pricefontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['pricefontFamily']);
			  }
			
			if ( isset($block['attrs']['buttonfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['buttonfontFamily']);
			  }

			$css .= vayu_advance_product_tab_style($block['attrs']);
	     } 

		if ( $block['blockName'] === 'vayu-blocks/advance-spacer' ) {
			 $css .= vayu_advance_spacer_style($block['attrs']);
	 	} 

		 if ( $block['blockName'] === 'vayu-blocks/advance-button' ) {

			if ( isset($block['attrs']['fontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['fontFamily']);
			  }

			 $css .= vayu_advance_button_style($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/pin' ) {

			 $css .= vayu_pin_child_style($block['attrs']);
		} 

		if ( ! empty( $block['innerBlocks'] ) ) {
			$inner_css = vayu_cycle_through_blocks( $block['innerBlocks'], $post_id );
			if ( $inner_css ) {
				$css .= $inner_css;
			}
		}

		if ( 'core/block' === $block['blockName'] && ! empty( $block['attrs']['ref'] ) ) {
			$reusable_block = get_post( $block['attrs']['ref'] );
			if ( ! $reusable_block || 'wp_block' !== $reusable_block->post_type ) {
				continue;
			}

			if ( 'publish' !== $reusable_block->post_status || ! empty( $reusable_block->post_password ) ) {
				continue;
			}

			$blocks = parse_blocks( $reusable_block->post_content );
			$inner_css = vayu_cycle_through_blocks( $blocks, $reusable_block->ID );
			if ( $inner_css ) {
				$css .= $inner_css;
			}
		}
	}

	return $css;
}