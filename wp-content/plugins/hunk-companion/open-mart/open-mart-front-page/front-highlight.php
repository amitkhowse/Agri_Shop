<?php
if(get_theme_mod('open_mart_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
   <div class="container">
	 <?php open_mart_display_customizer_shortcut( 'open_mart_highlight' );?>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">
          <?php   
            $default =  open_mart_Defaults_Models::instance()->get_feature_default();
            open_mart_highlight_content('open_mart_pro_highlight_content', $default);
           ?>
      </div>
  </div>
</div>
</section>