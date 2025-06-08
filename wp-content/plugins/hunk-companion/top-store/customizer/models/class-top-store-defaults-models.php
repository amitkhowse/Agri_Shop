<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * This file stores all functions that return default content.
 *
 * @package  Open Shop
 */
/**
 * Class Open_Shop_Defaults_Models
 *
 * @package  Open Shop
 */
class Top_Store_Defaults_Models extends Top_Store_Singleton{
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
			'top_store_brand_default_content', json_encode(
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
					)
				)
			)
		);
	}


/**
	 * Get default values for features section.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	/**
	 * Get default values for features section.

	 * @access public
	 */
	public function get_feature_default() {
		return apply_filters(
			'top_store_highlight_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'top-store' ),
						'subtitle'   => esc_html__( 'On all order over ', 'top-store' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'top-store' ),
						'subtitle'   => esc_html__( 'On all order over ', 'top-store' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'top-store' ),
						'subtitle'   => esc_html__( 'On all order over ', 'top-store' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'top-store' ),
						'subtitle'   => esc_html__( 'On all order over ', 'top-store' ),
						
					),
				)
			)
		);
	}

	public function get_top_slider_default() {
		return apply_filters(
			'top_store_top_slider_default_content', json_encode(
				array(
					array(
						
					),
					array(
						
					),

				)
			)
		);
	}	
}