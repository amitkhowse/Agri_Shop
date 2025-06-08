<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

if ( ! class_exists( 'WooCommerce' ) ){
	return;
}

class Vayu_Advance_Product_Tab {

      /**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
        /**
		 * Constructor
		 */
		public function __construct(){

            add_action('wp_ajax_load_category_products', array( $this,'load_category_products'));
            add_action('wp_ajax_nopriv_load_category_products',array( $this,'load_category_products'));


        }

        public function render_callback( $attr ) {

        wp_enqueue_style( 'th-icon', VAYU_BLOCKS_URL . '/inc/th-icon/style.css', '', '1.0.0' );
        wp_enqueue_script( 'advance-product-tab-script', VAYU_BLOCKS_URL .'/inc/render/advance-product-tab/js/advance-product-tab.js', array( 'jquery' ), '', true );
        wp_localize_script(
                'advance-product-tab-script',
                'advance_product_tab_ajax',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'th_nonce'=> wp_create_nonce( 'th_advance_product_block' ),
                  
                )
            );

        $block_content = '<div id="wp-block-th-advance-product-tag-' . esc_attr($attr['uniqueId']) . '"  data-attr= "' . esc_attr(json_encode($attr)) . '" class="wp-block-vayu-blocks-advance-product wp-block-th-advance-product-tag-' . esc_attr($attr['uniqueId']) . '  align' . (isset($attr['align']) ? esc_attr($attr['align']) : '') . '">
            <div class="th-product-block-wrapper">
                <div class="wp-block-th-blocks-overlay"></div>';
                    $showTab = isset($attr['showTab']) ? $attr['showTab'] : true;
                    if($showTab):
                    $block_content .= '<div class="th-product-block-cat-filter">
                    <ul class="category-tabs">';
                        if (isset($attr['productCategories']) && is_array($attr['productCategories'])) {
                            foreach ($attr['productCategories'] as $category) {

                                $block_content .= '
                                    <li class="tab-link" cat_id="' . (isset($category['value']) ? esc_attr($category['value']) : '') . '" cat_slug="' . (isset($category['slug']) ? esc_html($category['slug']) : '') . '">
                                        ' . (isset($category['label']) ? esc_html($category['label']) : '') . '
                                    </li>';
                            }

                        }
                    $block_content .= '</ul></div>';
                    endif;
                   $block_content .= '<div class="th-product-block-product-content">
                   '.$this->get_fetch_product($attr).'
                   </div>';

                   $showNavs = isset($attr['showNavs']) ? $attr['showNavs'] : true;
                   if($showNavs =='true'){
                    $block_content .= '<div class="th-pagination">
                            <button class="prev" disabled="disabled">
                            <span class="dashicons dashicons-arrow-left-alt2"></span>
                            </button>
                            <button class="next">
                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                            </button>
                            </div>';
                    } 

                   $block_content .= '</div></div>';
    
