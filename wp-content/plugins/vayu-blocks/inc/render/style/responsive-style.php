<?php
$options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option();
define('VAYU_BLOCKS_GLOBAL_SETTINGS', $options['global']);

class VAYUBLOCKS_RESPONSIVE_STYLE{

    public static $attribute = array();

    public function __construct($attr){
        self::$attribute = $attr;

    }

    function border($borderData, $mainBorder = []) {
        $value = isset($borderData) ? $borderData : [];
        $valueHover = isset($mainBorder) ? $mainBorder : [];

    
        if (empty($value)) {
            return ""; // Return empty string if no border styles exist
        }
    
        // Generate full border property if 'width' exists
        $borderParts = array_filter([
            isset($value['width']) ? $value['width'] : (isset($valueHover['width']) ? $valueHover['width'] : null),
            isset($value['style']) ? $value['style'] : (isset($valueHover['style']) ? $valueHover['style'] : null),
            isset($value['color']) ? $value['color'] : (isset($valueHover['color']) ? $valueHover['color'] : null),
        ]);
    
        $css = "";
        
        if (isset($value['top'])) {
            foreach ($value as $side => $val) {
                $css .= sprintf(
                    "border-%s: %s;\n",
                    $side,
                    implode(" ", array_filter([
                        isset($val['width']) ? $val['width'] : (isset($valueHover[$side]['width']) ? $valueHover[$side]['width'] : null),
                        isset($val['style']) ? $val['style'] : (isset($valueHover[$side]['style']) ? $valueHover[$side]['style'] : null),
                        isset($val['color']) ? $val['color'] : (isset($valueHover[$side]['color']) ? $valueHover[$side]['color'] : null),
                    ]))
                );
            }
        } else {
            if (!empty($borderParts)) {
                $css .= "border: " . implode(" ", $borderParts) . ";\n";
            }
        }
    
        return trim($css); // Remove extra whitespace
    }
    
    function borderRadius($radiusData, $radiusDataHover = []) {

        $borderRadius = isset($radiusData) ? $radiusData : [];
        $borderRadiusHover = isset($radiusDataHover) ? $radiusDataHover : [];

        if (empty($borderRadius)) {
            // If object is empty, return default empty array
            return [];
        }
    
       
        if (isset($borderRadius['width'])) {
            return "border-radius: " . $borderRadius['width'] . ";";
        }
    
        $styles = [
            "border-top-left-radius" => $borderRadius['topLeft'] ?? $borderRadiusHover['topLeft'] ?? "0px",
            "border-top-right-radius" => $borderRadius['topRight'] ?? $borderRadiusHover['topRight'] ?? "0px",
            "border-bottom-right-radius" => $borderRadius['bottomRight'] ?? $borderRadiusHover['bottomRight'] ?? "0px",
            "border-bottom-left-radius" => $borderRadius['bottomLeft'] ?? $borderRadiusHover['bottomLeft'] ?? "0px",
        ];

            // Convert array to CSS string
        $css = "";
        foreach ($styles as $property => $value) {
            $css .= $property . ": " . $value . "; ";
        }

        return trim($css);

    }

    function boxShadow($boxshadow) {

        return 'box-shadow:'.$boxshadow['css'].';';
    }

    function borderRadiusShadow($border, $radius, $shadow, $device = 'Desktop', $hover = '', $pre = 'Hover') {
        $style = '';
    
        // Determine if we're in hover state
        $isHover = ($hover === 'Hover');
    
        // Border
        $borderValue = $isHover && isset(self::$attribute[$border . $pre][$device])
            ? self::$attribute[$border . $pre][$device]
            : (self::$attribute[$border][$device] ?? null);
    
        if ($borderValue) {
            $style .= $this->border($borderValue);
        }
    
        // Border Radius
        $radiusValue = $isHover && isset(self::$attribute[$radius . $pre][$device])
            ? self::$attribute[$radius . $pre][$device]
            : (self::$attribute[$radius][$device] ?? null);
    
        if ($radiusValue) {
            $style .= $this->borderRadius($radiusValue);
        }
    
        // Box Shadow
        $shadowKey = $isHover ? $shadow . $pre : $shadow;
        $shadowValue = self::$attribute[$shadowKey][$device] ?? null;
    
        if (
            $shadowValue &&
            isset($shadowValue['elements']['elevation']) &&
            $shadowValue['elements']['elevation'] !== 'none'
        ) {
            $fallbackValue = self::$attribute[$shadow][$device] ?? null;
            $style .= $this->boxShadow($shadowValue, $fallbackValue);
        }
    
        return $style;
    }

