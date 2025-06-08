<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_render_init(){
	add_action( 'wp_head', 'vayu_render_server_side_css',999 );
}


add_action( 'init', 'vayu_render_init', 99);

function vayu_render_server_side_css() {
	global $_wp_current_template_content;

	$content         = '';
	$slugs           = array();

	$template_blocks = parse_blocks( $_wp_current_template_content );

	foreach ( $template_blocks as $template_block ) {
		if ( 'core/template-part' === $template_block['blockName'] ) {
			$slugs[] = $template_block['attrs']['slug'];
		}
	}

	$templates_parts = get_block_templates( array( 'slugs__in' => $slugs ), 'wp_template_part' );
    
	
	foreach ( $templates_parts as $templates_part ) {
		if ( isset( $templates_part->content ) && isset( $templates_part->slug ) && in_array( $templates_part->slug, $slugs ) ) {
			$content .= $templates_part->content;
		}
	}

	$content .= $_wp_current_template_content; 

   if ( function_exists( 'has_blocks' ) ) {

		global $post;

		if ( ! is_object( $post ) && ( !is_404() ) ) {
			return;
		}

		$content .= get_post_field( 'post_content', get_the_ID() );

		$blocks = parse_blocks( $content );

		if ( ! is_array( $blocks ) || empty( $blocks ) ) {
			return;
		}


		if ( ( is_404() ) ) {
			
			$css = vayu_cycle_through_blocks( $blocks, ' ' );
		
		}
		else{
			$css = vayu_cycle_through_blocks( $blocks, $post->ID );	
		}



		if ( empty( $css ) ) {
			return;
		}
		//vayu_blocks_save_custom_css_to_uploads($css,get_the_ID());
		$style  = "\n" . '<style id="vayu-block-css">' . "\n";
		$style .= $css;
		$style .= "\n" . '</style>' . "\n";

		echo $style;
	   }

}




function vayu_blocks_save_custom_css_to_uploads($css_content,$postid) {
    $upload_dir = wp_upload_dir(); // Get uploads directory info
    $css_dir = trailingslashit( $upload_dir['basedir'] ) . 'vayu-blocks/css';

    // Create directory if it doesn't exist
    if ( ! file_exists( $css_dir ) ) {
        wp_mkdir_p( $css_dir );
    }

    // Save the file
    $file_path = trailingslashit( $css_dir ) . 'post-'.$postid.'.css';
    file_put_contents( $file_path, $css_content );

    // Optionally return the URL to the CSS file
    return trailingslashit( $upload_dir['baseurl'] ) . 'vayu-blocks/css/post-'.$postid.'.css';
}


function vayu_blocks_enqueue_style() {
    if ( is_page() ) {
        $page_id = get_the_ID();
        $upload_dir = wp_upload_dir();
        $css_url = trailingslashit( $upload_dir['baseurl'] ) . "vayu-blocks/css/post-{$page_id}.css";
        $css_path = trailingslashit( $upload_dir['basedir'] ) . "vayu-blocks/css/post-{$page_id}.css";

        if ( file_exists( $css_path ) ) {
            wp_enqueue_style( "custom-post-{$page_id}", $css_url, [], filemtime( $css_path ) );
        }
    }
}
//add_action( 'wp_enqueue_scripts', 'vayu_blocks_enqueue_style' );