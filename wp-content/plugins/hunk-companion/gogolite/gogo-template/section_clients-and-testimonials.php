<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_ct_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
global $ct;
	?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_ct_id','clients'));?>" class="thunk-clients-and-testimonials cd-section">
	<div class="container">
		<div class="thunk-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$ct); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">
              <?php 
                        if( get_theme_mod( 'gogo_ct_name') != ""){
                echo esc_html( get_theme_mod( 'gogo_ct_name','') );
                        }
                        else{       
                 esc_html_e( 'Clients Testimonial', 'hunk-companion' );   
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
        <?php if( get_theme_mod( 'gogo_ct_heading') != ""){
            echo esc_html( get_theme_mod( 'gogo_ct_heading','') );
      }
      else{   
        esc_html_e( 'What people say about us', 'hunk-companion' );  
      }
      ?>    </h2>
				<span class="item-divider"></span>
			<div class="clients-and-testimonials-wrapper">			
		<div class="testimonials wow thunk-fadeInLeft" data-wow-duration="2.5s">
		    <div class="owl-carousel">
            <?php       
            $default= Hunk_Companion_Defaults_Models::instance()->get_testimonials_default();
            hunk_companion_testimonials_content('gogo_testimonials_content', $default);
			?>
        </div><!--..........owl-carousel END............-->			
		</div><!--..........testimonials END..............-->
				<div class="clients-list wow thunk-fadeInRight" data-wow-duration="2.5s">
					<div class="owl-carousel">    
          <?php       
            $default= Hunk_Companion_Defaults_Models::instance()->get_clients_default();
            hunk_companion_clients_content('gogo_clients_content', $default);
			?> 
        </div><!--......owl-carousel END..........-->		
				</div><!--..........clients-list END............-->
			</div><!--........clients-and-testimonials-wrapper END............-->
		</div><!--..........thunk-inner-col END..............-->
	</div><!--..........thunk-col-2-1 END..............-->
		</div><!--..........thunk-content-area END..............-->
	</div><!--..........Container END..............-->
</section>
<?php } 