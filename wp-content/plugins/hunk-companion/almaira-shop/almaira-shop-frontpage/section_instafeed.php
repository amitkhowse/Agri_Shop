<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'almaira_shop_instafeed_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
$insta_link = get_theme_mod( 'almaira_shopp_instafeed_link', '#' );
?>
<section id="th-instagram" class="thunk-instafeed">
    <?php almaira_shop_display_customizer_shortcut( 'almaira_shop_instafeed_section' );?>
      <div class="content-area">
      <a href="<?php echo esc_url($insta_link); ?>">
      <h2 class="thunk-insta-title thunk-heading">
      
       <i class="fa fa-instagram"></i> 
       <?php 
        if( get_theme_mod('almaira_shop_instafeed_heading') != ""){
      echo esc_html( get_theme_mod('almaira_shop_instafeed_heading','') );
        }
        else{
      esc_html_e( 'FOLLOW ME ON INSTAGRAM' , 'hunk-companion' );
        }
        ?>
      </h2>
    </a>
      <div class="thunk-insta-wrapper">
        <?php 
		if ( shortcode_exists( 'instagram-feed' ) ) {
		$instafeed_shortcode = get_theme_mod('almaira_shop_instafeed_shortcode','[instagram-feed]');
		echo do_shortcode( $instafeed_shortcode );
	}else{		
	echo '<a href="#" target="_blank">
	<h2 class="thunk-instafeed-plugin-notice">'.esc_html__('Install And Activate Instafeed Plugin','hunk-companion').'</h2></a>';
				}
				?>
      </div>
      </div> <!-- content-area End -->
    
</section>
<?php } ?>