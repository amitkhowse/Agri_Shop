<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
// if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class portfolioline_portfolio_post_type{
private static $instance;

  private function __construct(){
   // Hooking up our function to theme setup
   add_action( 'init', array($this,'create_posttype') );

   /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
  add_action( 'init', array($this,'custom_post_type'), 0 );
  add_action( 'init', array($this,'custom_taxonomies'), 0 );
  }
public static function get_instance(){
        {
            if (! self::$instance)
                self::$instance = new portfolioline_portfolio_post_type();
            return self::$instance;
        }
}
// Our custom post type function
function create_posttype(){
    register_post_type( 'portfolio',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Portfolio', 'portfolioline' ),
                'singular_name' => __( 'Portfolio', 'portfolioline' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'portfolioline'),
        )
    );
}
/*
* Creating a function to create our CPT
*/
function custom_post_type(){
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Portfolio Gallery', 'Post Type General Name', 'portfolioline' ),
        'singular_name'       => _x( 'Portfolio Gallery', 'Post Type Singular Name', 'portfolioline' ),
        'menu_name'           => __( 'Portfolio', 'portfolioline' ),
        'parent_item_colon'   => __( 'Parent Portfolio', 'portfolioline' ),
        'all_items'           => __( 'All Portfolios', 'portfolioline' ),
        'view_item'           => __( 'View Portfolio', 'portfolioline' ),
        'add_new_item'        => __( 'Add New Portfolio', 'portfolioline' ),
        'add_new'             => __( 'Add New', 'portfolioline' ),
        'edit_item'           => __( 'Edit Portfolio', 'portfolioline' ),
        'update_item'         => __( 'Update Portfolio', 'portfolioline' ),
        'search_items'        => __( 'Search Portfolio', 'portfolioline' ),
        'not_found'           => __( 'Not Found', 'portfolioline' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'portfolioline' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'portfolio', 'portfolioline' ),
        'description'         => __( 'Portfolio and reviews', 'portfolioline' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'portfolio-cate' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'portfolio', $args );
 
}

function custom_taxonomies(){
  $labels = array(
    'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'portfolioline' ),
    'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'portfolioline' ),
    'search_items'      => __( 'Search Portfolio Categories', 'portfolioline' ),
    'all_items'         => __( 'All Portfolio Categories', 'portfolioline' ),
    'parent_item'       => __( 'Parent Portfolio Category', 'portfolioline' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:', 'portfolioline' ),
    'edit_item'         => __( 'Edit Portfolio Category', 'portfolioline' ), 
    'update_item'       => __( 'Update Portfolio Category', 'portfolioline' ),
    'add_new_item'      => __( 'Add New Portfolio Category', 'portfolioline' ),
    'new_item_name'     => __( 'New Portfolio Category', 'portfolioline' ),
    'menu_name'         => __( 'Portfolio Categories', 'portfolioline' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'portfolio-cate', 'portfolio', $args );
 }
}
portfolioline_portfolio_post_type::get_instance();