<?php
if(get_theme_mod('open_shop_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">
	<?php open_shop_display_customizer_shortcut( 'open_shop_banner' );?>
	
  <?php open_shop_front_banner(); ?>

</section>