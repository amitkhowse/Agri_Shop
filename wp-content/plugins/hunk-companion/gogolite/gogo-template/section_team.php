<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_team_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
$if_slidercheck = get_theme_mod('gogo_team_slider');
if ($if_slidercheck ) {
	$if_slidercheck = 'owl-carousel';
	
}
else{
	$if_slidercheck = 'no-slider';
}
global $team;
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_team_id','team'));?>" class="thunk-team cd-section">	
	<div class="container">
		<div class="thunk-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$team); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">
				<?php 
				if( get_theme_mod( 'gogo_team_name') != ""){
	 				echo esc_html(get_theme_mod( 'gogo_team_name','')); 
				}
				else{
					esc_html_e('Our Team','hunk-companion');		
				}
				?>	
								</span>
							</div>	
						</div><!--.....index-wrapper END.....-->
						</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
			<div class="thunk-col-2-1">
				<div class="thunk-inner-col">
				<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_team_heading') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_team_heading','')); 
	}
	else{
		esc_html_e('We have the team of highly talented people.','hunk-companion');		}
	?>	
				</h2>
				<span class="item-divider"></span>
	<div class="team-wrapper wow thunk-fadeInRight" data-wow-duration="2.5s">
		<div class="thunk-teamw thunk-three <?php echo esc_attr($if_slidercheck); ?>">
			<?php		
		$default= Hunk_Companion_Defaults_Models::instance()->get_team_default();
		hunk_companion_team_content('gogo_team_content', $default);
	?>				
		</div><!--.......thunk-team END........-->				
	</div><!--.......team-wrapper END........-->
				</div><!--........thunk-inner-col END.......-->
			</div><!--........thunk-col-2-1 END.......-->
		</div><!--.............CONTENT AREA END.........-->
	</div><!--.............CONTAINER END..............-->
</section>
<?php }  