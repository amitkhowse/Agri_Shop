<?php
if(get_theme_mod('top_store_disable_top_slider_sec',false) == true){
    return;
  }
?>
<section class="thunk-slider-section   <?php echo esc_attr(get_theme_mod('top_store_top_slide_layout','slide-layout-5','slide-layout-5'));?>">
<?php top_store_display_customizer_shortcut( 'top_store_top_slider_section' );?>
<?php if(get_theme_mod('top_store_top_slide_layout','slide-layout-5')=='slide-layout-5'): ?>
<div  id="thunk-single-slider" style="position:relative;margin:0 auto;top:0px;left:0px;overflow:hidden;visibility:hidden;">
                          <div  data-u="slides" class="slides" >
                           <?php top_store_top_single_slider_content('top_store_top_slide_lay5_content', ''); ?>                    
                          </div> 
                <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssor-pagination" data-autocenter="1">
            <div data-u="prototype" class="i" >
                <svg viewBox="0 0 16000 16000">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>                             
 </div>
<?php endif; ?>      
</section>