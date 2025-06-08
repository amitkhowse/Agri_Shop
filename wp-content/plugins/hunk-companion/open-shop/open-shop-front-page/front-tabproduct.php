<?php
if(get_theme_mod('open_shop_disable_cat_sec',false) == true){
    return;
  }
?>

<section class="thunk-product-tab-section">
  <?php open_shop_display_customizer_shortcut( 'open_shop_category_tab_section' );?>
 <!-- thunk head start -->
  <div id="thunk-cat-tab" class="thunk-cat-tab">
  <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo get_theme_mod('open_shop_cat_tab_heading','Big Featured Slider');?></span>
   </h4>
  </div>
<!-- tab head start -->
<?php  $term_id = get_theme_mod('open_shop_category_tab_list');  
  
open_shop_category_tab_list($term_id); 
?>
</div>
<!-- tab head end -->
<div class="content-wrap">
  <div class="tab-content">
      <div class="thunk-slide thunk-product-cat-slide owl-carousel">
       <?php 
          open_shop_product_cat_filter_default_loop($term_id,'recent'); 
         ?>
      </div>
    </div>
  </div>
</div>
</section>