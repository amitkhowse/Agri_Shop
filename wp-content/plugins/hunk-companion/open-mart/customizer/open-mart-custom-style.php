<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function open_mart_th_custom_style(){
	$open_mart_style=""; 
//Vertical Tabbed Product Section
$open_mart_vt_banner_position = get_theme_mod('open_mart_vt_banner_position','left');
if ($open_mart_vt_banner_position =='left') {
        $open_mart_style.="
        .thunk-vertical-cat-tab1 .thunk-vt-banner-wrap{
          order:2;
        }
        .thunk-vertical-cat-tab1 .content-wrap{
          order:3;
        }
        ";
}
else{
        $open_mart_style.="
        .thunk-vertical-cat-tab1 .thunk-vt-banner-wrap{
          order:3;
        }
        .thunk-vertical-cat-tab1 .content-wrap{
          order:2;
        }
        ";
}
//ribbon
   $open_mart_ribbon_bg_img_url             = get_theme_mod('open_mart_ribbon_bg_img_url');
   $open_mart_ribbon_bg_background_repeat   = get_theme_mod('open_mart_ribbon_bg_background_repeat','no-repeat');
   $open_mart_ribbon_bg_background_size     = get_theme_mod('open_mart_ribbon_bg_background_size','auto');
   $open_mart_ribbon_bg_background_position = get_theme_mod('open_mart_ribbon_bg_background_position','center center');
   $open_mart_ribbon_bg_background_attach  = get_theme_mod('open_mart_ribbon_bg_background_attach','scroll');
   $open_mart_style.="section.thunk-ribbon-section .content-wrap{
    background-image:url($open_mart_ribbon_bg_img_url);
    background-repeat:{$open_mart_ribbon_bg_background_repeat};
    background-size:{$open_mart_ribbon_bg_background_size};
    background-position:{$open_mart_ribbon_bg_background_position};
    background-attachment:{$open_mart_ribbon_bg_background_attach};}
    ";
		return $open_mart_style;
}