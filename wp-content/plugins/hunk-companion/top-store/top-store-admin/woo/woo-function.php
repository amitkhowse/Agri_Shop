<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
if(!function_exists('top_store_product_query')){
    function top_store_product_query($term_id,$prdct_optn){
    $limit_product = get_theme_mod('top_store_prd_shw_no','20');
    // product filter
    $args = array('limit' => $limit_product, 'visibility' => 'catalog', 'post_status' => 'publish');
    if($term_id){
        $term_args = array('hide_empty' => 1,'slug'    => $term_id);
        $product_categories = get_terms( 'product_cat', $term_args);
    $product_cat_slug =  $product_categories[0]->slug;
    $args['category'] = $product_cat_slug;
    }
    if($prdct_optn=='random'){
      $args['orderby'] = 'rand';
    }elseif($prdct_optn=='featured'){
          $args['featured'] = true;
    }
    if(get_option('woocommerce_hide_out_of_stock_items')=='yes'){ 
            $args['stock_status'] = 'instock';
    }
    return $args;
    }

}

if(!function_exists('top_store_whishlist_check')){

function top_store_whishlist_check($pid){
      if( class_exists( 'YITH_WCWL' ) ){
        echo top_store_whish_list($pid);
        }elseif( class_exists( 'WPCleverWoosw' )){
        echo top_store_wpc_whish_list($pid);          
    }    
        echo top_store_add_to_compare_fltr($pid);

}

}


/********************************/
//product cat filter loop
/********************************/
function top_store_product_cat_filter_default_loop($term_id,$prdct_optn){
    global $product;
$args = top_store_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();

      ?>
        <div <?php post_class('product',$pid); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                  <?php echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' );
                      $hover_style = get_theme_mod( 'top_store_woo_product_animation' );
                         // the_post_thumbnail();
                        if ( 'swap' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                               foreach( $attachment_ids as $attachment_id ) 
                             {
                                 $glr = wp_get_attachment_image($attachment_id, 'shop_catalog', false, array( 'class' => 'show-on-hover' ));
                                echo $category_product['glr'] = $glr;
                               }
                           }
                  ?>
                   <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  </a><div class="thunk-icons-wrap">
                  <?php 
                    if(get_theme_mod( 'top_store_woo_quickview_enable', true )){

                  ?>
        <div class="thunk-quik"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                   </a>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span>
                                      <i class="th-icon th-icon-search" aria-hidden="true"></i>
                                      </span>
                                   </a>
                                </span>
                        </div>
                      </div>
                      <?php }


            top_store_whishlist_check($pid);

                       ?>
                   </div>
                   </div>
                
            <div class="thunk-product-content">
                <?php  if (class_exists('TH_Variation_Swatches_Pro')) {
                        thvs_loop_available_attributes($product);
                      } ?>   
              <h2 class="woocommerce-loop-product__title">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
              </h2>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
            </div>
                  
           
            <div class="thunk-product-hover">     
                    <?php 
                      echo top_store_add_to_cart_url($product);
                    ?>
            </div>
          </div>
        </div>
        </div>
   <?php }
    } else {
      echo __( 'No products found','top-store' );
    }
   wp_reset_query();
}

function top_store_product_filter_loop($args){  
     global $product;
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product',$pid); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php 
                      echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' );
                      $hover_style = get_theme_mod( 'top_store_woo_product_animation' );
                         // the_post_thumbnail();
                        if ( 'swap' === $hover_style ){
                                $attachment_ids = $product->get_gallery_image_ids($pid);
                               foreach( $attachment_ids as $attachment_id ) 
                             {
                                 $glr = wp_get_attachment_image($attachment_id, 'shop_catalog', false, array( 'class' => 'show-on-hover' ));
                                echo $category_product['glr'] = $glr;
                               }
                           }
                  ?>
                  <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  </a> <div class="thunk-icons-wrap">
                  <?php 
                    if(get_theme_mod( 'top_store_woo_quickview_enable', true )){

                  ?>
        <div class="thunk-quik"><a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                   </a>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span>
                                      <i class="th-icon th-icon-search" aria-hidden="true"></i>
                                      </span>
                                   </a>
                                </span>
                        </div>
                      </div> 
                      <?php } 
             top_store_whishlist_check($pid);

                ?>


               </div> 
             </div>
                
              <div class="thunk-product-content">
                <?php  if (class_exists('TH_Variation_Swatches_Pro')) {
                        thvs_loop_available_attributes($product);
                      } ?>
              <h2 class="woocommerce-loop-product__title">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
              </h2>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
            </div>
            <div class="thunk-product-hover">     
                    <?php 
                      echo top_store_add_to_cart_url($product);
                    ?>
            </div>
          </div>
        </div>
      </div>
   <?php }
    } else {
      echo __( 'No products found','top-store' );
    }
    wp_reset_query();
}
/*********************/
// Product for list view
/********************/
function top_store_product_list_filter_loop($args){  
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product',$pid); ?>>
          <div class="thunk-list">
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                 <?php echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' ); ?>
                  </a>
               </div>
               <div class="thunk-product-content">
                  <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-title woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
                  <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
          </div>
       </div>
   <?php }
    } else {
      echo __( 'No products found','top-store' );
    }
    wp_reset_query();
}


