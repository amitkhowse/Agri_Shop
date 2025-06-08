<?php
if (!defined('ABSPATH')) {
    exit;
}
     
class Vayu_blocks_advance_timeline {

    private $attr;

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start();
        echo $this->render_advance_timeline();
        return ob_get_clean();
    }

    private function render_advance_timeline() {
        $attributes = $this->attr;
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
        $content = $this->content;
        $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';
        $animated = isset($attributes['className']) ? esc_attr($attributes['className']) : '';
        $timelinelayout = isset($attributes['timelinelayout']) ? esc_attr($attributes['timelinelayout']) : '';
        $layoutclass = '';
        $advance_timeline_html = '';
        $classnametouch ='';
        $classnametouch = ($attributes['touch'] !== 'scroll') ? 'vayu_blocks_touch_class' : '';

        $classes = [ 'vb-timeline-' . $uniqueId . ' ' . esc_attr($classnametouch) ];
        if (!empty($animated) && $animated !== 'none') $classes[] = $animated;
        if ( ! empty( $attributes['advAnimation'] ) && ! empty( $attributes['advAnimation']['className'] ) ) {
            $classes[] = $attributes['advAnimation']['className'];
        }
        $finalClass = implode(' ', $classes);

        if (in_array($timelinelayout, ['layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'])) {
            $layoutclass = 'vayu-blocks-laytout-7-advance-timeline';
        }

        $advance_timeline_html .= '<div class="vayu_blocks_advance-timeline_block_main ' . esc_attr($layoutclass) . '" id="' . $uniqueId . '">';

            $advance_timeline_html .= $content;

        $advance_timeline_html .= '</div>';

        
        return '<div id="' . esc_attr($uniqueId) . '" ' . get_block_wrapper_attributes([
            'class' => $finalClass
        ]) . '>' . $advance_timeline_html . '</div>';        
        
    }
      
}

function vayu_block_advance_timeline_render($attr,$content) {

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);
    $advance_timeline = new Vayu_blocks_advance_timeline($attr,$content);

    return $advance_timeline->render();
}