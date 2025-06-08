<?php
if(get_theme_mod('open_mart_disable_cat_sec',false) == true){
    return;
  }
if (get_theme_mod('open_mart_cat_adimg','') != '') {
 $banner_img = 'image-enable';
}
else{
 $banner_img = 'image-disable';
}
?>

<section class="thunk-product-tab-section">
   <div class="container">
  <?php open_mart_display_customizer_shortcut( 'open_mart_category_tab_section' );?>
 <!-- thunk head start -->
  <div id="thunk-cat-tab" class="thunk-cat-tab">
  <div class="thunk-heading-wrap">
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('open_mart_cat_tab_heading','Tabbed Product Caraousel'));?></span>
   </h4>
  </div>
<!-- tab head start -->
<?php  $term_id = get_theme_mod('open_mart_category_tab_list');   
open_mart_category_tab_list($term_id); 
?>
</div>
<!-- tab head end -->
<div class="content-wrap">
 <?php  if (get_theme_mod('open_mart_cat_adimg','') != '') { ?>
  <div class="tab-image">
    <img src="<?php echo esc_url(get_theme_mod('open_mart_cat_adimg','')); ?>">
  </div>
  <?php  }  ?>
  <div class="tab-content <?php echo esc_attr($banner_img); ?>">
      <div class="thunk-slide thunk-product-cat-slide owl-carousel">
       <?php 
          $term_id = get_theme_mod('open_mart_category_tab_list'); 
          $prdct_optn = get_theme_mod('open_mart_category_optn','recent');
          open_mart_product_cat_filter_default_loop($term_id,$prdct_optn); 
         ?>
      </div>
  </div>
  </div>
</div>
</div>
</section>