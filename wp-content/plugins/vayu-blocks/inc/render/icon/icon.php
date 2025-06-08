<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_icon {

    private $attr; //attributes

    public function __construct($attr) {
        $this->attr = $attr;
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering
        echo $this->render_icon();
        return ob_get_clean(); // Return the buffered output
    }

    //main container containing icon and overlay
    private function render_icon() {
        $attributes = $this->attr; // Access attributes
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
        $icon = isset($attributes['printedIcon']) ? $attributes['printedIcon'] : '';
        $icon_html = '';
        
        // Define the animation class map
        $animationClassMap = [
            "vayu_blocks_none_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-none-one-time",
            "without-hvr"=> "vayu-blocks-animation-icon-none-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-icon-none-with-hvr"
            ],
            "vayu_blocks_icon-bounce_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-icon-bounce-one-time",
            "without-hvr"=> "vayu-blocks-animation-icon-bounce-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-icon-bounce-with-hvr"
            ],
            "vayu_blocks_icon-bounce-left_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-icon-bounce-left-one-time",
            "without-hvr"=> "vayu-blocks-animation-icon-bounce-left-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-icon-bounce-left-with-hvr"
            ],
            "vayu_blocks_circleburst_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-circleburst-one-time",
            "without-hvr"=> "vayu-blocks-animation-circleburst-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-circleburst-with-hvr"
            ],
            "vayu_blocks_clipReveal_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-clipReveal-one-time",
            "without-hvr"=> "vayu-blocks-animation-clipReveal-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-clipReveal-with-hvr"
            ],
            "vayu_blocks_clipRevealTop_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-clipRevealTop-one-time",
            "without-hvr"=> "vayu-blocks-animation-clipRevealTop-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-clipRevealTop-with-hvr"
            ],
            "vayu_blocks_clipRevealBottom_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-clipRevealBottom-one-time",
            "without-hvr"=> "vayu-blocks-animation-clipRevealBottom-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-clipRevealBottom-with-hvr"
            ],
            "vayu_blocks_clipRevealRight_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-clipRevealRight-one-time",
            "without-hvr"=> "vayu-blocks-animation-clipRevealRight-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-clipRevealRight-with-hvr"
            ],
            "vayu_blocks_pulse_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-pulse-one-time",
            "without-hvr"=> "vayu-blocks-animation-pulse-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-pulse-with-hvr"
            ],
            "vayu_blocks_spin_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-spin-one-time",
            "without-hvr"=> "vayu-blocks-animation-spin-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-spin-with-hvr"
            ],
            "vayu_blocks_flip_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-flip-one-time",
            "without-hvr"=> "vayu-blocks-animation-flip-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-flip-with-hvr"
            ],
            "vayu_blocks_3dflip_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-3dflip-one-time",
            "without-hvr"=> "vayu-blocks-animation-3dflip-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-3dflip-with-hvr"
            ],
            "vayu_blocks_swing_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-swing-one-time",
            "without-hvr"=> "vayu-blocks-animation-swing-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-swing-with-hvr"
            ],
            "vayu_blocks_ripple_compoents_animation"=> [
            "one-time"=> "vayu-blocks-animation-ripple-one-time",
            "without-hvr"=> "vayu-blocks-animation-ripple-without-hvr",
            "with-hvr"=> "vayu-blocks-animation-ripple-with-hvr"
            ]
        ];

        if (!function_exists('getAnimationClass')) {
            function getAnimationClass($effectType, $imageselectedAnimation, $isClicked = false) {
                
                switch ($effectType) {
                    case 'always':
                        switch ($imageselectedAnimation) {
                            case 'shadow-pulse':
                                return 'vayu_blocks_shadow_pulse_animation';
                            case 'wave-pulse':
                                return 'vayu_blocks_wave_pulse_animation';
                            case 'color-pulse':
                                return 'vayu_blocks_color_pulse_animation';
                            case 'glow-pulse':
                                return 'vayu_blocks_glow_pulse_animation';
                            case 'shadow-expand':
                                return 'vayu_blocks_shadow_expand_animation';
                            case 'radial-glow':
                                return 'vayu_blocks_radial_glow_animation';
                            case 'ripple-wave':
                                return 'vayu_blocks_ripple_wave_animation';
                            case 'concentric':
                                return 'vayu_blocks_concentric_animation';
                            default:
                                return ''; // Return an empty string if no match
                        }
        
                    case 'onhvr':
                        switch ($imageselectedAnimation) {
                            case 'shadow-pulse':
                                return 'vayu_blocks_shadow_pulse_animation-on-hover';
                            case 'wave-pulse':
                                return 'vayu_blocks_wave_pulse_animation-on-hover';
                            case 'color-pulse':
                                return 'vayu_blocks_color_pulse_animation-on-hover';
                            case 'glow-pulse':
                                return 'vayu_blocks_glow_pulse_animation-on-hover';
                            case 'shadow-expand':
                                return 'vayu_blocks_shadow_expand_animation-on-hover';
                            case 'radial-glow':
                                return 'vayu_blocks_radial_glow_animation-on-hover';
                            case 'ripple-wave':
                                return 'vayu_blocks_ripple_wave_animation-on-hover';
                            case 'concentric':
                                return 'vayu_blocks_concentric_animation-on-hover';
                            default:
                                return ''; // Return an empty string if no match
                        }
        
                    case 'on-click':
                        if ($isClicked) {
                            switch ($imageselectedAnimation) {
                                case 'shadow-pulse':
                                    return 'vayu_blocks_shadow_pulse_animation';
                                case 'wave-pulse':
                                    return 'vayu_blocks_wave_pulse_animation';
                                case 'color-pulse':
                                    return 'vayu_blocks_color_pulse_animation';
                                case 'glow-pulse':
                                    return 'vayu_blocks_glow_pulse_animation';
                                case 'shadow-expand':
                                    return 'vayu_blocks_shadow_expand_animation';
                                case 'radial-glow':
                                    return 'vayu_blocks_radial_glow_animation';
                                case 'ripple-wave':
                                    return 'vayu_blocks_ripple_wave_animation';
                                case 'concentric':
                                    return 'vayu_blocks_concentric_animation';
                                default:
                                    return ''; // Return an empty string if no match
                            }
                        } else {
                            return ''; // Return empty if not clicked
                        }
        
                    default:
                        return ''; // Return an empty string if no effectType match
                }
            }
        }
        
        // Assuming $attributes is an array with 'iconAnimation' and 'animationsettings' keys
        $iconAnimation = $attributes['animationData']['infinite']['value'] ?? '';
        $animationsettings = $attributes['animationData']['infinite']['hovertype'] ?? 'without-hvr';

        // Get the animation class
        $iconAnimationClass = isset($animationClassMap[$iconAnimation][$animationsettings]) 
            ? $animationClassMap[$iconAnimation][$animationsettings] 
            : ''; // Default to empty string if no match found

        $hoverclasses = '';
        if ( ! empty( $attributes['advAnimation'] ) && ! empty( $attributes['advAnimation']['className'] ) ) {
            $hoverclasses = $attributes['advAnimation']['className'];
        }

        $type = $attributes['animationData']['background']['type'] ?? '';
        $value = $attributes['animationData']['background']['value'] ?? '';

        $containclass = '';
        if($value === 'two-wave'){

            if($type === 'onhvr'){
                $containclass = 'vayu_blocks-two-wave-con-hvr';
            }else{
                $containclass = 'vayu_blocks-two-wave-con';
            }
        }

        // If the icon is not empty and is a string
        if (!empty($icon)) {
            // Output the SVG string directly
        $icon_html .= '<div class="vb-icon-block-main-container ' . esc_attr($containclass) . ' ' . esc_attr( $hoverclasses ) . '">';

        $icon_html .= '<div class="vb-icon-animation ' . getAnimationClass($type, $value) . '"></div>';

               if (!empty($attributes['link']) && !empty($attributes['link']['url'])) {
                    $icon_html .= '<a 
                        href="' . $attributes['link']['url'] . '" 
                        id="' . (!empty($attributes['link']['id']) ? $attributes['link']['id'] : 'default-id') . '" 
                        title="' . (!empty($attributes['link']['title']) ? $attributes['link']['title'] : 'Default Title') . '" 
                        target="' . (!empty($attributes['link']['opensInNewTab']) && $attributes['link']['opensInNewTab'] ? '_blank' : '_self') . '" 
                        rel="' . (!empty($attributes['link']['opensInNewTab']) && $attributes['link']['opensInNewTab'] ? 'noopener noreferrer' : '') . '">';
                    $icon_html .= '<div class="vb-icon-front-svg ' . $iconAnimationClass . '">';
                    $icon_html .= $icon; // This is the SVG string
                    $icon_html .= '</div>';
                    $icon_html .= '</a>';
                } else {
                    $icon_html .= '<div class="vb-icon-front-svg ' . $iconAnimationClass . '">';
                    $icon_html .= $icon; // This is the SVG string
                    $icon_html .= '</div>';
                }

                if (!empty($attributes['icontextallow']) && !empty($attributes['icontxt'])) {
                    $icon_html .= '<div class="vb-icon-text';
                    $icon_html .= '">';
                    $icon_html .= '<text>' . esc_html($attributes['icontxt']) . '</text>';
                    $icon_html .= '</div>';
                }                

            $icon_html .= '</div>';
        }

        $animated = isset($attributes['className']) ? esc_attr($attributes['className']) : '';
        $classes = [];

        $classes[] = 'vayu-blocks-icon-main-container-' . $uniqueId;
        $classes[] = 'wp_block_vayu-blocks-icon-main';

        if ( isset($attributes['advWidth']['value']) && in_array($attributes['advWidth']['value'], ['fullwidth', 'customwidth']) ) {
            $classes[] = 'alignfull';
        }

        $final_class = implode( ' ', $classes );

        return '<div id="' . esc_attr( $uniqueId ) . '" ' . get_block_wrapper_attributes([
            'class' => $final_class
        ]) . '>' . $icon_html . '</div>';

    }
      
}

// Render callback for the block
function vayu_block_icon_render($attr) {

    $default_attributes = include('defaultattributes.php');

    $attr = array_merge($default_attributes, $attr);

    $icon = new Vayu_blocks_icon($attr);

    return $icon->render();

}