    function _depricateborderRadiusShadow($border,$radius,$shadow,$device='Desktop',$hover='',$pre='Hover'){   

        $style = ''; 

        if(isset(self::$attribute[$border][$device]) || isset(self::$attribute[$border.$pre][$device])){
            $style .= $hover==='Hover' && isset(self::$attribute[$border.$pre][$device])? $this->border(self::$attribute[$border.$pre][$device] ,self::$attribute[$border][$device]):$this->border(self::$attribute[$border][$device]);
        }
        if(isset(self::$attribute[$radius][$device]) || isset(self::$attribute[$radius.$pre][$device])){
            $style .= $hover==='Hover' && isset(self::$attribute[$radius.$pre][$device]) ? $this->borderRadius(self::$attribute[$radius.$pre][$device],self::$attribute[$radius][$device]):$this->borderRadius(self::$attribute[$radius][$device]);
        }
        if(isset(self::$attribute[$shadow][$device]) || isset(self::$attribute[$shadow.$pre][$device])){
            if(
                ($hover === 'Hover' && isset(self::$attribute[$shadow . $pre][$device]['elements']['elevation']) && self::$attribute[$shadow . $pre][$device]['elements']['elevation'] !== 'none') ||
                ($hover !== 'Hover' && isset(self::$attribute[$shadow][$device]['elements']['elevation']) && self::$attribute[$shadow][$device]['elements']['elevation'] !== 'none')
            ){
                 $style .= $hover==='Hover' && isset(self::$attribute[$shadow.$pre][$device]) ? $this->boxShadow(self::$attribute[$shadow.$pre][$device],self::$attribute[$shadow][$device]):$this->boxShadow(self::$attribute[$shadow][$device]);
            }
        }
        return $style;
    }

    function handleValue($val) {
        if (is_string($val)) {
            // If the value is a pixel value (e.g., "8px")
            if (preg_match('/^\d+px$/', $val)) {
                return $val; // Return the value as-is if it's in pixel format
            }
    
            // Check if the value starts with 'var:preset|'
            if (strpos($val, 'var:preset|') === 0) {
                $parts = explode('|', $val); // Split the string by '|'
                
                if (count($parts) === 3) {
                    $presetType = $parts[1];  // e.g., 'padding'
                    $presetKey = $parts[2];   // e.g., '30'
                    
                    // Format the value dynamically as per your requirement
                    return "var(--wp--{$presetType}-{$presetKey})";
                }
            }
        }
    
        return $val; // Return the value as-is if it's not recognized
    }
    
    function dimensions($dimensions, $type = 'padding', $device = 'Desktop',$blocks = false) {
        if(isset(self::$attribute[$dimensions][$device]) && empty(self::$attribute[$dimensions][$device])){

            if($blocks==='container'){
                return;
            }
            return $type.": 0;";
        }
        $dim = self::$attribute[$dimensions][$device] ?? null;
        if ($dim && isset($dim['top'], $dim['right'], $dim['bottom'], $dim['left'])) {
            return "$type: " . self::handleValue($dim['top']) . " " . self::handleValue($dim['right']) . " " . self::handleValue($dim['bottom']) . " " . self::handleValue($dim['left']) . ";";
        }

        $css = "";
        if (isset($dim['top'])) {

            $css .= "$type-top: " . self::handleValue($dim['top']) . ";";

            if(!isset($dim['bottom'])){
                $css .= "$type-bottom: 0;";
            }
        }
        if (isset($dim['right'])) {
            $css .= "$type-right: " . self::handleValue($dim['right']) . ";";
        }
        if (isset($dim['bottom'])) {
            $css .= "$type-bottom: " . self::handleValue($dim['bottom']) . ";";

            if(!isset($dim['top'])){
                $css .= "$type-top: 0;";
            }
        }
        if (isset($dim['left'])) {
            $css .= "$type-left: " . self::handleValue($dim['left']) . ";";
        }
        
        return $css;
    }

