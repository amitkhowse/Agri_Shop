<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
if ( ! class_exists( 'WooCommerce' ) ){
     return;
}
$hide_section = get_theme_mod( 'almaira_shop_category_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
?>

<section id="th-categories" class="thunk-category-section">
  <?php almaira_shop_display_customizer_shortcut( 'almaira_shop_category_section' );?>
    <div class="container">
      <div class="content-area">
      
      <div class="thunk-category-list">
        <div class="category-left">
        <h2 class="category-side-title">
        <?php 
        if( get_theme_mod( 'almaira_shop_category_heading') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_category_heading','') );
        }
        else{
      esc_html_e( 'CATEGORY' , 'hunk-companion' );
        }
        ?>
        </h2>
      </div>
      
        <div class="thunk-category-wrapper owl-carousel">
          <?php   
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('almaira_shop_category_cate',0); 
      // category filter  
      $args = array(
            
            'orderby'    => 'title',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'include'    => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';
      if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
        $term_link = get_term_link( $product_category, 'product_cat' );
  $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
  $image = wp_get_attachment_url( $thumbnail_id ); 
  
              $current_class = '';
             
$category_list .='<div class="thunk-category">
          <a href="'.$term_link.'">
            <img src="' . $image . '" alt="" />
            <span class="title">'.$product_category->name. ' ('.$product_category->count.')</span>
           </a>
          </div>';
          }
          echo $category_list;
       }
    } 

  ?>
        </div> <!-- thunk-category-wrapper End -->
      </div> <!-- thunk-category-list End -->
      </div> <!-- content-area End -->
    </div> <!-- Container End -->
  </section>
  <?php } ?>