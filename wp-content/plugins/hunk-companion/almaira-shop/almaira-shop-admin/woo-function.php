<?php 
if ( ! class_exists( 'WooCommerce' ) ){
     return;
}

/**********************************/
//almaira_shop_woo_category_product_grid
/**********************************/
function almaira_shop_woo_category_product_grid($productArr){
 $product_list='';
$product_list.='<li class="featured-isotope cd-item featured-list '.$productArr['slug'].' '.implode(" ", $productArr['prd_cls']).'" id="post-'.$productArr['pid'].'"  data-max-pages="'.$productArr['max_page'].'" lfb-page = "2">
<a href="'.$productArr['permalink'].'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
  <div class="thunk-product">
    <a href="'.$productArr['permalink'].'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
      <div class="thunk-product-image">
      '.$productArr['sale'].'
         <a href="'.$productArr['permalink'].'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link product-image">
                      '.$productArr['thumb'].'
                       '.$productArr['glr'].'
              </a>                           
      </div>
      <div class="thunk-product-content">
        <h2 class="woocommerce-loop-product__title"><a href="'.$productArr['permalink'].'">'. $productArr['title'] .'</a></h2>
        '. $productArr['rating'] .'
              <span class="price">
                 '.$productArr['price'].'
                 
              </span>
         </div>';
      if ( true == get_theme_mod( 'almaira_shop_woo_quickview_enable','true' ) ){
      $product_list.='<div class="thunk-quik">
                   <div class="thunk-quickview">
                     <span class="quik-view"><a href="#" class="alm-quick-view-text" data-product_id="'.$productArr['pid'].'"><i class="fa fa-search"></i></a>
                     </span>
                   </div>';
            if(class_exists( 'YITH_WCWL' )):
                    $product_list.='<div class="thunk-wishlist">
                   <span class="thunk-wishlist-inner">
                   '.almaira_shop_whish_list().'
                  </span>     
               </div>';
             endif;
               $product_list.= almaira_shop_add_to_compare_fltr($productArr['pid']).'
      </div>';
     }
    $product_list.=''.$productArr['cart_url'].'
    </div>
</li>';
return $product_list;
}
function almaira_shop_category_product_loop($category_product,$args){
                  $cate_product = '';
                  $products = new WP_Query( $args );
                  if($products->have_posts()) :
                  while($products->have_posts()) : $products->the_post();
                  global $product;
                  $pid =  $product->get_id();
                  $category_product['max_page'] = $products->max_num_pages;
                     
                       $category_product['products'] = $products;
                       $category_product['pid'] = $pid;
                       $category_product['title'] = get_the_title();
                       $category_product['excerpt'] = get_the_excerpt();
                       $category_product['permalink'] = esc_url(get_permalink());
                       $category_product['price'] = $product->get_price_html();
                       $category_product['cart_url'] = almaira_shop_add_to_cart_url($product);
                       $category_product['prd_cls'] = get_post_class();
                       $category_product['glr']='';
                       $rat_product = wc_get_product( $pid );
                       $rating_count =  $rat_product->get_rating_count();
                       $average =  $rat_product->get_average_rating();
                       $rating_count = wc_get_rating_html( $average, $rating_count );
                       $category_product['rating'] = $rating_count;
                       $sale = get_post_meta( $pid, '_sale_price', true);
                    if( $sale) {
                        $sale = '<span class="onsale">'.__('Sale','hunk-companion').'</span>';
                    }
               
                  $category_product['sale'] = $sale;

          if (has_post_thumbnail( $pid ) ):
            $thumbnail = get_the_post_thumbnail( $pid, 'woocommerce_single' );
              else:
              $thumbnail = '<img src="' . wc_placeholder_img_src() . '" alt="product" class="image-hover wp-post-image"  />';
         endif;
              $category_product['thumb'] = $thumbnail;


          $hover_style = get_theme_mod( 'almaira_shop_woo_product_animation' );

          if ( 'swap' === $hover_style ){
           
         $attachment_ids = $product->get_gallery_image_ids($pid);
         foreach( $attachment_ids as $attachment_id ) 
          {
          $glr = wp_get_attachment_image($attachment_id, 'shop_catalog', false, array( 'class' => 'show-on-hover' ));
          $category_product['glr'] = $glr;
          }
        
       }
              $cate_product .= almaira_shop_woo_category_product_grid($category_product);
              endwhile;//Possibility to add else statement
                wp_reset_postdata();
              return $cate_product;
                else:
              echo '<p class="not_found">'.__('Sorry, The post you are looking is unavailable!','hunk-companion').'</p>';
              endif;
              wp_reset_query();
}

