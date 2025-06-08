<?php
/*
 Plugin Name: Hunk Companion
 Plugin URI: https://themehunk.com/hunk-companion/
 Description: Hunk companion plugin is an essential plugin to add features of Front page sections in your site. An easy to use plugin with ThemeHunk WordPress themes.
 Version: 1.9.6
 Author: ThemeHunk
 Text Domain: hunk-companion
 Author URI: https://themehunk.com/
 */

if (!defined('ABSPATH')) exit;
// Version constant for easy CSS refreshes
define('HUNK_COMPANION', '1.9.7');
define('HUNK_COMPANION_EXT_FILE', __FILE__ );
define('HUNK_COMPANION_PLUGIN_DIR_URL', plugin_dir_url(HUNK_COMPANION_EXT_FILE));
define('HUNK_COMPANION_BASENAME', plugin_basename(HUNK_COMPANION_EXT_FILE));
define('HUNK_COMPANION_DIR_PATH', plugin_dir_path(HUNK_COMPANION_EXT_FILE));
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
include_once(plugin_dir_path(__FILE__) . 'notify/notify.php');
function hunk_companion_text_domain()
{
	$theme = wp_get_theme();
	$themeArr = array();
	$themeArr[] = $theme->get('TextDomain');
	$themeArr[] = $theme->get('Template');
	return $themeArr;
}

function hunk_companion_gogolite_body_classes($classes){
         $classes[] = 'gogolite';
         return $classes;
}

