<?php defined( 'ABSPATH' ) or exit;

// Exit if accessed directly.
if ( ! class_exists( 'THEMEHUNK_CUSTOMIZER_SITES_ADMIN_LOAD' ) ) {


    class THEMEHUNK_CUSTOMIZER_SITES_ADMIN_LOAD {

		private static $_instance = null;
			/**
		 * Set Instance
		 *
		 * @since 1.1.0
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

        private function __construct() {

			self::includes();
		}


    private function includes() {
		require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/importer/import-log.php';
		require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/importer/import-options.php';
		require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/importer/import-widgets.php';
		require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/class-helper.php';
		require_once THEMEHUNK_CUSTOMIZER_DIR_WEBSITE . 'core/class-import-site.php';
		}

    }

	THEMEHUNK_CUSTOMIZER_SITES_ADMIN_LOAD::get_instance();

}