    return $block_content;

   }


   public function get_fetch_product($attr){
   
    $args = array(
        'status' => 'publish',
        'visibility' => 'catalog',
        'paginate' => true,
    );

    $stock_status = isset( $attr['stockStatus'] ) ? $attr['stockStatus'] : array( 'instock', 'outofstock', 'onbackorder' );
    $args['stock_status'] = $stock_status;
  
    //product per page
    $device_type = $this->device_check();

    if ($device_type === 'tablet' && isset($attr['productShow']['Tablet'])) {

        $perpageproduct = $attr['productShow']['Tablet'];

    } elseif ($device_type === 'mobile' && isset($attr['productShow']['Mobile'])) {

        $perpageproduct = $attr['productShow']['Mobile'];

    } else {

        $perpageproduct = isset($attr['productShow']['Desktop']) ? $attr['productShow']['Desktop'] : 6;

    }
    
    $args['limit'] = $perpageproduct;

    // Selected category
    
        if (isset($attr['productCategories']) && is_array($attr['productCategories'])) {
            $term_slugs = array();
            foreach ($attr['productCategories'] as $category) {
                if (isset($category['slug'])) {
                    $term_slugs[] = sanitize_title($category['slug']);
                }
            }
    
            if (!empty($term_slugs)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $term_slugs,
                    ),
                );
            }
        }

    //product type
    if (isset($attr['productType'])) {

        switch ($attr['productType']) {

            case 'sale':
                // Fetch sale products
                add_filter( 'woocommerce_product_data_store_cpt_get_products_query', array( $this, 'handle_sale_products_query_var' ), 10, 2 );
                break;

            case 'featured':
                // Fetch featured products
                $args['featured'] = true;

                break;

            case 'manual':

                $manualProductIDs = array();

                    if (isset($attr['manualProduct']) && is_array($attr['manualProduct'])) {
                        foreach ($attr['manualProduct'] as $product) {
                            if (isset($product['value'])) {
                                $manualProductIDs[] = absint($product['value']);
                            }
                        }
                    }

                    $args['include'] = $manualProductIDs;
    
                break;    
            default:
                // No specific product type specified
                break;
        }
    }

    //exclude product
    if (isset($attr['excludeProduct']) && is_array($attr['excludeProduct'])) {
        $excludeProductProductIDs = array();
        foreach ($attr['excludeProduct'] as $product) {
            if (isset($product['value'])) {
                $excludeProductProductIDs[] = absint($product['value']);
            }
        }
        $args['exclude'] = $excludeProductProductIDs;
    }
   
     

    if (isset($attr['productOrder'])) {

        switch ($attr['productOrder']) {

            case 'desc':
                
                $args['order'] = 'DESC';

                break;
               
            default:
                    
                $args['order'] = 'ASC';
    
                break;    
            
        }
    }
    //orderby
    if (isset($attr['productOrderby'])) {

        switch ($attr['productOrderby']) {

            case 'date':
                
                $args['orderby'] = 'date';
                break;

            case 'price':
                
                    $args['orderby'] = 'meta_value_num';
                    $args['meta_key'] = '_price'; 
    
                    
                    break;

            case 'popularity':
   
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = 'total_sales';
                break; 
                
            case 'rating':
                    
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_wc_average_rating';
    
                 break; 
             case 'menu-order':
                    
                $args['orderby'] = 'menu_order title';
        
                break;    
            default:
                // No specific product type specified
                break;
        }

    }

    // Get the current page number from the AJAX request
    $page = 1;
    $args['page'] = $page;

    $results = wc_get_products($args);

    $total_pages = $results->max_num_pages;
    
    $product_content = '';
    
    // Check if 'template' key exists
    // Default template array
    $default_template = [
        "image",
        "category",
        "title",
        "price",
        "rating",
        "button"
    ];
    
    // Get the 'template' attribute from $attr or use the default template
    $template = isset($attr['template']) && is_array($attr['template']) ? $attr['template'] : $default_template;
    $animationCls   = !empty($attr['advAnimation']['className']) ? esc_attr($attr['advAnimation']['className']) : '';
    $product_content .= '<div class="th-product-block-product-item-wrap" total-page="'.esc_attr($total_pages).'">';

    foreach ($results->products as $product) {

        $product_content .= '
            <div class="th-product-item '.$animationCls.'" key="' . esc_attr($product->get_id()) . '">
                <div class="th-product-block-content-wrap">';

        foreach ($template as $element) {
            switch ($element) {
                case 'image':
                    // Image
                    $displayFeaturedImage = isset($attr['displayFeaturedImage']) ? $attr['displayFeaturedImage'] : true;
                    $imageStyle = isset($attr['imageStyle']) ? $attr['imageStyle'] : 'default';
                    if($displayFeaturedImage):

                    $product_content .= '<div class="th-product-image '.esc_attr($imageStyle).'">';

                    //post meta
                    $product_content .= '<div class="th-product-meta">';

                    $showWishlist = isset($attr['showWishlist']) ? $attr['showWishlist'] : false;
                    if($showWishlist):
                    //wishlist
                    if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
                    $product_content .= '<div class="th-icons th-wishlist-button">';
                    
                    $product_content .= '<div class="thunk-wishlist">
                        <span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist  product_id=' . esc_attr($product->get_id()) . ' icon="th-icon th-icon-heart1" label="" already_in_wishslist_text="" browse_wishlist_text="" product_added_text=""]' ).'</div></span>';
                    
                    $product_content .= '</div>';
                   }
                   endif;

                    //compare
                    $showCompare = isset($attr['showCompare']) ? $attr['showCompare'] : false;
                    if($showCompare):
                    if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
                    $product_content .= '<div class="th-icons th-compare-button">';
                    $product_content .= '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
                              <a class="th-product-compare-btn compare" data-th-product-id="' . esc_attr($product->get_id()) . '"><span class="th-icon th-icon-repeat"></span></a>
                              </div></span></div>';
                    $product_content .= '</div>';
                    } 
                    endif;
                    
                    $product_content .= '</div>';

                    // Sale

                    
                    
                    $sale = get_post_meta($product->get_id(), '_sale_price', true);
                   
                    if ($sale && (array_key_exists('showSale', $attr) ? $attr['showSale'] : true)) {

                        
                        $product_content .= '<div class="th-product-sale ' . (isset($attr['saleStyle']) ? esc_attr($attr['saleStyle']) : '') . ' ' . (isset($attr['saleDesign']) ? esc_attr($attr['saleDesign']) : '') . ' ' . (isset($attr['salePosition']) ? esc_attr($attr['salePosition']) : '') . '"> ';

                        if (isset($attr['saleDesign']) && $attr['saleDesign'] === 'saledigit' && $product->get_regular_price() && $product->get_sale_price()) {
                            $discountPercentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                            $product_content .= '<span class="discount-percentage">' . (float) $discountPercentage . __( '%', 'vayu-blocks' ) . '</span>';
                        } else {
                            $product_content .= '<span class="discount-percentage">' . (isset($attr['saleText']) ? esc_html($attr['saleText']) : __( 'sale', 'vayu-blocks' )) . '</span>';
                        }

                        $product_content .= '</div>';
                    }
                    $attachment_ids = $product->get_gallery_image_ids($product->get_id());
                    $product_content .= '<a href="' . esc_url($product->get_permalink()) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                            ' . get_the_post_thumbnail($product->get_id(), 'woocommerce_thumbnail');

                    if ($imageStyle == 'swapin' && $attachment_ids && count($attachment_ids)) {
                        $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array('class' => 'th-swap'));
                        $product_content .= wp_kses_post($glr);
                    }

                    $product_content .= '</a>';

                    $product_content .= '</div>';

                    endif;
                    break;

                case 'category':
                    // Category
                    $displayCategory = isset($attr['displayCategory']) ? $attr['displayCategory'] : true;
                    if($displayCategory):
                    $product_content .= '<div class="th-product-cat">';
                    foreach ($product->get_category_ids() as $category_id) {
                        $category = get_term($category_id, 'product_cat');
                        $product_content .= ' <a href="' . esc_url(get_category_link($category_id)) . '">' . esc_html($category->name) . '</a>';
                    }
                    $product_content .= '</div>';
                    endif;
                    break;

                case 'title':
                    // Title
                    $displayTitle = isset($attr['displayTitle']) ? $attr['displayTitle'] : true;
                    if($displayTitle):
                    $product_content .= '<' . (isset($attr['prouctTitleTag']) ? esc_attr($attr['prouctTitleTag']) : 'h3') . ' class="th-product-title">
                        <a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_name()) . '</a>   
                    </' . (isset($attr['prouctTitleTag']) ? esc_html($attr['prouctTitleTag']) : 'h3') . '>';
                    endif;
                    break;

                case 'price':
                    // Price
                    $displayPrice = isset($attr['displayPrice']) ? $attr['displayPrice'] : true;
                    if($displayPrice):
                    $product_content .= '<div class="th-product-price">
                        ' . wp_kses_post($product->get_price_html()) . '
                    </div>';
                    endif;
                    break;

                case 'rating':
                    // Rating
                    $displayRating = isset($attr['displayRating']) ? $attr['displayRating'] : true;
                    $hideRating = isset($attr['hideRating']) ? $attr['hideRating'] : true;
                    if($displayRating && $hideRating):
                    $product_content .= '<div class="th-product-rating woocommerce">
                        ' . wc_get_rating_html($product->get_average_rating()) . '
                    </div>';
                    endif;
                    break;

                case 'button':
                    // Button
                    $displayButton = isset($attr['displayButton']) ? $attr['displayButton'] : true;
                    if($displayButton):
                    $product_content .= '<div class="th-product-add-btn">
                        ' . wp_kses_post($this->add_to_cart_url($product)) . '
                    </div>';
                    endif;
                    break;

                default:
                    break;
            }
        }

        $product_content .= '</div></div>';
    }

    $product_content .= '</div>';

    return $product_content;

  }

  
