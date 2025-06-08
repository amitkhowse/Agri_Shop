<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Render callback for the block
function vayu_blocks_advance_slider_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    $device_type = get_device_type();

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);
  
    // Ensure className is sanitized and applied correctly
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';
    $uniqueId = isset($attr['uniqueId']) ? esc_attr($attr['uniqueId']) : '';

    // Retrieve slider-specific attributes
    $autoplay   = empty($attr['autoplay']) ? false : $attr['autoplay'];  
    $navigation = empty($attr['navigation']) ? false : $attr['navigation'];
    $pagination = empty($attr['pagination']) ? false : $attr['pagination'];
    $centeredSlides= empty($attr['centeredSlides']) ? false : $attr['centeredSlides'];
    $grabCursor= empty($attr['grabCursor']) ? false : $attr['grabCursor'];

    if($device_type === 'Desktop'){
        $initialSlide= $attr['initialSlide'];
        $slidesPerView=$attr['slidesPerView'];
        $spaceBetween=$attr['spaceBetween'];
    } elseif($device_type === 'Tablet'){
        $initialSlide= $attr['initialSlideTablet'];
        $slidesPerView=$attr['slidesPerViewTablet'];
        $spaceBetween=$attr['spaceBetweenMobile'];
    } elseif($device_type === 'Mobile'){
        $initialSlide= $attr['initialSlideMobile'];
        $slidesPerView=$attr['slidesPerViewMobile'];
        $spaceBetween=$attr['spaceBetweenMobile'];
    }

    $keyboard= true;
    $simulateTouch= empty($attr['simulateTouch']) ? false : $attr['simulateTouch'];
    $loop= empty($attr['loop']) ? false : $attr['loop'];
    $freeMode=empty($attr['freeMode']) ? false : $attr['freeMode'];
    $mousewheel=empty($attr['mousewheel']) ? false : $attr['mousewheel'];
    $delay=$attr['delay'];
    $disableOnInteraction=empty($attr['disableOnInteraction']) ? false : $attr['disableOnInteraction'];
    $effect = $attr['effect'];
    $scrollbar=empty($attr['scrollbar']) ? false : $attr['scrollbar'];


    // Prepare Swiper attributes
    $paginationConfig = array(
        'enabled' => $pagination,
        'clickable' => true,
    );

    // Determine the pagination type based on the dotstype
    if ($attr['dotstype'] === 'numbers') {
        $paginationConfig['type'] = 'fraction';
    } elseif ($attr['dotstype'] === 'progressbar') {
        $paginationConfig['type'] = 'progressbar';
    } elseif ($attr['dotstype'] === 'bullets') {
        $paginationConfig['dynamicBullets'] = 'dynamicBullets';
        $paginationConfig['dynamicMainBullets'] = 1;
    }
    
    // Prepare Swiper attributes
    $mousewheelconfig = array(
        'enabled' => $mousewheel,
        'sensitivity'=> 7,
    );

    if($effect=== 'cards'){
        $loop='false';
    }

    // Prepare Swiper attributes
    $swiper_attr = array(
        'navigation' => $navigation,
        'pagination'      => $paginationConfig,
        'centeredSlides' => $centeredSlides,
        'grabCursor'=>$grabCursor,
        'keyboard'=> $keyboard,
        'simulateTouch'=> $simulateTouch,
        'loop' => $loop,
        'freeMode' => $freeMode,
        'mousewheel' => $mousewheelconfig,
        'initialSlide' => $initialSlide,
        'slidesPerView' => (!in_array($effect, ['fade', 'flip', 'cube', 'cards'])) ? $slidesPerView : 1,
        'spaceBetween' => (!in_array($effect, ['fade', 'flip', 'cube', 'cards'])) ? $spaceBetween : 10,
        'scrollbar' => $scrollbar,
    );
 
    // Conditionally add the effect parameter
    if ($effect != 'none') {
        $swiper_attr['effect'] = $effect;
    }

   // Conditionally add 'autoplay' to the array
    if ($autoplay) {
        $swiper_attr['autoplay'] = array(
            'enabled' => $autoplay,
            'delay' => $delay,
            'disableOnInteraction'=> $disableOnInteraction,
            'pauseOnMouseEnter' => $attr['pauseOnMouseEnter'],
            'reverseDirection' => $attr['reverseDirection'],
        ); 
    }

    $swiper_attr = htmlspecialchars(wp_json_encode($swiper_attr));
    
    $wrapper_attributes = get_block_wrapper_attributes([
        'class' => 'swiper',
    ]);
    

    // Render and return the slider output inside a div with the dynamic class name
    $slider_content = '<div ' . wp_kses_data($wrapper_attributes) . ' data-swiper="' . esc_attr($swiper_attr) . '">';
        $slider_content .= '<div class="swiper-wrapper">';
            $slider_content .= $content; // Output default content
        $slider_content .= '</div>'; // Close swiper-wrapper
    $slider_content .= '</div>'; // Close swiper

    // Start with your base class
    $outer_classes = 'wp_block_vayu-blocks-advance-slider-main vayu-block-' . esc_attr($uniqueId);

    if (strpos($wrapper_attributes, 'alignfull') !== false) {
        $outer_classes .= ' has-global-padding';
    }

    if ( ! empty( $attributes['advAnimation'] ) && ! empty( $attributes['advAnimation']['className'] ) ) {
        $outer_classes .= $attributes['advAnimation']['className'];
    }

    // Now return with conditional class
    return '<div id="' . esc_attr($uniqueId) . '" ' . get_block_wrapper_attributes([
        'class' => $outer_classes
    ]) . '>' . $slider_content . '</div>';
    
}

//device type
function get_device_type() {
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

?>
