<?php 
/**
 * Common Function for Open Mart Theme.
 *
 * @package     Open Mart
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, Open Mart
 * @since       Open Mart 1.0.0
 */


/******************/
//Banner Function
/******************/
function open_mart_front_banner(){
$open_mart_banner_layout     = get_theme_mod( 'open_mart_banner_layout','bnr-one');
// first
$open_mart_bnr_1_img     = get_theme_mod( 'open_mart_bnr_1_img','');
$open_mart_bnr_1_url     = get_theme_mod( 'open_mart_bnr_1_url','');
// second
$open_mart_bnr_2_img     = get_theme_mod( 'open_mart_bnr_2_img','');
$open_mart_bnr_2_url     = get_theme_mod( 'open_mart_bnr_2_url','');
// third
$open_mart_bnr_3_img     = get_theme_mod( 'open_mart_bnr_3_img','');
$open_mart_bnr_3_url     = get_theme_mod( 'open_mart_bnr_3_url','');
// fouth
$open_mart_bnr_4_img     = get_theme_mod( 'open_mart_bnr_4_img','');
$open_mart_bnr_4_url     = get_theme_mod( 'open_mart_bnr_4_url','');
// fifth
$open_mart_bnr_5_img     = get_theme_mod( 'open_mart_bnr_5_img','');
$open_mart_bnr_5_url     = get_theme_mod( 'open_mart_bnr_5_url','');

if($open_mart_banner_layout=='bnr-one'){?>
<div class="thunk-banner-wrap bnr-layout-1 thnk-col-1">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a>
 	 	</div>
 	 </div>
  </div>
<?php }elseif($open_mart_banner_layout=='bnr-two'){?>
<div class="thunk-banner-wrap bnr-layout-2 thnk-col-2">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 </div>
  </div>

<?php }elseif($open_mart_banner_layout=='bnr-three'){?>
<div class="thunk-banner-wrap bnr-layout-3 thnk-col-3">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col3">
 	 	<div class="thunk-banner-col3-content"><a href="<?php echo esc_url($open_mart_bnr_3_url);?>"><img src="<?php echo esc_url($open_mart_bnr_3_img );?>"></a></div>
 	 </div>
  </div>
<?php }elseif($open_mart_banner_layout=='bnr-four'){?>
 <div class="thunk-banner-wrap bnr-layout-4 thnk-col-5">
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_3_url);?>"><img src="<?php echo esc_url($open_mart_bnr_3_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_4_url);?>"><img src="<?php echo esc_url($open_mart_bnr_4_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_5_url);?>"><img src="<?php echo esc_url($open_mart_bnr_5_img );?>"></a></div>
 	 </div>
  </div>
<?php }elseif($open_mart_banner_layout=='bnr-five'){?>
 <div class="thunk-banner-wrap bnr-layout-5 thnk-col-4">
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 	
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_3_url);?>"><img src="<?php echo esc_url($open_mart_bnr_3_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col">
 	 	<div class="thunk-banner-item"><a href="<?php echo esc_url($open_mart_bnr_4_url);?>"><img src="<?php echo esc_url($open_mart_bnr_4_img );?>"></a></div>
 	 </div>
  </div>
<?php 
 }elseif($open_mart_banner_layout=='bnr-six'){?>
<div class="thunk-banner-wrap bnr-layout-2-mix thnk-col-2">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 </div>
  </div>

<?php }elseif($open_mart_banner_layout=='bnr-seven'){?>
<div class="thunk-banner-wrap bnr-layout-3-mix thnk-col-3">
 	 <div class="thunk-banner-col1">
 	 	<div class="thunk-banner-col1-content"><a href="<?php echo esc_url($open_mart_bnr_1_url);?>"><img src="<?php echo esc_url($open_mart_bnr_1_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col2">
 	 	<div class="thunk-banner-col2-content"><a href="<?php echo esc_url($open_mart_bnr_2_url);?>"><img src="<?php echo esc_url($open_mart_bnr_2_img );?>"></a></div>
 	 </div>
 	 <div class="thunk-banner-col3">
 	 	<div class="thunk-banner-col3-content"><a href="<?php echo esc_url($open_mart_bnr_3_url);?>"><img src="<?php echo esc_url($open_mart_bnr_3_img );?>"></a></div>
 	 </div>
  </div>
<?php }
}

