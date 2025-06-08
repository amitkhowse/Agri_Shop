<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_video {

    private $attr; //attributes
    private $device_type;

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
        $this->device_type = $this->get_device_type();
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering

        if ( ! empty( $this->attr['duotone'] ) && count( $this->attr['duotone'] ) > 1 ) {
            echo $this->DuotoneFilters();
        }
        echo $this->render_image();
        
        return ob_get_clean(); // Return the buffered output
    }

    private function render_image() {
        $attributes = $this->attr;
        $image_html = '';
        $uniqueId = $this->safe_attr($attributes, 'uniqueId');
        $imageSrc = $this->safe_attr($attributes, 'image', plugins_url('../../assets/img/no-image.png', __FILE__));
        $imageAlt = $this->safe_attr($attributes, 'imagealttext', 'Image ' . rand(1, 100));
        $imageHvrEffect = $this->safe_attr($attributes, 'animationData.hovereffect.value');
        $imageHvrAnimation = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue');
        $imageHvrFilter = $this->safe_attr($attributes, 'imagehvrfilter');
        $imagemaskshape = $this->safe_attr($attributes, 'animationData.mask.maskshape') !== 'none' ? 'maskshapeimage' : '';
        $wrapperanimation = $this->safe_attr($attributes, 'animationData.effect.animationValue');

        // Render a video element
        $videoUrl = esc_url($attributes['videoUrl']);
        $autoplay = !empty($attributes['autoplay']) ? 'autoplay' : '';
        $loop = !empty($attributes['loop']) ? 'loop' : '';
        $controls = !empty($attributes['controls']) ? 'controls' : '';
        $muted = !empty($attributes['muted']) ? 'muted' : '';
        $poster = !empty($attributes['fallbackImageUrl']) ? esc_url($attributes['fallbackImageUrl']) : '';

        $nofullscreen = !empty($attributes['nofullscreen']) ? 'nofullscreen' : '';
        $nodownload = !empty($attributes['nodownload']) ? 'nodownload' : ''; // Check for nodownload
        $noremoteplayback = !empty($attributes['noremoteplayback']) ? 'noremoteplayback' : ''; // Check for remote playback
        $noplaybackrate = !empty($attributes['noplaybackrate']) ? 'noplaybackrate' : ''; // Check for playback rate
    
        $hover_type = $this->safe_attr($attributes, 'animationData.imageAnimation.hover', 'without-hvr');
        $animation_value = $this->safe_attr($attributes, 'animationData.imageAnimation.animationValue', '');

        $classhover='';
        if (isset($attributes['animationData']['effect']['effectHover']) && $attributes['animationData']['effect']['effectHover']) {
            $classhover = 'vb-video-hover';
        } else {
            $classhover = '';
        }

        $animated = isset($attributes['className']) ? esc_attr($attributes['className']) : '';

        $screenfit = '';
        if($attributes['screenfit']==='screenfit' || $attributes['screenfit']==='custom'){
            $screenfit = 'alignfull';
        }

        $animation_classname = '';
        if ($hover_type === 'without-hvr') {
            $animation_classname = $animation_value;
        } elseif ($hover_type === 'with-hvr') {
            $animation_classname = $animation_value . 'hvr';
        } elseif ($hover_type === 'one-time') {
            $animation_classname = $animation_value . 'onetime';
        }
        

        $lightbox = isset( $attributes['lightbox'] ) && $attributes['lightbox'] ? 'true' : 'false';
        $noimagelong = !empty($attributes['image']) ? esc_url($attributes['image']) : plugins_url('../../assets/img/no-image.png', __FILE__);

        $image_html .= '<div class="vb-video-container' . 
        (!empty($wrapperanimation) && $wrapperanimation !== 'none' ? ' ' . esc_attr($wrapperanimation) : '') . 
        ' ' . ( !empty($attributes['contentani']) ? 'vb-start-cont-ani' : '' ) . '" id="' . esc_attr($uniqueId) . '">';
    
            $image_html .= '<div class="vb-video-rotation" data-lightbox="' . esc_attr( $lightbox ) . '" >';
                $image_html .= '<div class="vb-frame-data-video ' . 
                trim(
                    ($imageHvrFilter && $imageHvrFilter !== 'none' ? esc_attr($imageHvrFilter) . ' ' : '') .
                    ($imageHvrEffect && $imageHvrEffect !== 'none' ? esc_attr($imageHvrEffect) . ' ' : '') .
                    ($animation_classname && $animation_classname !== 'none' ? esc_attr($animation_classname) : '')
                ) .
                '">';

                    if($attributes['posterOn']){
                        $image_html .= '<div class="vb-video-wrapper-relative">';
                            $image_html .= '<div class="vb-video-poster">';
                                $image_html .= '<img  src="' . ( !empty( $attributes['poimage'] ) ? $attributes['poimage'] : $noimagelong ) . '" class="vb-video-tag-image" />';
                            $image_html .= '</div>';

                            $image_html .= '<div  class="vb-video-icon">';
                                $image_html .= $this->content;
                            $image_html .= '</div>';
                        $image_html .= '</div>';
                    }

                        if ( $attributes['blockValue'] === 'mp4' && !empty($attributes['videoUrl'])) {

                            $image_html .= '<video 
                                class="vb-video-iframe' . (!empty($imageHvrFilter) && $imageHvrFilter !== 'none' ? ' ' . $imageHvrFilter : '') . (!empty($imagemaskshape) && $imagemaskshape !== 'none' ? ' ' . $imagemaskshape : '') . '"
                                ' . $autoplay . ' 
                                ' . $loop . ' 
                                ' . $controls . ' 
                                ' . $muted . ' 
                                poster="' . $poster . '"
                                controlsList="' . 
                                    ($nofullscreen ? 'nofullscreen ' : '') .
                                    ($nodownload ? 'nodownload ' : '') . 
                                    ($noremoteplayback ? 'noremoteplayback ' : '') . 
                                    ($noplaybackrate ? 'noplaybackrate ' : '') .'">
                                <source src="' . $videoUrl . '" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>';
                        }

                        else if($attributes['blockValue'] === 'you-tube' && !empty($attributes['youvideoUrl'])) {

                            $query_params = [];

                            if (!empty($attributes['youautoplay'])) {
                                $query_params[] = 'autoplay=1';
                                $query_params[] = 'mute=1';
                            } else {
                                $query_params[] = 'autoplay=0';
                                $query_params[] = !empty($attributes['youtubemuted']) ? 'mute=1' : 'mute=0';
                            }
                    
                            if (!empty($attributes['youcontrols'])) {
                                $query_params[] = 'controls=0';
                            }

                            if (!empty($attributes['youloop'])) {
                                $query_params[] = 'loop=1';
                                $query_params[] = 'playlist=' . esc_attr($attributes['youvideoUrl']);
                            }
                    
                            if (!empty($attributes['startTime'])) {
                                $query_params[] = 'start=' . intval($attributes['startTime']);
                            }
                    
                            if (!empty($attributes['endTime'])) {
                                $query_params[] = 'end=' . intval($attributes['endTime']);
                            }
                    
                            if (isset($attributes['rel'])) {
                                $query_params[] = $attributes['rel'] ? 'rel=1' : 'rel=0';
                            }

                            $query_string = implode('&', $query_params);

                            $iframe_src = 'https://www.youtube.com/embed/' . esc_attr($attributes['youvideoUrl']) . '?' . $query_string;

                            $image_html .= '<div class="vb-video-iframe-cont"><iframe
                                class="vb-you-tube-iframe ' . (!empty($imageHvrFilter) && $imageHvrFilter !== 'none' ? ' ' . $imageHvrFilter : '') . (!empty($imagemaskshape) && $imagemaskshape !== 'none' ? ' ' . $imagemaskshape : '') . '"
                                src="' . esc_url($iframe_src) . '"
                                title="YouTube video player"
                                frameborder="0"
                                allow="autoplay; encrypted-media; web-share; picture-in-picture"
                                referrerpolicy="strict-origin-when-cross-origin"
                                ' . (!empty($attributes['youtubefullscreen']) ? 'allowfullscreen' : '') . '>
                            </iframe></div>';

                        }

                        else if($attributes['blockValue'] === 'vimeo' && !empty($attributes['vimeourl'])){

                            $vimeoQueryParams = [];

                            if ( ! empty( $attributes['vimeoautoplay'] ) ) {
                                $vimeoQueryParams[] = 'autoplay=1';
                                $vimeoQueryParams[] ='muted=1';
                            }
                        
                            if ( ! empty( $attributes['vimeomuted'] ) ) {
                                $vimeoQueryParams[] = 'muted=1';
                            }
                        
                            if ( ! empty( $attributes['vimeoloop'] ) ) {
                                $vimeoQueryParams[] = 'loop=1';
                            }
                        
                            if ( isset( $attributes['vimeocontrols'] ) && $attributes['vimeocontrols'] === false ) {
                                $vimeoQueryParams[] = 'controls=0';
                            }
                        
                            if ( ! empty( $attributes['vimeobackground'] ) ) {
                                $vimeoQueryParams[] = 'background=1';
                            }
                        
                            $queryString = implode( '&', $vimeoQueryParams );
                        
                            $vimeoSrc = 'https://player.vimeo.com/video/' . $attributes['vimeourl'];
                            if ( ! empty( $queryString ) ) {
                                $vimeoSrc .= '?' . $queryString;
                            }

                            $image_html .= '<iframe
                                class="vb-video-iframe' . (!empty($imageHvrFilter) && $imageHvrFilter !== 'none' ? ' ' . $imageHvrFilter : '') . (!empty($imagemaskshape) && $imagemaskshape !== 'none' ? ' ' . $imagemaskshape : '') . '"
                                src="' . esc_url($vimeoSrc) . '"
                                title="YouTube video player"
                                frameborder="0"
                                allow="autoplay; encrypted-media; web-share; picture-in-picture"
                                referrerpolicy="strict-origin-when-cross-origin"
                                ' . (!empty($attributes['vimeofullscreen']) ? 'allowfullscreen' : '') . '>
                            </iframe>';
                        }

                $image_html .= '</div>';
        
            $image_html .= '</div>';
        $image_html .= '</div>';

        //Modal
        $unique_modal_id = wp_unique_id( 'vayu-modal-' . ( $attributes['uniqueId'] ?? '' ) );

        $image_html .= '<div id="' . esc_attr($unique_modal_id) . '" class="vb-vayu-modal">';
            $image_html .= '<div class="vb-vayu-modal-content">';
                $image_html .= '<button class="vb-vayu-modal-close" aria-label="' . esc_attr__('Close modal', 'vayu-blocks') . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" role="img" aria-hidden="true" focusable="false"><path d="M 6.225 4.811 L 4.811 6.225 L 10.586 12 L 4.811 17.775 L 6.225 19.189 L 12 13.414 L 17.775 19.189 L 19.189 17.775 L 13.414 12 L 19.189 6.225 L 17.775 4.811 L 12 10.586 Z"></path></svg></button>';
                $image_html .= '<div class="vb-vayu-modal-body">';

                        if ( $attributes['blockValue'] === 'mp4' && !empty($attributes['videoUrl'])) {

                            $image_html .= '<video 
                                class="vb-video-iframe-modal"
                                    autoplay
                                ' . $loop . ' 
                                ' . $controls . ' 
                                ' . $muted . ' 
                                poster="' . $poster . '"
                                controlsList="' . 
                                    ($nofullscreen ? 'nofullscreen ' : '') .
                                    ($nodownload ? 'nodownload ' : '') . 
                                    ($noremoteplayback ? 'noremoteplayback ' : '') . 
                                    ($noplaybackrate ? 'noplaybackrate ' : '') .'">
                                <source src="' . $videoUrl . '" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>';
                        }

                        else if($attributes['blockValue'] === 'you-tube' && !empty($attributes['youvideoUrl'])) {

                            $query_params = [];

                      
                            $query_params[] = 'autoplay=1';
                            $query_params[] = 'mute=1';
                    
                            if (!empty($attributes['youcontrols'])) {
                                $query_params[] = 'controls=0';
                            }

                            if (!empty($attributes['youloop'])) {
                                $query_params[] = 'loop=1';
                                $query_params[] = 'playlist=' . esc_attr($attributes['youvideoUrl']);
                            }
                    
                            if (!empty($attributes['startTime'])) {
                                $query_params[] = 'start=' . intval($attributes['startTime']);
                            }
                    
                            if (!empty($attributes['endTime'])) {
                                $query_params[] = 'end=' . intval($attributes['endTime']);
                            }
                    
                            if (isset($attributes['rel'])) {
                                $query_params[] = $attributes['rel'] ? 'rel=1' : 'rel=0';
                            }

                            $query_string = implode('&', $query_params);

                            $iframe_src = 'https://www.youtube.com/embed/' . esc_attr($attributes['youvideoUrl']) . '?' . $query_string;

                            $image_html .= '<iframe
                                class="vb-video-iframe-modal"
                                src="' . esc_url($iframe_src) . '"
                                title="YouTube video player"
                                frameborder="0"
                                allow="autoplay; encrypted-media; web-share; picture-in-picture"
                                referrerpolicy="strict-origin-when-cross-origin"
                                ' . (!empty($attributes['youtubefullscreen']) ? 'allowfullscreen' : '') . '>
                            </iframe>';
                        }

                        else if($attributes['blockValue'] === 'vimeo' && !empty($attributes['vimeourl'])){

                            $vimeoQueryParams = [];

                        
                            $vimeoQueryParams[] = 'autoplay=1';
                            $vimeoQueryParams[] ='muted=1';
                        
                            if ( ! empty( $attributes['vimeomuted'] ) ) {
                                $vimeoQueryParams[] = 'muted=1';
                            }
                        
                            if ( ! empty( $attributes['vimeoloop'] ) ) {
                                $vimeoQueryParams[] = 'loop=1';
                            }
                        
                            if ( isset( $attributes['vimeocontrols'] ) && $attributes['vimeocontrols'] === false ) {
                                $vimeoQueryParams[] = 'controls=0';
                            }
                        
                            if ( ! empty( $attributes['vimeobackground'] ) ) {
                                $vimeoQueryParams[] = 'background=1';
                            }
                        
                            $queryString = implode( '&', $vimeoQueryParams );
                        
                            $vimeoSrc = 'https://player.vimeo.com/video/' . $attributes['vimeourl'];
                            if ( ! empty( $queryString ) ) {
                                $vimeoSrc .= '?' . $queryString;
                            }

                            $image_html .= '<iframe
                                class="vb-video-iframe-modal"
                                src="' . esc_url($vimeoSrc) . '"
                                title="YouTube video player"
                                frameborder="0"
                                allow="autoplay; encrypted-media; web-share; picture-in-picture"
                                referrerpolicy="strict-origin-when-cross-origin"
                                ' . (!empty($attributes['vimeofullscreen']) ? 'allowfullscreen' : '') . '>
                            </iframe>';
                        }

                $image_html .= '</div>';
            $image_html .= '</div>';
        $image_html .= '</div>';

        $classes[] = 'vb-vide-view vb-video-' . $uniqueId;

        if ( ! empty( $classhover ) ) {
            $classes[] = $classhover;
        }

        if ( ! empty( $animated ) ) {
            $classes[] = $animated;
        }

        if ( ! empty( $screenfit ) ) {
            $classes[] = $screenfit;
        }

        return '<div id="' . esc_attr($uniqueId) . '" ' . get_block_wrapper_attributes([
            'class' => implode( ' ', $classes ),
        ]) . '>' . $image_html . '</div>';

    }
    

    private function safe_attr($array, $keyPath, $default = '') {
        $value = $array;
        foreach (explode('.', $keyPath) as $key) {
            if (!isset($value[$key])) return $default;
            $value = $value[$key];
        }
        return esc_attr($value);
    }

    //device type
    private function get_device_type() {
        $tablet_browser = 0;
        $mobile_browser = 0;
        
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }
        
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
        
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
        
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            // Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        
        if ($tablet_browser > 0) {
            return 'Tablet';
        } else if ($mobile_browser > 0) {
            return 'Mobile';
        } else {
            return 'Desktop';
        }
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

// Render callback for the block
function vayu_block_video_render($attr,$content) {

    $default_attributes = include('defaultattributes.php');

    $attr = array_merge($default_attributes, $attr);

    $image = new Vayu_blocks_video($attr,$content);
    
    return $image->render();

} 