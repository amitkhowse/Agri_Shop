<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
// Renderloop function
add_action('rest_api_init', function () {
    register_rest_field('post', 'comment_count', [
        'get_callback'    => function ($post) {
            return get_comments_number($post['id']);
        },
        'update_callback' => null,
        'schema'          => [
            'description' => __('The number of comments for the post.'),
            'type'        => 'integer',
            'context'     => ['view', 'edit'],
        ],
    ]);
});

function vayu_blocks_advance_heading_render( $attributes, $content, $block ) {

	global $post;

	if ( ! is_object( $post ) && ( !is_404() ) ) {
		return;
	}

    $source_field = isset( $attributes['selectedSourceField'] ) ? $attributes['selectedSourceField'] : 'none';
	$selectedPost = isset( $attributes['selectedPost'] ) ? $attributes['selectedPost'] : 'none';
    $animationCls   = !empty($attributes['advAnimation']['className']) ? esc_attr($attributes['advAnimation']['className']) : '';
  
    // Fetch the postId
    $post_id = ($selectedPost !== 'none') ? $selectedPost : $post->ID;
	
    // Fetch content based on the selected source field
    switch ( $source_field ) {
        case 'title':
            $display_content = get_the_title( $post_id );
            break;
        case 'slug':
            $display_content = get_post_field( 'post_name', $post_id );
            break;
        case 'excerpt':
            $display_content = get_the_excerpt( $post_id );
            break;
		case 'content':
			$display_content = apply_filters('the_content', get_post_field('post_content', $post_id));
				break;
        case 'post_date':
            $display_content = get_the_date( '', $post_id );
            break;
        case 'post_time':
            $display_content = get_the_time( '', $post_id );
            break;
        case 'post_id':
            $display_content = $post_id;
            break;
        case 'post_image':
            $display_content = '<figure class="wp-block-post-featured-image">' . get_the_post_thumbnail( $post_id ) . '</figure>';
            break;
        case 'author_name':
            $display_content = get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) );
            break;
		case 'author_nic_name':
			$display_content = get_the_author_meta( 'nickname', get_post_field( 'post_author', $post_id ) );
            break;
		case 'author_first_name':
				$display_content = get_the_author_meta('first_name', get_post_field('post_author', $post_id));
				break;
		case 'author_last_name':
				$display_content = get_the_author_meta('last_name', get_post_field('post_author', $post_id));
				break;
        case 'author_bio':
            $display_content = get_the_author_meta( 'description', get_post_field( 'post_author', $post_id ) );
            break;
        case 'author_email':
            $display_content = get_the_author_meta( 'user_email', get_post_field( 'post_author', $post_id ) );
            break;
		case 'author_image':
			$author_id = get_post_field( 'post_author', $post_id ); // Get the author ID from the post
            $avatar_url = get_avatar_url( $author_id, ['size' => 24] ); // Get the URL of the author's avatar
            $display_content = '<img src="' . esc_url( $avatar_url ) . '" alt="Author Avatar" class="author-avatar" />';
			
				break;
		case 'comment_count':
				$display_content = get_comments_number($post_id);
				break;
        default:
            $display_content = $content;
            break;
    }
    

    if ( ! $display_content ) {

        return;
    }

    // Set the default tag (e.g., 'h2')
    $tag_name = isset( $attributes['tag'] ) ? $attributes['tag'] : 'h2';

    // Prepare wrapper attributes
    $wrapper_attributes = '';
    if ( isset( $attributes['uniqueId'] ) ) {
        $uid = esc_attr( $attributes['uniqueId'] );
        $wrapper_attributes .= ' id="' . $uid . '"';
    }

    // Build CSS classes
    $classes = array( 'wp-block-vayu-blocks-advance-heading' );

    if ( isset( $attributes['uniqueId'] ) ) {
        $classes[] = esc_attr( $attributes['uniqueId'] );
    }

	if(isset( $attributes['headingimage'] )){
		$classes[] = 'vayu_blocks_heading_image-heading';
	}
	if(isset( $attributes['headinganimation'] )){
		$classes[] = 'vayu_blocks_heading_image_animation-heading';
	}

	$classes[] = $animationCls;

    $wrapper_attributes .= get_block_wrapper_attributes( array( 'class' => implode( ' ', $classes ) ) );

    // Check if linking is enabled
    if ( isset( $attributes['contentLinkEnable'] ) && $attributes['contentLinkEnable'] ) {
        $link_url = '';
	if ( isset( $attributes['contentLinkUrl'] ) && $attributes['contentLinkUrl'] ) {
        switch ( $attributes['contentLinkUrl'] ) {
            case 'post_url':
                $link_url = get_the_permalink( $post_id );
                break;
            case 'archive_url':
                $link_url = get_post_type_archive_link( get_post_type( $post_id ) );
                break;
            case 'author_url':
                $link_url = get_author_posts_url( get_post_field( 'post_author', $post_id ) );
                break;
            case 'site_url':
                $link_url = get_home_url();
                break;
            case 'comments_url':
                $link_url = get_comments_link( $post_id );
                break;
            case 'featured_img_url':
                $link_url = wp_get_attachment_url( get_post_thumbnail_id( $post_id ) );
                break;
            default:
                $link_url = '';
        }
	}
        if ( $link_url ) {
			$link_target = isset( $attributes['linkTarget'] ) ? esc_attr( $attributes['linkTarget'] ) : '_self';
            $rel   = ! empty( $attributes['rel'] ) ? 'rel="' . esc_attr( $attributes['rel'] ) . '"' : '';
            $display_content = sprintf(
                '<a href="%1$s" target="%2$s" %3$s>%4$s</a>',
                esc_url( $link_url ),
                $link_target,
                $rel,
                esc_html( $display_content )
            );
        }
    }

	if($selectedPost == 'none' && $source_field =='none'){

		return $content;

	 }else{

		return sprintf(
			'<%1$s %2$s>%3$s</%1$s>',
			esc_attr( $tag_name ),
			$wrapper_attributes,
			$display_content
		);
	 }
}


