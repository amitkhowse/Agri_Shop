<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_call_to_hide');
if($hide_section == ''|| $hide_section == '0' ){ ?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_call_to_id','callto'));?>" class="thunk-call-to cd-section">
	<div class="container">
		<div class="call-to-content">
		<div class="call-to-heading-wrap">
			<h2 class="call-to-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
		<?php if( get_theme_mod( 'gogo_call_to_heading') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_call_to_heading','')); 
	}
	else{
		esc_html_e('Maecenas lacinia tortor vel justo  gravida.','hunk-companion');		
	}
	?>
	</h2></div>
		<div class="call-to-button wow thunk-fadeInRight" data-wow-duration="2.5s"><a href="<?php echo esc_url(get_theme_mod( 'gogo_call_to_button_link','')); ?>" class="type-button call-to">
			<?php if( get_theme_mod( 'gogo_call_to_button_text') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_call_to_button_text','')); 
	}
	else{
		esc_html_e('Call to action ','hunk-companion');		
	}
	?>
		<div class="type-button-overlay"></div>
		</a></div>
	</div><!--......call-to-content End......-->
	</div><!--......container End............-->
</section>
<?php } 