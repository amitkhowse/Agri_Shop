<?php
if(get_theme_mod('top_store_disable_ribbon_sec',false) == true){
    return;
  }
?>
<section class="thunk-ribbon-section">
<?php top_store_display_customizer_shortcut( 'top_store_ribbon' );?>
<div class="content-wrap">
    <div class="thunk-ribbon-content">
    	<div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('top_store_ribbon_text','Big offers on new collection')); ?></h3></div>
    	<?php if(get_theme_mod('top_store_ribbon_btn_text','Call To Action')!==''):?>
    	<div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('top_store_ribbon_btn_link','#'));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('top_store_ribbon_btn_text','Call To Action'));?></a></div>
        <?php endif; ?>
    </div>
</div>
</section>