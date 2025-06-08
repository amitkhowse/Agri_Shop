<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
 } 

 function vayu_block_slide_item_render($attributes, $content, $block){
    $classnames = 'slide-item';
    $wrapper_attributes = get_block_wrapper_attributes( array( 'class' => trim( $classnames ) ) );
        return sprintf(
            '<div %1$s>%2$s</div>',
            $wrapper_attributes,
            $content
        );
 }