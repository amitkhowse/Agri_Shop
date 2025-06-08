<?php
if(!portfoliolite_checkbox_filter('th_woocommerce','section_on_off')) :
?>
<div class="clearfix"></div>
  <section id="th-woocommerce" class="th-woocommerce">
     <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_woocommerce_section' );?>
    <div class="container">
    	<div class="thunk-content-area">
			<?php if (get_theme_mod('our_woocommerce_heading')!== "") { ?>
        <h2 class="main-heading wow fadeInRight" data-wow-delay="0.3s"> 
          <?php echo esc_html(get_theme_mod('our_woocommerce_heading','Our Products')); ?>
        </h2>
    <?php  } ?>
      <?php if (get_theme_mod('our_woocommerce_subheading')!=="") { ?>
        <p class="sub-heading wow fadeInRight" data-wow-delay="0.3s">
          <?php echo esc_html(get_theme_mod('our_woocommerce_subheading','Lorem ipsum dolor sit amet, consectetuer adipiscing elit')); ?>
        </p>
     <?php } ?>
    	<div class="th-woocommerce-wrapper thunk-wrapper">
    		<?php 
					$contact_shortcode ="";
					if ( shortcode_exists( 'recent_products' ) ) {
					$contact_shortcode = get_theme_mod('portfolioline_woocommerce_shortcode','[products limit="3" columns="3"]');
					echo do_shortcode($contact_shortcode); 
				}
				else{		
	echo '<h2 class="thunk-contact-plugin-notice">'.esc_html__('Install And Activate WooCommerce Plugin','portfolioline').'</h2>';
				}
				?>
    	</div>
    </div>
    </div>
</section>
<?php endif; 
