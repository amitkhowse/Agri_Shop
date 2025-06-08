<?php
if (!defined('SIMPLE_ADDON_URL')) {
    define('SIMPLE_ADDON_URL', plugin_dir_url(__FILE__));
}
if (!defined('SIMPLE_ADDON_PATH')) {
    define('SIMPLE_ADDON_PATH', plugin_dir_path(__FILE__));
}
if (!class_exists('ElementoSimpleAddon')) {
    class ElementoSimpleAddon
    {
        function __construct()
        {
            add_action('elementor/frontend/after_enqueue_styles', [$this, 'style_enque']);
            add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);

            add_action('admin_enqueue_scripts', [$this, 'simple_elemento_addons_script']);
            add_action('wp_enqueue_scripts', [$this, 'simple_elemento_addons_script']);
        }

        public function style_enque()
        {

            wp_register_style('owl-carousel-css', SIMPLE_ADDON_URL . 'assets/owl-slider/owl.carousel.css');
            wp_register_style('owl-carousel-css-green', SIMPLE_ADDON_URL . 'assets/owl-slider/owl.theme.green.min.css');
            wp_register_style('elemento-addons-simple', SIMPLE_ADDON_URL . 'assets/style.css');
            wp_enqueue_style('owl-carousel-css');
            wp_enqueue_style('owl-carousel-css-green');
            wp_enqueue_style('elemento-addons-simple');
        }

        public function widget_scripts()
        {
            wp_register_script('owl-carousel', SIMPLE_ADDON_URL . 'assets/owl-slider/owl.carousel.min.js', array('jquery'), '', true);
            wp_register_script('owl-carousel-script-simple', SIMPLE_ADDON_URL . 'assets/owl-slider/owl-slider-script.js', [], '', true);
            wp_enqueue_script('owl-carousel');
            wp_enqueue_script('owl-carousel-script-simple');
            // elite addons 
        }
        public function simple_elemento_addons_script()
        {
            wp_enqueue_style('th-icon', SIMPLE_ADDON_URL . 'assets/th-icon/style.css', '');
            wp_enqueue_script('simple-addon-secript', SIMPLE_ADDON_URL . 'assets/custom.js', ['jquery'], '', true);
            wp_localize_script('simple-addon-secript', 'elemento_simple_url', array('admin_ajax' => admin_url('admin-ajax.php')));
        }
    }
}
$ElementoSimpleAddonobj = new ElementoSimpleAddon();
include_once SIMPLE_ADDON_PATH . 'product-simple-addon/ajx.php';

// category register
if (!function_exists('product_shop_add_category')) {
    function elemento_addons_simple_category($elements_manager)
    {
        $elements_manager->add_category(
            'elemento-addon-simple-cate',
            [
                'title' => __('Elemento Addons', 'elemento-addons'),
                'icon' => 'eicon-pro-icon',
            ]
        );
    }
    add_action('elementor/elements/categories_registered', 'elemento_addons_simple_category', 1);
}
// addon register 
if (!function_exists('elemento_addons_simple_addons')) {
    include_once 'post-filter.php';

    function elemento_addons_simple_addons()
    {
        if (class_exists('WooCommerce')) {
        include_once 'product-simple-addon/product-simple-addon.php';
        }
        include_once 'elemento-simple-post/elemento-post.php';
    }
    add_action('elementor/widgets/widgets_registered', 'elemento_addons_simple_addons');
}
// wishlist 
if (!function_exists('elemento_addons_wishlist_wpc')) {
    function elemento_addons_wishlist_wpc($productId)
    {
        if (intval($productId) && shortcode_exists('yith_wcwl_add_to_wishlist')) {
            $html = '<div class="elemento-wishlist">';
            $html .= do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . esc_attr($productId). '" already_in_wishslist_text="<span>already added</span>"]');
            $html .= '</div>';
            return $html;
        }
    }
}
// compare 
if (!function_exists('elemento_addons_compare')) {
    function elemento_addons_compare($productId)
    {
        if (intval($productId) && (shortcode_exists('th_compare') || shortcode_exists('tpcp_compare'))) {
            $html = '<button class="th-product-compare-btn button" data-th-product-id="' .esc_attr($productId) . '">';
            $html .= '<span class="th-icon th-icon-repeat"></span>';
            $html .= '<span class="text">' . __('Compare', 'hunk-companion') . '</span>';
            $html .= '</button>';
            return $html;
        }
    }
}
