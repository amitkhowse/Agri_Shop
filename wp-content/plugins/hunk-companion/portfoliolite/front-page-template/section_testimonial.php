<?php
if(!portfoliolite_checkbox_filter('testimonial','section_on_off')) :
?>
    <section id="testimonials" class="testimonials">
            <?php portfoliolite_display_customizer_shortcut( 'sidebar-widgets-portfolio-testimonial-widget' );?>
        <div class="container">
            <div class="testimonials-box thunk-wrapper">
                <div class="testimonials-page">
                    <ul class="bxslider">
                        <?php if ( is_active_sidebar( 'portfolio-testimonial-widget' ) ){
                            dynamic_sidebar( 'portfolio-testimonial-widget' );
                        } else{ ?>
                        <li><div class="image-test">
                            <img src="<?php echo PORTFOLIOLITE_TESTIMONIAL_IMG ?>">
                        </div>
                        <div class="test-cont-heading"><h3><?php esc_html_e('Michael Rocks','portfolioline'); ?></h3></div>
                        <div class="test-cont"><p><?php esc_html_e('Google.com','portfolioline'); ?></p><p><?php esc_html_e('Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Sed posuere consectetur est at lobortis.','portfolioline'); ?></p></div></li>
                        <li><div class="image-test">
                            <img src="<?php echo PORTFOLIOLITE_TESTIMONIAL_IMG ?>">
                        </div>
                        <div class="test-cont-heading"><h3><?php esc_html_e('Michael Rocks','portfolioline'); ?></h3></div>
                        <div class="test-cont"><p><?php esc_html_e('Google.com','portfolioline'); ?></p><p><?php esc_html_e('Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo.Sed posuere consectetur est at lobortis.','portfolioline'); ?></p></div></li>
                        <?php } ?>
                    </ul>
                </div></div></div></section>
                <?php endif; ?>