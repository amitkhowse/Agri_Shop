<?php defined( 'ABSPATH' ) or exit;
// Exit if accessed directly.
if ( ! class_exists( 'HUNK_COMPANION_SITES_BUILDER_SETUP' ) ) {

    // Check if needed functions exists - if not, require them
if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


    class HUNK_COMPANION_SITES_BUILDER_SETUP {

        function __construct($params)
        {

         //   wp_send_json_success( $params );

         self::init_admin_settings($params);
           
        }
        static public function getFileUrl() {
                // If the function it's not available, require it.
                if ( ! function_exists( 'download_url' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/file.php';
                }
        }

           /**
		 * Admin settings init
		 */
		static public function init_admin_settings($params) {

            $installplugin = $params['plugin'];

            $allplugins         = $params['allPlugins'][0];     //  all plugin slug
            $theme_slug         = $params['themeSlug'];         //  plugin slug
            $proThemePlugin     = $params['proThemePlugin'];    //  free or pro theme plugin name
            $templateType       = $params['templateType'];      //  template type free or pro
            $tmplFreePro        = $params['tmplFreePro'];       // pro template type theme or plugin
            $wpDownloadUrl      = $params['wpUrl'];
            $localPlugin = $localTheme = true;
           if($templateType==='free'){
           // $installplugin[$proThemePlugin]= esc_html('Themehunk Plugins');

           }elseif($templateType==='paid' && $tmplFreePro==='theme'){
                $theme_slug = $proThemePlugin;
               $localTheme= false;

           }elseif($templateType==='paid' && $tmplFreePro==='plugin'){

            $installplugin[$proThemePlugin]= esc_html('Premium Plugins');
              $localPlugin= false;
           }


          // self::theme_install($theme_slug,$localTheme,$wpDownloadUrl);
           self::plugin_install($installplugin,$allplugins,$localPlugin);

        }


        static public function plugin_install($plugin,$allplugins,$localPlugin){

            foreach($plugin as $slug => $value){

                $init = $allplugins[$slug];

            
                if(self::is_plugin_installed_check($init)){

                        if(self::is_plugin_active_check($init)){
                        }else{
                            // plugin activation code
                            activate_plugin( $init );
                        }

                }else{
                    //plugin install and acitvation code
                    self::init_plugin($slug,$init,$localPlugin);

                }
                
            }

        }

        static public function theme_install($theme_slug,$localTheme,$wpDownloadUrl){

            if(get_option( 'template' )===$theme_slug) return 1;
            $installed_themes = wp_get_themes();
            $theme_exist =  isset($installed_themes[$theme_slug]);
            
             if ($theme_exist) {
                  //Activate the theme
                     switch_theme($theme_slug);
                  // Update the theme name
                 // $theme = wp_get_theme($theme_slug);
                return 2;

                } else {
                self::init_theme($theme_slug,$localTheme);

               return 3;
            }

        }


        /** Plugin Install check */

        static public function is_plugin_installed_check($plugin_slug){
            $installed_plugins = get_plugins();
            return array_key_exists( $plugin_slug, $installed_plugins ) || in_array( $plugin_slug, $installed_plugins, true );

        }

           /** Plugin active check */

           static public function is_plugin_active_check($plugin_slug){
           
            if ( is_plugin_active( $plugin_slug ) ) {
                return true;
            }

            return false;

        }


        static public function run_activate_plugin( $plugin ) {
            $plugin = trim( $plugin );
            $current = get_option( 'active_plugins' );
            $plugin = plugin_basename( $plugin );
        
            if ( !in_array( $plugin, $current ) ) {
                $current[] = $plugin;
                sort( $current );
                do_action( 'activate_plugin', $plugin );
                update_option( 'active_plugins', $current );
                do_action( 'activate_' . $plugin );
                do_action( 'activated_plugin', $plugin );
            }
        
            return null;
        }

    


        /**
		 * Theme init
		 */
		static public function init_theme($theme_slug,$localTheme,$wpDownloadUrl) {
                
                self::getFileUrl();
                
             
                WP_Filesystem();

                $downloadUrl = $wpDownloadUrl.'/theme/'.$theme_slug.'.zip';

                $temp_file = download_url($downloadUrl); 


                $theme_dir = get_theme_root() . '/';

                if (is_wp_error($temp_file)) {
                // Handle error
                } else {
                // Unzip the downloaded file
                $unzip_result = unzip_file($temp_file, $theme_dir);

                if (is_wp_error($unzip_result)) {
                    // Handle error
                } else {

                    //Activate the theme
                    switch_theme($theme_slug);

                    // Update the theme name
                  //  $theme = wp_get_theme($theme_slug);

                    // Cleanup the temporary file
                    @unlink($temp_file);

                    return true;
                    // Theme installed and activated successfully
                }
                }
 
        }

           /**
		 * Theme init
		 */
		static public function init_plugin($slug,$init,$localPlugin) {

            
            self::getFileUrl();
            
            WP_Filesystem();

            
            $temp_file = download_url('https://downloads.wordpress.org/plugin/'.$slug.'.zip'); 

            $plugin_dir = WP_PLUGIN_DIR . '/';


            if (is_wp_error($temp_file)) {
                // Handle error
            } else {
                // Unzip the downloaded file
                $unzip_result = unzip_file($temp_file, $plugin_dir);

                if (is_wp_error($unzip_result)) {
                    // Handle error
                } else {
                    // Cleanup the temporary file
                    @unlink($temp_file);

                    self::run_activate_plugin($init);
                    return true;
                    // Theme installed and activated successfully
                }
            }

 
        }


    }


}