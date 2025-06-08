<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_introduction_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
global $intro;
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_introduction_id','about_us'));?>" class="thunk-first cd-section">
			<div class="container">
				<div class="thunk-content-area">
					<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$intro); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">
				<?php 
				if( get_theme_mod( 'gogo_introduction_name') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_introduction_name','')); 
				}
				else{
					esc_html_e('Who We Are','hunk-companion');		
				}
				?>		
		</span>
		</div>	
	</div> <!--.... index-wrapper END......... -->
	</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
					<div class="thunk-col-2">
						<div class="thunk-inner-col">
<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_introduction_heading') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_introduction_heading','')); 
	}
	else{
		esc_html_e('Make your journey beautiful and bright','hunk-companion');		
	}
	?>		
	</h2>					
		<span class="item-divider"></span>
							<p class="description wow thunk-fadeInRight" data-wow-duration="2.5s">
			<?php	if(get_theme_mod( 'gogo_introduction_description')!= "" )
		echo esc_html(get_theme_mod( 'gogo_introduction_description','')); 
		 else{
			esc_html_e('fermentum rhoncus, diam ante viverra nulla, at interdum tortor eros nec lectus. Donec tortor orci, pellentesque at finibus sit amet, bibendum quis lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh mi, tempor et dignissim ut, imperdiet eget ante.
','hunk-companion');
		 } 
		 ?></p>
			 </div><!--....thunk-inner-col END.........-->
					</div><!--....col-2 END.........-->
					<div class="thunk-col-3">
						<div class="thunk-intro-image wow thunk-fadeInDown" data-wow-duration="2.5s">
			<img src="<?php 
			if(get_theme_mod( 'gogo_introduction_image')!= ""){
			echo esc_url(get_theme_mod( 'gogo_introduction_image',''));
			}
			else{
				echo HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/about.png';
			}   ?>">
						</div>
				</div><!--....col-3 ENDS.........-->
				</div><!--......thunk-content-area End............-->
			</div><!--......container End............-->
		</section>
<?php }  