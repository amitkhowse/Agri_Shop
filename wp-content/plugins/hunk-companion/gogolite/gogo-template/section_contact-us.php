<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_contact_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
global $contact;
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_contact_id','contact'));?>" class="thunk-contact-us cd-section">
	<div class="container">
		<div class="thunk-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
						<div class="index-wrapper wow thunk-fadeInRight" data-wow-duration="2.5s">							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$contact); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">

					<?php 
				if( get_theme_mod( 'gogo_contact_name') != ""){
	 		echo esc_html( get_theme_mod( 'gogo_contact_name','') );
				}
				else{
			esc_html_e( 'Get in touch' , 'hunk-companion' );
				}
				?>
						</span>
							</div>	
						</div><!--........index-wrapper END.......-->
						</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
			<div class="thunk-col-3">
				<div class="thunk-inner-col">
				<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
					<?php 
				if( get_theme_mod( 'gogo_contact_heading') != ""){
	  echo esc_html( get_theme_mod( 'gogo_contact_heading',''));
				}
				else{
	esc_html_e( 'We are one mail away from you, feel free to contact us' , 'hunk-companion' );		
				}
				?>
				</h2>
				<span class="item-divider"></span>
				<div class="contact-form-wrapper wow thunk-fadeInRight" data-wow-duration="2.5s">
					<?php 
					if ( shortcode_exists( 'lead-form' ) ) {
					$contact_shortcode = get_theme_mod('contact_shortcode','[lead-form form-id=1 title=Contact Us]');
					echo do_shortcode($contact_shortcode); 
				}
				else{		
	echo '<a href="https://wordpress.org/plugins/lead-form-builder/" target="_blank">
	<h2 class="thunk-contact-plugin-notice">'.esc_html__('Install And Activate Our LeadForm Builder Plugin For The Contact Form','hunk-companion').'</h2></a>';
				}
				?>
				</div><!--....contact-form-wrapper END.........-->
			</div><!--....INNER COL END.........-->
			</div><!--....thunk-col-3 END.........-->
		<div class="thunk-col-2">
				<div class="thunk-inner-col">
				
				<div class="address-wrapper">
					<div class="address">
						<i class="fa fa-map-marker"></i>
						<p class="wow thunk-fadeInUp" data-wow-duration="2.5s">
							<?php 
				if( get_theme_mod( 'gogo_contact_address1') != ""){
	 	echo esc_html( get_theme_mod( 'gogo_contact_address1','') );
				}
				else{
		esc_html_e( '4114 Rosewood Lane, New York 10048','hunk-companion' );	
				}
				?>	
				</p>
					</div><!--.........address End........-->
					<div class="address">
						<i class="fa fa-mobile"></i>
						<p class="wow thunk-fadeInUp" data-wow-duration="2.5s">
							<?php 
				if( get_theme_mod( 'gogo_contact_address2') != ""){
			echo esc_html( get_theme_mod( 'gogo_contact_address2',''));
				}
				else{
		  esc_html_e( '212-938-3621, 917-204-2105 ','hunk-companion' );	
				}
				?>	
								</p>
					</div><!--.........address End........-->
					<div class="address">
						<i class="fa fa-envelope"></i>
						<p class="wow thunk-fadeInUp" data-wow-duration="2.5s">
							<?php 
				if( get_theme_mod( 'gogo_contact_support') != ""){
	 	echo esc_html( get_theme_mod( 'gogo_contact_support','') );
				}
				else{
	esc_html_e( 'For online support please mail us on
 support@domain.com', 'hunk-companion' );	
				}
				?>
								</p>
					</div><!--.........address End........-->
				</div><!--....contact-wrapper END.........-->
				</div><!--....thunk-inner-col END.........-->
			</div><!--....thunk-col-2 END.........-->
		</div><!--....thunk-content-area END.........-->
	</div><!--....container END.........-->
</section>
<?php }  