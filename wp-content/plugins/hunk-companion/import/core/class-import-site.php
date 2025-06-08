<?php defined( 'ABSPATH' ) or exit;
 // Exit if accessed directly.
 

if ( ! class_exists( 'HUNK_COMPANION_SITES_IMPORT' ) ) {


    class HUNK_COMPANION_SITES_IMPORT {


		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self();
			}
	
			return self::$_instance;
		}

    
        function __construct()
        {


           
        }

        /**
		 * Import settings init
		 */
		 public function get_import_data($url) {
            $demo_api_uri = $url;

			$api_args = apply_filters(
				'themhunk_sites_api_args', array(
					'timeout' => 15,
				)
			);

				// Use this for premium demos.
				$request_params = apply_filters(
					'themehunk_sites_api_params', array(
						'site_key' => '',
						'site_url'     => '',
					)
				);

				$demo_api_uri = add_query_arg( $request_params,$demo_api_uri);

			// API Call.
			$response = wp_remote_get($demo_api_uri);


			if ( is_wp_error( $response ) || ( isset( $response->customizer ) && 0 == $response->customizer ) ) {
				if ( isset( $response->customizer ) ) {
					$data = json_decode( wp_remote_retrieve_body( $response ), true );
				
				} else {
					return new WP_Error( 'api_invalid_response_code', $response->get_error_message() );
				}
			} else {
				$data = json_decode( wp_remote_retrieve_body( $response ), true );
			}
			$remote_args = array();


			if ( ! isset( $data['data'] ) ) {
				$remote_args['id']                  = $data['id'];
				$remote_args['widgets']    	= isset($data['themehunk-widget'])? json_decode( $data['themehunk-widget'] ):json_decode( $data['zita-widget'] );
				$remote_args['customizer'] 	= isset($data['themehunk-customizer'])?$data['themehunk-customizer']:$data['zita-customizer'];
				$remote_args['xml']        	= isset($data['themehunk-xml'])?$data['themehunk-xml']:$data['zita-xml']; 
				$remote_args['option']        = isset($data['themehunk-option'])?$data['themehunk-option']:$data['zita-option'];
			}
			
			$remote_data = wp_parse_args( $remote_args);

			wp_send_json_success( $remote_data);

        }

        
/**
 * Import xml Settings.
 *
 */
		static public function import_xml_data($xml_path) {
			$xml_url = urldecode( $xml_path );

			if ( isset( $xml_url ) ) {
			//	Themehunk_Importer_Log::add( 'Importing from XML ' . $xml_url );

				// Download XML file.
				$xml_path = HUNK_COMPANION_SITES_HELPER::download_file( $xml_url );
				if ( $xml_path['success'] ) {

					if ( isset( $xml_path['data']['file'] ) ) {
						$data        = HUNK_COMPAION_WXR_IMPORTER::instance()->get_xml_data( $xml_path['data']['file'] );
						$data['xml'] = $xml_path['data'];
						$data['update'] = __( 'xml file download completed.', 'hunk-companion' ) ;
						wp_send_json_success( $data );
					} else {
						wp_send_json_error( __( 'There was an error downloading the XML file.', 'hunk-companion' ) );
					}
				} else {
					wp_send_json_error( $xml_path['data'] );
				}
			} else {
				wp_send_json_error( __( 'Invalid site XML file!', 'hunk-companion' ) );
			}
		}

		/**
		 * Import Customizer Settings.
		 *
		 */
		static public function import_customizer($customizer_data) {
			$customizer_data =  (array)$customizer_data;


			if ( isset( $customizer_data ) ) {
				//Themehunk_Importer_Log::add( 'Imported Customizer Settings ' . json_encode( $customizer_data ) );

				$return = HUNK_COMPANION_SITES_HELPER::import( $customizer_data );
				wp_send_json_success( array('success'=>$return) );

			} else {
				wp_send_json_error( __( 'Customizer data is empty!', 'hunk-companion' ) );
			}

		}

		static public function import_options($options_data){
			// $options_data =  (array) json_decode( stripcslashes( $options_data ), 1 );

			$options_data =  (array)$options_data;
			 if ( isset( $options_data ) ) {
			 //	Themehunk_Importer_Log::add( 'Imported - Site Options ' . json_encode( $options_data ) );
				$options_importer = HUNK_COMPAION_OPTIONS_IMPORT::instance();
				$options_importer->import_options_data( $options_data );
				wp_send_json_success( __( 'Site options data is update successfully.', 'hunk-companion' ) );
			 } else {
			 	wp_send_json_error( __( 'Site options are empty!', 'hunk-companion' ) );
			 }


		}

		/**
		 * Import Widgets.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		static public function import_widgets($widgets_data) {

			$widgets_data =  (object)$widgets_data;

			if ( isset( $widgets_data ) ) {
				$widgets_importer = HUNK_COMPAION_WIDGET_IMPORTER::instance();

				$status  = $widgets_importer->import_widgets_data( $widgets_data );

				wp_send_json_success( __( 'Widget data is update successfully.', 'hunk-companion' ) );
			} else {
				wp_send_json_error( __( 'Widget data is empty!', 'hunk-companion' ) );
			}

		}



    }
}