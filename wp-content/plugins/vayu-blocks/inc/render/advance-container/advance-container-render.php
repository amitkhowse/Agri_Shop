<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_blocks_advance_container_render($attributes, $content, $block) {

    $anchor_id      = !empty($attributes['anchor']) ? esc_attr($attributes['anchor']) : '';
	$unique_id      = !empty($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
    $tag_name       = !empty($attributes['containerHTMLTag']) ? esc_attr($attributes['containerHTMLTag']) : 'div';
    $className      = !empty($attributes['className']) ? esc_attr($attributes['className']) : '';
	$content_width  = !empty($attributes['contentWidthType']) ? esc_attr($attributes['contentWidthType']) : 'boxed';
    $animationCls   = !empty($attributes['advAnimation']['className']) ? esc_attr($attributes['advAnimation']['className']) : '';
	// Detect if current block is nested inside another vayu container block
	global $post;
	if ($post && $unique_id) {
		$parsed_blocks = parse_blocks($post->post_content);
		$parent_block = vayu_find_parent_block_by_unique_id($parsed_blocks, $unique_id);
	}
	// Build classes
	$classes = [
        'wp-block-vayu-blocks-advance-container',
        $unique_id,
        $parent_block ? 'vayu-container-child' : 'vayu-container-parent',
    ];

	// Only add alignfull if NO parent block exists
    if (!$parent_block && in_array($content_width, ['boxed', 'fullwidth'], true)) {
        $classes[] = 'alignfull';
    } elseif (!$parent_block && $content_width === 'alignwide') {
        $classes[] = 'alignwide';
    }

	switch ($content_width) {
		case 'fullwidth':
			$classes[] = 'fullwidth-content';
			break;
		case 'boxed':
			$classes[] = 'boxed-content';
			break;
		case 'alignwide':
			$classes[] = 'alignwide-content';
			break;
	}

    $classes[] = $animationCls;

    // Handle $className as a comma-separated string
    if (!empty($className)) {
        // Split the string by commas and trim each class
        $new_classes = array_map('trim', explode(',', $className));
        
        // Sanitize and validate each class name
        $new_classes = array_filter($new_classes, function($class) {
            // Remove invalid characters and ensure non-empty
            $sanitized = preg_replace('/[^a-zA-Z0-9-_]/', '', $class);
            return !empty($sanitized);
        });
        
        // Add sanitized classes to $classes
        $classes = array_merge($classes, $new_classes);
    }

	$container_class = esc_attr(implode(' ', array_filter($classes)));

    $inner_content_class = $content_width === 'fullwidth' ? 'vb-block-wrap' : 'th-inside-container th-con';

	$inside_content = sprintf(
        '<div class="%s">%s</div>',
        esc_attr( $inner_content_class ),
        $content
    );

	$shape_divider = vayu_th_shaper($attributes);

    $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attributes);

    $video_html = $OBJ_STYLE->renderVideo('advBackground');

    $id_attribute = $anchor_id ? sprintf( ' id="%s"', esc_attr( $anchor_id ) ) : '';

	return sprintf(
		'<%1$s %5$s class="%2$s">
            %6$s
			%3$s
			%4$s
		</%1$s>',
		$tag_name,
		$container_class,
		$shape_divider,
		$inside_content,
        $id_attribute,
        $video_html
	);
}

function vayu_find_parent_block_by_unique_id($blocks, $unique_id, $parent = null) {
	foreach ($blocks as $block) {
		if (
			isset($block['attrs']['uniqueId']) &&
			$block['attrs']['uniqueId'] === $unique_id
		) {
			return $parent;
		}

		if (!empty($block['innerBlocks'])) {
			$result = vayu_find_parent_block_by_unique_id($block['innerBlocks'], $unique_id, $block);
			if ($result !== null) {
				return $result;
			}
		}
	}
	
}
/**
 * Render ThShaper component equivalent for shape dividers.
 *
 * @param array $attributes Block attributes.
 * @return string HTML output.
 */
function vayu_th_shaper($attributes) {
    // Extract attributes with defaults
    $shapeTop        = !empty($attributes['shapeTop']) ? $attributes['shapeTop'] : 'default';
    $shapeBottom     = !empty($attributes['shapeBottom']) ? $attributes['shapeBottom'] : 'default';
    $shapeTopFlip    = !empty($attributes['shapeTopFlip']) ? $attributes['shapeTopFlip'] : false;
    $shapeBottomFlip = !empty($attributes['shapeBottomFlip']) ? $attributes['shapeBottomFlip'] : false;
    $shapeTopClr     = !empty($attributes['shapeTopClr']) ? $attributes['shapeTopClr'] : '#ffffff';
    $shapeBottomClr  = !empty($attributes['shapeBottomClr']) ? $attributes['shapeBottomClr'] : '#ffffff';

    // Build shape classes
    $shaper_top_classes = ['th-shape', 'th-shape-top'];
    if ($shapeTopFlip) {
        $shaper_top_classes[] = 'flip-top';
    }
    $shaper_bottom_classes = ['th-shape', 'th-shape-bottom'];
    if ($shapeBottomFlip) {
        $shaper_bottom_classes[] = 'flip-bottom';
    }

    // Start output buffering
    ob_start();

    // Render shaper only if top or bottom shape is not default
    if ($shapeTop !== 'default' || $shapeBottom !== 'default') {
        ?>
        <div class="th-shaper">
            <?php if ($shapeTop === 'triangle') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_top_classes, ['th-shap-1']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeTopClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,96L1440,0L1440,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>
            <?php if ($shapeBottom === 'triangle') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_bottom_classes, ['th-shap-1']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeBottomClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,96L1440,0L1440,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>

            <?php if ($shapeTop === 'curve') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_top_classes, ['th-shap-2']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeTopClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,0L120,48C240,96,480,192,720,192C960,192,1200,96,1320,48L1440,0L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>
            <?php if ($shapeBottom === 'curve') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_bottom_classes, ['th-shap-2']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeBottomClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,0L120,48C240,96,480,192,720,192C960,192,1200,96,1320,48L1440,0L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>

            <?php if ($shapeTop === 'wave') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_top_classes, ['th-shap-3']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeTopClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,128L40,144C80,160,160,192,240,186.7C320,181,400,139,480,112C560,85,640,75,720,74.7C800,75,880,85,960,106.7C1040,128,1120,160,1200,149.3C1280,139,1360,85,1400,58.7L1440,32L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>
            <?php if ($shapeBottom === 'wave') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_bottom_classes, ['th-shap-3']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" fill="<?php echo esc_attr($shapeBottomClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" d="M0,128L40,144C80,160,160,192,240,186.7C320,181,400,139,480,112C560,85,640,75,720,74.7C800,75,880,85,960,106.7C1040,128,1120,160,1200,149.3C1280,139,1360,85,1400,58.7L1440,32L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
                    </svg>
                </div>
            <?php endif; ?>

            <?php if ($shapeTop === 'mountain') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_top_classes, ['th-shap-4']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="<?php echo esc_attr($shapeTopClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                        <path class="th-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                        <path class="th-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                    </svg>
                </div>
            <?php endif; ?>
            <?php if ($shapeBottom === 'mountain') : ?>
                <div class="<?php echo esc_attr(implode(' ', array_merge($shaper_bottom_classes, [' interacts with th-shap-4']))); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="<?php echo esc_attr($shapeBottomClr); ?>" preserveAspectRatio="none">
                        <path class="th-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                        <path class="th-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                        <path class="th-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                    </svg>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    // Get the buffered output
    $output = ob_get_clean();

    return $output;
}