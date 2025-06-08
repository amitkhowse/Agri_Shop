<?php
if (!defined('ABSPATH')) {
    exit;
}
  
class Vayu_blocks_image {

    private $attr;
    private $content;

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start();

        if ( ! empty( $this->attr['duotone'] ) && count( $this->attr['duotone'] ) > 1 ) {
            echo $this->DuotoneFilters();
        }

        echo $this->render_image();
    
        return ob_get_clean();
    }

    private function render_image() {
        $attributes = $this->attr;
        $OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attributes);

        $uniqueId = $this->safe_attr($attributes, 'uniqueId');
        $animated = $this->safe_attr($attributes, 'className');
        $imageSrc = !empty($attributes['image']) ? esc_url($attributes['image']) : plugins_url('../../assets/img/no-image.png', __FILE__);
        $imageAlt = $this->safe_attr($attributes, 'imagealttext', 'Image ' . rand(1, 100));
        $imageHvrEffect  = $this->safe_attr($attributes, 'animationData.hovereffect.value');
        $imageHvrAnimation = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue');
        $imageHvrFilter  = $this->safe_attr($attributes, 'imagehvrfilter');
        $imagemaskshape  = ($this->safe_attr($attributes, 'animationData.mask.maskshape') !== 'none' && !empty($this->safe_attr($attributes, 'animationData.mask.maskshape'))) ? 'maskshapeimage' : '';
        $wrapperanimation = $this->safe_attr($attributes, 'animationData.effect.animationValue');
        $hover_type  = $this->safe_attr($attributes, 'animationData.imageAnimation.hover', 'without-hvr');
        $animation_value  = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue');
        
        $animation_classname = match ($hover_type) {
            'with-hvr'    => $animation_value . 'hvr',
            'one-time'    => $animation_value . 'onetime',
            'without-hvr' => $animation_value,
            default       => '',
        };

        $wrapperclasses = array_filter([
            'vb-image-wrapper',
            $imageHvrFilter,
            $imageHvrEffect,
            $animation_classname
        ], function($class) {
            return !empty($class) && $class !== 'none';
        });

        $image_html= '';
        
        $image_html = $OBJ_STYLE->renderVideo('advBackground');
        
        $image_html .= '<div class="vb-image-main-container vb-image-rotating-div">';

            if (!empty($attributes['link']) && !empty($attributes['link']['url'])) {
                $link_url     = esc_url($attributes['link']['url']);
                $link_id      = esc_attr(!empty($attributes['link']['id']) ? $attributes['link']['id'] : 'default-id');
                $link_title   = esc_attr(!empty($attributes['link']['title']) ? $attributes['link']['title'] : 'Default Title');
                $link_target  = !empty($attributes['link']['opensInNewTab']) ? '_blank' : '_self';
                $link_rel     = !empty($attributes['link']['opensInNewTab']) ? 'noopener noreferrer' : '';
            
                $image_html .= '<a href="' . $link_url . '" id="' . $link_id . '" title="' . $link_title . '" target="' . $link_target . '" rel="' . $link_rel . '">';
            }

            $image_html .= '<div class="vb-image-container ' . $wrapperanimation . ' ' . ( !empty($attributes['contentani']) ? 'vb-start-cont-ani' : '' ) . ' " id='. $uniqueId .'>';
            
                $image_html .= '<div class="' . esc_attr(implode(' ', $wrapperclasses)) . '">';
                
                    if ($attributes['typeimage'] === 'image') {

                        $image_html .= '<img 
                            src="' . $imageSrc . '" 
                            alt="' . $imageAlt . '" 
                            class="vb-image-tag ' . $imageHvrEffect . ' ' . $imageHvrFilter . ' '. $imagemaskshape .'" 
                        />';
                    }

                    if (!empty($attributes['overlayshow']) || !empty($attributes['frameshow'])) {
                        $image_html .= $this->overlay();
                    }

                $image_html .= '</div>';

                if (!empty($attributes['link']) && !empty($attributes['link']['url'])) {
                    $image_html .= '</a>';
                }

            $image_html .= '</div>';
        $image_html .= '</div>';

        if (!empty($attributes['caption'])) {
            $image_html .= '<div class="vb-image-caption">';
                $image_html .= '<p class="vb-image-caption-text">';
                    $image_html .= esc_html($attributes['captiontext']); 
                $image_html .= '</p>';
            $image_html .= '</div>';
        }
        
        $classhover='';
        if (isset($attributes['animationData']['effect']['effectHover']) && $attributes['animationData']['effect']['effectHover']) {
            $classhover = 'vayu-blocks-image-hover';
        }
        
        $classes = [ 'vayu-blocks-image-main-container' . $uniqueId ];

        if (!empty($classhover)) {
            $classes[] = $classhover;
        }
        
        if (!empty($animated) && $animated !== 'none') {
            $classes[] = $animated;
        }

        if ( ! empty( $attributes['advAnimation'] ) && ! empty( $attributes['advAnimation']['className'] ) ) {
            $classes[] = $attributes['advAnimation']['className'];
        }
                
        $finalClass = implode(' ', $classes);
        
        return '<div id="' . esc_attr($uniqueId) . '" ' . get_block_wrapper_attributes([
            'class' => $finalClass
        ]) . '>' . $image_html . '</div>';
        
    }
    
    private function overlay() {
        $attributes = $this->attr;
        $overlay = '';
        $imageHvrEffect     = $this->safe_attr($attributes, 'animationData.hovereffect.value');
        $imageHvrAnimation  = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue');
        $overlaywrapper     = $this->safe_attr($attributes, 'overlaywrapper');
        $hover              = $this->safe_attr($attributes, 'animationData.imageAnimation.hover');
        $animationValue     = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue');

        $animation_classname = match ($hover) {
            'with-hvr'  => $animationValue . 'hvr',
            'one-time'  => $animationValue . 'onetime',
            'without-hvr' => $animationValue,
            default     => ''
        };
        
        $wrapperanimation = '';
        if (isset($attributes['animationData']['effect']['animationValue']) && $attributes['animationData']['effect']['animationValue'] === 'vayu_block_styling-effect7') {
            $wrapperanimation = 'vayu_block_styling-overlay-effect';
        }
        
        $imagemaskshape = isset($attributes['animationData']['mask']['maskshape']) && $attributes['animationData']['mask']['maskshape'] !== 'none' ? 'maskshapeimage' : '';

        $classes = array_filter([
            'vb-image-overlay-wrapper',
            $wrapperanimation,
            $overlaywrapper,
            $imageHvrEffect,
            $imagemaskshape
        ], function($class) {
            return !empty($class) && $class !== 'none';
        });
        
        $overlay .= '<div class="' . esc_attr(implode(' ', $classes)) . '">';

            if(!empty($attributes['overlayshow'])){
                $overlay .= $this->content;
            }

        $overlay .= '</div>';
    
        return $overlay;
    }

    private function safe_attr($array, $keyPath, $default = '') {
        $value = $array;
        foreach (explode('.', $keyPath) as $key) {
            if (!isset($value[$key])) return $default;
            $value = $value[$key];
        }
        return esc_attr($value);
    }

    private function hexToRGBArray($color) {
        if (strpos($color, '#') === 0) {
            $r = hexdec(substr($color, 1, 2)) / 255;
            $g = hexdec(substr($color, 3, 2)) / 255;
            $b = hexdec(substr($color, 5, 2)) / 255;
        
            return [
                number_format($r, 2, '.', ''),
                number_format($g, 2, '.', ''),
                number_format($b, 2, '.', '')
            ];
        } elseif (strpos($color, 'rgb') === 0) {
            preg_match_all('/\d+/', $color, $matches);
            $rgb = array_map(function ($val) {
                return number_format(intval($val) / 255, 2);
            }, array_slice($matches[0], 0, 3)); // only first 3 values (r,g,b)

            return $rgb;
        }

        return ['0.00', '0.00', '0.00']; // fallback
    }
    
    private function DuotoneFilters() {
        $attributes = $this->attr; 
        $duotone = isset($attributes['duotone']) ? $attributes['duotone'] : array();
    
        if (!is_array($duotone) || count($duotone) !== 2) {
            return null;
        }

        list($r1, $g1, $b1) = $this->hexToRGBArray($duotone[0]);
        list($r2, $g2, $b2) = $this->hexToRGBArray($duotone[1]);
    
        return <<<SVG
            <div class="vayu-blocks-duotone">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    "<filter id="duotone-filter-{$attributes['uniqueId']}">"
                        <feColorMatrix
                            type="matrix"
                            values="0.33 0.33 0.33 0 0
                                    0.33 0.33 0.33 0 0
                                    0.33 0.33 0.33 0 0
                                    0 0 0 1 0"
                        />
                        <feComponentTransfer colorInterpolationFilters="sRGB">
                            <feFuncR type="table" tableValues="{$r1} {$r2}" />
                            <feFuncG type="table" tableValues="{$g1} {$g2}" />
                            <feFuncB type="table" tableValues="{$b1} {$b2}" />
                            <feFuncA type="table" tableValues="0 1" />
                        </feComponentTransfer>
                    </filter>
                </svg>
            </div>
        SVG;
    }

}

function vayu_block_image_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);

    // Initialize the image with the merged attributes
    $image = new Vayu_blocks_image($attr,$content);

    return $image->render();
    
} 