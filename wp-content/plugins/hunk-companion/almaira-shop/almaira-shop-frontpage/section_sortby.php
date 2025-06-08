<?php
/**
 * SortBy Section For Frontpage
 *
 * @package     Almaira
 * @author      ThemeHunk
 * @since       Almaira 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
     return;
}
$hide_section = get_theme_mod( 'almaira_shop_sortby_hide');
if($hide_section == ''|| $hide_section == '0' ){ 
?>
<section id="th-home-shop" class="thunk-sortby">
  <?php almaira_shop_display_customizer_shortcut( 'almaira_shop_sortby_section' );?>
  <div class="container">
      <div class="content-area">
      <div class="th-filter-wrap" id="th-filter-wrap-id">
      <?php
if ( !wp_is_mobile() ) {
    /* Display and echo mobile specific stuff here */
    ?>
      <aside class="filter-sidebar">
        <div class="sidebar-box">
          <div class="sidebar-wrapper"> 
            <h2 class="sortby-heading heading"><?php _e('Sort By','hunk-companion');?></h2>
  <!-- radio filter  -->
  <div class="sort-adv-filter">
  <label class="sort-radio"><?php _e('New Arrival','hunk-companion');?>
  <input type="radio" checked="checked" name="radio" value="recent">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('Featured','hunk-companion');?>
  <input type="radio" name="radio" value="featured">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('On Sale','hunk-companion');?>
  <input type="radio" name="radio" value="onsale">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('Low To High','hunk-companion');?>
  <input type="radio"  name="radio" value="low-to-high">
  <span class="checkmark-p"></span>
  </label>
  <label class="sort-radio"><?php _e('High To Low','hunk-companion');?>
  <input type="radio" name="radio" value="high-to-low">
  <span class="checkmark-p"></span>
  </label>
  </div>
<!-- radio filter  -->
<div class="sort-border"></div>
<!-- checkbox -->
<h2 class="sortby-heading heading"><?php _e('Categories','hunk-companion');?></h2>
            <ul class="check-filter-list">
              <?php almaira_shop_sort_category_products(); ?>
            </ul>
          </div> <!-- sidebar-wrapper End -->
        </div> <!-- sidebar-Box End -->
      </aside>
    <?php } ?>

    <div class="th-products-area">
        <div class="thunk-products-wrapper sort-filter">
          <ul class="thunk-products-ul">
            <?php 
             almaira_shop_sort_filter_product_show();
            ?>
          </ul>
          <?php  almaira_shop_product_loadmore();?>
          <div class="thunk-product-error"></div>
<div class="filter-loadContainer">
    <div class="thunk-loader">
        <span class="dot dot_1"></span>
        <span class="dot dot_2"></span>
        <span class="dot dot_3"></span>
        <span class="dot dot_4"></span>
    </div>
</div>
<div class="more-loadContainer">
    <div class="thunk-loader">
        <span class="dot dot_1"></span>
        <span class="dot dot_2"></span>
        <span class="dot dot_3"></span>
        <span class="dot dot_4"></span>
    </div>
</div>

<?php
if ( wp_is_mobile() ) {
    /* Display and echo mobile specific stuff here */
    ?>
<div class="th-resp-button">
<div class="filter-check-responsive">
<button id="sort-adv-btn" class="sort-adv-filter-btn">
 <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
 <?php esc_html_e('Sort By','almaira'); ?>
</button>
<span class="th-bor-span"></span>
<button id="check-filterlist-btn" class="check-filter-list-btn">
  <?php esc_html_e('Categories','almaira'); ?>
</button>
</div> <!-- filter-check-responsive -->

<div class="th-reponsivefilter-wrapper">
           <!-- radio filter 2  -->
  <div class="sort-adv-filter-wrapper" id="sort-adv-filter-id">
    <div class="th-sortby-overlay">
    <h6><?php esc_html_e('SORT BY','hunk-companion')?></h6>
    <a href="" id="sort-adv-close">&#10006</a>
  <div class="sort-adv-filter">
  <label class="sort-radio"><?php _e('New Arrival','hunk-companion');?>
  <input type="radio" checked="checked" name="radio" value="recent">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('Featured','hunk-companion');?>
  <input type="radio" name="radio" value="featured">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('On Sale','hunk-companion');?>
  <input type="radio" name="radio" value="onsale">
  <span class="checkmark"></span>
  </label>
  <label class="sort-radio"><?php _e('Low To High','hunk-companion');?>
  <input type="radio"  name="radio" value="low-to-high">
  <span class="checkmark-p"></span>
  </label>
  <label class="sort-radio"><?php _e('High To Low','hunk-companion');?>
  <input type="radio" name="radio" value="high-to-low">
  <span class="checkmark-p"></span>
  </label>
  </div>
  </div>
</div>
            <!-- checkbox 2-->
  <div class="check-filter-list-wrapper" id="check-filter-id">
    <div class="th-check-filter-overlay">
    <h6><?php esc_html_e('Categories','hunk-companion')?></h6>
    <a href="" id="check-filter-close">&#10006</a>
  <ul class="check-filter-list">
              <?php almaira_shop_sort_category_products(); ?>
  </ul>
</div>
  </div>
</div> <!-- th-reponsivefilter-wrapper --> 
</div> <!-- th-resp-button --> 
<?php }  ?>
        
        </div> <!-- product-wrapper End -->
</div> <!-- th-products-area End -->  
   </div> <!-- sortby-wrapper End -->
       
    </div> <!-- content-area End -->
    </div> <!-- container End -->
    </section>
<?php } 