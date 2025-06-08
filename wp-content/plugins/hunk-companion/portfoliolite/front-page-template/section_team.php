<?php
if(!portfoliolite_checkbox_filter('team','section_on_off')) :
?>
<div class="clearfix"></div>
<!-- start team section -->
    <section id="team-info">
            <?php portfoliolite_display_customizer_shortcut( 'sidebar-widgets-portfolio-team-widget' );?>
        <div class="container">
            <div class="page-team">
                <?php if(get_theme_mod( 'our_team_heading')!=''){?>
                <h2 class="main-heading wow fadeInLeft" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'our_team_heading')); ?></h2>
                <?php } else { ?>
                <h2 class="main-heading wow fadeInLeft" data-wow-delay="0.3s"><?php esc_html_e('Our Expert Team','portfolioline'); ?></h2>
                <?php } ?>
                <?php if(get_theme_mod( 'our_team_subheading')!=''){?>
                <p class="sub-heading wow fadeInRight" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'our_team_subheading')); ?></p>
                <?php } else { ?>
                <p class="sub-heading wow fadeInRight" data-wow-delay="0.3s"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit','portfolioline'); ?></p>
                <?php } ?>
                <div class="team-block thunk-wrapper">
                    <ul class="team-grid wow fadeInLeft">
                        <?php
                        if ( is_active_sidebar( 'portfolio-team-widget' ) ){
                        dynamic_sidebar( 'portfolio-team-widget' );
                        } else{
                        ?>
                        <li class="team-list">
                            <figure class="team-efct red"><img src="<?php echo esc_url(PORTFOLIOLITE_TEAM_IMG); ?>">
                                <figcaption>
                                <a href=""><h3><?php esc_html_e('Mark','portfolioline'); ?><span><?php esc_html_e('Twine','portfolioline'); ?></span></h3></a>
                                <p><?php esc_html_e('C.E.O','portfolioline'); ?></p>
                                <div class="team-social-meta"><ul><li class="team-social-social-fb"><a href=""></a></li>
                                <li class="team-social-social-tw"><a href=""></a></li>
                                <li class="team-social-social-y"><a href=""></a></li>
                                <li class="team-social-social-ln"><a href=""></a></li>
                            </ul>
                        </div>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                    
                </li>
                <li class="team-list">
                    <figure class="team-efct red"><img src="<?php echo esc_url(PORTFOLIOLITE_TEAM_IMG); ?>">
                        <figcaption>
                        <a href=""><h3><?php _e('Mark','portfolioline'); ?><span><?php _e('Twine','portfolioline'); ?></span></h3></a>
                        <p><?php _e('C.E.O','portfolioline'); ?></p>
                        <div class="team-social-meta"><ul><li class="team-social-social-fb"><a href=""></a></li>
                        <li class="team-social-social-tw"><a href=""></a></li>
                        <li class="team-social-social-y"><a href=""></a></li>
                        <li class="team-social-social-ln"><a href=""></a></li>
                    </ul>
                </div>
                </figcaption>
                <a href="#"></a>
            </figure>
        </li>
        <li class="team-list">
            <figure class="team-efct red"><img src="<?php echo esc_url(PORTFOLIOLITE_TEAM_IMG); ?>">
                <figcaption>
                <a href=""><h3><?php _e('Mark','portfolioline'); ?><span><?php _e('Twine','portfolioline'); ?></span></h3></a>
                <p><?php _e('C.E.O','portfolioline'); ?></p>
                <div class="team-social-meta"><ul><li class="team-social-social-fb"><a href=""></a></li>
                <li class="team-social-social-tw"><a href=""></a></li>
                <li class="team-social-social-y"><a href=""></a></li>
                <li class="team-social-social-ln"><a href=""></a></li>
            </ul>
        </div>
        </figcaption>
        <a href="#"></a>
    </figure>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</section>
<div class="clearfix"></div>
<?php endif; ?>