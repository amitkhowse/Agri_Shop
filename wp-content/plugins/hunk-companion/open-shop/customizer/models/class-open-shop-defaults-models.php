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
class Open_Shop_Defaults_Models extends Open_Shop_Singleton{
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
			'open_shop_highlight_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'open-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'open-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'open-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'open-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'open-shop' ),
						
					),
				)
			)
		);
	}

	public function get_top_slider_default() {
		return apply_filters(
			'open_shop_top_slider_default_content', json_encode(
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