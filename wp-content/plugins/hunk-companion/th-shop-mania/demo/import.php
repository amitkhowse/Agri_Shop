<?php 
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

function th_shop_mania_import_files(){
  $file_url = 'https://themehunk.com/wp-content/uploads/sites-demo/th-shop-mania/';
  return apply_filters(
    'th_shop_mania_demo_site', array(
    array(
        'import_file_name' => esc_html__('Fashion Store','th-shop-mania'),
        'import_file_url'=> esc_url($file_url.'fashion-store/blog.xml'),
        'import_customizer_file_url'=> esc_url($file_url.'fashion-store/customizer.dat'),
        'import_widget_file_url'=> '',
        'import_preview_image_url'=> esc_url($file_url.'fashion-store/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/fashion-store/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'th-shop-mania' ),
       ),
    array(
        'import_file_name' => esc_html__('Fashion Shop','th-shop-mania'),
        'import_file_url'=> esc_url($file_url.'fashion-shop/blog.xml'),
        'import_customizer_file_url'=> esc_url($file_url.'fashion-shop/customizer.dat'),
        'import_widget_file_url'=> '',
        'import_preview_image_url'=> esc_url($file_url.'fashion-shop/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/fashion-shop/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'th-shop-mania' ),
       ),
    array(
        'import_file_name' => esc_html__('Electro','th-shop-mania'),
        'import_file_url'=> esc_url($file_url.'mania-electro/blog.xml'),
        'import_customizer_file_url'=> esc_url($file_url.'mania-electro/customizer.dat'),
        'import_widget_file_url'=> '',
        'import_preview_image_url'=> esc_url($file_url.'mania-electro/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/electro-mania/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'th-shop-mania' ),
       ),
    array(
        'import_file_name' => esc_html__('Grocery','th-shop-mania'),
        'import_file_url'=> esc_url($file_url.'mania-grocery/blog.xml'),
        'import_customizer_file_url'=> esc_url($file_url.'mania-grocery/customizer.dat'),
        'import_widget_file_url'=> '',
        'import_preview_image_url'=> esc_url($file_url.'mania-grocery/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/mania-grocery/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'th-shop-mania' ),
       )
   
     )
  );
}
add_filter( 'pt-ocdi/import_files', 'th_shop_mania_import_files');

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function th_shop_mania_after_import(){

  // Assign front page and posts page (blog page).
  $front_page_id = null;
  $blog_page_id  = null;

  $front_page = get_page_by_title( 'home' );

  if ( $front_page ) {
    if ( is_array( $front_page ) ){
      $first_page = array_shift( $front_page );
      $front_page_id = $first_page->ID;
    } else {
      $front_page_id = $front_page->ID;
    }
  }

  $blog_page = get_page_by_title( 'blog' );

  if ( $blog_page ) {
    if ( is_array( $blog_page ) ) {
      $first_page = array_shift( $blog_page );
      $blog_page_id = $first_page->ID;
    } else {
      $blog_page_id = $blog_page->ID;
    }
  }

  if ( $front_page_id ) {
    update_option( 'page_on_front', $front_page_id );
    update_option( 'show_on_front', 'page' );

  }
  if ($blog_page_id) {
    update_option( 'page_for_posts', $blog_page_id );
  }

  // Assign navigation menu locations.
  $menu_location_details = array(
    'th-shop-mania-above-menu'    => 'frontpage',
    'th-shop-mania-main-menu'     => 'frontpage',
    'th-shop-mania-footer-menu'   => 'footer',
    );

  if ( ! empty( $menu_location_details ) ){
    $navigation_settings = array();
    $current_navigation_menus = wp_get_nav_menus();
    if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
      foreach ( $current_navigation_menus as $menu ) {
        foreach ( $menu_location_details as $location => $menu_slug ) {
          if ( $menu->slug === $menu_slug ) {
            $navigation_settings[ $location ] = $menu->term_id;
          }
        }
      }
    }
    set_theme_mod( 'nav_menu_locations', $navigation_settings );
  }
}

add_action( 'pt-ocdi/after_import', 'th_shop_mania_after_import' );