<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
/********************************/
//product slider loop
/********************************/
function open_mart_product_slide_list_loop($term_id,$prdct_optn,$row_no){  
 // product filter 
// if($term_id['0']=='' || $term_id['0']=='0'){  
if(empty($term_id[0])){
$taxquery='';
}else{
 // category filter  
      $args1 = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'    => $term_id
        );
$product_categories = get_terms( 'product_cat', $args1);
$product_cat_slug =  $product_categories[0]->slug;
$taxquery = array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' =>  $product_cat_slug
                          )
);
}

  if($prdct_optn=='random'){  
     $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'rand'
    );
}elseif($prdct_optn=='featured'){
    $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'post__in'  => wc_get_featured_product_ids(),
    );
}else{
    $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'title'
    );
}           $i = 0; // This is to make owl in 3 
    $products = new WP_Query( $args );
    if ( $products->have_posts() ){
      while ( $products->have_posts() ) : $products->the_post();
      global $product;
      $pid =  $product->get_id();
      ?> 
      <?php  if ($row_no == 'multiplerow' && $i % 3 == 0) { ?>
        <div class="thunk-3col-slide-wrap">
      <?php } ?>
        <div <?php post_class(); ?>>
          <div class="thunk-list">
               <div class="thunk-product-image">
                <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                 <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                  </a>
               </div>
               <div class="thunk-product-content">
                 <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-title woocommerce-loop-product__link">
                       <?php the_title(); ?></a>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
          </div>
        </div>
        <?php $i++;
         if ($row_no == 'multiplerow' && $i % 3 == 0) { ?>
        </div>
      <?php }  ?>
   <?php endwhile;
    } else {
      echo __( 'No products found','open-mart' );
    }
    wp_reset_postdata();
}


/**********************************************
//Funtion Category list show
 **********************************************/   
function open_mart_category_tab_list( $term_id ){
  if( taxonomy_exists( 'product_cat' ) ){ 
      // category filter  
      $args = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
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
   $device_cat =  '3';
    //browser reported as a webOS device -- do something here
}else{
    $device_cat =  '3';
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


/**********************************************
//Funtion Category list show
 **********************************************/   
function open_mart_vertical_category_tab_list2( $term_id ){
  if( taxonomy_exists( 'product_cat' ) ){ 
      // category filter  
      $args = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'       => $term_id
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
   $device_cat =  '5';
    //browser reported as a webOS device -- do something here
}else{
    $device_cat =  '5';
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
/**********************************************
//Funtion Vertical Category list show
 **********************************************/   
function open_mart_vertical_category_tab_list( $term_id ){
  if( taxonomy_exists( 'product_cat' ) ){ 
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
          
          }
          $return = '<div class="tab-head" catlist="'.esc_attr($i).'" >
          <div class="tab-link-wrap">
          <ul class="tab-link">';
 $return .=  $cat_list;
 $return .= '</ul>';
  
$return .= '</div></div>';

 echo $return;
       }
    } 
}
/********************************/
//product cat filter loop
/********************************/
function open_mart_product_cat_filter_default_loop($term_id,$prdct_optn){
// product filter 
// if($term_id['0']=='' || $term_id['0']=='0'){  
 if(!empty($term_id[0])){
 // category filter  
      $args1 = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'    => $term_id
        );

$product_categories = get_terms( 'product_cat', $args1);

if(!empty($product_categories)){

$product_cat_slug =  $product_categories[0]->slug;


$taxquery = array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' =>  $product_cat_slug
                          )
);
}else{

  $taxquery ='';
}

}else{

  $taxquery ='';

}

  if($prdct_optn=='random'){  
     $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'rand'
    );
}elseif($prdct_optn=='featured'){
    $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'post__in'  => wc_get_featured_product_ids(),
    );
}else{
    $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'title',
    );
}
    $products = new WP_Query( $args );
    if ( $products->have_posts() ){
      while ( $products->have_posts() ) : $products->the_post();
      global $product;
      $pid =  $product->get_id();
      ?> 
        <div <?php post_class(); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
               <div class="thunk-product-image">
                <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php 
                      the_post_thumbnail('woocommerce_thumbnail'); 
                      $hover_style = get_theme_mod( 'open_mart_woo_product_animation' );
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
                  </a>
                  <?php 
                    if(get_theme_mod( 'open_mart_woo_quickview_enable', true )){

                  ?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span><?php _e('Quick View','open-mart');?></span>
                                   </a>
                                </span>
                    </div>
                  <?php } ?>
               </div>
               <div class="thunk-product-content">    
                  <h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php the_title(); ?></a></h2>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
           
            <div class="thunk-product-hover">   
              <div class="os-product-excerpt">
                <?php the_excerpt(); ?>
              </div>  
                    <?php 
                      echo open_mart_add_to_cart_url($product);
                      echo open_mart_whish_list($pid);
                      echo open_mart_add_to_compare_fltr($pid);
                    ?>
            </div>
          </div>
        </div>
        </div>
   <?php endwhile;
    } else {
      echo __( 'No products found','open-mart' );
    }
    wp_reset_postdata();
}

