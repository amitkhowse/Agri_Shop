<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'almaira_shop_slider_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
$slider_type = "non-responsive";
$slider_responsive= get_theme_mod( 'almaira_shop_slider_responsive');
  if ($slider_responsive == '1' ) {
  $slider_type = "responsive";
}
?>
<section id="th-slider" class="thunk-slider-section  <?php echo esc_attr($slider_type);?>">
   <?php almaira_shop_display_customizer_shortcut( 'almaira_shop_slider_section' );?>
      <div class="slider-content-area">
	<div id="slideshow" class="swiper-container main-slider loading  <?php echo esc_attr($slider_type);?>" data-mobileslider="<?php echo esc_attr($slider_type); ?>">
  <div class="swiper-wrapper th-swiper-wrapper">
    <?php   
    $default  =   Almaira_Shop_Defaults_Models::instance()->get_slider_default();

    almaira_slider_content('almaira_shop_slider_content', json_encode($default), $slider_type);
  ?> 
  </div>  <!-- swiper-wrapper End -->
  <!-- If we need navigation buttons -->
  <!-- <div class="swiper-button-prev swiper-button-white"></div>
  <div class="swiper-button-next swiper-button-white"></div> -->
 <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

</div> <!-- swiper-container End -->
    </div> <!-- slider-content-area End -->
  </section>
<?php } ?>