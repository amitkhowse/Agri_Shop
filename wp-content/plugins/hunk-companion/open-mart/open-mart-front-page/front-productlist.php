<?php
if(get_theme_mod('open_mart_disable_product_list_sec',false) == true){
    return;
  }
$plbanner = get_theme_mod('open_mart_pl_image','');
if ($plbanner != '') {
 $img_enable = 'img-enable';
}
else{
  $img_enable = 'img-disable';
}
?>
<section class="thunk-product-list-section">
   <div class="container">
        <?php open_mart_display_customizer_shortcut( 'open_mart_product_slide_list' );?>
<div class="content-wrap">
  <div class="thunk-pl-wrapper"> 
      <?php
       if ($plbanner != '') { ?>
        <div class="thunk-pl-banner">
          <img src="<?php echo esc_url($plbanner);?>">
        </div>
     <?php  } ?>
    <div class="thunk-pl-content <?php echo esc_attr($img_enable); ?>">
      <div class="thunk-heading">
        <h4 class="thunk-title">
      <span class="title"><?php echo esc_html(get_theme_mod('open_mart_product_list_heading','Product List'));?></span>
      </h4>
      </div>
      <div class="thunk-slide thunk-product-list owl-carousel">
      <?php    
          $term_id = get_theme_mod('open_mart_product_list_cat'); 
          $prdct_optn = get_theme_mod('open_mart_product_list_optn','recent');
          open_mart_product_slide_list_loop($term_id,$prdct_optn,'singlerow'); 
      ?>
      </div>
    </div>
  </div>
    
  
  </div>
</div>
</section>