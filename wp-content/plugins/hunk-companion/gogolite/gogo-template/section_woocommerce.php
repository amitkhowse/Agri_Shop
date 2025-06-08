<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_woocommerce_hide','1');
if($hide_section == ''|| $hide_section == '0' ){ 
global $gogo_woocommerce;
	?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_woocommerce_id','woocommerce'));?>" class="thunk-woocommerce cd-section">
			<div class="container">
				<div class="thunk-content-area">
					<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$gogo_woocommerce); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">
				<?php 
				if( get_theme_mod( 'gogo_woocommerce_name') != ""){
	 			echo esc_html(get_theme_mod( 'gogo_woocommerce_name','')); 
				}
				else{
					esc_html_e('Store','hunk-companion');		
				}
				?>		
		</span>
		</div>	
	</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
					<div class="thunk-col-2-1">
						<div class="thunk-inner-col">

<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_woocommerce_heading') != ""){
	 	 echo esc_html(get_theme_mod( 'gogo_woocommerce_heading','')); 
	}
	else{
		esc_html_e('Showcase your products.','hunk-companion');		
	}
	?>		
	</h2>					
		<span class="item-divider"></span>
			<div class="woocommerce-wrapper wow thunk-fadeInRight" data-wow-duration="2.5s">
					<?php 
					$contact_shortcode ="";
					if ( shortcode_exists( 'recent_products' ) ) {
					$contact_shortcode = get_theme_mod('woocommerce_shortcode','[products limit="3" columns="3"]');
					echo do_shortcode($contact_shortcode); 
				}
				else{		
	echo '<h2 class="thunk-contact-plugin-notice">'.esc_html__('Install And Activate WooCommerce Plugin','hunk-companion').'</h2>';
				}
				?>
				</div><!--....contact-form-wrapper END.........--> 
			</div><!--...........thunk-inner-col End.......................-->
			</div><!--...........thunk-col-2-1 End.......................-->
	</div><!--...........thunk-content-area End.......................-->
</div><!--...........Container End.......................-->
</section>
<?php }  