function open_mart_product_filter_loop($args){  
    $products = new WP_Query( $args );
    if ( $products->have_posts() ){
      while ( $products->have_posts() ) : $products->the_post();
      global $product;
      $pid =  $product->get_id();
      ?>
        <div <?php post_class(); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
               <div class="thunk-product-image">
                <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php 
                      the_post_thumbnail('woocommerce_thumbnail'); 
                      $hover_style = get_theme_mod( 'open_mart_woo_product_animation' );
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
                  </a>
                  <?php 
                    if(get_theme_mod( 'open_mart_woo_quickview_enable', true )){

                  ?>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span><?php _e('Quick View','open-mart');?></span>
                                   </a>
                                </span>
                      </div>
                    <?php } ?>
               </div>
               <div class="thunk-product-content">             
                  <h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php the_title(); ?></a></h2>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
            <div class="thunk-product-hover">  
            <div class="os-product-excerpt">
                <?php the_excerpt(); ?>
              </div>     
                    <?php 
                      echo open_mart_add_to_cart_url($product);
                      echo open_mart_whish_list($pid);
                      echo open_mart_add_to_compare_fltr($pid);
                    ?>
            </div>
          </div>
        </div>
      </div>
   <?php endwhile;
    } else {
      echo __( 'No products found','open-mart' );
    }
    wp_reset_postdata();
}
/*********************/
// Product for list view
/********************/
function open_mart_product_list_filter_loop($args){  
    $products = new WP_Query( $args );
    if ( $products->have_posts() ){
      $i = 0;
      while ( $products->have_posts() ) : $products->the_post();
      global $product;
      $pid =  $product->get_id();
      ?>
      <?php  if ($i % 3 == 0) { ?>
        <div class="thunk-3col-slide-wrap">
      <?php } ?>
        <div <?php post_class(); ?>>
          <div class="thunk-list">
               <div class="thunk-product-image">
                <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                 <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                  </a>
               </div>
               <div class="thunk-product-content">
                <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-title woocommerce-loop-product__link"><?php the_title(); ?></a>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
          </div>
       </div>
    <?php $i++;
        if ($i % 3 == 0) { ?>
        </div>
    <?php }  ?>
   <?php endwhile;
    } else {
      echo __( 'No products found','open-mart' );
    }
    wp_reset_postdata();
}

//***************************************/
// Featured product to show in big post
//***************************************/