/**********************/
// Top Slider Function
/**********************/
//Slider ontent output function layout 1
function open_mart_top_slider_content( $open_mart_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$open_mart_slide_content = get_theme_mod( $open_mart_slide_content_id, $default );
		if ( ! empty( $open_mart_slide_content ) ) :
			$open_mart_slide_content = json_decode( $open_mart_slide_content );
			if ( ! empty( $open_mart_slide_content) ) {
				foreach ( $open_mart_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <div class="slide-content-wrap">
                                <div class="slide-content">
                                  <div class="logo">
                                  	<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($logo_image); ?>"></a>
                                  </div>
                                  <h2><?php echo esc_html($title); ?></h2>
                                  <p><?php echo esc_html($subtitle); ?></p>
                                  <?php if($text!==''): ?>
                                  <a class="slide-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
//Single Slider ontent output function layout 5
function open_mart_top_single_slider_content( $open_mart_slide_content_id, $default ){
//passing the seeting ID and Default Values	
	$open_mart_slide_content = get_theme_mod( $open_mart_slide_content_id, $default );
		if ( ! empty( $open_mart_slide_content ) ) :
			$open_mart_slide_content = json_decode( $open_mart_slide_content );
			if ( ! empty( $open_mart_slide_content) ) {
				foreach ( $open_mart_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
				 ?>
				 <?php if($image!==''):?>
				<div class="th-sinl-slide">
					<img data-u="image" src="<?php echo esc_url($image); ?>" />
					<a class="th-slides" href="<?php echo esc_url($link); ?>">
						<span class="th-slides-content">
					<?php   if ($subtitle != ''){ ?>
							<h4 class="th-slide-subtitle"><?php echo esc_html($subtitle); ?></h4>
							<?php } 
							if ($title != '') { ?>
							<h2 class="th-slide-title"><?php echo esc_html($title); ?></h2>
							<?php } 
							if ($text != ''){ ?>
							<button class="th-slide-button"><?php echo esc_html($text); ?></button>
						<?php } ?>
						</span>
					</a>
				</div>   
<?php 
            endif;
			endforeach;			
			} // End if().
		
	endif;	
}
// slider layout 2
function open_mart_top_slider_2_content( $open_mart_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$open_mart_slide_content = get_theme_mod( $open_mart_slide_content_id, $default );
		if ( ! empty( $open_mart_slide_content ) ) :
			$open_mart_slide_content = json_decode( $open_mart_slide_content );
			if ( ! empty( $open_mart_slide_content) ) {
				foreach ( $open_mart_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'open-mart_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
                   <div class="thunk-to2-slide-list">
                    <img src="<?php echo esc_url($image); ?>">
                    <div class="slider-content-caption">
                        <p class="animated delay-0.5s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($title); ?></p>
                        <h2 class="animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($subtitle); ?></a></h2>
                         <?php if($text!==''): ?>
                       <a class="slide-btn animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                        <?php endif;?>
                    </div>
                  </div>
			<?php	
				endif;
			endforeach;			
			} // End if().
		
	endif;	
}
//Big Full Width Slider
function open_mart_top_big_slider_content( $open_mart_slide_content_id, $default ){ 
$open_mart_slide_content = get_theme_mod( $open_mart_slide_content_id, $default );
		if ( ! empty( $open_mart_slide_content ) ) :
			$open_mart_slide_content = json_decode( $open_mart_slide_content );
			if ( ! empty( $open_mart_slide_content) ) {
				foreach ( $open_mart_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'open_mart_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
				 ?>
				<div class="th-bigslider">
					<div class="container">
						<div class="th-slides">
						<span class="th-slides-content">
					<?php   if ($subtitle != ''){ ?>
							<h4 class="th-slide-subtitle animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($subtitle); ?></h4>
							<?php } 
							if ($title != '') { ?>
							<a class="caption animated delay-0.8s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight" href="<?php echo esc_url($link); ?>">
							<h2 class="th-slide-title"><?php echo esc_html($title); ?></h2>
						    </a>
							<?php } 
							if ($text != ''){ ?>
							<button class="th-slide-button"><?php echo esc_html($text); ?></button>
						<?php } ?>
						</span>

						<div class="th-slide-img">
						<a href="<?php echo esc_url($link); ?>">
							<img src="<?php echo esc_url($image);  ?>">
						</a>
						</div>
					</div>
					</div>
						</div>   
<?php 
			endforeach;			
			} // End if().
		
	endif;	
}
//*********************//
// Highlight feature
//*********************//
function open_mart_highlight_content($open_mart_highlight_content_id,$default){
	$open_mart_highlight_content= get_theme_mod( $open_mart_highlight_content_id, $default );
//passing the seeting ID and Default Values

	if ( ! empty( $open_mart_highlight_content ) ) :

		$open_mart_highlight_content = json_decode( $open_mart_highlight_content );
		if ( ! empty( $open_mart_highlight_content ) ) {
			foreach ( $open_mart_highlight_content as $ship_item ) :
               $icon   = ! empty( $ship_item->icon_value ) ? apply_filters( 'open_mart_translate_single_string', $ship_item->icon_value, '' ) : '';
				$title    = ! empty( $ship_item->title ) ? apply_filters( 'open_mart_translate_single_string', $ship_item->title, '' ) : '';
				$subtitle    = ! empty( $ship_item->subtitle ) ? apply_filters( 'open_mart_translate_single_string', $ship_item->subtitle, '' ) : '';
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

// Vertical Tabbed Product Section
if ( ! function_exists( 'open_mart_vt1_banner_content' ) ){
	function open_mart_vt1_banner_content( $open_mart_vt1_banner_content_id, $default ) {
//passing the seeting ID and Default Values
	$open_mart_vt1_banner_content= get_theme_mod( $open_mart_vt1_banner_content_id, $default );
		if ( ! empty( $open_mart_vt1_banner_content ) ) :
			$open_mart_vt1_banner_content = json_decode( $open_mart_vt1_banner_content );
			// This is only for checking reapeater array key values to put conditions
			// $array_object = $open_mart_vt1_banner_content[0];
			// print_r($array_object->text);
			
			if ( ! empty( $open_mart_vt1_banner_content ) ) {
				foreach ( $open_mart_vt1_banner_content as $vt1banner_item ) :

					$image = ! empty( $vt1banner_item->image_url ) ? apply_filters( 'open-mart_translate_single_string', $vt1banner_item->image_url, 'Vertical Tab section' ) : '';

					$link   = ! empty( $vt1banner_item->link ) ? apply_filters( 'open-mart_translate_single_string', $vt1banner_item->link, 'Vertical Tab section' ) : '';
			if ($image != '') { ?>
				<div class="thunk-vt-banner-img">
					<a href="<?php echo esc_url($link); ?>" class="vt1-bannr" >
		      			<img src="<?php echo esc_url($image); ?>">
		      		</a>
		    	</div>
			<?php }
			else{ ?>
				<div class="no-vt1-banner-img"></div>
		<?php	} ?>	

	
			<?php	
				
				endforeach;			
			} // End if().
		
	endif;	
}
}
// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function open_mart_display_customizer_shortcut( $class_name ){
	if ( ! is_customize_preview() ) {
		return;
	}
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
	echo'<span class="open-focus-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}
function open_mart_widget_script_registers(){
//widget
wp_enqueue_script( 'open-mart_widget_js', HUNK_COMPANION_PLUGIN_DIR_URL .'open-mart/widget/widget.js', array("jquery"), '', true  );
}
add_action('customize_controls_enqueue_scripts', 'open_mart_widget_script_registers' );
add_action('admin_enqueue_scripts', 'open_mart_widget_script_registers' );