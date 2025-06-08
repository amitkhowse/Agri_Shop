<?php
if(get_theme_mod('open_mart_disable_ribbon_sec',false) == true){
    return;
  }
  $open_mart_ribbon_side = get_theme_mod('open_mart_ribbon_side','right');
  if (get_theme_mod('open_mart_ribbon_text','Festive Sale') != '' || get_theme_mod('open_mart_ribbon_subheading','90% Off on new products') != '' || get_theme_mod('open_mart_ribbon_btn_text','Buy Now')!=='' || get_theme_mod('open_mart_ribbon_sideimg') != '') {
?>
<section class="thunk-ribbon-section">
	 <div class="container">
<?php open_mart_display_customizer_shortcut( 'open_mart_ribbon' );?>
<div class="content-wrap">
    <div class="thunk-ribbon-content <?php echo esc_attr($open_mart_ribbon_side); ?>">
    	<div class="thunk-ribbon-content-col1" >
    		
    	</div>
    	<div class="thunk-ribbon-content-col2" >
    		<div class="th-rbn-txtwrap">
    			<?php if (get_theme_mod('open_mart_ribbon_text','Festive Sale') != '') { ?>
    		<h3 class="rbn-heading"><?php echo esc_html(get_theme_mod('open_mart_ribbon_text','Festive Sale')); ?></h3> <?php }

    		if (get_theme_mod('open_mart_ribbon_subheading','90% Off on new products') != '') { ?>
    				<h5 class="rbn-subheading"><?php echo esc_html(get_theme_mod('open_mart_ribbon_subheading','90% Off on new products')); ?></h5>
    			<?php }  if(get_theme_mod('open_mart_ribbon_btn_text','Buy Now')!==''){ ?>
    			<a href="<?php echo esc_url(get_theme_mod('open_mart_ribbon_btn_link','#'));?>" class="ribbon-btn"><?php echo esc_html(get_theme_mod('open_mart_ribbon_btn_text','Buy Now'));?></a>
    			 <?php } ?>
    	</div>
    	</div>
    	<div class="thunk-ribbon-content-col3">
    		<?php if (get_theme_mod('open_mart_ribbon_sideimg') != '') { ?>
    		<div class="thunk-ribbon-sideimg">
    			<img src="<?php echo esc_url(get_theme_mod('open_mart_ribbon_sideimg'));?>">
    		</div>
    		<?php } ?>
    	</div>
    </div>
</div>
</div>
</section>
<?php }  ?>