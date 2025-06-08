<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/***************************/
//category product section product ajax filter
/***************************/
add_action('wp_ajax_top_store_cat_filter_ajax', 'top_store_cat_filter_ajax');
add_action('wp_ajax_nopriv_top_store_cat_filter_ajax', 'top_store_cat_filter_ajax');
function top_store_cat_filter_ajax(){

if ( ! current_user_can( 'administrator' ) ) {
  
        wp_die( - 1, 403 );
        
    } 

check_ajax_referer('topstore_nonce','nonce');

if(isset($_POST['data_cat_slug'])){
$prdct_optn = get_theme_mod('top_store_category_optn','recent');
$args = top_store_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
top_store_product_filter_loop($args);
 }
exit;
}
/*****************************************/
//Product filter for List View ajax filter
/*******************************************/
// add_action('wp_ajax_top_store_cat_list_filter_ajax', 'top_store_cat_list_filter_ajax');
// add_action('wp_ajax_nopriv_top_store_cat_list_filter_ajax', 'top_store_cat_list_filter_ajax');
// function top_store_cat_list_filter_ajax(){
// if(isset($_POST['data_cat_slug'])){
// $prdct_optn = get_theme_mod('top_store_category_tb_list_optn','recent');
// $args = top_store_product_query(sanitize_key($_POST['data_cat_slug']),$prdct_optn);
//  top_store_product_list_filter_loop($args);
// }
//     exit;
// }