function hunk_companion_load_plugin(){

$theme = hunk_companion_text_domain(); 
	if(in_array("almaira-shop", $theme)){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
	require_once HUNK_COMPANION_DIR_PATH .'almaira-shop/almaira-shop-admin/init.php';
	require_once HUNK_COMPANION_DIR_PATH .'almaira-shop/demo/import-data.php';
	add_action( 'wp_enqueue_scripts', 'hunk_companion_almaira_shop_scripts' );
	
	}
	elseif(in_array("gogo", $theme)){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
    require_once HUNK_COMPANION_DIR_PATH . 'gogolite/admin/gogo-function.php';
    require_once HUNK_COMPANION_DIR_PATH . 'gogolite/admin/init.php';
    add_filter('body_class', 'hunk_companion_gogolite_body_classes');
    add_action( 'wp_enqueue_scripts', 'hunk_companion_gogolite_scripts' );
	}
	elseif(in_array("open-shop", $theme)){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
     require_once HUNK_COMPANION_DIR_PATH . 'open-shop/open-shop-admin/init.php';
     require_once HUNK_COMPANION_DIR_PATH .'open-shop/demo/import-data.php';
      add_action( 'wp_enqueue_scripts', 'hunk_companion_open_shop_scripts' );
	}
	elseif(in_array("top-store", $theme)){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
     require_once HUNK_COMPANION_DIR_PATH . 'top-store/top-store-admin/init.php';
     require_once HUNK_COMPANION_DIR_PATH .'top-store/demo/import-data.php';
      add_action( 'wp_enqueue_scripts', 'hunk_companion_top_store_scripts' );
	}
	elseif(in_array("portfoliolite", $theme)){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
     require_once HUNK_COMPANION_DIR_PATH . 'portfoliolite/admin/init.php';
      add_action( 'wp_enqueue_scripts', 'hunk_companion_portfoliolite_scripts' );
      add_action('customize_controls_enqueue_scripts', 'hunk_companion_portfoliolite_customizer_scripts' );
	}
	elseif(in_array("open-mart", $theme) && !function_exists( 'open_mart_load_plugin' )){
	require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
     require_once HUNK_COMPANION_DIR_PATH . 'open-mart/open-mart-admin/init.php';
     require_once HUNK_COMPANION_DIR_PATH .'open-mart/demo/import-data.php';
      add_action( 'wp_enqueue_scripts', 'hunk_companion_open_mart_scripts' );
	}
	elseif(in_array("th-shop-mania", $theme)){
	if ( !function_exists('th_shop_mania_pro_load_plugin' ) && !function_exists('mania_companion_load_plugin' ) ) {
		require_once( HUNK_COMPANION_DIR_PATH . '/import/import.php' );
     require_once HUNK_COMPANION_DIR_PATH . 'th-shop-mania/init.php';
	 add_action('admin_enqueue_scripts', 'hunk_companion_thsm_admin_scripts');
	}
	
	}
}
add_action('after_setup_theme', 'hunk_companion_load_plugin');
function hunk_companion_gogolite_scripts()
{
	//Gogo frontpage styles	
	wp_enqueue_style('gogo_section_css', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/css/gogo-css/section.css', array(), '1.0.0');
	wp_enqueue_style('animate', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/css/gogo-css/animate.css', array(), '1.0.0');
	//Gogo frontpage scripts
	wp_enqueue_script('owl.carousel', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/owl.carousel.js', array('jquery'), '', true);
	wp_enqueue_script('typer', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/typer.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('isotope.pkgd', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/isotope.pkgd.js', array('jquery'), '', false);
	wp_enqueue_script('vertical-navigation-modernizr', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/vertical-navigation-modernizr.js', array('jquery'), '', false);
	wp_enqueue_script('vertical-navigation-main', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/vertical-navigation-main.js', array('jquery'), '', false);
	wp_enqueue_script('wow', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/wow.min.js', array('jquery'), '', false);
	wp_enqueue_script('masonry', array('imagesloaded'));
	wp_enqueue_script('gogo-frontpage-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/custom.js', array('jquery'), '', false);
	wp_localize_script('gogo-frontpage-custom-js', 'frontendajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
function hunk_companion_almaira_shop_scripts()
{
	wp_enqueue_style('owl.carousel-css', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/css/owl.carousel.css', array(), '1.0.0');
	wp_enqueue_style('swiper-css', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/css/swiper.css', array(), '1.0.0');
	wp_enqueue_script('owl.carousel-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/owl.carousel.js', array('jquery'), '', false);
	wp_enqueue_script('swiper-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/js/swiper.js', array('jquery'), '', false);
	wp_enqueue_script('isotope.pkgd', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/isotope.pkgd.js', array('jquery'), '', false);
	wp_enqueue_script('almaira-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/js/almaira-custom.js', array('jquery'), '', false);
}

function hunk_companion_open_shop_scripts()
{
	wp_enqueue_style('owl.carousel-css', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/css/owl.carousel.css', array(), '1.0.0');
	wp_enqueue_script('owl.carousel-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/owl.carousel.js', array('jquery'), '', false);
	wp_enqueue_script('jssor.slider-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-shop/assets/js/jssor.slider.min.js', array('jquery'), '', false);
	wp_enqueue_script('thunk-open-shop-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-shop/assets/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('thunk-open-shop-woo-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-shop/open-shop-admin/woo/js/woocommerce.js', array('jquery'), '1.0.0', true);
	$openshoplocalize = array(
		'open_shop_top_slider_optn' => get_theme_mod('open_shop_top_slider_optn', false),
		'open_shop_top_slider_speed' => get_theme_mod('open_shop_top_slider_speed', 1000),
		'open_shop_move_to_top_optn' => get_theme_mod('open_shop_move_to_top', false),
	);
	wp_localize_script('thunk-open-shop-custom-js', 'open_shop',  $openshoplocalize);
	$localize = array(
		'ajaxUrl'  => admin_url('admin-ajax.php'),
		//cat-tab-filter
		'open_shop_single_row_slide_cat' => get_theme_mod('open_shop_single_row_slide_cat', false),
		//product-slider
		'open_shop_single_row_prdct_slide' => get_theme_mod('open_shop_single_row_prdct_slide', false),
		//product-list
		'open_shop_single_row_prdct_list' => get_theme_mod('open_shop_single_row_prdct_list', false),
		//cat-tab-list-filter
		'open_shop_single_row_slide_cat_tb_lst' => get_theme_mod('open_shop_single_row_slide_cat_tb_lst', false),
		//rtl
		'open_shop_rtl' => get_theme_mod('open_shop_rtl', false),
		'opnonce'         => wp_create_nonce( 'openshop_nonce' ),
		
	);

	wp_localize_script('thunk-open-shop-woo-js', 'openshop',  $localize);
}

function hunk_companion_top_store_scripts()
{
	wp_enqueue_style('owl.carousel-css', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/css/owl.carousel.css', array(), '1.0.0');
	wp_enqueue_script('owl.carousel-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/owl.carousel.js', array('jquery'), '', false);
	wp_enqueue_script('jssor.slider-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-shop/assets/js/jssor.slider.min.js', array('jquery'), '', false);
	wp_enqueue_script('thunk-top-store-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'top-store/assets/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('thunk-top-store-woo-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'top-store/top-store-admin/woo/js/woocommerce.js', array('jquery'), '', true);
	$openshoplocalize = array(
		'top_store_top_slider_optn' => get_theme_mod('top_store_top_slider_optn', false),
		'top_store_move_to_top_optn' => get_theme_mod('top_store_move_to_top', false),
		'top_store_top_slider_speed' => get_theme_mod('top_store_top_slider_speed', 1000),
		'top_store_sidebar_front_option' => get_theme_mod('top_store_sidebar_front_option', 'active-sidebar'),
	);
	wp_localize_script('thunk-top-store-custom-js', 'top_store',  $openshoplocalize);
	$localize = array(
		'ajaxUrl'  => admin_url('admin-ajax.php'),
		//cat-tab-filter
		'top_store_single_row_slide_cat' => get_theme_mod('top_store_single_row_slide_cat', false),
		//product-slider
		'top_store_single_row_prdct_slide' => get_theme_mod('top_store_single_row_prdct_slide', false),
		//product-list
		'top_store_single_row_prdct_list' => get_theme_mod('top_store_single_row_prdct_list', false),

		//cat-tab-list-filter
		'top_store_single_row_slide_cat_tb_lst' => get_theme_mod('top_store_single_row_slide_cat_tb_lst', false),

		'top_store_cat_slider_optn' => get_theme_mod('top_store_cat_slider_optn', false),
		'top_store_product_slider_optn' => get_theme_mod('top_store_product_slider_optn', false),
		'top_store_category_slider_optn' => get_theme_mod('top_store_category_slider_optn', false),
		'top_store_product_list_slide_optn' => get_theme_mod('top_store_product_list_slide_optn', false),
		'top_store_brand_slider_optn' => get_theme_mod('top_store_brand_slider_optn', false),
        'nonce'         => wp_create_nonce( 'topstore_nonce' ),

	);

	wp_localize_script('thunk-top-store-woo-js', 'topstore',  $localize);
}

function hunk_companion_portfoliolite_scripts()
{
	wp_enqueue_style('animate', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/css/animate.css', array(), '1.0.0');
	wp_enqueue_style('portfoliolite-owl.carousel', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/css/owl.carousel.css', array(), '1.0.0');
	wp_add_inline_style('portfoliolite-style', portfoliolite_plug_custom_style());

	wp_enqueue_script('masonry', array('imagesloaded'));
	wp_enqueue_script('portfoliolite-wow', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/wow.js', array('jquery'), '', true);

	wp_enqueue_script('portfoliolite-isotope', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/isotope.pkgd.min.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-bxslider', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/jquery.bxslider.min.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-flexslider', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/jquery.flexslider.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-typer', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/jquery.typer.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-modernizr', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/modernizr-2.6.2.min.js', array('jquery'), '', true);

	wp_enqueue_script('portfoliolite-owl.carousel', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/owl.carousel.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-skrollr', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/skrollr.js', array('jquery'), '', true);
	wp_enqueue_script('portfoliolite-wow', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/wow.js', array('jquery'), '', true);

	wp_enqueue_script('portfoliolite-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/custom.js', array('jquery'), '1.0.0', true);
	wp_localize_script('portfoliolite-custom-js', 'frontendajax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'portnonce'         => wp_create_nonce( 'portfoliolite_nonce' ),
	));
}

function hunk_companion_portfoliolite_customizer_scripts()
{
	wp_enqueue_script('portfoliolite-widget', HUNK_COMPANION_PLUGIN_DIR_URL . 'portfoliolite/assets/js/widget.js', array('jquery'), '', true);
}

function hunk_companion_open_mart_scripts()
{
	wp_enqueue_style('owl.carousel-css', HUNK_COMPANION_PLUGIN_DIR_URL . 'almaira-shop/assets/css/owl.carousel.css', array(), '1.0.0');
	wp_add_inline_style('open-mart-style', open_mart_th_custom_style());
	wp_enqueue_script('owl.carousel-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/js/gogo-js/owl.carousel.js', array('jquery'), '', false);
	wp_enqueue_script('jssor.slider-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-shop/assets/js/jssor.slider.min.js', array('jquery'), '', false);
	wp_enqueue_script('thunk-open-mart-sticky-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-mart/assets/js/sticky-sidebar.js', array('jquery'), '', true);
	wp_enqueue_script('thunk-open-mart-custom-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-mart/assets/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('thunk-open-mart-woo-js', HUNK_COMPANION_PLUGIN_DIR_URL . 'open-mart/open-mart-admin/woo/js/woocommerce.js', array('jquery'), '1.0.0', true);
	$openmartlocalize = array(
		'open_mart_top_slider_optn' => get_theme_mod('open_mart_top_slider_optn', false),
		'open_mart_move_to_top_optn' => get_theme_mod('open_mart_move_to_top', false),
		'open_mart_pro_sticky_header_effect' => get_theme_mod('open_mart_pro_sticky_header_effect', 'scrltop'),
		'open_mart_slider_speed' => get_theme_mod('open_mart_slider_speed', '3000'),
		//End-to-End
		'open_mart_page_lyout_endtoend' => get_theme_mod('open_mart_page_lyout_endtoend', false),
	);
	wp_localize_script('thunk-open-mart-custom-js', 'open_mart_obj',  $openmartlocalize);
	$localize = array(
		'ajaxUrl'  => admin_url('admin-ajax.php'),
		//cat-tab-filter
		'open_mart_cat_adimg' =>  get_theme_mod('open_mart_cat_adimg', ''),
		'open_mart_cat_slider_optn' => get_theme_mod('open_mart_cat_slider_optn', false),

		//cat-slider
		'open_mart_category_slider_optn' => get_theme_mod('open_mart_category_slider_optn', false),
		'open_mart_cat_slider_heading' => get_theme_mod('open_mart_cat_slider_heading', 'Category Slider'),
		//product-list
		'open_mart_single_row_prdct_list' => get_theme_mod('open_mart_single_row_prdct_list', false),
		'open_mart_product_list_slide_optn' => get_theme_mod('open_mart_product_list_slide_optn', false),
		'open_mart_pl_image' =>  get_theme_mod('open_mart_pl_image', ''),


		//vert-tab-filter
		'open_mart_single_row_slide_cat_vt' => get_theme_mod('open_mart_single_row_slide_cat_vt', false),
		'open_mart_vt_cat_slider_optn' => get_theme_mod('open_mart_vt_cat_slider_optn', false),
		'open_mart_vt_banner_atply' => get_theme_mod('open_mart_vt_banner_atply', false),
		//category-filter
		'open_mart_cat_item_no'	=>	get_theme_mod('open_mart_cat_item_no', 10),
		'opmrtnonce'         => wp_create_nonce( 'openmart_nonce' ),
	);

	wp_localize_script('thunk-open-mart-woo-js', 'openmart',  $localize);
}

function hunk_companion_thsm_admin_scripts(){
        wp_localize_script('th-shop-mania-admin-load', 'hunk_companion_import',  
            array(
            'plugin'                   => 'hunk-companion'
           )
         );
    }