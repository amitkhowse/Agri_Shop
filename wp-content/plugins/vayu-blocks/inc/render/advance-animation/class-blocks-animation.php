<?php
/**
 * Class for Animation logic.
 *
 * @package Vayu
 */

namespace Vayu\GutenbergBlocks;
/**
 * Class Vayu_Blocks_Animation
 */
class Vayu_Blocks_Animation {

	/**
	 * The main instance var.
	 *
	 * @var Vayu_Blocks_Animation|null
	 */
	public static $instance = null;

	/**
	 * Flag to mark that the scripts which have loaded.
	 *
	 * @var array
	 */
	public static $scripts_loaded = array(
		'animation' => false,
		'count'     => false,
		'typing'    => false,
	);

	/**
	 * Allow to load in frontend.
	 *
	 * @var bool
	 */
	public static $can_load_frontend = true;

	/**
	 * Initialize the class
	 */
	public function init() {
		if ( ! defined( 'VAYU_BLOCKS_ANIMATION_URL' ) ) {
			define( 'VAYU_BLOCKS_ANIMATION_URL', VAYU_BLOCKS_URL );
			define( 'VAYU_BLOCKS_ANIMATION_PATH', VAYU_BLOCKS_PATH );
		}

		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_frontend_assets' ) );
		add_filter( 'render_block', array( $this, 'frontend_load' ), 800, 2 );
	}

	/**
	 * Load Gutenberg editor assets.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function enqueue_editor_assets() {
		$asset_file = include VAYU_BLOCKS_ANIMATION_PATH . '/public/build/animation-index.asset.php';

		wp_enqueue_style(
			'vayu-block-animation',
			VAYU_BLOCKS_ANIMATION_URL . 'public/build/animation-index.css',
			array(),
			$asset_file['version']
		);

		// if ( defined( 'TH_BLOCKS_VERSION' ) ) {
		// 	array_push( $asset_file['dependencies'], 'vayu-blocks' );
		// }

		wp_enqueue_script(
			'vayu-block-animation',
			VAYU_BLOCKS_ANIMATION_URL . 'public/build/animation-index.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		wp_localize_script(
			'vayu-block-animation',
			'blocksAnimation',
			array(
				'hasVaYuBlock' => defined( 'NONVAYU_BLOCKS_VERSION' ),
			)
		);

		wp_set_script_translations( 'vayu-block-animation', 'blocks-animation' );

		$asset_file = include VAYU_BLOCKS_ANIMATION_PATH . '/public/build/anim-count.asset.php';
		wp_enqueue_script(
			'vayu-block-count',
			VAYU_BLOCKS_ANIMATION_URL . 'public/build/anim-count.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		wp_script_add_data( 'vayu-block-count', 'defer', true );

		wp_enqueue_script(
			'vayu-block-typing',
			VAYU_BLOCKS_ANIMATION_URL . 'public/build/anim-typing.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		wp_script_add_data( 'vayu-block-typing', 'defer', true );
	}

	/**
	 * Load Gutenberg assets.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function enqueue_block_frontend_assets() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			self::$can_load_frontend = false;
		}

		global $post;

		if ( is_singular() && strpos( get_the_content( null, false, $post ), '<!-- wp:' ) === false ) {
			self::$can_load_frontend = false;
		}
	}

	/**
	 * Load assets in frontend.
	 *
	 * @param string $block_content Content of block.
	 * @param array  $block Block Attributes.
	 * @return string
	 * @since 1.0.0
	 */
	public function frontend_load( $block_content, $block ) {
		$asset_file = include VAYU_BLOCKS_ANIMATION_PATH . '/public/build/frontend.asset.php';

		wp_register_style(
			'vayu-block-animation',
			VAYU_BLOCKS_ANIMATION_URL . 'public/build/animation-index.css',
			array(),
			$asset_file['version']
		);

		if ( ! self::$can_load_frontend ) {
			return $block_content;
		}

		if ( ! self::$scripts_loaded['animation'] && strpos( $block_content, 'animated' ) ) {
			
			wp_enqueue_style( 'vayu-block-animation' );

			wp_enqueue_script(
				'vayu-block-animation-frontend',
				VAYU_BLOCKS_ANIMATION_URL . 'public/build/frontend.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			wp_script_add_data( 'vayu-block-animation-frontend', 'async', true );

			add_action( 'wp_head', array( $this, 'add_fontend_anim_inline_style' ), 10 );

			self::$scripts_loaded['animation'] = true;
		}

		if ( ! self::$scripts_loaded['count'] && strpos( $block_content, 'o-anim-count' ) ) {
			$asset_file = include VAYU_BLOCKS_ANIMATION_PATH . '/public/build/anim-count.asset.php';
			wp_enqueue_script(
				'vayu-block-count',
				VAYU_BLOCKS_ANIMATION_URL . 'public/build/anim-count.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			wp_script_add_data( 'vayu-block-count', 'defer', true );
			self::$scripts_loaded['count'] = true;
		}

		if ( ! self::$scripts_loaded['typing'] && strpos( $block_content, 'o-anim-typing' ) ) {
			$asset_file = include VAYU_BLOCKS_ANIMATION_PATH . '/public/build/anim-typing.asset.php';
			wp_enqueue_script(
				'vayu-block-typing',
				VAYU_BLOCKS_ANIMATION_URL . 'public/build/anim-typing.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			wp_script_add_data( 'vayu-block-typing', 'defer', true );
			self::$scripts_loaded['typing'] = true;
		}

		return $block_content;
	}

	/**
	 * Add no script tag.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public static function add_fontend_anim_inline_style() {
		echo '<style id="o-anim-hide-inline-css"> .animated:not(.o-anim-ready) {
			visibility: hidden;
			animation-play-state: paused;
		 }</style>
		 <noscript><style>.animated { visibility: visible; animation-play-state: running; }</style></noscript>';
	}

	/**
	 * The instance method for the static class.
	 * Defines and returns the instance of the static class.
	 *
	 * @static
	 * @since 1.0.0
	 * @access public
	 * @return Vayu_Blocks_Animation
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Throw error on object clone
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.0.0' );
	}

	/**
	 * Disable unserializing of the class
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.0.0' );
	}
}

Vayu_Blocks_Animation::instance();
