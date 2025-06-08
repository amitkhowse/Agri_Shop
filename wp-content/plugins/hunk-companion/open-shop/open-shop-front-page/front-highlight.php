<?php
if(get_theme_mod('open_shop_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
	 <?php open_shop_display_customizer_shortcut( 'open_shop_highlight' );?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  Open_Shop_Defaults_Models::instance()->get_feature_default();
            open_shop_highlight_content('open_shop_highlight_content', $default);
           ?>
      </div>
  </div>
</section>