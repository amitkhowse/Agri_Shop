<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * This file stores all functions that return default content.
 *
 * @package  Open Mart
 */
/**
 * Class open_mart_Defaults_Models
 *
 * @package  Open Mart
 */
class open_mart_Defaults_Models extends open_mart_Singleton{
/**
	 * Get default values for features section.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	/**
	 * Get default values for Brands section.

	 * @access public
	 */
public function get_brand_default() {
		return apply_filters(
			'open_mart_brand_default_content', json_encode(
				array(
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
				)
			)
		);
	}


	/**
	 * Get default values for features section.

	 * @access public
	 */
	public function get_feature_default() {
		return apply_filters(
			'open_mart_highlight_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Best Offers', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Risk Free', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Stock In ', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Best Offers', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Best Offers', 'open-mart' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-mart' ),
						
					),
				)
			)
		);
	}	


	public function get_faq_default() {
		return apply_filters(
			'openmart_faq_default_content', json_encode(
				array( 
					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),
					
					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

					array(
						'title'     => esc_html__( 'What do you want to know', 'open-mart' ),
						
						'text'      => esc_html__( 'Nulla et sodales nisl. Nam auctor quis odio eu congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'open-mart' ),
					),

				)
			)
		);	
	}

	/**
	 * Get default values for features section.

	 * @access public
	 */
	public function get_service_default() {
		return apply_filters(
			'open_mart_service_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-diamond',
						'title'      => esc_html__( 'Development', 'open-mart' ),
						'text'       => esc_html__( 'Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget',
							'open-mart' ),
						'link'       => '#',
						'color'      => '#ff214f',
					),
					array(
						'icon_value' => 'fa-heart',
						'title'      => esc_html__( 'Design', 'open-mart' ),
						'text'       => esc_html__( 'Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget',
							'open-mart' ),
						'link'       => '#',
						'color'      => '#00bcd4',
					),
					array(
						'icon_value' => 'fa-globe',
						'title'      => esc_html__( 'Seo', 'open-mart' ),
						'text'       => esc_html__( 'Nam varius mauris eget sodales tempus. Quisque sollicitudin consectetur accumsan. Ut imperdiet mi velit, ut congue justo sagittis eget',
							'open-mart' ),
						'link'       => '#',
						'color'      => '#4caf50',
					),
				)
			)
		);
	}	

	/**
	 * Get default values for Testimonials section.

	 * @access public
	 */
public function get_testimonials_default() {
		return apply_filters(
			'open_mart_testimonials_default_content', json_encode(
				array(
					array(
						'image_url' =>	'',
						'subtitle'  => esc_html__( 'Business Owner', 'open-mart' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'open-mart' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d56',
					),
					array(
						'image_url' =>	'',
						'title'     => esc_html__( 'Nataliya', 'open-mart' ),
						'subtitle'  => esc_html__( 'Artist', 'open-mart' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'open-mart' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d66',
					),

					array(
						'image_url' =>	'',
						'title'     => esc_html__( 'Ramedrin', 'open-mart' ),
						'subtitle'  => esc_html__( 'Business Owner', 'open-mart' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'open-mart' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d56',
					),
				)
			)
		);
	}

	/**
	 * Get default values for Counter section.

	 * @access public
	 */
public function get_counter_default() {
		return apply_filters(
			'open_mart_counter_default_content', json_encode(
				array(
					array(
						
						'title'       => 'Tea Consumed',
						'number' => esc_html__( '1008', 'open-mart' ),
					),
					array(
						'title'       => 'Projects Completed',
						'number' => esc_html__( '1008', 'open-mart' ),
					),
					array(
						'title'       => 'Hours Spent',
						'number' => esc_html__( '1008', 'open-mart' ),
					),
					array(
						'title'       => 'Awards Recieved',
						'number' => esc_html__( '1008', 'open-mart' ),
					),
				)
			)
		);
	}	
}