function almaira_shop_product_section_filter_product_show(){
   if( taxonomy_exists( 'product_cat' ) ){
    
      $term_id = get_theme_mod('almaira_shop_product_cate',0); 
      $posts_per_page  = get_theme_mod('almaira_shop_cate_prd_shw',8);   

        // category filter  
        $args = array(
            //'number'     => $count,
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'include'    => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';



      foreach ( $product_categories as $product_category ) {
              //global $product; 
              $category_product = array();
            
              $category_product['slug'] = $product_category->slug;

            // product filter  
            $args = array(
                      'posts_per_page' => $posts_per_page,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              // 'terms' => 'white-wines'
                              'terms' => $category_product['slug'],
                          )
                      ),
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby' => 'date',
                  );
       $cate_product .= almaira_shop_category_product_loop($category_product,$args);
    } // foreach loop End   
      echo $cate_product;
  }
}
  
/* Funtion to show category list in product section */
function almaira_shop_product_sec_category_products(){
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('almaira_shop_product_cate',0); 
      $perpage  = get_theme_mod('almaira_shop_cate_prd_shw',8);   
      // category filter  
      $args = array(
            
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'include'    => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $cat_list = $cate_product = '';
      $i=1;
     if ( $count > 0 ){
      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
              $current_class = '';
              $cat_list .='
                  <li><a class="button th-portfolio-cat" data-filter=".' .esc_attr($product_category->slug) .'"  post_count="'.esc_attr($product_category->count).'" >'.esc_html($product_category->name).'</a></li>';
          $i++;
          }
          $return = '<div class="featured-filter button-group filters-button-group js-radio-button-group" plcatlist="'.esc_attr($i).'" pfl_perpage = "'.esc_attr($perpage).'" >
          <ul class="ft-button-ul">';
 $return .=  $cat_list;
 $return .= '</ul></div>';
 return $return;
       }
    } 
}
/***************************/
// Product load more button (category product section)
/***************************/
function almaira_shop_product_loadmore_prd_section(){
    $posts_per_page = get_theme_mod('almaira_shop_cate_prd_shw','10');
    if ( empty( $paged ) ){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
    }
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
    );
    $product = new WP_Query( $args );
    if ( $product->have_posts() ){
     if($posts_per_page < $product->found_posts){
    echo'<div class="thunk-load-more-wrap">
           <button id="prd-sect-loadmore" class="thunk-pr-ldmore thunk-button" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($product->max_num_pages).'"><span>'.esc_html__( 'Load More', 'hunk-companion' ).'</span></button>
         </div>';
        }
    }
    wp_reset_postdata();
}
/**********************************/
//almaira_shop_sort_filter_product_show (sortby section)
/**********************************/
function almaira_shop_sort_woo_category_list($category_list){
$cate_list = '<li>
                <label class="th-check-container">
                  '.$category_list.'
                </li>';
return $cate_list;
}
function almaira_shop_sort_category_products(){
  if( taxonomy_exists( 'product_cat' ) ){
      $term_id = get_theme_mod('almaira_shop_sortby_cate',0); 
      // category filter  
      $args = array(
            
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'include'    => $term_id
        );

      $product_categories = get_terms( 'product_cat', $args );

      $count = count($product_categories);

      $category_list = $cate_product = '';
    if ( $count > 0 ){

      foreach ( $product_categories as $product_category ){
              //global $product; 
              $category_product = array();
              $current_class = '';
              $category_list .='
             <li><label class="th-check-container"><span>' . $product_category->name . '</span>
                  <input type="checkbox" name="prd_cat[]" value="'.$product_category->term_id .'"><span class="th-checkmark"></span></label></li>'; 
          }
          $cate_list = almaira_shop_sort_woo_category_list($category_list);
          echo $cate_list;
       }
    } 
}
function almaira_shop_sort_filter_product_show(){
     $posts_per_page = get_theme_mod('almaira_shop_prd_shw','10');
     $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      
      );
    $product = new WP_Query( $args );
    if ( $product->have_posts() ){
      while ( $product->have_posts() ) : $product->the_post();
        wc_get_template_part( 'content', 'product' );
      endwhile;
    } else {
      echo __( 'No products found','hunk-companion' );
    }
    wp_reset_postdata();
  }
