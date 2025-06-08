<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

/***************************/
//category product section product ajax filter
/***************************/
add_action('wp_ajax_open_shop_cat_filter_ajax', 'open_shop_cat_filter_ajax');
add_action('wp_ajax_nopriv_open_shop_cat_filter_ajax', 'open_shop_cat_filter_ajax');
function open_shop_cat_filter_ajax(){
    
if ( ! current_user_can( 'administrator' ) ) {
  
        wp_die( - 1, 403 );
        
} 
check_ajax_referer('openshop_nonce','nonce');

if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('open_shop_category_optn','recent');
$args = open_shop_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
open_shop_product_filter_loop($args);
 }
exit;
}
 
/*****************************************/
//Product filter for List View ajax filter
/*******************************************/
// add_action('wp_ajax_open_shop_cat_list_filter_ajax', 'open_shop_cat_list_filter_ajax');
// add_action('wp_ajax_nopriv_open_shop_cat_list_filter_ajax', 'open_shop_cat_list_filter_ajax');
// function open_shop_cat_list_filter_ajax(){
// if(isset($_POST['data_cat_slug'])){
// $prdct_optn = get_theme_mod('open_shop_category_tb_list_optn','recent');
// $args = open_shop_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
// open_shop_product_list_filter_loop($args);
// }
// exit;
// }