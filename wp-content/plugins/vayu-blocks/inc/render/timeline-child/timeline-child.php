<?php
if (!defined('ABSPATH')) {
    exit;
}
     
class Vayu_blocks_timeline_child {

    private $attr;

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    public function render() {
        ob_start(); 
        echo $this->render_timeline_child();
        return ob_get_clean();
    }

    private function render_timeline_child() {
        $attr = $this->attr;
        $content = $this->content;

        $get_attr = function($key, $default = '') use ($attr) {
            return isset($attr[$key]) ? $attr[$key] : $default;
        };

        $uniqueId     = esc_attr($get_attr('uniqueId'));
        $layout       = $get_attr('layout_child');
        $blockIndex   = (int) esc_html($get_attr('blockIndex_child', 0));
        $printedIcon  = htmlspecialchars_decode($get_attr('printedIcon_child', ''));

        if($attr['iconglobal']){
            $printedIcon= htmlspecialchars_decode($get_attr('printedIcon', ''));;
        }

        $connector    = $get_attr('connector', false);
        $isLastBlock  = $get_attr('isLastBlock', false);
        $animated     = $get_attr('animated', '');

        $isEvenIndex = $blockIndex % 2 === 0;

        $classes = [ 'vb-timeline-child' . $uniqueId ];
        if (!empty($animated) && $animated !== 'none') {
            $classes[] = esc_attr($animated);
        }
        $finalClass = implode(' ', $classes);

        $layoutClassData = $this->get_layout_classes($layout, $isEvenIndex);
        $html  = '';

        if (preg_match('/^layout-([1-6])$/', $layout)) {
            $html .= '<div class="vb-relative-child">';
        }
        // Content and icon rendering
        $html  .= '<article class="' . esc_attr($layoutClassData['layoutClass']) . '">';
            $html .= '<div class="' . esc_attr($layoutClassData['innerLayoutClass']) . '">';
                $html .= $content;
            $html .= '</div>';

            $html .= '<div class="vb-timeline-icon vayu_blocks-timeline__parent">';
                $html .= '<div class="vb-timeline-icon-marker vayu_blocks-timeline__marker">';
                $html .= $printedIcon;
            $html .= '</div></div></article>';
            // Connector
            if (!$isLastBlock && $connector) {
                $connectorClass = $this->get_connector_class($layout);
                if ($connectorClass) {
                    $html .= '<div class="vb-connetor-child ' . esc_attr($connectorClass) . '"></div>';
                }
            }
        if (preg_match('/^layout-([1-6])$/', $layout)) {
            $html .= '</div>';
        }

        return '<div id="' . esc_attr($uniqueId) . '" ' . get_block_wrapper_attributes([
            'class' => $finalClass,
        ]) . '>' . $html . '</div>';
    }

    private function get_layout_classes($layout, $isEvenIndex) {
        $layoutClass = '';
        $innerLayoutClass = '';

        if (in_array($layout, ['layout-1', 'layout-2', 'layout-3', 'layout-4'], true)) {
            $layoutClass = 'vb-timeline-icom-main-layout-1-4 vb-timeline-layout-main-1-4';
            if ($layout === 'layout-2' || ($layout === 'layout-3' && $isEvenIndex) || ($layout === 'layout-4' && !$isEvenIndex)) {
                $layoutClass .= ' vb-direction-layout-2';
            }
            $innerLayoutClass = 'vb-timeine-layout-1-4';
        } elseif (in_array($layout, ['layout-5', 'layout-6'], true)) {
            $layoutClass = 'vb-timeline-icom-main-layout-5-6';
            if ($layout === 'layout-5') {
                $layoutClass .= ' vb-direction-layout-5';
            }
            $innerLayoutClass = 'vb-timeine-layout-5-6';
        } elseif (in_array($layout, ['layout-7', 'layout-8'], true)) {
            $layoutClass = 'vb-timeline-icom-main-layout-7-8';
            if ($layout === 'layout-8') {
                $layoutClass .= ' vb-timeline-layout-8-main';
            }
            $innerLayoutClass = 'vb-timeine-layout-7-8';
        } elseif (in_array($layout, ['layout-11', 'layout-12'], true)) {
            $layoutClass = 'vb-timeline-icom-main-layout-11-12';
            if ($layout === 'layout-12') {
                $layoutClass .= ' vb-timeline-layout-12-main';
            }
            $innerLayoutClass = 'vb-timeine-layout-11-12';
        }

        return [
            'layoutClass' => $layoutClass,
            'innerLayoutClass' => $innerLayoutClass,
        ];
    }

    private function get_connector_class($layout) {
        $map = [
            'vb-connetor-7-11'   => ['layout-7', 'layout-9', 'layout-10','layout-8'],
            'vb-connetor-7-11 vb-connetor-11' => ['layout-11'],
            'vb-connetor-8-12'   => [ 'layout-12'],
            'vb-connetor-1-3-4'  => ['layout-1', 'layout-3', 'layout-4'],
            'vb-connetor-2'      => ['layout-2'],
            'vb-connetor-5'      => ['layout-5'],
            'vb-connetor-5-6'    => ['layout-6'],
        ];

        foreach ($map as $class => $layouts) {
            if (in_array($layout, $layouts, true)) {
                return $class;
            }
        }

        return '';
    }
         
}

// Render callback for the block
function vayu_block_timeline_child_render($attr,$content) {

    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);
    $timeline_child = new Vayu_blocks_timeline_child($attr,$content);
    
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';

    $animated = isset($attr['className']) ? esc_attr($attr['className']) : '';

    return $timeline_child->render();
}