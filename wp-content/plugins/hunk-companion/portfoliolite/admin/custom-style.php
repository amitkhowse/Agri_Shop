<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function portfoliolite_plug_custom_style(){
$portfoliolite_style=""; 
     if (get_theme_mod('blog_page_image','') != '') {
   $portfoliolite_style.=".blog-image.hd-img{background-image:url({$blog_page_image});}";
 } else {
   $portfoliolite_style.=".blog-image.hd-img{background-image: url(PORTFOLIOLITE_RESUME_SECTION_BG);}";
  }
    //slider   
    $ovrly_color = get_theme_mod('ovrly_color','rgba(41, 41, 41, 0.68)');
    $head_color   = get_theme_mod('parallax_head_color','');
    $typer_color  = get_theme_mod('parallax_typer_color','');
    $hd_btn_color = get_theme_mod('parallax_button_color','');
    $portfoliolite_style.=".overlay {
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: -1;
    background:$ovrly_color} .portfolio-desc p.th-slider-heading{color:$head_color} .portfolio-desc p{color:$typer_color} .portfolio-desc button{border:1px solid $hd_btn_color; color:$hd_btn_color} .portfolio-desc button:hover{background:$hd_btn_color; border-color:$hd_btn_color} .portfolio-desc .exp-btn button{background:$hd_btn_color} .portfolio-desc .exp-btn button{color:#fff; border-color:$hd_btn_color} .portfolio-desc .exp-btn button:hover{color:$hd_btn_color}";
    //portfolio
    $portfolio_bg_background  = get_theme_mod('portfolio_bg_background','color');
    $portfolio_bg_image  = get_theme_mod('portfolio_bg_image','');
    $portfolio_overly_color  = get_theme_mod('portfolio_overly_color');
    $portf_txt = get_theme_mod('portfo_txt_color','#000');
    $portfo_subtxt_color = get_theme_mod('portfo_subtxt_color','#000');
    $portfo_category_color = get_theme_mod('portfo_category_color','');
    $portfo_category_hvr_color = get_theme_mod('portfo_category_hvr_color','');
    $portfo_img_ovrly_color = get_theme_mod('portfo_img_ovrly_color','');
    $portfo_img_capn_color = get_theme_mod('portfo_img_capn_color','');
    $portfoliolite_style.="
    #portfolio-mywork-section:before{background:{$portfolio_overly_color}} #portfolio-mywork-section h2.main-heading{color:{$portf_txt}} #portfolio-mywork-section p.sub-heading{color:{$portfo_subtxt_color}} ul.portfolio-navi button{color:{$portfo_category_color};border-color:{$portfo_category_color} } ul.portfolio-navi button:hover,
ul.portfolio-navi button.is-checked{color:{$portfo_category_hvr_color}; border-color:{$portfo_category_hvr_color}} figure.protfolio-img-efc:after{background:{$portfo_img_ovrly_color}} figure.protfolio-img-efc h3{color:{$portfo_img_capn_color}}figure.protfolio-img-efc h3:after{background:{$portfo_img_capn_color}}";

   //testimonial    
	$testimonial_bg_background = get_theme_mod('testimonial_bg_background','image');
    $testimonial_bg_image    = get_theme_mod('testimonial_bg_image',PORTFOLIOLITE_TESTIM_SECTION_BG);
    $testimonial_img_overly_color    = get_theme_mod('testimonial_img_overly_color','');
    $testimonial_title_color    = get_theme_mod('testimonial_title_color','');
    $testimonial_desc_color    = get_theme_mod('testimonial_desc_color','');
    $testimonial_dots_color    = get_theme_mod('testimonial_dots_color','');  
    $portfoliolite_style.=".testimonials{background:url($testimonial_bg_image )}  .testimonials:before{background:{$testimonial_img_overly_color}} .test-cont-heading h3{color:{$testimonial_title_color}} .test-cont{color:{$testimonial_desc_color}; border-color:{$testimonial_desc_color}} .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.bx-wrapper .bx-pager.bx-default-pager a.active{background:{$testimonial_dots_color}}";

   // team
    $team_img_overly_color  = get_theme_mod('team_img_overly_color');
    $team_txt = get_theme_mod('team_txt_color','#000');
    $team_subtxt_color = get_theme_mod('team_subtxt_color','');
    $portfoliolite_style.="#team-info:before{
background:{$team_img_overly_color}} #team-info h2.main-heading{color:{$team_txt}} #team-info p.sub-heading{color:{$team_subtxt_color}}";

   // ribbon    
    $ribbonbtm_bg_background = get_theme_mod('ribbonbtm_bg_background','image');
    $ribbonbtm_bg_image    = get_theme_mod('ribbonbtm_bg_image',PORTFOLIOLITE_TESTIM_SECTION_BG);
    $ribbonbtm_img_overly_color    = get_theme_mod('ribbonbtm_img_overly_color');
    $ribbon_txt_color     = get_theme_mod('ribbon_txt_color','');
    $ribbon_bnt_color     = get_theme_mod('ribbon_bnt_color','');
    $ribbon_bnt_hvr_color = get_theme_mod('ribbon_bnt_hvr_color','');
    $portfoliolite_style.="#call-ribbon{background:url($ribbonbtm_bg_image)} #call-ribbon:before{background:{$ribbonbtm_img_overly_color}} #call-ribbon h3{color:{$ribbon_txt_color}} #call-ribbon .button-ribbon{border:1px solid $ribbon_bnt_color; background:$ribbon_bnt_color; color:$ribbon_bnt_hvr_color} #call-ribbon .button-ribbon:hover{background:{$ribbon_bnt_hvr_color}; color:{$ribbon_bnt_color}}";

   // new letter   
    $news_bg_background = get_theme_mod('news_bg_background','image');
    $news_bg_image    = get_theme_mod('news_bg_image',PORTFOLIOLITE_TESTIM_SECTION_BG);
    $news_img_overly_color    = get_theme_mod('news_img_overly_color','');
    $news_title_clr   = get_theme_mod('news_title_color','');
    $news_bnt_clr     = get_theme_mod('news_button_color','');
    $news_bnt_hrv_clr = get_theme_mod('news_button_hvr_color','');
    $portfoliolite_style.="#new-letter{background:url($news_bg_image)} #new-letter:before{background:{$news_img_overly_color}} #new-letter .new-letter-block h3{color:{$news_title_clr}} #new-letter .button-news-letter{border:1px solid {$news_bnt_clr}; background:{$news_bnt_clr}; color:{$news_bnt_hrv_clr}} #new-letter .button-news-letter:hover{background:{$news_bnt_hrv_clr}; color:{$news_bnt_clr}} .new-letter-block .leadform-show-form.leadform-lite input[type='submit']{border:1px solid {$news_bnt_clr}!important; color:{$news_bnt_hrv_clr}!important; background:{$news_bnt_clr}!important} .new-letter-block .leadform-show-form.leadform-lite input[type='submit']:hover{background:{$news_bnt_hrv_clr}!important; color:{$news_bnt_clr}!important }";
   
   //blog   
    $blog_bg_background  = get_theme_mod('blog_bg_background','color');
    $blog_bg_image  = get_theme_mod('blog_bg_image','');
    $blog_img_overly_color  = get_theme_mod('blog_img_overly_color');
    $blog_bg     = get_theme_mod('blog_bg_color','#fff');
    $blog_page_image     = get_theme_mod('blog_page_image','');
    $blog_txt    = get_theme_mod('blog_txt_color','');
    $blog_subtxt    = get_theme_mod('blog_subtxt_color','');
    $colom_first  = get_theme_mod('blog_colm_color1','#E67E22');
    $colom_second = get_theme_mod('blog_colm_color2','#C0392B');
    $colom_third  = get_theme_mod('blog_colm_color3','#2980B9');
    $portfoliolite_style.="#latest-post:before{background:{$blog_img_overly_color}} #latest-post h2.main-heading{color:{$blog_txt}} #latest-post p.sub-heading{color:{$blog_subtxt}}
    i.post-list:nth-of-type(3n+1) figure.blog-efct h3, li.post-list:nth-of-type(3n+1) figure.blog-efct:before, li.post-list:nth-of-type(3n+1) figure.blog-efct:after {background:{$colom_first}} li.post-list:nth-of-type(3n+1) figure.blog-efct h3, li.post-list:nth-of-type(3n+1) figure.blog-efct:before, li.post-list:nth-of-type(3n+1) figure.blog-efct:after{background:{$colom_first}} li.post-list:nth-of-type(3n+2) figure.blog-efct h3, li.post-list:nth-of-type(3n+2) figure.blog-efct:before, li.post-list:nth-of-type(3n+2) figure.blog-efct:after{background:{$colom_second}} li.post-list:nth-of-type(3n+3) figure.blog-efct h3, li.post-list:nth-of-type(3n+3) figure.blog-efct:before, li.post-list:nth-of-type(3n+3) figure.blog-efct:after{background:{$colom_third}}";
  

   // contact   
    $portfoliolite_cnt_bg_image    = get_theme_mod('portfoliolite_cnt_bg_image',PORTFOLIOLITE_TESTIM_SECTION_BG);
    $portfoliolite_cnt_img_overly_color    = get_theme_mod('portfoliolite_cnt_img_overly_color');
    $portfoliolite_cnt_icon_color = get_theme_mod('portfoliolite_cnt_icon_color','');
    $portfoliolite_cnt_icon_text_color = get_theme_mod('portfoliolite_cnt_icon_text_color','');
   
    $footer_bg    = get_theme_mod('portfoliolite_footer_bg_color','#fff');
    $portfoliolite_footer_copybg_color = get_theme_mod('portfoliolite_footer_copybg_color','#F2F2F2');
    $footer_txt   = get_theme_mod('portfoliolite_footer_txt_color','#1f1f1f');
    $portfoliolite_footer_anch_color = get_theme_mod('portfoliolite_footer_anch_color','#666');
    $portfoliolite_style.="#contact-info{background-image:url($portfoliolite_cnt_bg_image)} #contact-info:before{background:{$portfoliolite_cnt_img_overly_color}} .contact-icon1 a:before,
