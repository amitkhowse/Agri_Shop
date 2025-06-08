<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
function almaira_shop_shortcode_template($section_name=''){
	switch ($section_name){
	case 'almaira_shop_show_frontpage':
	$section = array('section_slider',
    'section_cat-filter-product',
    'section_ribbon',
    'section_category',
    'section_sortby',

    'section_instafeed',
    );
    foreach($section as $value):
    // get_template_part( 'gogo-template/'.$value); 
    require_once (HUNK_COMPANION_DIR_PATH . 'almaira-shop/almaira-shop-frontpage/'.$value.'.php');
    endforeach;
    break;
	
	}
}
function almaira_shop_shortcodeid_data($atts){
    $output = '';
    $pull_quote_atts = shortcode_atts(array(
        'section' => ''
            ), $atts);
    $section_name = wp_kses_post($pull_quote_atts['section']);
  	$output = almaira_shop_shortcode_template($section_name);
    return $output;
}
add_shortcode('almaira-shop', 'almaira_shop_shortcodeid_data');

/****************************/
//contact shortcode function
/****************************/
function almaira_shop_contact_page_shortcode(){
                        // Show the selected frontpage content
                        if ( have_posts() ) {
                            while ( have_posts() ){
                                the_post();
                                get_template_part( 'template-parts/content', 'page' );
                            }
                        } else { // I'm not sure it's possible to have no posts when this page is shown, but WTH
                            get_template_part( 'template-parts/content', 'none' );
                        }
       ?>

                <h2 class="thunk-heading" >
    <?php 
                if( get_theme_mod( 'almaira_shop_contact_heading') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_heading'));
                }
                else{
    esc_html_e( 'Dont Hesitate To Contact Us' , 'almaira-shop' );        
                }
                ?>
                </h2>
                <div class="thunk-contactus-wrapper">
        <div class="thunk-contactus" >
            <?php 
                    if ( shortcode_exists( 'lead-form' ) ){
                    $contact_shortcode = get_theme_mod('contact_shop_shortcode','[lead-form form-id=1 title=Contact Us]');
                    echo do_shortcode($contact_shortcode); 
                }
                else{       
    echo '<a href="https://wordpress.org/plugins/lead-form-builder/" target="_blank">
    <h2 class="thunk-contact-plugin-notice">Install And Activate Our LeadForm Builder Plugin For The Contact Form</h2></a>';
                }
                ?>  
        </div><!--.......thunk-contactus END........-->
        <div class="thunk-contactus-right">
            <div class="google-maps"></div>
            <h6 class="thunk-contact-small-heading">
                <?php 
                if( get_theme_mod( 'almaira_shop_contact_smallheading') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_smallheading'));
                }
                else{
    esc_html_e( 'CONTACT INFORMATION' , 'almaira-shop' );       
                }
                ?>
            </h6>
            <p class="thunk-address-info"><i class="fa fa-home"></i>
                <?php 
                if( get_theme_mod( 'almaira_shop_contact_address1') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_address1'));
                }
                else{
    esc_html_e( '959, Sant  Bhms 066, India' , 'almaira-shop' );        
                }
                ?>
            </p>
            <p class="thunk-contact-mobile"><i class="fa fa-phone"></i>
                <?php 
                if( get_theme_mod( 'almaira_shop_contact_address2') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_address2'));
                }
                else{
    esc_html_e( '212-938-3621, 917-204-2105' , 'almaira-shop' );        
                }
                ?>
            </p>
            <p class="thunk-contact-email"><i class="fa fa-envelope"></i>
                <?php 
                if( get_theme_mod( 'almaira_shop_contact_support') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_support'));
                }
                else{
    esc_html_e( 'support@domain.com' , 'almaira-shop' );        
                }
                ?>
            </p>
            <p class="thunk-contact-wh"><i class="fa fa-clock-o"></i>
                <?php 
                if( get_theme_mod( 'almaira_shop_contact_hours') != ""){
      echo esc_html( get_theme_mod( 'almaira_shop_contact_hours'));
                }
                else{
    esc_html_e( 'Everyday 9:00-17:00' , 'almaira-shop' );       
                }
                ?>
            </p>
        </div>
    </div> <!--.......thunk-contactus-wrapper END........-->

<?php }
add_shortcode('almaira-shop-contact-page', 'almaira_shop_contact_page_shortcode');