    function borderFrame($frameData, $device = 'Desktop') {
        $style = '';
    
        // Global function bana do ya class ke andar ek method use karo
        if (!function_exists('add_unit_if_needed')) {
            function add_unit_if_needed($value) {
                if (empty($value)) {
                    return '0px';
                }
            
                if (preg_match('/(px|%|em|vh|vw|rem)$/', $value)) {
                    return esc_attr($value);
                }
            
                return esc_attr($value) . 'px';
            }
        }
    
        // Data check
        if (!empty(self::$attribute[$frameData])) {
            $frame = self::$attribute[$frameData];
    
            // Border Radius check & apply
            if (!empty($frame['radius'][$device])) {
                $style .= $this->borderRadius($frame['radius'][$device]);
            }
    
            // Border Color
            if ($frame['active'] === 'color' && isset($frame['border']) && method_exists($this, 'border')) {
                $style .= $this->border($frame['border'][$device]);
            }
            // Gradient Border
            elseif ($frame['active'] === 'gradient' && isset($frame['gradient'])) {
                $border_width = implode(" ", [
                    add_unit_if_needed($frame['gradient']['width'][$device]['top'] ?? '0'),
                    add_unit_if_needed($frame['gradient']['width'][$device]['right'] ?? '0'),
                    add_unit_if_needed($frame['gradient']['width'][$device]['bottom'] ?? '0'),
                    add_unit_if_needed($frame['gradient']['width'][$device]['left'] ?? '0')
                ]);
    
                $style .= "border-style: solid; border-width: $border_width; border-image: " . esc_attr($frame['gradient']['color']) . " 30% / 1 / 0 stretch;";
            }
            // Image Border
            elseif ($frame['active'] === 'image' && isset($frame['image'])) {
                $borderImage = sprintf(
                    'url(%s) %s%% / %s %s %s %s / %s %s',
                    esc_url($frame['image']['url'] === 'custom' ? $frame['image']['customImage'] : $frame['image']['url']),
                    esc_attr(is_array($frame['image']['size'][$device] ?? '') ? '' : ($frame['image']['size'][$device] ?? '')),
                    add_unit_if_needed($frame['image']['width'][$device]['top'] ?? '0'),
                    add_unit_if_needed($frame['image']['width'][$device]['bottom'] ?? '0'),
                    add_unit_if_needed($frame['image']['width'][$device]['left'] ?? '0'),
                    add_unit_if_needed($frame['image']['width'][$device]['right'] ?? '0'),
                    add_unit_if_needed($frame['image']['place'][$device] ?? ''),
                    esc_attr($frame['image']['type'])
                );
    
                $style .= "border-image: $borderImage;";
                $opacity = isset($frame['image']['opacity']) && $frame['image']['opacity'] !== '' ? $frame['image']['opacity'] : 0.5;
                $style .= "opacity: $opacity;";

            }
        }
    
        return trim($style);
    }   

