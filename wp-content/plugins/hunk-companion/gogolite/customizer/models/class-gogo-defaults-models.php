<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * This file stores all functions that return default content.
 *
 * @package hunk companion
 */
/**
 * Class Hunk_Companion_Defaults_Models
 *
 * @package hunk-companion
 */
class Hunk_Companion_Defaults_Models extends Hunk_Companion_Singleton {
/**
	 * Get default values for features section.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function get_slider_default() {
		$default = array(
			array('image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/slide1.jpg'),
			array('image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/slide2.jpg'),
			array('image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/slide3.jpg'),
			);
		return $default;
	}
/**
	 * Get default values for features section.

	 * @access public
	 */
	public function get_features_default() {
		return apply_filters(
			'gogo_features_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-diamond',
						'title'      => esc_html__( 'Development', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#ff214f',
					),
					array(
						'icon_value' => 'fa-heart',
						'title'      => esc_html__( 'Design', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#00bcd4',
					),
					array(
						'icon_value' => 'fa-globe',
						'title'      => esc_html__( 'Seo', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#4caf50',
					),
					array(
						'icon_value' => 'fa-check',
						'title'      => esc_html__( 'Marketing', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#dd9933',
					),
					array(
						'icon_value' => 'fa-certificate',
						'title'      => esc_html__( 'Consulting', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#dd3333',
					),
					array(
						'icon_value' => 'fa-map',
						'title'      => esc_html__( 'Analytics', 'hunk-companion' ),
						'text'       => esc_html__( 'Praesent rutrum diam nec arcu fringilla vehicula.',
							'hunk-companion' ),
						'link'       => '#',
						'color'      => '#98c174',
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
			'gogo_testimonials_default_content', json_encode(
				array(
					array(
						'image_url' =>HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/testimonial1.png',
						'title'     => esc_html__( 'Surbhi', 'hunk-companion' ),
						'subtitle'  => esc_html__( 'Business Owner', 'hunk-companion' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'hunk-companion' ),
						'id'        => 'customizer_repeater_56d7ea7f40d56',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/testimonial2.png',
						'title'     => esc_html__( 'Nataliya', 'hunk-companion' ),
						'subtitle'  => esc_html__( 'Artist', 'hunk-companion' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'hunk-companion' ),
						'id'        => 'customizer_repeater_56d7ea7f40d66',
					),
				)
			)
		);
	}
/**
	 * Get default values for Clients section.

	 * @access public
	 */
public function get_clients_default() {
		return apply_filters(
			'gogo_testimonials_default_content', json_encode(
				array(
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-1.png',
						'link'       => '#',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-2.png',
						'link'       => '#',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-3.png',
						'link'       => '#',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-4.png',
						'link'       => '#',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-5.png',
						'link'       => '#',
					),
					array(
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . '/gogolite/images/logo-6.png',
						'link'       => '#',
					),
				)
			)
		);
	}
public function get_team_default() {
		return apply_filters(
			'gogo_team_default_content', json_encode(
				array( 
					array(
						'title'     => esc_html__( 'Gabriel', 'hunk-companion' ),					
						'subtitle'  => esc_html__( 'Developer', 'hunk-companion' ),
						'text'      => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'hunk-companion' ),
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/team 1.jpg',
						'link'       => '#',
						'social_repeater' => json_encode(
							array(
									array(
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
									),
									array(
									
									'link' => 'plus.google.com',
									'icon' => 'fa-google-plus',
									),
									array(
									
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
									),
								array(
									
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							)
						),
					),

					array(
						'title'     => esc_html__( 'Maurics', 'hunk-companion' ),					
						'subtitle'  => esc_html__( 'Marketer', 'hunk-companion' ),
						'text'      => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'hunk-companion' ),
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/team 2.jpg',
						'link'       => '#',
						'social_repeater' => json_encode(
							array(
									array(
									
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
									),
									array(
									
									'link' => 'plus.google.com',
									'icon' => 'fa-google-plus',
									),
									array(
									
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
									),
								array(
									
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							)
						),
					),

					array(
						'title'     => esc_html__( 'Ramedrin', 'hunk-companion' ),					
						'subtitle'  => esc_html__( 'Designer', 'hunk-companion' ),
						'text'      => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'hunk-companion' ),
						'image_url' => HUNK_COMPANION_PLUGIN_DIR_URL . 'gogolite/images/team 3.jpeg',
						'link'       => '#',
						'social_repeater' => json_encode(
							array(
									array(
									
									'link' => 'facebook.com',
									'icon' => 'fa-facebook',
									),
									array(
									
									'link' => 'plus.google.com',
									'icon' => 'fa-google-plus',
									),
									array(
									
									'link' => 'twitter.com',
									'icon' => 'fa-twitter',
									),
								array(
									
									'link' => 'linkedin.com',
									'icon' => 'fa-linkedin',
								),
							)
						),
					),	

				)///	
			)	
		);
	}

}