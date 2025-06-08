<?php
$i = 0;
if(!portfoliolite_checkbox_filter('slider','section_on_off')) :
?>
<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('slider_speed','') != '') { echo stripslashes(get_theme_mod('slider_speed')); } else { ?>3000<?php } ?>"/>
<input type="hidden" id="typer_speed" value="<?php if (get_theme_mod('typer_speed','') != '') { echo stripslashes(get_theme_mod('typer_speed')); } else { ?>100<?php } ?>"/>
<div id="page-top"  class="slider-top">
     <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_top_slider_section' );?>
     <div class="flexslider">
          <div class="slider-caption">
               <div class="portfolio-desc">
                    <div class="container">
                    <?php if (get_theme_mod('parallax_heading','') != ''){?>
                    <p class="th-slider-heading wow fadeInLeft" data-wow-delay="1s"><?php echo esc_html(get_theme_mod('parallax_heading'));?></p>
                    <?php }else{?>
                    <p class="th-slider-heading wow fadeInLeft" data-wow-delay="1.2s"><?php esc_html_e('I am Wordpress developer','portfolioline'); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('parallax_subheading_one','I Know WordPress Theme Development') !== '') { ?>
                    <p class="typer wow fadeInLeft" data-wow-delay="1.3s" data-typer-targets = "<?php echo esc_html(get_theme_mod('parallax_subheading_one','I Know WordPress Theme Development'));?><br />
                         <?php echo esc_html(get_theme_mod('parallax_subheading_two','I Know WordPress Plugin Development'));?><br />
                         <?php echo esc_html(get_theme_mod('parallax_subheading_three','I Know WordPress Support'));?>" data-deleteDelay="1000">
                    </p>
                    <?php } else { ?>
                    <p class="wow fadeInLeft" data-wow-delay="1.3s"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit','portfolioline'); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('parallax_button_text1','') != ''){?>
                    <a class="shw-btn" href="<?php echo esc_url(get_theme_mod('parallax_button_link1')); ?>"><button class="wow fadeInLeft" data-wow-delay="1.4s"><?php echo esc_html(get_theme_mod('parallax_button_text1')); ?></button></a>
                    <?php }else{ ?>
                    <a class="shw-btn" href="#"><button class="wow fadeInLeft" data-wow-delay="1.4s"><?php esc_html_e('SHOW PROFILE','portfolioline'); ?></button></a>
                    <?php } ?>
                    <?php if (get_theme_mod('parallax_button_text2','') != ''){?>
                    <a class="exp-btn" href="<?php echo esc_url(get_theme_mod('parallax_button_link2')); ?>"><button class="wow fadeInLeft" data-wow-delay="1.4s"><?php echo esc_html(get_theme_mod('parallax_button_text2')); ?></button></a>
                    <?php } 
                    else{ ?>
                    <a class="exp-btn" href="#"><button class="wow fadeInLeft" data-wow-delay="1.4s">Read More</button></a>
                  <?php  }?>
               </div>
          </div>
          </div>
          <?php if (get_theme_mod('top_parallax','on') == 'on') { ?>
          <ul class="slides">
               <!-- first image -->
               <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
               <li data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" style="background:url('<?php echo esc_url(get_theme_mod('first_slider_image')); ?>');" class="plrx_enable">
                    <div class="overlay"></div>
               </li>
               <?php } else { ?>
               <li data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" style="background:url('<?php echo esc_url(PORTFOLIOLITE_SLIDER_IMG) ?>');" class="plrx_enable">
                    <div class="overlay">
                    </div>
               </li>
               <?php } ?>
               <!-- second image -->
               <?php if (get_theme_mod('second_slider_image','') != '') { $i++; ?>
               <li data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" style="background:url('<?php echo esc_url(get_theme_mod('second_slider_image')); ?>');"class="plrx_enable">
                    <div class="overlay">
                    </div>
               </li>
               
               
               <?php } ?>
               <!-- Third image -->
               <?php if (get_theme_mod('third_slider_image','') != '') { $i++; ?>
               <li data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" style="background:url('<?php echo esc_url(get_theme_mod('third_slider_image')); ?>');"class="plrx_enable">
                    <div class="overlay">
                    </div>
               </li>
               <?php } ?>
          </ul>
          <?php } else { ?>
          <ul class="slides">
               <!-- first image -->
               <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
               <li style="background:url('<?php echo PORTFOLIOLITE_SLIDER_IMG ?>');">
                    <div class="overlay">
                    </div>
               </li>
               <?php } else { ?>
               <li style="background:url('<?php echo PORTFOLIOLITE_SLIDER_IMG ?>');">
                    <div class="overlay">
                    </div>
               </li>
               <?php } ?>
               <!-- second image -->
               <?php if (get_theme_mod('second_slider_image','') != '') { $i++; ?>
               <li style="background:url('<?php echo esc_url(get_theme_mod('second_slider_image')); ?>');">
                    <div class="overlay">
                    </div>
               </li>
               
               
               <?php } ?>
               <!-- Third image -->
               <?php if (get_theme_mod('third_slider_image','') != '') { $i++; ?>
               <li  style="background:url('<?php echo esc_url(get_theme_mod('third_slider_image')); ?>');">
                    <div class="overlay">
                    </div>
               </li>
               <?php } ?>
          </ul>
          <?php }?>
          <div class="arrow-down" style="width:100%;text-align:center;z-index: 9999; position:absolute; bottom: 130px;">
               <a id="arrow-down" href="<?php echo esc_url(get_theme_mod('scroll_down_link'));?>"></a>
          </div>
     </div>
</div>
<?php endif; 