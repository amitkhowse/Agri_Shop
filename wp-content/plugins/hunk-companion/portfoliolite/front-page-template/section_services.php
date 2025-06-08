<?php 
// Services Section Template
if(!portfoliolite_checkbox_filter('services','section_on_off')) :
?>
  <section id="services" class="thunk-service">
 <?php portfoliolite_display_customizer_shortcut( 'sidebar-widgets-portfolio-service-widget' );?>
	<div class="container">
		<div class="thunk-content-area">
			<?php if (get_theme_mod('our_service_heading')!=="") { ?>
        <h2 class="main-heading wow fadeInRight" data-wow-delay="0.3s"> 
          <?php echo esc_html(get_theme_mod('our_service_heading','Our Services')); ?>
        </h2>
    <?php  } ?>
      <?php if (get_theme_mod('our_service_subheading')!=="") { ?>
        <p class="sub-heading wow fadeInLeft" data-wow-delay="0.3s">
          <?php echo esc_html(get_theme_mod('our_service_subheading','Lorem ipsum dolor sit amet, consectetuer adipiscing elit')); ?>
        </p>
     <?php } ?>
			<div class="thunk-service-wrapper thunk-wrapper">
  <?php   
          if ( is_active_sidebar( 'portfolio-service-widget' ) ){
          dynamic_sidebar( 'portfolio-service-widget' );
          }
          else{ ?>
          	<div class="thunk-service-post">
            	<div class="thunk-service-icon">
                <i  class="fa fa-diamond"></i>
           	 	</div>
             	<a href="#" onclick="return false">
                    <h2 class="thunk-service-title">
                       <?php echo esc_html_e('Development','portfolioline'); ?>
                    </h2> 
              	</a>
                <p class="thunk-service-description">
                  <?php echo esc_html_e('Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget','portfolioline'); ?>
                </p>
        	</div> <!-- thunk-service-post End -->  
        	<div class="thunk-service-post">
            	<div class="thunk-service-icon">
                <i  class="fa fa-heart"></i>
           	 	</div>
             	<a href="#" onclick="return false">
                    <h2 class="thunk-service-title">
                       <?php echo esc_html_e('Design','portfolioline'); ?>
                    </h2> 
              	</a>
                <p class="thunk-service-description">
                  <?php echo esc_html_e('Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget','portfolioline'); ?>
                </p>
        	</div> <!-- thunk-service-post End -->  
        	<div class="thunk-service-post">
            	<div class="thunk-service-icon">
                <i  class="fa fa-globe"></i>
           	 	</div>
             	<a href="#" onclick="return false">
                    <h2 class="thunk-service-title">
                       <?php echo esc_html_e('Seo','portfolioline'); ?>
                    </h2> 
              	</a>
                <p class="thunk-service-description">
                  <?php echo esc_html_e('Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget','portfolioline'); ?>
                </p>
        	</div> <!-- thunk-service-post End -->  
        <?php  }   
  ?>	
			</div> <!-- thunk-service-wrapper End -->
		</div> <!-- thunk-content-area End -->			
	</div> <!-- container End -->
</section>
<?php endif;