.contact-icon3 a:before,
.contact-icon a i{color:{$portfoliolite_cnt_icon_color}} .contact-title a{color:{$portfoliolite_cnt_icon_text_color}} .company-detail,.footer-wrapper{background-color:{$footer_bg}} .nav-footer ul li a{color:{$portfoliolite_footer_anch_color}} .company-social a, .footer a,.company-social a, .footer a,.copyright-section a{color:{$portfoliolite_footer_anch_color}} .copyright-section{ background-color:{$portfoliolite_footer_copybg_color}} .copyright-section p{color:{$footer_txt}}";

    //service    
    $service_bg_background  = get_theme_mod('service_bg_background','color');
    $service_bg_image  = get_theme_mod('service_bg_image','');
    $service_img_overly_color  = get_theme_mod('service_img_overly_color');
    $service_txt = get_theme_mod('service_heading_color','');
    $service_subtxt_color = get_theme_mod('service_description_color','');
     $portfoliolite_style.=".thunk-service:before{background-color:{$service_img_overly_color}} .thunk-service h2.main-heading{color:{$service_txt}} .thunk-service p.sub-heading{color:{$service_subtxt_color}}";
    //Woocommerce Section   
    $woocommerce_bg_background  = get_theme_mod('woocommerce_bg_background','color');
    $woocommerce_bg_image  = get_theme_mod('woocommerce_bg_image','');
    $woocommerce_img_overly_color  = get_theme_mod('woocommerce_img_overly_color');
    $woocommerce_txt = get_theme_mod('woocommerce_heading_color','');
    $woocommerce_subtxt_color = get_theme_mod('woocommerce_description_color','');
     $portfoliolite_style.=".frontpage .th-woocommerce:before{background-color:{$woocommerce_img_overly_color}} .th-woocommerce h2.main-heading{color:{$woocommerce_txt}} .th-woocommerce p.sub-heading{color:{$woocommerce_subtxt_color}}";

return $portfoliolite_style;
}