<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_service_hide','');
if($hide_section == ''|| $hide_section == '0' ){
$div_numbering ='';
$if_slidercheck = get_theme_mod('gogo_service_slider','');
if ($if_slidercheck ) {
	$if_slidercheck = 'owl-carousel';
}
else{
	$if_slidercheck = 'no-slider';
}
global $service;
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_service_id','service'));?>" class="thunk-service cd-section">
	<div class="container">
		<div class="thunk-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$service); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s" >
							<?php 
				if( get_theme_mod( 'gogo_service_name') != ""){
	 				echo esc_html(get_theme_mod( 'gogo_service_name',''));

				}
				else{
					esc_html_e('What We Do','hunk-companion');		
				}
				?>	
								</span>
							</div>	
						</div><!--........index-wrapper END.......-->
						</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
			<div class="thunk-col-2-1">
				<div class="thunk-inner-col">
				<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s"> 
	<?php if( get_theme_mod( 'gogo_service_heading') != ""){
	echo esc_html(get_theme_mod( 'gogo_service_heading',''));
	}
	else{
	esc_html_e('Our services which you find really adaptable. ','hunk-companion');
}
	?>
				</h2>
				<span class="item-divider"></span>
				<div class="service-wrapper thunk-three <?php echo esc_attr($if_slidercheck); ?> wow thunk-fadeInRight" data-wow-duration="2.5s" >
	<?php		
		$default= Hunk_Companion_Defaults_Models::instance()->get_features_default();

		hunk_companion_features_content('gogo_service_content', $default);
	?>
				</div><!--....service-wrapper END.........-->	
			</div><!--......thunk-inner-col END.............-->
			</div><!--....thunk-col-2-2 END.........-->
		</div><!--....thunk-content-area END.........-->
	</div><!--....container END.........-->
</section>
<?php } 