function vayu_advance_heading_style($attr){ 

	$OBJ_STYLE = new VAYUBLOCKS_RESPONSIVE_STYLE($attr);

	$css = '';
	
	if(isset( $attr['uniqueId'] )){

		$wrapper = ".wp-block-vayu-blocks-advance-heading.{$attr['uniqueId']}";
	    $css .= $OBJ_STYLE->advanceStyle($wrapper,'heading');

		$css .= ".{$attr['uniqueId']} a{";
			//heading color
		    $css .= isset( $attr['headingColor'] ) ? "color:{$attr['headingColor']};" : '';
			

			if (isset($attr['headingimage']) && !empty($attr['headingimage'])) {
				
				$css .= "background-image: url(" . esc_url($attr['headingimage']) . "); ";
			}			

		
		$css .= "}";

		$css .= ".{$attr['uniqueId']} a:hover{";
			//heading color
			$css .= isset( $attr['headingHvrColor'] ) ? "color:{$attr['headingHvrColor']};" : '';
			
		$css .= "}";


		$css .= ".{$attr['uniqueId']} {";
	
		//heading color
		$css .= isset( $attr['headingColor'] ) ? "color:{$attr['headingColor']};" : '';
		if (isset($attr['headingimage']) && !empty($attr['headingimage'])) {
				
			$css .= "background-image: url(" . esc_url($attr['headingimage']) . "); ";
		}
	
		//heading background
		if ( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'image' ) {
			$css .= isset( $attr['backgroundImage']['url'] ) ? "background-image: url({$attr['backgroundImage']['url']});" : '';
			$css .= isset( $attr['backgroundAttachment']) ? "background-attachment: {$attr['backgroundAttachment']};" : 'background-attachment:scroll;';
			$css .= isset( $attr['backgroundRepeat']) ? "background-repeat: {$attr['backgroundRepeat']};" : 'background-repeat:repeat;';
			$css .= isset( $attr['backgroundSize']) ? "background-size: {$attr['backgroundSize']};" : 'background-size:auto;';
			$css .= isset($attr['backgroundPosition']) ? "background-position-x: " . ($attr['backgroundPosition']['x'] * 100) . "%; background-position-y: " . ($attr['backgroundPosition']['y'] * 100) . "%;" : '';
		}elseif( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'gradient' ){
			$css .= isset( $attr['backgroundGradient'] ) ? "background-image:{$attr['backgroundGradient']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
		}else{
			$css .= isset( $attr['backgroundColor'] ) ? "background-color:{$attr['backgroundColor']};" : '';
		}

		// Text alignment
		$css .= isset($attr['align']) ? "text-align: {$attr['align']['Desktop']}; " : '';

		
        //typography

		$css .= $OBJ_STYLE->typography('typography','Desktop');

		$css .= "}";


		$css .= ".{$attr['uniqueId']}:hover { ";
	
			//heading hvr color
		    $css .= isset( $attr['headingHvrColor'] ) ? "color:{$attr['headingHvrColor']};" : '';
			//heading hvr background
			if ( isset( $attr['backgroundTypeHvr'] ) && $attr['backgroundType'] == 'image' ) {
					$css .= isset( $attr['backgroundImageHvr']['url'] ) ? "background-image: url({$attr['backgroundImageHvr']['url']});" : '';
					$css .= isset( $attr['backgroundAttachmentHvr']) ? "background-attachment: {$attr['backgroundAttachmentHvr']};" : '';
					$css .= isset( $attr['backgroundRepeatHvr']) ? "background-repeat: {$attr['backgroundRepeatHvr']};" : '';
					$css .= isset( $attr['backgroundSizeHvr']) ? "background-size: {$attr['backgroundSizeHvr']};" : '';
					$css .= isset( $attr['backgroundPositionHvr']) ? "background-position-x: {$attr['backgroundPositionHvr']['x']}; background-position-y: {$attr['backgroundPositionHvr']['y']};" : '';
			}
			elseif( isset( $attr['backgroundTypeHvr'] ) && $attr['backgroundTypeHvr'] == 'gradient' ){
					$css .= isset( $attr['backgroundGradientHvr'] ) ? "background-image:{$attr['backgroundGradientHvr']};" : '';  
			}else{
					$css .= isset( $attr['backgroundColorHvr'] ) ? "background-color:{$attr['backgroundColorHvr']};" : '';
			}

			$css .= "}";

			$css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) { .{$attr['uniqueId']} {";
			
			$css .= (isset($attr['align']) ? "text-align:{$attr['align']['Tablet']};" : '');
			
           
			//typography

		    $css .= $OBJ_STYLE->typography('typography','Tablet');

			$css .= "}}";

			// for mobile view

			$css .= "@media only screen and (max-width: 767px){ .{$attr['uniqueId']}{";
				
				$css .=(isset($attr['align']) ? "text-align:{$attr['align']['Mobile']};" : '');
				

			//typography

		    $css .= $OBJ_STYLE->typography('typography','Mobile');

			$css .= "}}";
            // for mobile view hover

			if (isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] == true){
				$css .= "@media only screen and (min-width: 1024px){.{$attr['uniqueId']}{display:none;} }";
			}
			
			if (isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] == true){
				$css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {.{$attr['uniqueId']}{display:none;}}";
			}
			
			if (isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] == true){
				$css .= "@media only screen and (max-width: 767px) {.{$attr['uniqueId']}{display:none;}}";
			}

    }

	return $css;
}