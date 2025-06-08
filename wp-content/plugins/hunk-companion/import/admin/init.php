<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
	
// Exit if accessed directly.
if ( ! class_exists( 'HUNK_COMPANION_SITES_BUILDER_MENU' ) ) {

    /**
	 * hunk-companion sites Admin Menu Settings
	 */
    class HUNK_COMPANION_SITES_BUILDER_MENU {

        static public $plugin_slug = 'themehunk-site-library';

        function __construct()
        {

            if ( ! is_admin() ) {
				return;
			}
            add_action( 'init', __CLASS__ . '::permalink_update');
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ),8 );

            add_action( 'init', __CLASS__ . '::init_admin_settings', 99 );
            add_action('admin_head', array( $this,'admin_icon_style'));


        }

        function admin_icon_style() {
        $style =  '<style>#adminmenu .toplevel_page_ai-site-builder .wp-menu-image img { padding: 2px 0 0;}</style>';
        $arr = array( 'style' => array());
        echo wp_kses( $style, $arr );
        
        }


        static public function permalink_update(){

            if ( get_option('permalink_structure') ) return;
                            // The new permalink structure you want to set
                $new_permalink_structure = '/%postname%/';

                // Update the permalink structure option
                update_option('permalink_structure', $new_permalink_structure);

                // Flush rewrite rules to apply the changes
                flush_rewrite_rules();
        }


        /**
		 * Admin settings init
		 */
		static public function init_admin_settings() {

            if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], self::$plugin_slug ) !== false ) {
				self::save_settings();
			}

            add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 100 );
        }


        	/**
		 * Save All admin settings here
		 */
		static public function save_settings() {

			// Only admins can save settings.
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
		}


        
        /**
		 * Admin class add
		 *
		 * @since 1.0.0
		 */
        

        static public function admin_classes( $classes ) {
            global $pagenow;
            //themes.php
            if ( in_array( $pagenow, array( 'themes.php' ), true ) ) {

                if(is_admin() && isset($_GET['template']) && 'step'=== sanitize_text_field( $_GET['template']) )
                
                $classes .= ' ai-site-builder';
            }

            return $classes;
        }


        /**
		 * Admin Menu - theme panel
		 *
		 * @since 1.0.0
		 */
        

        static public function add_admin_menu() {
            add_action( 'admin_body_class', __CLASS__ . '::admin_classes');    
            $parent_page    = 'themes.php';
			$page_title     = __('TH Import Sites','themehunk-site-library');
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::sites_callback';
			add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );
        }


        static public function sites_callback() {
            ?>
            <div class="themehunk-sites-menu-page-wrapper">
                <div id="root"></div>
            </div>
            <?php
        }

         public function upgrade_to_pro() {

            // print_r(wp_get_theme(get_option('stylesheet')));
                    $theme = wp_get_theme(get_option('stylesheet')); // Get the current theme
                    if ($theme->parent()) {
                        $parent_theme = $theme->parent(); // Get the parent theme object
                        $slug = $parent_theme->get('TextDomain'); // Get the parent theme's text domain
                    } else {
                        $slug = $theme->get('TextDomain');
                    }

            $upgrade = array('top-store'=> array(
                                    "pro"=>'/product/top-store-pro',
                                    "slug"=>'top-store',
                                    "version"=>''
                        ),
                        'th-shop-mania'=> array(
                            "pro"=>'/th-shop-mania',
                            "slug"=>'th-shop-mania',
                            "version"=>''
                        ),
                        'open-shop'=> array(
                            "pro"=>'/product/open-shop-pro',
                            "slug"=>'open-shop',
                            "version"=>''
                        ),
                        'gogo'=> array(
                            "pro"=>'/product/gogo-amazing-wordpress-theme',
                            "slug"=>'gogo',
                            "version"=>''
                        ),
                        'almaira-shop'=> array(
                            "pro"=>'/product/almaira-pro-multipurpose-responsive-ecommerce-theme',
                            "slug"=>'almaira-shop',
                            "version"=>''
                        ),
                        'open-mart'=> array(
                            "pro"=>'/product/open-mart',
                            "slug"=>'open-mart',
                            "version"=>''
                        ),
                        'portfoliolite'=> array(
                            "pro"=>'/product/portfolioline-multipurpose-showcase-theme',
                            "slug"=>'portfoliolite',
                            "version"=>''
                        ),


            );

            return $upgrade[$slug];
        
        }


        public function admin_enqueue( $hook = '' ) {
// && 'toplevel_page_'.self::$plugin_slug !== $hook 

            if ( 'appearance_page_'.self::$plugin_slug!== $hook) {
				return;
			}

            if(isset($_GET['template']) && sanitize_text_field( $_GET['template'] )){

                $dirty_html = '<style> html.wp-toolbar {padding-top: 0 !important; }</style>';

                // Define allowed attributes and tags for inline styles
                $allowed_attributes = array(
                    'style' => array(
                        // Define allowed CSS properties and values
                        'padding' => true,
                        // Add more allowed CSS properties as needed
                    ),
                );

            // Sanitize the HTML with allowed attributes and tags
            $clean_html = wp_kses($dirty_html, $allowed_attributes);

            // Output the sanitized HTML
            echo $clean_html;

            }

			wp_enqueue_style( 'hunk-companion-admin', HUNK_COMPANION_WEBSITE_URL . 'admin/assets/css/admin.css', 1.0, 'true' );
            wp_enqueue_script( 'hunk-companion-block-admin', HUNK_COMPANION_WEBSITE_URL . 'app/build/index.js', array( 'wp-element','wp-components', 'wp-i18n','wp-api-fetch','wp-url' ), '1.0', true );
           //$theme = wp_get_theme();

           $site = self::upgrade_to_pro();
            wp_localize_script( 'hunk-companion-block-admin', 'HCLOCAL',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'baseurl' => site_url( '/' ),
                'pluginpath'=>HUNK_COMPANION_WEBSITE_URL,
                'rootPath' => HUNK_COMPANION_PLUGIN_DIR_URL,
                'themeName' => $site['slug'],
                'security' => wp_create_nonce( 'hc_import_nonce' ),
                'upgrade'=> esc_url('https://themehunk.com'.$site['pro'])           
                 )
        );

        }

    }

    new HUNK_COMPANION_SITES_BUILDER_MENU;
}
