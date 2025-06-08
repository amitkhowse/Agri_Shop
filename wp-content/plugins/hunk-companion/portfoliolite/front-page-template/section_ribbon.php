<?php
if(!portfoliolite_checkbox_filter('ribbon','section_on_off')) :
?>
<div class="clearfix"></div>

<section id="call-ribbon" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="plrx_enable th-call-ribbon">
  
       <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_ribbon_section' );?>
    <div class="container">
      <div class="page-call-ribbon">
        <div class="call-ribbon-block">
          <?php if(get_theme_mod( 'hb_heading_bottom')!==''){?>
          <h3 class="wow fadeInLeft" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'hb_heading_bottom')); ?></h3>
          <?php } else { ?>
          <h3 class="wow fadeInLeft" data-wow-delay="0.3s"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit','portfolioline'); ?></h3>
          <?php } ?>
          <div class="ribbon-button wow fadeInRight" data-wow-delay="0.3s">
            <?php if(get_theme_mod( 'hb_button_text_bottom')!=''){?>
            <a href="<?php echo esc_url(get_theme_mod( 'hb_button_link_bottom')); ?>"><button class="button-ribbon"><?php echo esc_html(get_theme_mod( 'hb_button_text_bottom')); ?></button></a>
            <?php } else { ?>
            <a href="#"><button class="button-ribbon"><?php esc_html_e('Call To New','portfolioline'); ?></button></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
  <?php endif; 