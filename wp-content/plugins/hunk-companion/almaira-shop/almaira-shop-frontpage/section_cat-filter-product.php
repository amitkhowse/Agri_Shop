<?php
/**
 * Product Section For Frontpage
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
     return;
}
$hide_section = get_theme_mod( 'almaira_shop_product_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
?>
<section id="th-product-filter" class="thunk-products-section">
     <?php almaira_shop_display_customizer_shortcut( 'almaira_shop_product_section' );?>
    <div class="container">
      <div class="content-area">
        <div class="th-cat-filter-wrap" id="th-cat-filter-wrap-id">
         <?php 
    if ( !wp_is_mobile() ) {
    /* Display and echo mobile specific stuff here */
         echo almaira_shop_product_sec_category_products(); 
       }
         ?>
              <!-- featured-filter button-group END -->
        <div class="thunk-products-wrapper featured-block">
          <ul class="thunk-products-ul columns-4">
        <?php 
             almaira_shop_product_section_filter_product_show();
        ?>                
        </ul>
       
        </div> <!-- product-wrapper End -->
        <div class="cat-filter-loademore">
        <div class="thunk-loader">
        <span class="dot dot_1"></span>
        <span class="dot dot_2"></span>
        <span class="dot dot_3"></span>
        <span class="dot dot_4"></span>
        </div>
      </div>
         <div class="thunk-load-wrap">
           <button id="filter-sortby-load-more" class="almaira-load-product" ><span>
            <?php echo esc_html__( 'Load More', 'hunk-companion' );?>  
            </span>
        </button>
         </div>


<?php
if ( wp_is_mobile() ) {
    /* Display and echo mobile specific stuff here */
    ?>
<div class="th-responsivecat th-resp-button">
<div class="filter-check-responsive">
<button id="responsivecat-btn" class="cat-flter-btn">
 <?php esc_html_e('Categories','hunk-companion'); ?>
</button>
</div> <!-- filter-check-responsive -->
<div class="responsivecat-list-wrapper">
  <a href="" id="responsivecat-close">&#10006</a>
   <?php echo almaira_shop_product_sec_category_products(); ?>
</div>
</div>
<?php } ?>
         </div>
      </div> <!-- content-area End -->
    </div> <!-- Container End -->
  </section> <!-- thunk-products End -->
  <?php } 