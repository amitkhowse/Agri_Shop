<?php
if(get_theme_mod('open_shop_disable_product_list_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-list-section">
<?php open_shop_display_customizer_shortcut( 'open_shop_product_slide_list' );?>
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo get_theme_mod('open_shop_product_list_heading','Product Slider');?></span>
   </h4>
</div>
<div class="content-wrap">
    <div class="thunk-slide thunk-product-list owl-carousel">
      <?php    
          $term_id = get_theme_mod('open_shop_product_list_cata');  
          open_shop_product_slide_list_loop($term_id,'recent'); 
      ?>
    </div>
  </div>
</section>