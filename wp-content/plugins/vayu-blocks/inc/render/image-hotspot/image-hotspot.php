<?php
function vayu_blocks_render_image_hotspot_block( $attributes, $content ) {
    // Extract attributes.
    $id = isset( $attributes['uniqueId'] ) ? esc_attr( $attributes['uniqueId'] ) : '';
    $class = isset( $attributes['className'] ) ? esc_attr( $attributes['className'] ) : 'vayu-hots-wrapper';
    $align = isset( $attributes['align'] ) ? esc_attr( $attributes['align'] ) : '';
    $class .= $align ? ' align' . $align : ''; // add alignment class if present

    // Start the output buffer.
    ob_start(); 
    ?>
    <div id="<?php echo $id; ?>" class="<?php echo $class; ?>">
        <?php echo $content; // Render the nested blocks (image and pin blocks). ?>
    </div>
    <?php
    return ob_get_clean();
}
