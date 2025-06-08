<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_image_flip {

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
        $innerclass = '';


        if(isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'flip') {
            if (isset($attributes['flipside']) && $attributes['flipside'] === 'right') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-front';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'left') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-front-left';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'top') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-back';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'bottom') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-back-bottom';
            }
        } elseif (isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'flip-z') {
            $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-z';
        } elseif (isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'flip-x') {
            $innerclass = 'vayu_blocks_flip-box-inner_animation_div_flip-x';
        } elseif (isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'zoom-in') {
            $innerclass = 'vayu_blocks_flip-box-inner_animation_div_zoom-in';
        } elseif (isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'zoom-out') {
            $innerclass = 'vayu_blocks_flip-box-inner_animation_div_zoom-out';
        } elseif (isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'fade-in') {
            $innerclass = 'vayu_blocks_flip-box-inner_animation_div_fade-in';
        } else if(isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'slide') {
            if (isset($attributes['flipside']) && $attributes['flipside'] === 'right') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_slide_animation-right';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'left') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_slide_animation-left';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'top') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_slide_animation-top';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'bottom') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_slide_animation-bottom';
            }
        } else if(isset($attributes['imagehvreffect']) && $attributes['imagehvreffect'] === 'push') {
            if (isset($attributes['flipside']) && $attributes['flipside'] === 'right') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_push_animation-right';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'left') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_push_animation-left';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'top') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_push_animation-top';
            } elseif (isset($attributes['flipside']) && $attributes['flipside'] === 'bottom') {
                $innerclass = 'vayu_blocks_flip-box-inner_animation_div_push_animation-bottom';
            }
        }

        // Assuming $attributes is already defined and contains 'dbox' and 'imagehvreffect'
        if ($attributes['dbox'] && !($attributes['imagehvreffect'] === 'zoom-in' || 
                                    $attributes['imagehvreffect'] === 'zoom-out' || 
                                    $attributes['imagehvreffect'] === 'fade-in'|| 
                                    $attributes['imagehvreffect'] === 'slide'|| 
                                    $attributes['imagehvreffect'] === 'push')) {
                                     
            $innerclass .= '-dbox'; // Append '-dbox' if conditions are met
        }

        $image_html .= '<div class="vb-flip-box-wrapper" id='. $uniqueId .'>';
            $image_html .= '<div class="vb-flip-box-front-inner ' . $innerclass . '" >';            
                $image_html .= $this->content;
            $image_html .= '</div>';
        $image_html .= '</div>';

       $classes = [];

        if ( ! empty( $attributes['advAnimation']['className'] ) ) {
            $classes[] = $attributes['advAnimation']['className'];
        }

        $classes[] = 'vb-flip-' . $uniqueId;

        return '<div ' . get_block_wrapper_attributes([
            'class' => implode( ' ', $classes ),
        ]) . '>' . $image_html . '</div>';

    }
    
}

// Render callback for the block
function vayu_blocks_flip_box_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);

    // Initialize the image with the merged attributes
    $image = new Vayu_blocks_image_flip($attr,$content);
    
    return $image->render();
           
}

