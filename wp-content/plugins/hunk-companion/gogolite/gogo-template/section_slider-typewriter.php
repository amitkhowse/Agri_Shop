<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
if(function_exists('hunk_companion_vertical_navigation')){?>
	<div class="thunk-vertival-pagination-wrapper thunk-vertical-nav">
	<nav id="cd-vertical-nav">
	<?php hunk_companion_vertical_navigation(); ?> 
	</nav>
</div> <!--............thunk-vertival-pagination-wrapper..........END-->
<?php
} ?>
<?php 
$hide_section = get_theme_mod( 'gogo_backslider_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
$background ='';  //Variable to store Fallback image for video upload
$slider_type = '';
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_slider_id','slider'));?>" class="slider-typewriter left cd-section">
	
	<?php
$default = Hunk_Companion_Defaults_Models::instance()->get_slider_default();	

	$background_type=get_theme_mod('gogo_big-image-background','image');
	
	switch ($background_type){
		
		case 'image': 
		?>
	<div class="fadein-slider">	
	<?php hunk_companion_backslider_image('gogo_backslider_image',json_encode($default)); ?>
	</div>
	<!--..................fadein-slider END............-->
	<?php
	break;
	case 'video': ?>
	<div class="thunk-custom-background-wrapper">
	<div class="thunk-custom-background">
	<div class="thunk-video-background">
	<?php hunk_companion_ribbon_bg_video(); ?>
	      </div> <!-- ........video-ribbon END........ -->
     </div><!--.........thunk-custom-background END...............-->
    </div><!--.........thunk-custom-background-wrapper END...............-->
		<?php break; 	
	} ?>
	
	<div class="thunk-typed-box">
		<div class="container">
	<div class="type-text-wrap">
	<span class="type-demo td-start">
	<?php if( get_theme_mod( 'gogo_before_text') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_before_text','')); 
	}
	else{
		esc_html_e('Welcome to future, enjoy our','gogo');		
	}?>
	</span>
	<span class="typer type-demo td-middle" id="thunkfancytext" data-words="<?php if( get_theme_mod( 'gogo_fancy_text') != ""){
	 	echo esc_html(get_theme_mod( 'gogo_fancy_text','')); 
	}
	else{
		esc_html_e('fantastic,great,awesome','hunk-companion');		
	}?>" data-colors="<?php echo esc_attr(get_theme_mod( 'gogo_typewriter_fancytext_color','#c9a420')); ?> " data-delay="100" data-deleteDelay="4000"></span>
  <span class="cursor th-type-cusor" data-owner="thunkfancytext"></span>

	<span class="type-demo td-end">
<?php if( get_theme_mod( 'gogo_after_text') != ""){
	 	echo esc_html(get_theme_mod( 'gogo_after_text','')); 
	}
	else{
		esc_html_e(' services','hunk-companion');		
	}?>
	</span>
</div><!--.........type-text-wrap END..........-->
	<a href="<?php echo esc_url(get_theme_mod( 'gogo_button_link1',''));?>" class="type-button">
<?php if( get_theme_mod( 'gogo_button_text1') != ""){
	 	echo esc_html(get_theme_mod( 'gogo_button_text1',''));
	}
	else{
		esc_html_e('Get Started','hunk-companion');		
	}?>
			<div class="type-button-overlay"></div>
		</a>
		
	</div> <!-- ...........container END....... -->
	</div> <!-- ...........thunk-typed-box END....... -->
</section>
<?php }  