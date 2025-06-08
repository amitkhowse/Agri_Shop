<?php
if(get_theme_mod('open_mart_disable_top_slider_sec',false) == true){
    return;
  }
  $open_mart_top_slide_layout = get_theme_mod('open_mart_top_slide_layout','slide-layout-4');

  if ($open_mart_top_slide_layout == 'slide-layout-1') { ?>
<section class="thunk-slider-section   <?php echo esc_attr($open_mart_top_slide_layout);?> fullwidth">
  <?php open_mart_display_customizer_shortcut( 'open_mart_top_slider_section' );?>
  <div class="thunk-big-slider owl-carousel">
    <?php open_mart_top_big_slider_content('open_mart_top_slide_lay1_content','')   ?>
  </div>

</section>
  <?php }
  else{ ?>
<section class="thunk-slider-section   <?php echo esc_attr($open_mart_top_slide_layout);?>">
  <div class="container">
<?php open_mart_display_customizer_shortcut( 'open_mart_top_slider_section' );
  if($open_mart_top_slide_layout =='slide-layout-2'):?>
<div  id="thunk-widget-slider">
         <div class="thunk-widget-slider-wrap">
           <div class="thunk-slider-content">
               <div class="thunk-top2-slide owl-carousel">
                 <?php  open_mart_top_slider_2_content('open_mart_top_slide_lay2_content', ''); ?>      
               </div>
             </div>
           <div class="thunk-add-content">
                 <a href="<?php echo esc_url(get_theme_mod('open_mart_lay2_url'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay2_adimg'));?>"></a>
            </div>
         </div>    
    </div>                              
<?php elseif($open_mart_top_slide_layout =='slide-layout-3'): ?>

<div  id="thunk-3col-slider">
         <div class="thunk-3col-slider-wrap">
           <div class="thunk-slider-content">
               <div class="thunk-top2-slide owl-carousel">
               <?php  open_mart_top_slider_2_content('open_mart_top_slide_lay3_content', ''); ?>
               </div>
             </div>
           <div class="thunk-add-content">
                 <div class="thunk-3-add-content">
                   <div class="thunk-row">
                   <a href="<?php echo esc_url(get_theme_mod('open_mart_lay3_url'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay3_adimg'));?>"></a>
                   </div>
                   <div class="thunk-row">
                    <a href="<?php echo esc_url(get_theme_mod('open_mart_lay3_2url'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay3_adimg2'));?>"></a>
                   </div>
                   <div class="thunk-row"><a href="<?php echo esc_url(get_theme_mod('open_mart_lay3_3url'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay3_adimg3'));?>"></a>
                   </div>
                 </div>
            </div>
         </div>    
    </div> 
<?php elseif($open_mart_top_slide_layout =='slide-layout-4'): ?>
<div  id="thunk-2col-slider">
         <div class="thunk-2col-slider-wrap">
           <div class="thunk-slider-content">
               <div class="thunk-top2-slide owl-carousel">
                  <?php  open_mart_top_slider_2_content('open_mart_top_slide_lay4_content', ''); ?>
                  
               </div>
             </div>
           <div class="thunk-add-content">
                 <div class="thunk-2-add-content">
                   <div class="thunk-row">
                    <a href="<?php echo esc_url(get_theme_mod('open_mart_lay4_url1'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay4_adimg1'));?>"></a></div>
                   <div class="thunk-row">
                    <a href="<?php echo esc_url(get_theme_mod('open_mart_lay4_url2'));?>"><img src="<?php echo esc_url(get_theme_mod('open_mart_lay4_adimg2'));?>"></a>
                  </div>
                   
                 </div>
            </div>
         </div>    
    </div> 
<?php elseif($open_mart_top_slide_layout =='slide-layout-5'):
?>
<div  id="thunk-single-slider" class="owl-carousel">
                           <?php open_mart_top_single_slider_content('open_mart_top_slide_lay5_content', ''); ?>                                                         
 </div>
<?php endif; ?>  
 </div>    
</section>
<?php } 