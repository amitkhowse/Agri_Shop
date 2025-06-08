<?php
if(get_theme_mod('top_store_disable_brand_sec',false) == true){
    return;
  }
?>
<section class="thunk-brand-section">
<?php top_store_display_customizer_shortcut( 'top_store_brand' );?>
<div class="content-wrap">
    <div class="thunk-slide thunk-brand owl-carousel">
    	<?php   
             top_store_brand_content('top_store_brand_content','');
        ?>
    </div>
</div>
</section>