    function background($backgroundkey) {
        $style = '';
        $background = self::$attribute[$backgroundkey];
        $type = isset($background['type']) && $background['type'] !== '' ? $background['type'] : 'color';
    
        if ($type === 'color' && !empty($background['color'])) {
            $style .= "background: {$background['color']};";
        }
    
        if ($type === 'gradient' && !empty($background['gradient'])) {
            $style .= "background: {$background['gradient']};";
        }
    
        if ($type === 'media' && !empty($background['image']['url'])) {
            $imageURL = $background['image']['url'];
    
            if (!empty($background['color'])) {
                $style .= "background-color: {$background['color']} ;";
            }

            $style .= "background:  url($imageURL) ;";
    
            $repeat     = isset($background['image']['repeat']) ? $background['image']['repeat'] : 'no-repeat';
            $size       = isset($background['image']['size']) ? $background['image']['size'] : 'cover';
            $attachment = isset($background['image']['attachment']) ? $background['image']['attachment'] : 'scroll';
            $focalPoint = isset($background['image']['focalPoint']) ? $background['image']['focalPoint'] : array('x' => 0.5, 'y' => 0.5);
            $positionX  = isset($focalPoint['x']) ? $focalPoint['x'] * 100 : 50;
            $positionY  = isset($focalPoint['y']) ? $focalPoint['y'] * 100 : 50;
    
            $style .= "background-repeat: {$repeat};";
            $style .= "background-size: {$size};";
            $style .= "background-attachment: {$attachment};";
            $style .= "background-position: {$positionX}% {$positionY}%;";
        }
        return $style;
    }
    
    function typography($typographyKey, $device = 'Desktop') {
        $style = '';
    
        // Validate attributes
        if (!isset(self::$attribute[$typographyKey]) || !is_array(self::$attribute[$typographyKey])) {
            return $style;
        }
    
        $typography = self::$attribute[$typographyKey];
    
        // Enqueue Google Font if font family is set
        if (isset($typography['fonts'][$device]) && $typography['fonts'][$device] !== '') {
            vayu_enqueue_google_fonts($typography['fonts'][$device]);
        }
    
        // Map keys to CSS properties
        $map = [
            'fonts'         => 'font-family',
            'fontSize'      => 'font-size',
            'lineHeights'   => 'line-height',
            'letterSpacing' => 'letter-spacing',
            'decoration'    => 'text-decoration',
            'orientation'   => 'writing-mode',
            'letterCase'    => 'text-transform',
        ];
    
        foreach ($map as $key => $cssProp) {
            $value = '';
    
            if (
                isset($typography[$key]) &&
                isset($typography[$key][$device]) &&
                $typography[$key][$device] !== ''
            ) {
                $value = $typography[$key][$device];
    
                // Add units if needed
                if (in_array($key, ['fontSize', 'letterSpacing']) && is_numeric($value)) {
                    $value .= 'px';
                }
            } else {
                $value = $this->getFallbackValue($key);
            }
    
            if ($value !== '') {
                $style .= $cssProp . ':' . $value . ';';
            }
        }
    
        // Handle appearance styles
        $appearanceStyle = $typography['appearance'][$device]['style'] ?? [];
        $appearanceKeys = ['fontWeight', 'fontStyle'];
    
        foreach ($appearanceKeys as $aKey) {
            $cssKey = $this->mapAppearanceKeyToCss($aKey);
            $value = $appearanceStyle[$aKey] ?? $this->getFallbackAppearanceValue($aKey);
    
            if ($value !== '') {
                $style .= $cssKey . ':' . $value . ';';
            }
        }
    
        return $style;
    }
    
    function mapAppearanceKeyToCss($key) {
        $map = [
            'fontWeight' => 'font-weight',
            'fontStyle'  => 'font-style',
        ];
    
        return $map[$key] ?? $key;
    }
    
    function getFallbackValue($key) {
        $fallbacks = [
            'fonts'         => 'sans-serif',
            'fontSize'      => '',
            'lineHeights'   => 'normal',
            'letterSpacing' => 'normal',
            'decoration'    => 'none',
            'orientation'   => 'initial',
            'letterCase'    => 'none',
        ];
    
        return $fallbacks[$key] ?? '';
    }
    
    function getFallbackAppearanceValue($key) {
        $fallbacks = [
            'fontWeight' => '',
            'fontStyle'  => 'normal',
        ];
    
        return $fallbacks[$key] ?? '';
    }

