<?php
if(!portfoliolite_checkbox_filter('news','section_on_off')) :
$contactus_shortcode = esc_html(get_theme_mod('contactus_shortcode','[lead-form form-id=1 title=Contact Us]'));
?>
<section id="new-letter" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="plrx_enable">
     <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_news_section' );?>
    <div class="container">
      <div class="page-new-letter">
        <div class="new-letter-block">
          <?php if(get_theme_mod( 'cf_head_')!=''){?>
          <h3 class="new-letter-title wow fadeInLeft" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'cf_head_')); ?></h3>
          <?php } else { ?>
          <h3 class="new-letter-title wow fadeInLeft" data-wow-delay="0.3s"><?php esc_html_e('Subscribe To Our News Letter','portfolioline'); ?></h3>
          <?php } ?>
          <div id="form-subscriber" style="display:none;">
            <?php echo do_shortcode($contactus_shortcode); ?>
          </div>
          <div class="news-button wow fadeInRight" data-wow-delay="0.3s">
            <?php if(get_theme_mod( 'cf_button_text_')!=''){?>
            <button id="Link"  class="button-news-letter" ><i class="<?php echo esc_attr(get_theme_mod( 'cf_button_icon_')); ?>"></i><?php echo esc_html(get_theme_mod( 'cf_button_text_')); ?></button>
            <?php } else { ?>
            <button id="Link"  class="button-news-letter" ><i class="fa fa-envelope-o"></i><?php esc_html_e('Click To Subscribe','portfolioline'); ?>
          </button>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; 