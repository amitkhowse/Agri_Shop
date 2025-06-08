<?php
if(get_theme_mod('open_shop_disable_ribbon_sec',false) == true){
    return;
  }
?>
<section class="thunk-ribbon-section">
<?php open_shop_display_customizer_shortcut( 'open_shop_ribbon' );?>
<div class="content-wrap">
    <div class="thunk-ribbon-content">
    	<div class="thunk-ribbon-content-col1" ><h3><?php echo esc_html(get_theme_mod('open_shop_ribbon_text','')); ?></h3></div>
    	<?php if(get_theme_mod('open_shop_ribbon_btn_text','')!==''):?>
    	<div class="thunk-ribbon-content-col2" ><a href="<?php echo esc_url(get_theme_mod('open_shop_ribbon_btn_link',''));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('open_shop_ribbon_btn_text',''));?></a></div>
        <?php endif; ?>
    </div>
</div>
</section>