public function add_to_cart_url($product){
    if ($product) {
        $url = $product->add_to_cart_url();
        $label = $product->add_to_cart_text();
        $class = $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '';
        $attributes = array(
            'data-product_id'  => $product->get_id(),
            'data-product_sku' => $product->get_sku(),
            'aria-label'       => wp_strip_all_tags($product->add_to_cart_description()),
            'rel'              => 'nofollow',
        );

        $quantity = 1;
        $class = isset($class) ? $class : '';
        $args = array(
            'quantity'   => $quantity,
            'class'      => $class,
            'attributes' => $attributes,
            'product'    => $product,
        );

        if (isset($attributes['aria-label'])) {
            $attributes['aria-label'] = wp_strip_all_tags($attributes['aria-label']);
        }

        $button = sprintf(
            '<a href="%s" %s>%s</a>',
            esc_url($url),
            wc_implode_html_attributes($attributes),
            esc_html($label)
        );

        if ($product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock()) {
            $class = isset($class) ? $class : '';
            $class .= ' ajax_add_to_cart';
            $button = sprintf(
                '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
                esc_url($url),
                esc_attr($quantity),
                esc_attr($class),
                wc_implode_html_attributes($attributes),
                esc_html($label)
            );
        }

        return $button;
    }
}


function handle_sale_products_query_var( $query) {
	
		$query['meta_query'][] = array(
			'key' => '_sale_price',
			'value' => 0,
			'compare' => '>',
			'type' => 'NUMERIC',
		);
	
	return $query;
}