/*****************************/
// Product show function
/****************************/
function  top_store_widget_product_query($query){
$productType = $query['prd-orderby'];
$count = $query['count'];
$cat_slug = $query['cate'];
global $th_cat_slug;

$th_cat_slug = $cat_slug;
        $args = array(
            'hide_empty' => 1,
            'posts_per_page' => $count,        
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        );
       if($productType == 'featured'){
       // featured product
            $args['meta_query'] =  array(
                'key'   => '_featured',
                'value' => 'yes'
            );
        } 
        elseif($productType == 'random'){
            //random product
          $args['orderby'] = 'rand';
        }
        elseif($productType == 'sale') {
          //sale product
        $args['meta_query']     = array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        )
    );
}
$args['meta_key'] = '_thumbnail_id';
if($cat_slug != '0'){
                //$args['product_cat'] = $cat_slug;
                $args['tax_query'] = array(
                  'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $cat_slug,
                            ),array(
                                'taxonomy'  => 'product_visibility',
                                'terms'     => array( 'exclude-from-catalog' ),
                                'field'     => 'name',
                                'operator'  => 'NOT IN',
                            )
                         );
     }
$return = new WP_Query($args);
return $return;
}
/*****************************/
// Product show function
/****************************/
function top_store_post_query($query){



       $args = array(
            'orderby' => $query['orderby'],
            'order' => 'DESC',
            'ignore_sticky_posts' => $query['sticky'],
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $query['count'], 
            'cat' => $query['cate'],
            'meta_key'     => '_thumbnail_id',
           
        );



       if($query['thumbnail']){
          $args['meta_key'] = '_thumbnail_id';
       }

       

            $return = new WP_Query($args);

            return $return;
}
/**********************************************
//Funtion Category list show
 **********************************************/
function top_store_category_tab_list( $term_id ){
  if( taxonomy_exists( 'product_cat' ) && !empty($term_id) ){
      // category filter
      $args = array(
            'orderby'    => 'title',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'    => $term_id
        );
      $product_categories = get_terms( 'product_cat', $args );
      $count = count($product_categories);
      $cat_list = $cate_product = '';
      $cat_list_drop = '';
      $i=1;
      $dl=0;
?>
<?php
//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
//do something with this information
if( $iPod || $iPhone ){
  $device_cat =  '2';
    //browser reported as an iPhone/iPod touch -- do something here
}else if($iPad){
  $device_cat =  '2';
    //browser reported as an iPad -- do something here
}else if($Android){
  $device_cat =  '2';
    //browser reported as an Android device -- do something here
}else if($webOS){
   $device_cat =  '4';
    //browser reported as a webOS device -- do something here
}else{
    $device_cat =  '4';
}
     if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product;
              $category_product = array();
              $current_class = '';
              $cat_list .='
                  <li>
                  <a data-filter="' .esc_attr($product_category->slug) .'" data-animate="fadeInUp"  href="#"  data-term-id='.esc_attr($product_category->term_id) .' product_count="'.esc_attr($product_category->count).'">
                     '.esc_html($product_category->name).'</a>
                  </li>';
          if ($i++ == $device_cat) break;
          }
          if($count > $device_cat){
          foreach ( $product_categories as $product_category ){
              //global $product;
              $dl++;
              if($dl <= $device_cat) continue;
              $category_product = array();
              $current_class = '';
              $cat_list_drop .='
                  <li>
                  <a data-filter="' .esc_attr($product_category->slug) .'" data-animate="fadeInUp"  href="#"  data-term-id='.esc_attr($product_category->term_id) .' product_count="'.esc_attr($product_category->count).'">
                     '.esc_html($product_category->name).'</a>
                  </li>';
          }
        }
          $return = '<div class="tab-head" catlist="'.esc_attr($i).'" >
          <div class="tab-link-wrap">
          <ul class="tab-link">';
 $return .=  $cat_list;
 $return .= '</ul>';
 if($count > $device_cat){
  $return .= '<div class="header__cat__item dropdown"><a href="#" class="more-cat" title="More categories...">•••</a><ul class="dropdown-link">';
 $return .=  $cat_list_drop;
 $return .= '</ul></div>';
}
  $return .= '</div></div>';
 echo $return;
       }
    }
}

/********************************/
//product slider loop
/********************************/
function top_store_product_slide_list_loop($term_id,$prdct_optn){  
 $args = top_store_product_query($term_id,$prdct_optn);
    $products = wc_get_products( $args );
    if (!empty($products)) {
    foreach ($products as $product) {
      $pid =  $product->get_id();
      ?>
        <div <?php post_class('product',$pid); ?>>
          <div class="thunk-list">
               <div class="thunk-product-image">
                <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                 <?php echo get_the_post_thumbnail( $pid, 'woocommerce_thumbnail' ); ?>
                  </a>
               </div>
               <div class="thunk-product-content">
                  <a href="<?php echo get_permalink($pid); ?>" class="woocommerce-LoopProduct-title woocommerce-loop-product__link"><?php echo $product->get_title(); ?></a>
                  <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
          </div>
       </div>
   <?php }
    } else {
      echo __( 'No products found','top-store' );
    }
    wp_reset_query();
}