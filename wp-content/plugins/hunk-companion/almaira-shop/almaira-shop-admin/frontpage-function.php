<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function almaira_shop_display_customizer_shortcut( $class_name ){
	if ( ! is_customize_preview() ) {
		return;
	}
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
	echo'<span class="almaira-focus-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}
//to exclude ipad from is_mobile() function
function almaira_exclude_ipad( $is_mobile ) {
   if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
       $is_mobile = false;
   }
   return $is_mobile ;
}
add_filter( 'wp_is_mobile', 'almaira_exclude_ipad' );
//slider content output function
function almaira_slider_content( $almaira_slider_content_id, $default, $slider_type) {
//passing the seeting ID and Default Values

	$almaira_slider_content= get_theme_mod( $almaira_slider_content_id, $default );
		if ( ! empty( $almaira_slider_content ) ) :
			$almaira_slider_content = json_decode( $almaira_slider_content );
			if ( ! empty( $almaira_slider_content ) ) {
				foreach ( $almaira_slider_content as $slider_item ) :

					$image = ! empty( $slider_item->image_url ) ? apply_filters( 'almaira_translate_single_string', $slider_item->image_url, 'Slider section' ) : '';

					$title  = ! empty( $slider_item->title ) ? apply_filters( 'almaira_translate_single_string', $slider_item->title, 'Slider section' ) : '';
					
					$subtitle = ! empty( $slider_item->subtitle ) ? apply_filters( 'almaira_translate_single_string', $slider_item->subtitle, 'Slider section' ) : '';

					$text   = ! empty( $slider_item->text ) ? apply_filters( 'almaira_translate_single_string', $slider_item->text, 'Slider section' ) : '';
					
					$link   = ! empty( $slider_item->link ) ? apply_filters( 'almaira_translate_single_string', $slider_item->link, 'Slider section' ) : '';
					?>
		<div class="swiper-slide th-swiper-slide">
      <figure class="slide-bgimg th-slide-bgimg <?php echo esc_attr($slider_type);?>-slider" <?php if ($slider_type !== "responsive"){
      echo 'style="background-image:url('.esc_url($image).')"'; } ?>>
        
        <?php if ($slider_type == "responsive") { ?>
          <img src="<?php echo esc_url($image);?>" class="entity-img" />
       <?php } ?>
        
      <div class="th-slider-content">
      	<div class="th-slider-caption">
        <h1 class="th-slider-bigheading">
        	<?php echo esc_html( $title ); ?>
        </h1>
        <span class="th-slider-smallheading">
        	<?php echo esc_html( $subtitle ); ?>
		</span>
      <a href="<?php echo esc_attr( $link ); ?>" class="th-slider-button th-button"><?php echo esc_html( $text ); ?></a>
     </div>
      </div>
      </figure>
     
    </div>
	
			<?php	
				
				endforeach;			
			} // End if().
		
	endif;	
}
/**
 * Allows users to save skype protocol skype: in menu URL
 */
if ( ! function_exists( 'almaira_shop_allow_skype_protocol' ) ){
function almaira_shop_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'almaira_shop_allow_skype_protocol' );
}