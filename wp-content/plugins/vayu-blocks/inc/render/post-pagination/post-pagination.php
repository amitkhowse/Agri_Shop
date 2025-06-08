<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_block_post_pagination_render($attributes, $content, $block) {

    // Check for enhanced pagination context
    $enhanced_pagination = isset($block->context['enhancedPagination']) && $block->context['enhancedPagination'];
    $page_key = isset($block->context['queryId']) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
    $page = empty($_GET[$page_key]) ? 1 : (int) $_GET[$page_key];
    $perpage = isset($block->context['query']['perPage']) ? $block->context['query']['perPage'] : 10;
    $block_query = new \WP_Query( build_query_vars_from_query_block( $block, $page ) );
    $max_page = $block_query->max_num_pages;
    // Set default value for max_page if no pages found
    if ($max_page === 0) {
        $max_page = 1;
    }
    // Get wrapper attributes and button label
    $wrapper_attributes = get_block_wrapper_attributes();

    // button option
    $load_more_type = isset($attributes['paginationType']) && !empty($attributes['paginationType']) ? esc_html($attributes['paginationType']) : 'load more';
    $load_more_btn_text = isset($attributes['loadMoreBtnText']) && !empty($attributes['loadMoreBtnText']) ? esc_html($attributes['loadMoreBtnText']) : 'load more';
    $load_more_text = isset($attributes['loadMoreText']) && !empty($attributes['loadMoreText']) ? esc_html($attributes['loadMoreText']) : 'loading...';
    $no_more_post_text = isset($attributes['noMorePostText']) && !empty($attributes['noMorePostText']) ? esc_html($attributes['noMorePostText']) : 'no more post';
    // Fetch query ID
    $query_id = isset($block->context['queryId']) ? esc_attr($block->context['queryId']) : '';
    // Create Load More button with data-query-id
    $container_end = strpos( $content, '>' );
    $content = substr_replace(
        $content,'data-loadmore-type="' . esc_attr($load_more_type) . '"
        data-loadmorebtn-txt="' . esc_attr( $load_more_btn_text ) . '" data-loadmore-label="' . esc_attr( $load_more_text ) . '"  data-nomorepost-label="' . esc_attr( $no_more_post_text ) . '" data-page="' . esc_attr( $page + 1 ) . '" data-max-page="' . esc_attr( $max_page ) . '" data-current-page="' . esc_attr( $page ) . '" data-query-id="' . esc_attr( $query_id ) . '" data-per-page="' . esc_attr( $perpage ) . '" " ',
        $container_end,
        0
    );
    // Return the wrapped content with Load More button
    return "<div class='vayu_blocks_post_pagination_wrap is-layout-flex " . esc_attr($load_more_type) . "'>" . $content . "</div>";
}

function query_render_block( $block_content, $block ) {
	global $wp_query;
	if ( 'vayu-blocks/advance-query-loop' === $block['blockName'] ) {
		$query_id      = $block['attrs']['queryId'];
		$container_end = strpos( $block_content, '>' );
		$inherit       = $block['attrs']['query']['inherit'] ?? false;

		// Account for inherited query loops
		if ( $inherit && $wp_query && isset( $wp_query->query_vars ) && is_array( $wp_query->query_vars ) ) {
			$block['attrs']['query'] = query_replace_vars( $wp_query->query_vars );
		}
		$paged = absint( $_GET[ 'query-' . $query_id . '-page' ] ?? 1 );
		$block_content = substr_replace( $block_content, ' data-paged="' . esc_attr( $paged ) . '" data-attrs="' . esc_attr( json_encode( $block ) ) . '"', $container_end, 0 );
	}

	return $block_content;
}
add_filter( 'render_block','query_render_block', 10, 2 );


function handle_load_more_posts() {
    // Validate required fields.
    if ( isset( $_POST['page'], $_POST['query_id'], $_POST['attrs'], $_POST['perpage'] ) ) {
        $paged = intval( $_POST['page'] ); // Current page.
        $perpage = intval( $_POST['perpage'] ); // Posts per page.
        $query_id = sanitize_text_field( $_POST['query_id'] ); // Query ID.
        $block_attrs = json_decode( wp_unslash( $_POST['attrs'] ), true ); // Block attributes.

        if ( ! is_array( $block_attrs ) ) {
            wp_send_json_error( [ 'message' => 'Invalid block attributes' ] );
        }

        // Modify query parameters using a filter.
        add_filter( 'query_loop_block_query_vars', function( $query ) use ( $paged, $perpage ) {
            $query['post_status'] = 'publish';
            $query['paged'] = $paged;
            $query['posts_per_page'] = $perpage;
            return $query;
        });

        ob_start();

        try {
            // Process inner blocks.
            if ( isset( $block_attrs['innerBlocks'] ) && is_array( $block_attrs['innerBlocks'] ) ) {
                foreach ( $block_attrs['innerBlocks'] as $inner_block ) {
                    if ( isset( $inner_block['blockName'] ) && $inner_block['blockName'] === 'vayu-blocks/post-pagination' ) {
                        // Skip pagination blocks or handle separately.
                        continue;
                    }

                    // Render each inner block and extract the `<li>` elements.
                    $rendered_block = render_block( $inner_block );

                    // Extract only the `<li>` elements.
                    if ( preg_match_all( '/<li.*?>.*?<\/li>/s', $rendered_block, $matches ) ) {
                        echo implode( '', $matches[0] );
                    }
                }
            }

            wp_send_json_success( [
                'content' => ob_get_clean(),
            ] );
        } catch ( Exception $e ) {
            ob_clean();
            wp_send_json_error( [ 'message' => 'Error rendering block: ' . $e->getMessage() ] );
        }
    } else {
        wp_send_json_error( [ 'message' => 'Missing required parameters' ] );
    }
}


add_action( 'wp_ajax_load_more_posts', 'handle_load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'handle_load_more_posts' );