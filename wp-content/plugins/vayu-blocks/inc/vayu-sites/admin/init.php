<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
	
// Exit if accessed directly.
if ( ! class_exists( 'VAYU_BLOCK_SITES_BUILDER_MENU' ) ) {

    /**
	 * vayu block sites Admin Menu Settings
	 */
    class VAYU_BLOCK_SITES_BUILDER_MENU {

        static public $plugin_slug = 'vayu-blocks';

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
            if ( in_array( $pagenow, array( 'admin.php' ), true ) ) {

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
        }


        // Add this code to your theme's functions.php or a custom plugin
            function get_plugin_activation_link( $plugin_file ) {
                // Ensure the current user can activate plugins
                if ( ! current_user_can( 'activate_plugins' ) ) {
                    return '';
                }

                // Generate the nonce
                $nonce = wp_create_nonce( 'activate-plugin_' . $plugin_file );

                // Construct the activation URL
                $activation_url = admin_url( 'plugins.php?action=activate&plugin=' . $plugin_file . '&_wpnonce=' . $nonce );

                return $activation_url;
            }


        public function admin_enqueue( $hook = '' ) {
            // && 'toplevel_page_'.self::$plugin_slug !== $hook 
            if ( self::$plugin_slug.'_page_vayu-sites'!== $hook && 'post.php'!==$hook && 'post-new.php'!==$hook && 'toplevel_page_vayu-blocks' !==$hook) {
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

			wp_enqueue_style( 'vayu-blocks-sites-admin', VAYU_BLOCKS_SITES_URL . 'admin/assets/css/admin.css', 1.0, 'true' );
            wp_enqueue_script( 'vayu-blocks-sites-block-admin', VAYU_BLOCKS_URL . '/public/build/vayu-sites.js', array( 'wp-element','wp-components', 'wp-i18n','wp-api-fetch','wp-url' ), '1.0', true );
           
            wp_localize_script( 'vayu-blocks-sites-block-admin', 'VAYUB',
            array( 
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'vsecurity' =>wp_create_nonce( 'vayu_nonce' ),
                'baseurl' => site_url( '/' ),
                'pluginpath'=>VAYU_BLOCKS_SITES_URL,
                'rootPath' => VAYU_BLOCKS_URL,
                'upgrade'=> esc_url('https://themehunk.com/vayu-blocks'),
                'activate' => $this->get_plugin_activation_link( 'vayu-blocks-pro/vayu-blocks-pro.php' )          
                 )
        );

        }

    }

    new VAYU_BLOCK_SITES_BUILDER_MENU;
}
