<?php
if(get_theme_mod('open_mart_disable_vt_cat_sec',false) == true){
    return;
  }
  if (get_theme_mod('open_mart_vt1_banner_content','') !== ''){
    $banner_img = 'banner-img-on';
  }
  else{
    $banner_img = '';
  }
?>

<section class="thunk-vertical-product-tab-section <?php echo esc_attr($banner_img); ?>">
  <?php open_mart_display_customizer_shortcut( 'open_mart_vt_category_tab_section' );?>
   <div class="container">
  
 <!-- thunk head start -->
  <div id="thunk-vertical-cat-tab1" class="thunk-vertical-cat-tab1 thunk-vertical-cat-tab">
  <div class="thunk-heading-wrap">
    <?php if (get_theme_mod('open_mart_vt_cat_tab_heading','Vertical Product') != '') {?>
  <div class="thunk-heading">
    <h4 class="thunk-title">
    <span class="title"><?php echo esc_html(get_theme_mod('open_mart_vt_cat_tab_heading','Vertical Product'));?></span>
   </h4>
  </div>
<?php }  ?>
<!-- tab head start -->
<?php  $term_id = get_theme_mod('open_mart_vt_category_tab_list',0); ?> 
    <div class="desktop-view-tab-head">
      <?php open_mart_vertical_category_tab_list($term_id); ?>
    </div>
    <div class="resp-view-tab-head">
      <?php open_mart_vertical_category_tab_list2($term_id); ?>
    </div>
</div>
<!-- tab head end -->
<div class="content-wrap">
  <div class="tab-content">
      <div class="thunk-slide thunk-product-vertical-cat-slide1 owl-carousel">
       <?php 
          $term_id = get_theme_mod('open_mart_vt_category_tab_list',0); 
          $prdct_optn = get_theme_mod('open_mart_vt_category_optn','recent');
          open_mart_product_cat_filter_default_loop($term_id,$prdct_optn); 
         ?>
      </div>
    </div>
</div>
<?php if ($banner_img !== '') { ?>
<div class="thunk-vt-banner-wrap">
  <div class="thunk-vt1-banner owl-carousel">
    <?php  echo open_mart_vt1_banner_content('open_mart_vt1_banner_content','');  ?>
  </div>
  
</div>
<?php } ?>
</div>
</div>
</section>