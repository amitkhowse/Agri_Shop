<?php
class VAYU_BLOCKS_REGISTER_BLOCKS {

    public function __construct() {
       $this->register_blocks_init();
    }

    public function register_blocks_init() {

        $options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option(); // Fetch the options array
        $blocks_dir = VAYU_BLOCKS_DIR_PATH . '/public/build/block';
        // Define the block-specific render callbacks in an associative array
        $blocks_with_render_callbacks = array(
            'advance-heading' => array(
                'isActive'        => isset($options['heading']['isActive']) ? $options['heading']['isActive'] : 1,
                'render_callback' => 'vayu_blocks_advance_heading_render',
            ),
            'advance-button'=> array(
                'isActive'        => isset($options['button']['isActive']) ? $options['button']['isActive'] : 1,
                'render_callback' => '',
            ),
            'flip-box'      => array(
                'isActive'        => isset($options['flipBox']['isActive']) ? $options['flipBox']['isActive'] : 0,
                'render_callback' => 'vayu_blocks_flip_box_render',
            ),
            'advance-slider'=> array(
                'isActive'        => isset($options['advanceSlider']['isActive']) ? $options['advanceSlider']['isActive'] : 0,
                'render_callback' => 'vayu_blocks_advance_slider_render',
            ),
            'post-grid'     => array(
                'isActive'        => isset($options['postgrid']['isActive']) ? $options['postgrid']['isActive'] : 0,
                'render_callback' => 'post_grid_render',
            ),
            'image'         => array(
                'isActive'        => isset($options['image']['isActive']) ? $options['image']['isActive'] : 0,
                'render_callback' => 'vayu_block_image_render',
            ),
            'video'         => array(
                'isActive'        => isset($options['video']['isActive']) ? $options['video']['isActive'] : 0,
                'render_callback' => 'vayu_block_video_render',
            ),
            'icon'         => array(
                'isActive'        => isset($options['icon']['isActive']) ? $options['icon']['isActive'] : 0,
                'render_callback' => 'vayu_block_icon_render',
            ),
            'flip-wrapper'  => array(
                'isActive'        => 1, // Assuming always active for this block
                'render_callback' => 'vayu_blocks_flip_wrapper_render',
            ),
            'advance-query-loop'       => array(
                'isActive'        => isset($options['advanceQueryLoop']['isActive']) ? $options['advanceQueryLoop']['isActive'] : 1,
                'render_callback' => 'vayu_block_loop_render',
            ),
            'wrapper'       => array(
                'isActive'        => 1, // Assuming always active for this block
                'render_callback' => 'vayu_block_wrapper_render',
                'skip_inner_blocks' => true,
            ),
            'blurb'       => array(
                'isActive'        => isset($options['blurb']['isActive']) ? $options['blurb']['isActive'] : 1,
                'render_callback' => 'vayu_block_blurb_render',
                
            ),
            'unfold'       => array(
                'isActive'        => isset($options['unfold']['isActive']) ? $options['unfold']['isActive'] : 1,
                'render_callback' => 'vayu_block_unfold_render',
                
            ),
            'image-hotspot'       => array(
                'isActive'        => isset($options['imageHotspot']['isActive']) ? $options['imageHotspot']['isActive'] : 1,
                'render_callback' => 'vayu_blocks_render_image_hotspot_block',
            ),
            'pin'       => array(
                'isActive'        => 1, // Assuming always active for this block
                'render_callback' => 'vayu_block_pin_child_render',
            ),
            'timeline-child'  => array(
                'isActive'        => 1, // Assuming always active for this block
                'render_callback' => 'vayu_block_timeline_child_render',
            ),
            'advance-timeline'  => array(
                'isActive'        => isset($options['advanceTimeline']['isActive']) ? $options['advanceTimeline']['isActive'] : 0,
                'render_callback' => 'vayu_block_advance_timeline_render',
            ),
            'post-pagination'  => array(
                'isActive'        => isset($options['postPagination']['isActive']) ? $options['postPagination']['isActive'] : 1,
                'render_callback' => 'vayu_block_post_pagination_render',
            ),
            'swipe-slider'       => array(
                'isActive'        => isset($options['advanceSlider']['isActive']) ? $options['advanceSlider']['isActive'] : 1,
                'render_callback' => 'vayu_block_swipe_slider_render',
                
            ),
            'slide-item'       => array(
                'isActive'        => 1,
                'render_callback' => 'vayu_block_slide_item_render',
            ),
            
        );

        // Check if WooCommerce is active before adding the advance-product block
        if (class_exists('WooCommerce')) {
            $blocks_with_render_callbacks['advance-product'] = array(
                'isActive'        => isset($options['product']['isActive']) ? $options['product']['isActive'] : 1,
                'render_callback' => array( new Vayu_Advance_Product_Tab(), 'render_callback' ),
            );
        }
    
        foreach ( $blocks_with_render_callbacks as $block_name => $block_options ) {
            if ($block_options['isActive'] == 1) {
                $block_path = $blocks_dir . '/' . $block_name;

                
                if ( isset($block_options['skip_inner_blocks']) ) {
                    // If the block has additional options like 'skip_inner_blocks'
                    register_block_type(
                        $block_path,
                        array(
                            'render_callback'   => $block_options['render_callback'],
                            'skip_inner_blocks' => $block_options['skip_inner_blocks'],
                        )
                    );
                } else {
                    // Simple block with only a render callback
                    register_block_type(
                        $block_path,
                        array(
                            'render_callback' => $block_options['render_callback'],
                        )
                    );
                }
            }
        }
    }

}

function vayu_blocks_register_blocks() {
     new VAYU_BLOCKS_REGISTER_BLOCKS();

}
add_action( 'init', 'vayu_blocks_register_blocks' );