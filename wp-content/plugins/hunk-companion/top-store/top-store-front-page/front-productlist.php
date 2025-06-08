<?php
if(get_theme_mod('top_store_disable_product_list_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-list-section">
        <?php top_store_display_customizer_shortcut( 'top_store_product_slide_list' );?>
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('top_store_product_list_heading','Product List'));?></span>
   </h4>
</div>
<div class="content-wrap">
    <div class="thunk-slide thunk-product-list owl-carousel">
      <?php    
          $term_id = get_theme_mod('top_store_product_list_cat',0);  
          $prdct_optn = get_theme_mod('top_store_product_list_optn','recent');
          top_store_product_slide_list_loop($term_id,$prdct_optn); 
      ?>
    </div>
  </div>
</section>