<?php
if(get_theme_mod('open_shop_disable_product_slide_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-slide-section">
    <?php open_shop_display_customizer_shortcut( 'open_shop_product_slide_section' );?>
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo get_theme_mod('open_shop_product_slider_heading','Product Slider');?></span>
   </h4>
</div>
<div class="content-wrap">
    <div class="thunk-slide thunk-product-slide owl-carousel">
      <?php    
          $term_id = get_theme_mod('open_shop_product_slider_cat');  
          open_shop_product_cat_filter_default_loop($term_id,'recent'); 
      ?>
    </div>
  </div>
</section>