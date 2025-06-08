<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/******************/
//Banner Function
/******************/
function top_store_front_banner(){
$top_store_banner_layout     = get_theme_mod( 'top_store_banner_layout','bnr-two');
// first
$top_store_bnr_1_img     = get_theme_mod( 'top_store_bnr_1_img','');
$top_store_bnr_1_url     = get_theme_mod( 'top_store_bnr_1_url','');
// second
$top_store_bnr_2_img     = get_theme_mod( 'top_store_bnr_2_img','');
$top_store_bnr_2_url     = get_theme_mod( 'top_store_bnr_2_url','');
// third
$top_store_bnr_3_img     = get_theme_mod( 'top_store_bnr_3_img','');
$top_store_bnr_3_url     = get_theme_mod( 'top_store_bnr_3_url','');
// fouth
$top_store_bnr_4_img     = get_theme_mod( 'top_store_bnr_4_img','');
$top_store_bnr_4_url     = get_theme_mod( 'top_store_bnr_4_url','');
// fifth
$top_store_bnr_5_img     = get_theme_mod( 'top_store_bnr_5_img','');
$top_store_bnr_5_url     = get_theme_mod( 'top_store_bnr_5_url','');

if($top_store_banner_layout=='bnr-one'){?>
<div class="thunk-banner-wrap bnr-layout-1 thnk-col-1">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($top_store_bnr_1_url);?>"><img src="<?php echo esc_url($top_store_bnr_1_img );?>"></a>
 	 	</div>
 	 </div>
  </div>
<?php }elseif($top_store_banner_layout=='bnr-two'){?>
<div class="thunk-banner-wrap bnr-layout-2 thnk-col-2">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($top_store_bnr_1_url);?>"><img src="<?php echo esc_url($top_store_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($top_store_bnr_2_url);?>"><img src="<?php echo esc_url($top_store_bnr_2_img );?>"></a></div>
 	 </div>
  </div>

<?php }elseif($top_store_banner_layout=='bnr-three'){?>
<div class="thunk-banner-wrap bnr-layout-3 thnk-col-3">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($top_store_bnr_1_url);?>"><img src="<?php echo esc_url($top_store_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($top_store_bnr_2_url);?>"><img src="<?php echo esc_url($top_store_bnr_2_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col3">
 	 	<div class="thunk-banner-col3-content"><a href="<?php echo esc_url($top_store_bnr_3_url);?>"><img src="<?php echo esc_url($top_store_bnr_3_img );?>"></a></div>
 	 </div>
  </div>
<?php }elseif($top_store_banner_layout=='bnr-four'){?>
 <div class="thunk-banner-wrap bnr-layout-4 thnk-col-5">
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_1_url);?>"><img src="<?php echo esc_url($top_store_bnr_1_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_2_url);?>"><img src="<?php echo esc_url($top_store_bnr_2_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_3_url);?>"><img src="<?php echo esc_url($top_store_bnr_3_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_4_url);?>"><img src="<?php echo esc_url($top_store_bnr_4_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_5_url);?>"><img src="<?php echo esc_url($top_store_bnr_5_img );?>"></a></div>
 	 </div>
  </div>
<?php }elseif($top_store_banner_layout=='bnr-five'){?>
 <div class="thunk-banner-wrap bnr-layout-5 thnk-col-4">
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_1_url);?>"><img src="<?php echo esc_url($top_store_bnr_1_img );?>"></a></div>
 	 	
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_2_url);?>"><img src="<?php echo esc_url($top_store_bnr_2_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_3_url);?>"><img src="<?php echo esc_url($top_store_bnr_3_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($top_store_bnr_4_url);?>"><img src="<?php echo esc_url($top_store_bnr_4_img );?>"></a></div>
 	 </div>
  </div>
<?php 
 }
}
/**********************/
// Top Slider Function
/**********************/
//Single Slider ontent output function layout 5
function top_store_top_single_slider_content( $top_store_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$top_store_slide_content = get_theme_mod( $top_store_slide_content_id, $default );
		if ( ! empty( $top_store_slide_content ) ) :
			$top_store_slide_content = json_decode( $top_store_slide_content );
			if ( ! empty( $top_store_slide_content) ) {
				foreach ( $top_store_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'top_store_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'top_store_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'top_store_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'top_store_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'top_store_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div class="th-slide-wrap">
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <a  href="<?php echo esc_url($link); ?>" class="th-slider-link">
                               	<?php if ($subtitle!='' || $title!='' || $text != '') { ?>           
                               	<span class="th-slide-content-wrap" >
                               	<h5 class="th-slide-subtitle"><?php echo esc_html($subtitle); ?></h5>
                               	<h2 class="th-slide-title"><?php echo esc_html($title); ?></h2>
                               	<h4 class="th-slide-button"><?php echo esc_html($text); ?></h4>
                               </span>
                          <?php } ?>
                               </a>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
//*********************//
// Highlight feature
//*********************//
function top_store_highlight_content($top_store_highlight_content_id,$default){
	$top_store_highlight_content= get_theme_mod( $top_store_highlight_content_id, $default );
//passing the seeting ID and Default Values

	if ( ! empty( $top_store_highlight_content ) ) :

		$top_store_highlight_content = json_decode( $top_store_highlight_content );
		if ( ! empty( $top_store_highlight_content ) ) {
			foreach ( $top_store_highlight_content as $ship_item ) :
               $icon   = ! empty( $ship_item->icon_value ) ? apply_filters( 'top_store_translate_single_string', $ship_item->icon_value, '' ) : '';
				$title    = ! empty( $ship_item->title ) ? apply_filters( 'top_store_translate_single_string', $ship_item->title, '' ) : '';
				$subtitle    = ! empty( $ship_item->subtitle ) ? apply_filters( 'top_store_translate_single_string', $ship_item->subtitle, '' ) : '';
					?>
         <div class="thunk-highlight-col">
          	<div class="thunk-hglt-box">
          		<div class="thunk-hglt-icon"><i class="<?php echo "fa ".esc_attr($icon); ?>"></i></div>
          		<div class="content">
          			<h6><?php echo esc_html($title);?></h6>
          			<p><?php echo esc_html($subtitle);?></p>
          		</div>
          	</div>
          </div>
    			<?php
			endforeach;
		}
	endif;
}
/**********************/
// Brand Function
/**********************/
//brand content output function
function top_store_brand_content( $top_store_brand_content_id, $default ) {
//passing the seeting ID and Default Values
	$top_store_brand_content= get_theme_mod( $top_store_brand_content_id, $default );
		if ( ! empty( $top_store_brand_content ) ) :
			$top_store_brand_content = json_decode( $top_store_brand_content );
			if ( ! empty( $top_store_brand_content ) ) {
				foreach ( $top_store_brand_content as $brand_item ) :
					$icon   = ! empty( $brand_item->icon_value ) ? apply_filters( 'top_store_translate_single_string', $brand_item->icon_value, 'Brand section' ) : '';

					$image = ! empty( $brand_item->image_url ) ? apply_filters( 'top_store_translate_single_string', $brand_item->image_url, 'Brand section' ) : '';

					$title  = ! empty( $brand_item->title ) ? apply_filters( 'top_store_translate_single_string', $brand_item->title, 'Brand section' ) : '';
					$text   = ! empty( $brand_item->text ) ? apply_filters( 'top_store_translate_single_string', $brand_item->text, 'Brand section' ) : '';
					$link   = ! empty( $brand_item->link ) ? apply_filters( 'top_store_translate_single_string', $brand_item->link, 'Brand section' ) : '';
					$color  = ! empty( $brand_item->color ) ? $brand_item->color : '';
			?>	
		<div class="thunk-brands">
         	<a target="_blank" href="<?php echo esc_url($link); ?>">
        		<img src="<?php echo esc_url($image); ?>" class="cate-img">
            </a>
        </div> <!-- thunk-brands End -->
	
			<?php	
				
				endforeach;			
			} // End if().
		
	endif;	
}

// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function top_store_display_customizer_shortcut( $class_name ){
	if ( ! is_customize_preview() ) {
		return;
	}
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
	echo'<span class="top-store-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}
function top_store_widget_script_registers(){
//widget
wp_enqueue_script( 'top-store_widget_js', HUNK_COMPANION_PLUGIN_DIR_URL .'top-store/widget/widget.js', array("jquery"), '', true  );
}
add_action('customize_controls_enqueue_scripts', 'top_store_widget_script_registers' );
add_action('admin_enqueue_scripts', 'top_store_widget_script_registers' );
/*****************/
/*mobile nav bar*/
/*****************/
function top_store_mobile_navbar(){?>
<div id="top-store-mobile-bar">
  <ul>
     <?php 
    if( class_exists( 'YITH_WCWL' )) { ?>
    <li><a class="gethome" href="<?php echo esc_url( get_home_url() ); ?>"><i class="th-icon below th-icon-home" aria-hidden="true"></i></a></li>
    <li><a class="whishlist" href="<?php echo esc_url( top_store_whishlist_url() ); ?>"><i  class="th-icon th-icon-heartline" aria-hidden="true"></i></a></li>
    <?php } ?>
    <li>
            <a href="#" class="menu-btn" id="mob-menu-btn">
              
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </div>
                
            </a>
 
       </li>
    <li><?php top_store_account();?></li>
    
    
  </ul>
</div>
<?php }
add_action( 'wp_footer', 'top_store_mobile_navbar' );