<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function vayu_block_unfold_render($attributes, $content, $block) {

    $is_unfolded = !empty($attributes['isUnfolded']);
    $unfold_content_template = $content;
    $fold_text = !empty($attributes['foldBtnTxt']) ? $attributes['foldBtnTxt'] : __('Fold', 'vayu-blocks');
    $unfold_text = !empty($attributes['unfoldBtnTxt']) ? $attributes['unfoldBtnTxt'] : __('UnFold', 'vayu-blocks');

    // Set the fold icon based on selectedFoldIcon attribute
    switch ($attributes['selectedFoldIcon'] ?? '') {
        case 'arrowUp':
            $fold_icon = '<span class="dashicons dashicons-arrow-up-alt"></span>';
            break;
        case 'arrowDown':
            $fold_icon = '<span class="dashicons dashicons-arrow-down-alt"></span>';
            break;
        case 'arrowLeft':
            $fold_icon = '<span class="dashicons dashicons-arrow-left-alt"></span>';
            break;
        case 'arrowRight':
            $fold_icon = '<span class="dashicons dashicons-arrow-right-alt"></span>';
            break;
        case 'chevronUp':
            $fold_icon = '<span class="dashicons dashicons-arrow-up"></span>'; // Custom choice for chevronUp
                break;
        case 'chevronDown':
            $fold_icon = '<span class="dashicons dashicons-arrow-down"></span>'; // Custom choice for chevronDown
                break;
        case 'chevronLeft':
            $fold_icon = '<span class="dashicons dashicons-arrow-left"></span>'; // Custom choice for chevronLeft
                break;
        case 'chevronRight':
            $fold_icon = '<span class="dashicons dashicons-arrow-right"></span>'; // Custom choice for chevronRight
                break;
        case 'chevronRightSmall':
            $fold_icon = '<span class="dashicons dashicons-arrow-right-alt2"></span>'; // Alt style for smaller chevron
                break;
        case 'chevronUpDown':
            $fold_icon = '<span class="dashicons dashicons-leftright"></span>'; // Custom icon for up/down
                break;
        default:
            $fold_icon = ''; // Default icon
    }

    // Set the unfold icon based on selectedUnFoldIcon attribute
    switch ($attributes['selectedUnFoldIcon'] ?? '') {
        case 'arrowUp':
            $unfold_icon = '<span class="dashicons dashicons-arrow-up-alt"></span>';
            break;
        case 'arrowDown':
            $unfold_icon = '<span class="dashicons dashicons-arrow-down-alt"></span>';
            break;
        case 'arrowLeft':
            $unfold_icon = '<span class="dashicons dashicons-arrow-left-alt"></span>';
            break;
        case 'arrowRight':
            $unfold_icon = '<span class="dashicons dashicons-arrow-right-alt"></span>';
            break;
        case 'chevronUp':
                $unfold_icon = '<span class="dashicons dashicons-arrow-up"></span>'; // Custom choice for chevronUp
                break;
        case 'chevronDown':
                $unfold_icon = '<span class="dashicons dashicons-arrow-down"></span>'; // Custom choice for chevronDown
                break;
        case 'chevronLeft':
                $unfold_icon = '<span class="dashicons dashicons-arrow-left"></span>'; // Custom choice for chevronLeft
                break;
        case 'chevronRight':
                $unfold_icon = '<span class="dashicons dashicons-arrow-right"></span>'; // Custom choice for chevronRight
                break;
        case 'chevronRightSmall':
                $unfold_icon = '<span class="dashicons dashicons-arrow-right-alt2"></span>'; // Alt style for smaller chevron
                break;
        case 'chevronUpDown':
                $unfold_icon = '<span class="dashicons dashicons-leftright"></span>'; // Custom icon for up/down
                break;
        default:
            $unfold_icon = ''; // Default icon
    }

    ob_start();
    ?>
    <div id="<?php echo esc_attr($attributes['uniqueId']);?>" <?php echo get_block_wrapper_attributes(); ?>>
        <div class="unfold-inner"
            style="cursor: <?php echo isset($attributes['contentShowEvent']) && in_array($attributes['contentShowEvent'], ['contentclick', 'contenthover']) ? 'pointer' : 'auto'; ?>;"
            data-content-show-event="<?php echo esc_attr(isset($attributes['contentShowEvent']) ? $attributes['contentShowEvent'] : ''); ?>"
            data-hide-unfold-button="<?php echo esc_attr(isset($attributes['hideUnfoldButton']) ? $attributes['hideUnfoldButton'] : ''); ?>"
            data-unfold-text="<?php echo esc_attr($unfold_text); ?>"
            data-fold-text="<?php echo esc_attr($fold_text); ?>"
            >
            <div class="vb-bg-unfold-full-button <?php echo esc_attr($is_unfolded) ? 'unfolded' : ''; ?>">
                <div class="unfold-content <?php echo esc_attr($is_unfolded) ? 'unfolded' : ''; ?>">
                    <?php echo $unfold_content_template; ?>
                </div>
            </div>

            <?php
if (
    ! (isset($attributes['hideUnfoldButton']) && $attributes['hideUnfoldButton']) ||
    (isset($attributes['contentShowEvent']) && $attributes['contentShowEvent'] === 'buttonclick')
) :
?>
                <div class="unfold-content-btn">
                <div class="unfold-button" 
                role="button"
                aria-expanded="<?php echo $is_unfolded ? 'true' : 'false'; ?>"
                style="cursor: pointer;"
                data-fold-text="<?php echo esc_attr($fold_text); ?>"
                data-unfold-text="<?php echo esc_attr($unfold_text); ?>">
                <span class="btn-fold-icon" style="display: <?php echo esc_attr($is_unfolded) ? 'inline-flex' : 'none'; ?>;">
                <?php echo $fold_icon; ?>
                </span>
                <span class="btn-unfold-icon" style="display: <?php echo esc_attr($is_unfolded) ? 'none' : 'inline-flex'; ?>;">
                    <?php echo $unfold_icon; ?>
                </span>
                <span class="btn-text">
                <?php echo esc_attr($is_unfolded) ? esc_attr($fold_text) : esc_attr($unfold_text); ?>
                </span>
            </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}