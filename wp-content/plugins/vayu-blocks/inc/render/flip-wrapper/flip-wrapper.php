<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_front_image {

    private $attr; //attributes
    private $content;

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering
        echo $this->render_image();
        return ob_get_clean(); // Return the buffered output
    }

    //main container containing image and innerblocks
    private function render_image() {
        $attributes = $this->attr; // Access attributes
        $image_html = '';
        $animated = isset($attributes['className']) ? esc_attr($attributes['className']) : ''; // animation
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';

        $image_html .= '<div class="vayu_blocks_front_image_wrapper-for-front" id='. $uniqueId .'>';          
                $image_html .= $this->content;
        $image_html .= '</div>';
    
        return '<div class="vb-flip-innerblock-' . $uniqueId . ' ' . $animated . '">' . $image_html . '</div>';
    }
    
}

// Render callback for the block
function vayu_blocks_flip_wrapper_render($attr,$content) {
    $default_attributes = include('defaultattributes.php');

    $attr = array_merge($default_attributes, $attr);

    $image = new Vayu_blocks_front_image($attr,$content);
    
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';

    // Render and return the image output inside a div with the dynamic class name
    return '<div class="wp_block_vayu-blocks-front-image-main ' . $className . '">' . $image->render() . '</div>';
}

