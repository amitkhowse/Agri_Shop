<?php
/**
 * Plugin Name:       Vayu Blocks
*  Plugin URI:         https://themehunk.com/vayu-blocks
 * Description:       The Vayu Blocks is an add-on plugin For Gutenberg Block Editor. Quickstart the Gutenberg editor with Powerful and elegant blocks to design stunning websites. Free Vayu Blocks plugin that amplifies the default WordPress Gutenberg Editor with powerful blocks.
 * Requires at least: 6.2
 * Requires PHP:      7.4
 * Version:           1.3.2
 * Author:            ThemeHunk
 * Author URI:        https://themehunk.com
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain:       vayu-blocks
 *
 * @package           vayu-blocks
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

define( 'VAYU_BLOCKS_BASEFILE', __FILE__ );
define( 'VAYU_BLOCKS_URL', plugins_url( '/', __FILE__ ) );
define( 'VAYU_BLOCKS_PATH', dirname( __FILE__ ) );
define( 'VAYU_BLOCKS_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'VAYU_BLOCKS_VERSION', '1.3.2' );
define( 'VAYU_BLOCKS_PRO_SUPPORT', true );
define( 'VAYU_BLOCKS_SHOW_NOTICES', false );


class Vayu_Block_Plugin {

	/**
	 * Plugin version.
	 *
	 * @var string
	*/
	const VERSION = VAYU_BLOCKS_VERSION;

	/**
	 * Initialize the plugin.
	*/

    public function __construct() {
        
        require_once VAYU_BLOCKS_DIR_PATH .'inc/init.php';
        add_action( 'init', array( $this, 'vayu_register_blocks' ) );
        add_action('admin_menu',  array( $this, 'vayu_plugin_menu'));

    }

    public function vayu_register_blocks() {

        $options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option();
    
        $blocks = array(
            array(
                'name'           => 'vayu-blocks/advance-container',
                'script_handle'  => 'advance-container',
                'editor_style'   => 'advance-container-editor-style',
                'frontend_style' => 'advance-container-frontend-style',
                'status'         => $options['container']['isActive'],
                'render_callback' => 'vayu_blocks_advance_container_render',
                'localize_data'  => array(
                    'homeUrl' => get_home_url(),
                    'container_width' => $options['global']['containerWidth'],
                    'container_gap' => $options['global']['containerGap'],
                    'container_padding' => $options['global']['containerPadding'],
                ),
            ),
            array(
                'name'           => 'vayu-blocks/advance-spacer',
                'script_handle'  => 'advance-spacer',
                'editor_style'   => 'advance-spacer-editor-style',
                'frontend_style' => 'advance-spacer-frontend-style',
                'status'         => $options['spacer']['isActive'],
            ),
        );
    
        foreach ($blocks as $key => $block) {
            if (isset($block['status']) && ($block['status'] == 1)) {
                // Register JavaScript file
                wp_register_script(
                    $block['script_handle'],
                    VAYU_BLOCKS_URL . 'public/build/' . $block['script_handle'] . '.js',
                    array('wp-blocks', 'wp-element', 'wp-editor'),
                    filemtime(VAYU_BLOCKS_PATH . '/public/build/' . $block['script_handle'] . '.js')
                );
                // Register editor style if defined
                if (isset($block['editor_style']) && !empty($block['editor_style'])) {
                    wp_register_style(
                        $block['editor_style'],
                        VAYU_BLOCKS_URL . 'public/build/' . $block['script_handle'] . '.css',
                        array('wp-edit-blocks'),
                        filemtime(VAYU_BLOCKS_PATH . '/public/build/' . $block['script_handle'] . '.css')
                    );
                }
    
                // Register front end block style if defined
                if (isset($block['frontend_style']) && !empty($block['frontend_style'])) {
                    wp_register_style(
                        $block['frontend_style'],
                        VAYU_BLOCKS_URL . 'public/build/style-' . $block['script_handle'] . '.css',
                        array(),
                        filemtime(VAYU_BLOCKS_PATH . '/public/build/style-' . $block['script_handle'] . '.css')
                    );
                }
    
                // Localize the script with data
                if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
                    wp_localize_script(
                        $block['script_handle'],
                        'ThBlockData',
                        $block['localize_data']
                    );
                }
    
                // Prepare the arguments for registering the block
                $block_args = array(
                    'editor_script' => $block['script_handle'],
                );
    
                if (isset($block['editor_style']) && !empty($block['editor_style'])) {
                    $block_args['editor_style'] = $block['editor_style'];
                }
    
                if (isset($block['frontend_style']) && !empty($block['frontend_style'])) {
                    $block_args['style'] = $block['frontend_style'];
                }
    
                // Check if the render callback is set and not null
                if (isset($block['render_callback']) && !empty($block['render_callback'])) {
                    $block_args['render_callback'] = $block['render_callback'];
                }
    
                // Register the block
                register_block_type($block['name'], $block_args);
            }
        }
    }
    
 
    // plugin menu option add
    public function vayu_plugin_menu() {
        
        add_menu_page(
            'Vayu Blocks',
            'Vayu Blocks',
            'manage_options', 
            'vayu-blocks',
            array( $this, 'vayu_plugin_page_callback' ),
            plugins_url( 'vayu-blocks/inc/assets/img/menu-logo.png' ),
            59
        );

        add_submenu_page(
            'vayu-blocks',
            'Vayu Sites',
            'Vayu Sites',
            'manage_options',
            'vayu-sites',
            array( $this, 'vayu_blocks_sites_callback' )
        );

    }

    public function vayu_blocks_sites_callback() {
        ?>
        <div class="themehunk-sites-menu-page-wrapper">
            <div id="vayuroot"></div>
        </div>
        <?php
    }
    
    public function vayu_plugin_page_callback() {
        
		if ( ! current_user_can( 'manage_options' ) ) {
				return;
		}?>

        <div class="vayu-blocks-wrap">
        <div id="vayu-blocks-container"></div>
        </div>

    <?php }

}


function vayu_block_plugin_init( ) {
    new Vayu_Block_Plugin();
}
add_action( 'init', 'vayu_block_plugin_init', 1 );




/**
 * Adds a custom template part area for mega menus to the list of template part areas.
 *
 * @param array $areas Existing array of template part areas.
 * @return array Modified array of template part areas including the new "Menu" area.
 */
function vayu_blocks_mega_menu_template_part_areas( array $areas ) {
	$areas[] = array(
		'area'        => 'menu',
		'area_tag'    => 'div',
		'description' => __( 'Menu templates are used to create sections of a mega menu.', 'mega-menu-block' ),
		'icon'        => '',
		'label'       => __( 'Menu', 'mega-menu-block' ),
	);

	return $areas;
}
// add_filter( 'default_wp_template_part_areas', 'vayu_blocks_mega_menu_template_part_areas' );
// require_once VAYU_BLOCKS_DIR_PATH .'inc/patterns/single.php';