    function position($key, $device = 'Desktop') {
        $style = '';
    
        // Validate the attribute
        if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
            $style= "position: relative;";
            return $style;
        }
    
        $position = self::$attribute[$key];
    
        // Default position
        $posValue = isset($position['value']) ? $position['value'] : 'relative';

        if($posValue === 'inherit'){
            $posValue = 'relative';
        }
        $style .= "position: {$posValue};";
    
        // z-index
        $zIndex = isset($position['zIndex'][$device]) ? $position['zIndex'][$device] : 0;
        $style .= "z-index: {$zIndex};";
    
        if($posValue === 'absolute' || $posValue=== 'fixed'){
            // Horizontal position (left or right)
            if (!empty($position['horiori'])) {
                $hori = $position['horiori'];
                $offsetKey = 'offset' . $hori;
                $offset = isset($position[$offsetKey][$device]) ? $position[$offsetKey][$device] : '0px';
                $style .= "{$hori}: {$offset};";
            }
        
            // Vertical position (top or bottom)
            if (!empty($position['vertiori'])) {
                $verti = $position['vertiori'];
                $offsetKey = 'offset' . $verti;
                $offset = isset($position[$offsetKey][$device]) ? $position[$offsetKey][$device] : '0px';

                $style .= "{$verti}: {$offset};";
            }

        }
    