/***************************/
// Product load more button
/***************************/
function almaira_shop_product_loadmore(){
    $posts_per_page = get_theme_mod('almaira_shop_prd_shw','10');
    if ( empty( $paged ) ){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
    }
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      );
    $product = new WP_Query( $args );
    if ( $product->have_posts() ){
     if($posts_per_page < $product->found_posts){
    echo'<div class="thunk-load-more-wrap">
           <button id="sortby-load-more" class="thunk-load-more thunk-button" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($product->max_num_pages).'"><span>'.esc_html__( 'Load More', 'hunk-companion' ).'</span></button>
         </div>';
        }
    }
    wp_reset_postdata();
}

/***************************/
//sort product ajax filter
/***************************/
add_action('wp_ajax_almaira_shop_sort_filter_ajax', 'almaira_shop_sort_filter_ajax');
add_action('wp_ajax_nopriv_almaira_shop_sort_filter_ajax', 'almaira_shop_sort_filter_ajax');
//new aproch to set filter
function almaira_shop_sort_filter_ajax(){

  if ( ! current_user_can( 'administrator' ) ) {
  
    wp_die( - 1, 403 );
    
  } 
  check_ajax_referer('almaira_nonce','nonce');

     $posts_per_page = get_theme_mod('almaira_shop_prd_shw','10');
     $term_id = $_POST['cat_slug'];   
     $radio = $_POST['radio_slug'];
     if ( empty($_POST["paged"]) ){
      $paged = ( get_query_var($_POST["paged"] ) ) ? get_query_var( $_POST["paged"] ) : 1; 
      }else{
        $paged = $_POST["paged"];
      }
     $meta_query = array(
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
     $tax_query = array();
     $tax_query [] = array(
                  'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'term_id',
                              'terms' => $term_id
                          )
                   ),
              );
    if($radio=='low-to-high'){
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'tax_query' => $tax_query,
      'orderby'   => 'meta_value_num',
      'meta_key'  => '_price',
      'order' => 'ASC',
      'paged'     => $paged, 
      );
    }
    elseif($radio=='high-to-low'){
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'tax_query' => $tax_query,
      'orderby'   => 'meta_value_num',
      'meta_key'  => '_price',
      'order' => 'DESC',
      'paged'     => $paged, 
      );
    }elseif($radio=='onsale'){
      $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'tax_query' => $tax_query,
      'meta_query'=> $meta_query,
      'paged'     => $paged, 
    );

    }elseif($radio=='featured'){
      $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'tax_query' => $tax_query,
      'post__in'   => wc_get_featured_product_ids(),
      'paged'     => $paged, 
    );
    }else{
       $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'tax_query' => $tax_query,
      'paged'     => $paged, 
      );
    }

    $product = new WP_Query($args);
    if ( $product->have_posts()){
    while ( $product->have_posts() ) : $product->the_post();
      
    wc_get_template_part( 'content', 'product' );
    endwhile;
    if($posts_per_page < $product->found_posts){
    echo'<div class="thunk-load-more-wrap">
           <button id="sortby-load-more" class="thunk-load-more thunk-button" data-paged="'.esc_attr($paged).'" data-max-pages="'. esc_attr($product->max_num_pages).'"><span>'.esc_html__( 'Load More', 'hunk-companion' ).'</span></button>
         </div>';
       }
    }else{
      echo __( 'No products found','hunk-companion' );
    }
    exit;
    wp_reset_postdata();
  }   
/***************************/
//category product section product ajax filter
/***************************/
add_action('wp_ajax_almaira_shop_product_section_filter_product_ajax', 'almaira_shop_product_section_filter_product_ajax');
add_action('wp_ajax_nopriv_almaira_shop_product_section_filter_product_ajax', 'almaira_shop_product_section_filter_product_ajax');
function almaira_shop_product_section_filter_product_ajax(){

  if ( ! current_user_can( 'administrator' ) ) {
  
    wp_die( - 1, 403 );
    
  } 
  check_ajax_referer('almaira_nonce','nonce');
  
   if( taxonomy_exists( 'product_cat' ) ){
      $perpage  = get_theme_mod('almaira_shop_cate_prd_shw',8);
      if ( empty($_POST["paged"]) ){
      $paged = ( get_query_var($_POST["paged"] ) ) ? get_query_var( $_POST["paged"] ) : 1; 
      }else{
      $paged = $_POST["paged"];
      }
     $category_product = array();
     $category_product['slug'] =  $_POST['cat_slug'];
     // product filter  
            $args = array(
                      'posts_per_page' => $perpage,
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' => $_POST['cat_slug'],
                          )
                      ),
                      'post_type' => 'product',
                      'post_status' => 'publish',
                      'orderby'   => 'date',
                      'paged'     => $paged, 
                  );
    echo $cate_product .= almaira_shop_category_product_loop($category_product,$args);
    exit;
  }
}