public function device_check() {

    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) : '';

    $mobile_agents = array(
        'Mobile',
        'Android',
        'Silk/',
        'Kindle',
        'BlackBerry',
        'Opera Mini',
        'Opera Mobi'
    );

    $tablet_agents = array(
        'iPad',
        'Android Tablet',
        'Kindle Fire',
        'Silk'
    );

    $is_mobile = false;
    $is_tablet = false;

    foreach ($mobile_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            $is_mobile = true;
            break;
        }
    }

    foreach ($tablet_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            $is_tablet = true;
            break;
        }
    }

    if ($is_tablet) {
        return 'tablet';
    } elseif ($is_mobile) {
        return 'mobile';
    } else {
        return 'desktop';
    }
}


public function load_category_products(){

    if ( ! current_user_can( 'administrator' ) ) {

            wp_die( - 1, 403 );
            
    } 

    check_ajax_referer( 'th_advance_product_block','th_nonce');
   
    $page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : '';

    $attr = isset($_POST['attr']) ? json_decode(stripslashes($_POST['attr']), true) : array();  // Decode the JSON string 
   
    $args = array(
        'status' => 'publish',
        'visibility' => 'catalog',
        'paginate' => true,
    );
    $stock_status = isset( $attr['stockStatus'] ) ? $attr['stockStatus'] : array( 'instock', 'outofstock', 'onbackorder' );
    $args['stock_status'] = $stock_status;
    
    //product per page

    $device_type = $this->device_check();

    if ($device_type === 'tablet' && isset($attr['productShow']['Tablet'])) {

        $perpageproduct = $attr['productShow']['Tablet'];

    } elseif ($device_type === 'mobile' && isset($attr['productShow']['Mobile'])) {

        $perpageproduct = $attr['productShow']['Mobile'];

    } else {

        $perpageproduct = isset($attr['productShow']['Desktop']) ? $attr['productShow']['Desktop'] : 6;

    }
    
    $args['limit'] = $perpageproduct;

    // Selected category
    $categoryid = isset($_POST['category_id']) ? sanitize_text_field($_POST['category_id']) : '';

    if($categoryid !==''){
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $categoryid,
            ),
        );
    }else{
        if (isset($attr['productCategories']) && is_array($attr['productCategories'])) {
            $term_slugs = array();
            foreach ($attr['productCategories'] as $category) {
                if (isset($category['slug'])) {
                    $term_slugs[] = sanitize_title($category['slug']);
                }
            }
    
            if (!empty($term_slugs)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $term_slugs,
                    ),
                );
            }
        }
    }


    if (isset($attr['productOrder'])) {

        switch ($attr['productOrder']) {

            case 'desc':
                
                $args['order'] = 'DESC';

                break;
               
            default:
                    
                $args['order'] = 'ASC';
    
                break;    
            
        }
    }
    //product type
    if (isset($attr['productType'])) {

        switch ($attr['productType']) {

            case 'sale':
                // Fetch sale products
                add_filter( 'woocommerce_product_data_store_cpt_get_products_query', array( $this, 'handle_sale_products_query_var' ), 10, 2 );
                break;

            case 'featured':
                // Fetch featured products
                $args['featured'] = true;

                break;

            case 'manual':

                $manualProductIDs = array();

                    if (isset($attr['manualProduct']) && is_array($attr['manualProduct'])) {
                        foreach ($attr['manualProduct'] as $product) {
                            if (isset($product['value'])) {
                                $manualProductIDs[] = absint($product['value']);
                            }
                        }
                    }

                    $args['include'] = $manualProductIDs;
    
                break;    
            default:
                // No specific product type specified
                break;
        }
    }

    //exclude product
    if (isset($attr['excludeProduct']) && is_array($attr['excludeProduct'])) {
        $excludeProductProductIDs = array();
        foreach ($attr['excludeProduct'] as $product) {
            if (isset($product['value'])) {
                $excludeProductProductIDs[] = absint($product['value']);
            }
        }
        $args['exclude'] = $excludeProductProductIDs;
    }
   
    //orderby
    if (isset($attr['productOrderby'])) {

        switch ($attr['productOrderby']) {

            case 'date':
                
                $args['orderby'] = 'date';
                break;

            case 'price':
                
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_price';

                break;
            case 'popularity':
                    
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = 'total_sales';
    
                 break; 
            case 'rating':
                    
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_wc_average_rating';
    
                 break; 
             case 'menu-order':
                    
                $args['orderby'] = 'menu_order title';
        
                break;    
            default:
                // No specific product type specified
                break;
        }
    }

    

    // Get the current page number from the AJAX request
    $page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : '1';

    $args['page'] = $page;

    $products = wc_get_products($args);

    $results = wc_get_products($args);

    $total_pages = $results->max_num_pages;

    $product_content = '';
    
    // Check if 'template' key exists
    // Default template array
    $default_template = [
        "image",
        "category",
        "title",
        "price",
        "rating",
        "button"
    ];

    // Get the 'template' attribute from $attr or use the default template
    $template = isset($attr['template']) && is_array($attr['template']) ? $attr['template'] : $default_template;
    $animationCls   = !empty($attr['advAnimation']['className']) ? esc_attr($attr['advAnimation']['className']) : '';
    $product_content .= '<div class="th-product-block-product-item-wrap" total-page="'.esc_attr($total_pages).'">';

    foreach ($results->products as $product) {

        $product_content .= '
            <div class="th-product-item '.$animationCls.'" key="' . esc_attr($product->get_id()) . '">
                <div class="th-product-block-content-wrap">';

        foreach ($template as $element) {
            switch ($element) {
                case 'image':
                    // Image
                    $displayFeaturedImage = isset($attr['displayFeaturedImage']) ? $attr['displayFeaturedImage'] : true;
                    $imageStyle = isset($attr['imageStyle']) ? $attr['imageStyle'] : 'default';
                    if($displayFeaturedImage):

                    $product_content .= '<div class="th-product-image '.esc_attr($imageStyle).'">';

                    //post meta
                    $product_content .= '<div class="th-product-meta">';

                    $showWishlist = isset($attr['showWishlist']) ? $attr['showWishlist'] : false;
                    if($showWishlist):
                    //wishlist
                    if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
                    $product_content .= '<div class="th-icons th-wishlist-button">';
                    
                    $product_content .= '<div class="thunk-wishlist">
                        <span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist  product_id=' . esc_attr($product->get_id()) . ' icon="th-icon th-icon-heart1" label="" already_in_wishslist_text="" browse_wishlist_text="" product_added_text=""]' ).'</div></span>';
                    
                    $product_content .= '</div>';
                   }
                   endif;

                    //compare
                    $showCompare = isset($attr['showCompare']) ? $attr['showCompare'] : false;
                    if($showCompare):
                    if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
                    $product_content .= '<div class="th-icons th-compare-button">';
                    $product_content .= '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
                              <a class="th-product-compare-btn compare" data-th-product-id="' . esc_attr($product->get_id()) . '"><span class="th-icon th-icon-repeat"></span></a>
                              </div></span></div>';
                    $product_content .= '</div>';
                    } 
                    endif;
                    
                    $product_content .= '</div>';

                    // Sale
                    $sale = get_post_meta($product->get_id(), '_sale_price', true);

                    if ($sale && (array_key_exists('showSale', $attr) ? $attr['showSale'] : true)) {
                        $product_content .= '<div class="th-product-sale ' . (isset($attr['saleStyle']) ? esc_attr($attr['saleStyle']) : '') . ' ' . (isset($attr['saleDesign']) ? esc_attr($attr['saleDesign']) : '') . ' ' . (isset($attr['salePosition']) ? esc_attr($attr['salePosition']) : '') . '"> ';

                        if (isset($attr['saleDesign']) && $attr['saleDesign'] === 'saledigit' && $product->get_regular_price() && $product->get_sale_price()) {
                            $discountPercentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                            $product_content .= '<span class="discount-percentage">' . (float) $discountPercentage . __( '%', 'vayu-blocks' ) . '</span>';
                        } else {
                            $product_content .= '<span class="discount-percentage">' . (isset($attr['saleText']) ? esc_html($attr['saleText']) : __( 'sale', 'vayu-blocks' )) . '</span>';
                        }

                        $product_content .= '</div>';
                    }

                    $attachment_ids = $product->get_gallery_image_ids($product->get_id());
                    $product_content .= '<a href="' . esc_url($product->get_permalink()) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                            ' . get_the_post_thumbnail($product->get_id(), 'woocommerce_thumbnail');

                    if ($imageStyle == 'swapin' && $attachment_ids && count($attachment_ids)) {
                        $glr = wp_get_attachment_image($attachment_ids[0], 'shop_catalog', false, array('class' => 'th-swap'));
                        $product_content .= wp_kses_post($glr);
                    }

                    $product_content .= '</div>';

                    endif;
                    break;

                case 'category':
                    // Category
                    $displayCategory = isset($attr['displayCategory']) ? $attr['displayCategory'] : true;
                    if($displayCategory):
                    $product_content .= '<div class="th-product-cat">';
                    foreach ($product->get_category_ids() as $category_id) {
                        $category = get_term($category_id, 'product_cat');
                        $product_content .= ' <a href="' . esc_url(get_category_link($category_id)) . '">' . esc_html($category->name) . '</a>';
                    }
                    $product_content .= '</div>';
                    endif;
                    break;

                case 'title':
                    // Title
                    $displayTitle = isset($attr['displayTitle']) ? $attr['displayTitle'] : true;
                    if($displayTitle):
                    $product_content .= '<' . (isset($attr['prouctTitleTag']) ? esc_attr($attr['prouctTitleTag']) : 'h3') . ' class="th-product-title">
                        <a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_name()) . '</a>   
                    </' . (isset($attr['prouctTitleTag']) ? esc_html($attr['prouctTitleTag']) : 'h3') . '>';
                    endif;
                    break;

                case 'price':
                    // Price
                    $displayPrice = isset($attr['displayPrice']) ? $attr['displayPrice'] : true;
                    if($displayPrice):
                    $product_content .= '<div class="th-product-price">
                        ' . wp_kses_post($product->get_price_html()) . '
                    </div>';
                    endif;
                    break;

                case 'rating':
                    // Rating
                    $displayRating = isset($attr['displayRating']) ? $attr['displayRating'] : true;
                    $hideRating = isset($attr['hideRating']) ? $attr['hideRating'] : true;
                    if($displayRating && $hideRating):
                    $product_content .= '<div class="th-product-rating woocommerce">
                        ' . wc_get_rating_html($product->get_average_rating()) . '
                    </div>';
                    endif;
                    break;

                case 'button':
                    // Button
                    $displayButton = isset($attr['displayButton']) ? $attr['displayButton'] : true;
                    if($displayButton):
                    $product_content .= '<div class="th-product-add-btn">
                    ' . wp_kses_post($this->add_to_cart_url($product)) . '
                    </div>';
                    endif;
                    break;

                default:
                    break;
            }
        }

        $product_content .= '</div></div>';
    }

    $product_content .= '</div>';

    wp_send_json($product_content);

    exit;

  }

}