        return $style;
    }
     
    function flex($key, $device = 'Desktop') {
        $style = '';
    
        // Validate the attribute
        if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
            $style .= "flex: initial;";
            return $style;
        }
    
        $flex = self::$attribute[$key];
    
        // align-self
        $alignSelf = isset($flex['alignself'][$device]) ? $flex['alignself'][$device] : 'inherit';
        if (!empty($alignSelf)) {
            $style .= "align-self: {$alignSelf};";
        }
    
        // order
        if (!empty($flex['order'][$device])) {
            switch ($flex['order'][$device]) {
                case 'start':
                    $style .= "order: -9999;";
                    break;
                case 'end':
                    $style .= "order: 9999;";
                    break;
                case 'custom':
                    $customOrder = isset($flex['customorder'][$device]) ? $flex['customorder'][$device] : 0;
                    $style .= "order: {$customOrder};";
                    break;
                default:
                    $style .= "order: 0;";
            }
        }
    
        // flex-grow and flex-shrink based on size
        if (!empty($flex['size'][$device])) {
            switch ($flex['size'][$device]) {
                case 'none':
                    $style .= "--flex-grow: 1; --flex-shrink: 1;--flex-basis:auto;";
                    break;
                case 'grow':
                    $style .= "--flex-grow: 1; --flex-shrink: 0;--flex-basis:auto;";
                    break;
                case 'shrink':
                    $style .= "--flex-grow: 0; --flex-shrink: 1;--flex-basis:auto;";
                    break;
                case 'custom':
                    $grow = isset($flex['flexgrow'][$device]) ? $flex['flexgrow'][$device] : 1;
                    $shrink = isset($flex['flexshrink'][$device]) ? $flex['flexshrink'][$device] : 1;
                    $style .= "--flex-grow : $grow; --flex-shrink:$shrink; --flex-basis:auto";
                    break;
                default:
                    $style .= "--flex-grow: 0; --flex-shrink: 0; --flex-basis:auto;";
            }
        }else{
              $style .= "--flex-grow: initial; --flex-shrink: initial; --flex-basis:initial;";
        }

        $style .= "flex: var(--flex-grow) var(--flex-shrink) var(--flex-basis);";
    
        return $style;
    }

    function size($key, $type = 'width', $device = 'Desktop', $boxed = false) {
        // Return empty if key is not valid or not an array
        if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
            return '';
        }
    
        $size = self::$attribute[$key];
        $currentType = isset($size['type']) ? $size['type'] : null;
    
        if (!$currentType) {
            return '';
        }
    
        // Check if boxed is false or current type is full
        if (!$boxed || $currentType === 'full') {
            $value = $size[$currentType][$type][$device] ?? null;
            return  $value;
        }
    
        // If boxed is true and currentType is boxed
        if ($boxed && $currentType === 'boxed') {
            $value = $size[$currentType][$type][$device] ?? null;
            return  $value;
        }
    
        return '';
    }

    function advWidth($key , $device) {
        if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
            return '';
        }
    
        $val = self::$attribute[$key];
        $widthtype = isset($val['value']) ? $val['value'] : 'default';

        $style = [];

       if ($widthtype === 'inlinewidth') {
            $style[] = 'display:inline-flex;';
            $style[] = 'max-width:fit-content;';
        } elseif ($widthtype === 'customwidth') {
            $customWidth = '';

            if (is_array($val['customWidth'] ?? null)) {
                $customWidth = $val['customWidth'][$device] ?? '';
            } else {
                $customWidth = $val['customWidth'] ?? '';
            }

            if ($customWidth) {
                $style[] = 'width:' . esc_attr($customWidth) . ';';
            }
        }

        return implode('', $style);
    }

    function advanceStyle($className, $block = '') {
        $attr = self::$attribute;
        $style = '';
        
        // Main Desktop Block
        $mainStyles = '';
    
        // Position
        $padding = $this->dimensions('advPadding', 'padding', 'Desktop',$block);
        if (!isset($attr['advPadding']) && $block == 'container') {
            $padding = "padding:" . VAYU_BLOCKS_GLOBAL_SETTINGS['containerPadding'] . "px;";
        }

        $mainStyles .= $padding;

        $mainStyles .= $this->advWidth('advWidth', 'Desktop');
    
        // Flex
        $mainStyles .= $this->flex('advFlexItem', 'Desktop');

        $mainStyles .= $this->position('advPosition', 'Desktop');
    
        // Background
        if (isset($attr['advBackground'])) {
            $mainStyles .= $this->background('advBackground');
        }
    
        // Border, Radius, Shadow
        if (isset($attr['advBorder']) || isset($attr['advBorderRadius']) || isset($attr['advDropShadow'])) {
            $mainStyles .= $this->borderRadiusShadow('advBorder', 'advBorderRadius', 'advDropShadow', 'Desktop');
        }
    
        // Padding
        if (!empty($attr['advPadding'])) {
            $mainStyles .= $this->dimensions('advPadding', 'padding', 'Desktop');
        }
    
        // Margin
        if (!empty($attr['advMargin'])) {
            $mainStyles .= $this->dimensions('advMargin', 'margin', 'Desktop');
        } else {
            if (isset($attr['advWidth']['value']) && $attr['advWidth']['value'] === 'customwidth') {
                $mainStyles .= "margin:0 !important;";
            }
        }
    
        // Transition
        if (!empty($attr['advTransition'])) {
            $mainStyles .= "transition: all " . esc_attr($attr['advTransition']) . "s ease !important;";
            $mainStyles .= "animation-duration: " . esc_attr($attr['advTransition']) . "s !important;";
        }

        // Cursor
        if (!empty($attr['advCursor'])) {
            if (isset($attr['advCursor']['type']) && $attr['advCursor']['type'] === 'custom' && !empty($attr['advCursor']['customImage'])) {
                $mainStyles .= "cursor: url(" . esc_url($attr['advCursor']['customImage']) . "), auto;";
            } elseif (!empty($attr['advCursor']['aniName'])) {
                $mainStyles .= "cursor: " . esc_attr($attr['advCursor']['aniName']) . ";";
            }
        }
    
        if (!empty($mainStyles)) {
            $style .= "$className{" . $mainStyles . "}";
        }
    
        // Hover Styles
        $hoverStyles = '';
        if (isset($attr['advBackgroundHover'])) {
            $hoverStyles .= $this->background('advBackgroundHover');
        }
    
        $hoverStyles .= $this->borderRadiusShadow('advBorder', 'advBorderRadius', 'advDropShadow', 'Desktop', 'Hover', 'Hover');
    
        if (!empty($attr['advTransition'])) {
            $hoverStyles .= "transition-duration: " . esc_attr($attr['advTransition']) . "s;";
        }
    
        if (!empty($hoverStyles)) {
            $style .= "$className:hover{" . $hoverStyles . "}";
        }
    
        // Responsive Media Queries
        $mediaQueries = [
            '1024px' => 'Tablet',
            '767px' => 'Mobile'
        ];
    
        foreach ($mediaQueries as $maxWidth => $device) {
            $deviceStyle = '';
            $inner = '';
    
            $inner .= $this->position('advPosition', $device);
            $inner .= $this->flex('advFlexItem', $device);
            $inner .= $this->advWidth('advWidth', $device);
    
            if (!empty($attr['advPadding'])) {
                $inner .= $this->dimensions('advPadding', 'padding', $device);
            }
    
            if (!empty($attr['advMargin'])) {
                $inner .= $this->dimensions('advMargin', 'margin', $device);
            }
    
            $inner .= $this->borderRadiusShadow('advBorder', 'advBorderRadius', 'advDropShadow', $device);
    
            if (!empty($inner)) {
                $deviceStyle .= "$className{" . $inner . "}";
            }
    
            $hover = $this->borderRadiusShadow('advBorder', 'advBorderRadius', 'advDropShadow', $device, 'Hover');
    
            if (!empty($hover)) {
                $deviceStyle .= "$className:hover{" . $hover . "}";
            }
    
            if (!empty($deviceStyle)) {
                $style .= "@media (max-width: $maxWidth) {" . $deviceStyle . "}";
            }
        }
    
        // Responsive Visibility
        if (isset($attr['advResponsive']) && is_array($attr['advResponsive'])) {
            if (!empty($attr['advResponsive']['Desktop'])) {
                $style .= "@media only screen and (min-width: 1024px) { {$className} { display: none; } }";
            }
            if (!empty($attr['advResponsive']['Tablet'])) {
                $style .= "@media only screen and (min-width: 400px) and (max-width: 1023px) { {$className} { display: none; } }";
            }
            if (!empty($attr['advResponsive']['Mobile'])) {
                $style .= "@media only screen and (max-width: 399px) { {$className} { display: none; } }";
            }
        }

        return $style;
    }
    
    // function ContFlex($key, $device = 'Desktop') {
    //     $style = '';
    
    //     // Validate the attribute
    //     if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
    //         return $style;
    //     }
    
    //     $contFlex = self::$attribute[$key];
    
    //     // flex-direction
    //     if (!empty($contFlex['direction'][$device])) {
    //         $style .= "flex-direction: {$contFlex['direction'][$device]};";
    //     }
    
    //     // justify-content
    //     if (!empty($contFlex['justifyContent'][$device])) {
    //         $style .= "justify-content: {$contFlex['justifyContent'][$device]};";
    //     }
    
    //     // align-items
    //     if (!empty($contFlex['alignItems'][$device])) {
    //         $style .= "align-items: {$contFlex['alignItems'][$device]};";
    //     }
    
    //     // flex-wrap
    //     if (!empty($contFlex['wrap'][$device])) {
    //         $style .= "flex-wrap: {$contFlex['wrap'][$device]};";
    //     }
    
    //     // row-gap (rwGap)
    //     if (isset($contFlex['rwGap'][$device])) {
    //         $rowGap = is_numeric($contFlex['rwGap'][$device]) ? $contFlex['rwGap'][$device] . 'px' : $contFlex['rwGap'][$device];
    //         $style .= "row-gap: {$rowGap};";
    //     }
    
    //     // column-gap (colGap)
    //     if (isset($contFlex['colGap'][$device])) {
    //         $colGap = is_numeric($contFlex['colGap'][$device]) ? $contFlex['colGap'][$device] . 'px' : $contFlex['colGap'][$device];
    //         $style .= "column-gap: {$colGap};";
    //     }
    
    //     // align-content
    //     if (!empty($contFlex['alignContent'][$device]) && $contFlex['alignContent'][$device] !== 'default') {
    //         $style .= "align-content: {$contFlex['alignContent'][$device]};";
    //     }
    
    //     return $style;
    // }

    function ContFlex($key, $device = 'Desktop') {
        $style = '';

        // Validate the attribute
        if (!isset(self::$attribute[$key]) || !is_array(self::$attribute[$key])) {
            return $style;
        }

        $contFlex = self::$attribute[$key];

        // Collect flex properties
        $flexStyles = [];

        // flex-direction
        if (!empty($contFlex['direction'][$device])) {
            $flexStyles['flex-direction'] = "flex-direction: {$contFlex['direction'][$device]};";
        }

        // justify-content
        if (!empty($contFlex['justifyContent'][$device])) {
            $flexStyles['justify-content'] = "justify-content: {$contFlex['justifyContent'][$device]};";
        }

        // align-items
        if (!empty($contFlex['alignItems'][$device])) {
            $flexStyles['align-items'] = "align-items: {$contFlex['alignItems'][$device]};";
        }

        // flex-wrap
        if (!empty($contFlex['wrap'][$device])) {
            $flexStyles['flex-wrap'] = "flex-wrap: {$contFlex['wrap'][$device]};";
        }

        // row-gap (rwGap)
        if (isset($contFlex['rwGap'][$device])) {
            $rowGap = is_numeric($contFlex['rwGap'][$device]) ? $contFlex['rwGap'][$device] . 'px' : $contFlex['rwGap'][$device];
            $flexStyles['row-gap'] = "row-gap: {$rowGap};";
        }

        // column-gap (colGap)
        if (isset($contFlex['colGap'][$device])) {
            $colGap = is_numeric($contFlex['colGap'][$device]) ? $contFlex['colGap'][$device] . 'px' : $contFlex['colGap'][$device];
            $flexStyles['column-gap'] = "column-gap: {$colGap};";
        }

        // align-content
        if (!empty($contFlex['alignContent'][$device]) && $contFlex['alignContent'][$device] !== 'default') {
            $flexStyles['align-content'] = "align-content: {$contFlex['alignContent'][$device]};";
        }

        // Add display: flex; only if at least one flex property is defined
        if (!empty($flexStyles)) {
            $style .= "display: flex;";
            $style .= implode('', $flexStyles); // Concatenate all defined flex styles
        }
        return $style;
    } 
    
    function renderVideo($key) {
        if (
            !isset(self::$attribute[$key]['type']) ||
            self::$attribute[$key]['type'] !== 'video' ||
            empty(self::$attribute[$key]['video']['url'])
        ) {
            return '';
        }

        $video = self::$attribute[$key]['video'];
        $url = esc_url($video['url']);
        $type = $video['type'] ?? '';
        $html = '';

        if ($type === 'mp4') {
            $autoplay  = !empty($video['autoplay']) ? 'autoplay' : '';
            $loop      = !empty($video['loop']) ? 'loop' : '';
            $controls  = !empty($video['controls']) ? 'controls' : '';
            $nofs      = empty($video['allowfs']) ? 'controlsList="nofullscreen"' : '';

            $html .= '<video 
                ' . $autoplay . ' 
                ' . $loop . ' 
                ' . $controls . ' 
                muted 
                ' . $nofs . '
                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; aspect-ratio: 16 / 9; z-index: 0;">
                <source src="' . $url . '" type="video/mp4" />
                Your browser does not support the video tag.
            </video>';
        } else {
            $allowfs = !empty($video['allowfs']) ? ' allowfullscreen' : '';

            $html .= '<iframe class="vb-elementor-background-video-embed"
                frameborder="0"
                referrerpolicy="strict-origin-when-cross-origin"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"' . $allowfs . '
                src="' . $url . '"
                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; aspect-ratio: 16 / 9; z-index: 0;">
            </iframe>';
        }

        return $html;
    }

}     