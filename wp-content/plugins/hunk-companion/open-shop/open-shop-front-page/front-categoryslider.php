<?php
if(get_theme_mod('open_shop_disable_category_slide_sec',false) == true){
    return;
  }
?>

<section class="thunk-category-slide-section">
      <?php open_shop_display_customizer_shortcut( 'open_shop_cat_slide_section' );?>
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo get_theme_mod('open_shop_cat_slider_heading','Category Slider');?></span>
   </h4>
</div>
<div class="content-wrap">
<?php if(get_theme_mod('open_shop_cat_slide_layout','cat-layout-1')=='cat-layout-1'):?>
<div class="thunk-slide thunk-cat-slide owl-carousel">
<?php   
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('open_shop_category_slide_list'); 
      // category filter  
      $args = array(
            
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'    => $term_id
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
                            <div class="thunk-cat-box">
                              <a href="'.$term_link.'">
                                 <img src="' . $image . '" alt="" />
                              </a>
                              </div>
                              <div class="thunk-cat-text">
                                   <div class="thunk-cat-title">
                                     <a href="'.$term_link.'"><span class="title">'.$product_category->name. '</span></a>
                                     </div>
                                     <div class="total-number"><span class="item">('.$product_category->count.')</span></div>
                              </div>
                                 
                  </div>';
          }
          echo $category_list;
       }
    } 

  ?>
  </div>

<?php endif;?>
</div>
</section>