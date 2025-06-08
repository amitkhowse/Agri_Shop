<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'almaira_shop_ribbon_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
?>
<section id="th-ribbon" class="thunk-ribbon">
<?php almaira_shop_display_customizer_shortcut( 'almaira_shop_ribbon_section' );?>
  
    <div class="container">

      <?php if(get_theme_mod( 'almaira_shop_ribbon_heading')|| get_theme_mod('almaira_shop_ribbon_desc')||  get_theme_mod( 'almaira_shop_ribbon_button_text')!=="" ):?>
      <div class="content-area">
        <div class="thunk-ribbon-wrapper">
          <?php if( get_theme_mod( 'almaira_shop_ribbon_heading')!==""){?>
          <h1 class="heading">
            <?php 
               echo esc_html( get_theme_mod( 'almaira_shop_ribbon_heading','Listen To Your Customers. They Will Tell You All About') );
           ?>
          </h1>
        <?php } ?>
         <?php if(get_theme_mod('almaira_shop_ribbon_desc')!==""){ ?>
          <p class="rbn-desc"> <?php echo esc_html( get_theme_mod('almaira_shop_ribbon_desc')); ?></p>
         <?php } ?>

         <?php if( get_theme_mod( 'almaira_shop_ribbon_button_text')!==""){ ?>
          <a href="<?php echo esc_attr(get_theme_mod( 'almaira_shop_ribbon_button_link','#')); ?>" class="th-button">
          <?php 
            echo esc_html( get_theme_mod('almaira_shop_ribbon_button_text','Discover Now') );?>
          </a>
        <?php } ?>

        </div> <!-- thunk-ribbon-wrapper End -->
      </div> <?php endif ?><!-- content-area End -->
         <?php
      while( have_posts() ):
             the_post();
             the_content();
             endwhile; 
             wp_reset_postdata()
          ?>
      </div><!-- Container End -->
</section> 
<?php } ?>