function open_mart_featured_product_show_big($term_id){ 
// product filter 
if($term_id ==''){  
$taxquery='';
}else{
 // category filter  
      $args1 = array(
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'slug'    => $term_id
        );
$product_categories = get_terms( 'product_cat', $args1);
$product_cat_slug =  $product_categories[0]->slug;
$taxquery = array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' =>  $product_cat_slug
                          )
);
}
$args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'post__in'  => wc_get_featured_product_ids(),
                      'posts_per_page' => 1,

    );
   $products = new WP_Query( $args );
    if ( $products->have_posts() ){
      while ( $products->have_posts() ) : $products->the_post();
      global $product;
      $pid =  $product->get_id();
      ?>
        <div <?php post_class(); ?>>
          <div class="thunk-product-wrap">
          <div class="thunk-product">
               <div class="thunk-product-image">
                <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <?php $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                      // Get product prices
                        $regular_price = (float) $product->get_regular_price(); // Regular price
                        $sale_price = (float) $product->get_price(); // Sale price
                        $saving_price = wc_price( $regular_price - $sale_price );
                        echo $sale = '<span class="onsale">-'.$saving_price.'</span>';
                    }?>
                 <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                 <?php 
                        $rat_product = wc_get_product($pid);
                        $rating_count =  $rat_product->get_rating_count();
                        $average =  $rat_product->get_average_rating();
                        echo $rating_count = wc_get_rating_html( $average, $rating_count );
                       ?>
                  </a>
                   <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="<?php echo esc_attr($pid); ?>">
                                      <span><?php _e('Quick View','open-mart');?></span>
                                   </a>
                                </span>
                      </div>
               </div>
               <div class="thunk-product-content">       
                  <h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php the_title(); ?></a></h2>
                  <div class="price"><?php echo $product->get_price_html(); ?></div>
               </div>
            <div class="thunk-product-hover"> 
                <div class="os-product-excerpt">
                    <?php the_excerpt(); ?>
                  </div>      
                    <?php 
                      echo open_mart_add_to_cart_url($product);
                      echo open_mart_whish_list($pid);
                      echo open_mart_add_to_compare_fltr($pid);
                    ?>
            </div>
          </div>
        </div>
      </div>
   <?php endwhile;
    } 
    wp_reset_postdata();

}
/*****************************/
// Product show function
/****************************/
function  open_mart_widget_product_query($query){
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
        $taxquery = array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' =>  $cat_slug
                          )
          );
        $args = array(
                      
                      'tax_query' => $taxquery,
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'post__in'  => wc_get_featured_product_ids(),
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
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $cat_slug,
                            )
                         );
     }
$return = new WP_Query($args);
return $return;
}
/*****************************/
// Product show function
/****************************/
function open_mart_post_query($query){

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
     /*************************
     * Get Off Canvas Sidebar
     *
     * @return void
     */
      function open_mart_show_off_canvas_sidebar_icon(){
      if ( ! class_exists( 'WooCommerce' ) ){
           return;
      }
      $offcanvas = get_theme_mod('open_mart_canvas_alignment','cnv-none');
      if($offcanvas!=='cnv-none'):
      ?>
      <span class="canvas-icon">
      <a href="#" class="off-canvas-button">
         <span class="cnv-top"></span>
         <span class="cnv-top"></span>
         <span class="cnv-bot"></span>
       </a>
    </span>
    <?php  endif; }
    function open_mart_get_off_canvas_sidebar(){
     if(get_theme_mod('open_mart_canvas_alignment','cnv-none')!=='cnv-none'):
        echo '<div class="open-mart-off-canvas-sidebar-wrapper from-left"><div class="open-mart-off-canvas-sidebar"><div class="close-bn"><span class="open-mart-filter-close close"></span></div>';
        if ( is_active_sidebar('open-woo-canvas-sidebar') ){
                          dynamic_sidebar('open-woo-canvas-sidebar');
                       }else{ ?>
                  <p class='no-widget-text'>
          <a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
            <?php esc_html_e( 'Click here to assign a widget for this area.', 'open-mart' ); ?>
          </a>
        </p>
                    <?php }
        echo '</div></div>';
      endif;
     
    }
    add_action( 'wp_footer', 'open_mart_get_off_canvas_sidebar' );