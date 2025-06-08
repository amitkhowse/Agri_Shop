<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
	
// Exit if accessed directly.
if ( ! class_exists( 'HUNK_COMPANION_SITES_BUILDER_CORE' ) ) {

    /**
	 * AI SITE builder CORE Menu Settings
	 */
    class HUNK_COMPANION_SITES_BUILDER_CORE {

        public function core_data($data){
                        $url = '';
                    if(isset($data->builder) && $data->builder ==='elementor'){
                       $url = $this->home_page_edit_url('elementor');

                    } elseif(isset($data->builder) && $data->builder ==='customizer'){
                        $url = get_admin_url().'customize.php?url='.home_url();
                    }else{
                        $url = $this->home_page_edit_url('edit');

                    }

                    wp_send_json_success($url);
        }


        public function home_page_edit_url($type){
            $front_page_id = get_option('page_on_front');

            if ($front_page_id) {
           return  get_admin_url($front_page_id).'post.php?post='.$front_page_id.'&action='.$type;
            } else {
               
                return home_url();
            }
        }
        

    }

}