<?php
if(get_theme_mod('open_mart_disable_banner_sec',false) == true){
    return;
  }
  $open_mart_bnr_1_img     = get_theme_mod( 'open_mart_bnr_1_img','');
  // This is to to put limit atleat add 1 image
  if ($open_mart_bnr_1_img != '') { ?>
<section class="thunk-banner-section">
	 <div class="container">
	<?php open_mart_display_customizer_shortcut( 'open_mart_banner' );?>
	<div class="content-wrap">
  <?php open_mart_front_banner(); ?>
</div>
</div>
</section>
<?php } ?>