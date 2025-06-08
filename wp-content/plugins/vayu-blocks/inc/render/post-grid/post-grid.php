<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class VayuBlocksPostGrid {
    private $attr;
    private $device_type;

    public function __construct($attr) {
        $this->attr = $attr;
        $this->device_type = $this->get_device_type();
    }

    //render all post
    public function render_posts() {

        // Get the current post's permalink
        $current_post_link = get_permalink();
        
        // Extract the post ID from the permalink
        $post_id = get_the_ID(); // Alternatively, you can parse the URL to get the ID

        // Construct the pagination URL
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $pagination_link = home_url('/' . get_post_type() . '/' . $post_id . '/page/' . ($paged + 1) . '/');

        $columns = isset($this->attr['column']['Desktop']) ? $this->attr['column']['Desktop'] : '';
        $rows = isset($this->attr['row']['Desktop']) ? $this->attr['row']['Desktop'] : ''; 

        // Adjust columns and rows based on device type
        if ($this->device_type === 'Desktop') {
            $columns = isset($this->attr['column']['Desktop']) ? $this->attr['column']['Desktop'] : '';
            $rows = isset($this->attr['row']['Desktop']) ? $this->attr['row']['Desktop'] : ''; 
        } else if ($this->device_type === 'Tablet') {
            $columns = isset($this->attr['column']['Tablet']) ? $this->attr['column']['Tablet'] : '';
            $rows = isset($this->attr['row']['Tablet']) ? $this->attr['row']['Tablet'] : ''; 
        } else if ($this->device_type === 'Mobile') {
            $columns = isset($this->attr['column']['Mobile']) ? $this->attr['column']['Mobile'] : '';
            $rows = isset($this->attr['row']['Mobile']) ? $this->attr['row']['Mobile'] : ''; 
        }

        // Default sorting
        $sortByOrder = !empty($this->attr['sortByOrder']) ? $this->attr['sortByOrder'] : 'DESC'; // Default to descending
        $sortByField = !empty($this->attr['sortByField']) ? $this->attr['sortByField'] : 'date'; // Default to 'date'
        if ($sortByField === 'id' || $sortByField === 'Id') {
            $sortByField = strtoupper($sortByField);
        }

        // Convert selected category names array to a comma-separated string
        $selectedCategoryNames = '';
        if (!empty($this->attr['selectedCategories']) && is_array($this->attr['selectedCategories'])) {
            $selectedCategoryNames = implode(',', array_map('sanitize_text_field', $this->attr['selectedCategories']));
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Initial query arguments including category IDs if available
        $args = array(
            'post_type' => 'post',
            'orderby' => $sortByField, // Sorting field
            'order' => strtoupper($sortByOrder), // Sorting order
            'category_name' => $selectedCategoryNames,
            'posts_per_page' => $columns * $rows,
            'paged' => $paged
        );

        // If filtering by featured image is enabled
        if (!empty($this->attr['pg_featuredImageOnly']) && $this->attr['pg_featuredImageOnly']) {
            $args['meta_query'] = array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                )
            );
        }

        $query = new WP_Query($args);

        $animated = isset($attr['className']) ? $attr['className'] : '';
        $className = $this->attr['classNamemain'];


        // Rendering posts
        $output = '';
        if ($query->have_posts()) {

            $classes = [ 'th-post-grid-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) ];
            
            if (!empty($classhover)) {
                $classes[] = esc_attr($classhover);
            }
            
            if (!empty($animated) && $animated !== 'none') {
                $classes[] = esc_attr($animated);
            }

            if ( ! empty( $attributes['advAnimation'] ) && ! empty( $attributes['advAnimation']['className'] ) ) {
                $classes[] = $attributes['advAnimation']['className'];
            }
            
            $finalClass = implode(' ', $classes);
            
            $output .= ' <div ' . get_block_wrapper_attributes(['class' => $finalClass]) . '>';
            
                $output .= '<div class="th-post-grid-wrapper-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">';

                    while ($query->have_posts()) {
                        $query->the_post();
                
                        $categories = get_the_category();
                        $category_links = array();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                $category_links[] = array(
                                    'name' => $category->name,
                                    'link' => get_category_link($category->term_id)
                                );
                            }
                        }
                
                        $tags = get_the_tags();
                        $tag_links = array();
                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                $tag_links[] = array(
                                    'name' => $tag->name,
                                    'link' => get_tag_link($tag->term_id)
                                );
                            }
                        }
                
                        $output .= '<div class="th-post-grid-inline th-post-grid-inline-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">';
                        $output .= $this->render_featured_image();
                        $output .= $this->render_category($category_links);
                        $output .= $this->render_title();
                        $output .= $this->render_author_and_date();
                        $output .= $this->render_excerpt();
                        $output .= $this->render_full_content();
                        $output .= $this->render_tags($tag_links);
                        $output .= '</div>';
                    }

                $output .= '</div>';

                if ($this->attr['showpagination']) {
                    $output .= '<div class="pagination">' . $this->render_pagination($query, $paged) . '</div>'; // Render pagination controls
                }
            
            $output .= '</div>';
    
         
        } else {
            $output .= '<p>' . esc_html__('No posts found.', 'plugin-textdomain') . '</p>';
        }
        wp_reset_postdata();
        return $output;
    }

    //pagination
    public function render_pagination($query,$paged) {
        // Retrieve the current page number from the query var
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        // Return early if pagination should not be shown
        if (!isset($this->attr['showpagination']) || !$this->attr['showpagination']) {
            return ''; // Return an empty string if pagination should not be shown
        }
    
        // Pagination settings
        $pagination_args = array(
            'total'         => $query->max_num_pages,
            'current'       => max(1, $paged),
            'prev_next'     => true,
            'prev_text'     => '⯇',
            'next_text'     => '⯈',
            'end_size'      => 2,  // Number of page numbers to show at the beginning and end
            'mid_size'      => 2,  // Number of page numbers to show around the current page
            'type'          => 'plain',
            'before_page_number' => '',
            'after_page_number'  => '',
            'add_args'      => false, // Don't add extra args to the pagination URLs
        );
        // Generate and return pagination
        return paginate_links($pagination_args);
    } 

    //featured image
    private function render_featured_image() {
        $output = '';
        $post_id = get_the_ID();

        $FeaturedImage = isset($this->attr['featuredImage'][$this->device_type]) ? $this->attr['featuredImage'][$this->device_type] : false;

        if ($FeaturedImage) {
            $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
            $featured_image_id = get_post_thumbnail_id($post_id); // Get the ID of the featured image

            // Get the alt text for the featured image
            $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);

            // Assuming the attributes are passed as an array to the function or class
            $pg_featuredimage_animate = isset($this->attr['pg_featuredimage_animate']) ? $this->attr['pg_featuredimage_animate'] : false;
            // Check if the animation should be applied
            $animate_class = $pg_featuredimage_animate ? 'animatefeaturedimage-front' : '';

            $output .= '<div class="post-grid-featured-image">
                    <img src="' . esc_url($featured_image_url) . '" class="post-grid-image ' . esc_attr($animate_class) . ' alt="' . esc_attr($alt_text) . '">
                  </div>';

        }
        return $output;
    }

    //category
    private function render_category($categories) {
        $output='';
        
        $showCategories = isset($this->attr['categori'][$this->device_type]) ? $this->attr['categori'][$this->device_type] : false;

        // Check pg_numberOfCategories attribute to limit displayed categories
        $numberOfCategories = isset($this->attr['pg_numberOfCategories']) ? intval($this->attr['pg_numberOfCategories']) : 1;
    
        if ($showCategories) {
            $output .= '<div class="post-grid-category-style-container">';
            foreach (array_slice($categories, 0, $numberOfCategories) as $category) {
                // Expect $category to be an associative array with 'name' and 'link'
                $output .= '<a href="' . esc_url($category['link']) . '" class="post-grid-category-style-new">' . esc_html($category['name']) . '</a>';
            }
            $output .= '</div>';
        }
        return $output;
    }
    
    //title
    private function render_title() {
        $output = '';

        $post_title = get_the_title();
        $post_permalink = get_permalink();
        
        
        if (isset($this->attr['pg_blockTitleTag'])) {
            $output .= '<' . esc_attr($this->attr['pg_blockTitleTag']) . ' class="vayu_blocks_title_post_grid">';
        } else {
            $output .= '<h4>';
        }
        $output .= '<a href="' . esc_url($post_permalink) . '"style="text-decoration: none;">';
        $output .= esc_html($post_title);
        $output .= '</a>';
        if (isset($this->attr['pg_blockTitleTag'])) {
            $output .= '</' . esc_attr($this->attr['pg_blockTitleTag']) . '>';
        } else {
            $output .= '</h4>';
        }
    

        return $output;
    }
    
    //author and date
    private function render_author_and_date() {
        $output = '';
        $post_date = get_the_date();
        $post_author_id = get_the_author_meta('ID');
        $post_author_name = get_the_author();

        $showAuthor = isset($this->attr['auth'][$this->device_type]) ? $this->attr['auth'][$this->device_type] : false;
    
        $showDate = isset($this->attr['date'][$this->device_type]) ? $this->attr['date'][$this->device_type] : false;

        if ($showAuthor || $showDate) {
            $output .= '<div class="post-grid-author-date-container">';
    
            if ($showAuthor) {
                $output .= '<div class="datecontainer">';
                $output .= ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="M7.25 16.437a6.5 6.5 0 1 1 9.5 0V16A2.75 2.75 0 0 0 14 13.25h-4A2.75 2.75 0 0 0 7.25 16v.437Zm1.5 1.193a6.47 6.47 0 0 0 3.25.87 6.47 6.47 0 0 0 3.25-.87V16c0-.69-.56-1.25-1.25-1.25h-4c-.69 0-1.25.56-1.25 1.25v1.63ZM4 12a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" clip-rule="evenodd"></path></svg>';
                $output .= '<a class="post-grid-author-span" href="' . esc_url(get_author_posts_url($post_author_id)) . '">';
                $output .= esc_html($post_author_name);
                $output .= '</a>';
                $output .= '</div>';
            }
    
            if ($showDate) {
                $output .= '<div class="datecontainer">';
                $output .= '  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em" aria-hidden="true" focusable="false"><path d="M11.696 13.972c.356-.546.599-.958.728-1.235a1.79 1.79 0 00.203-.783c0-.264-.077-.47-.23-.618-.148-.153-.354-.23-.618-.23-.295 0-.569.07-.82.212a3.413 3.413 0 00-.738.571l-.147-1.188c.289-.234.59-.41.903-.526.313-.117.66-.175 1.041-.175.375 0 .695.08.959.24.264.153.46.362.59.626.135.265.203.556.203.876 0 .362-.08.734-.24 1.115-.154.381-.427.87-.82 1.466l-.756 1.152H14v1.106h-4l1.696-2.609z"></path><path d="M19.5 7h-15v12a.5.5 0 00.5.5h14a.5.5 0 00.5-.5V7zM3 7V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path></svg>';
                $output .= '<span class="post-grid-date-span">' . esc_html($post_date) . '</span>';
                $output .= '</div>';
            }
    
            $output .= '</div>';
        }

        return $output;
    }
    
    //excerpt content
    private function render_excerpt() {
        $output = '';
        $post_permalink = get_permalink();
        
        $excerpt = isset($this->attr['expertview'][$this->device_type]) ? $this->attr['expertview'][$this->device_type] : false;
        $excerpt_selector = isset($this->attr['pg_excerptSelector']) ? $this->attr['pg_excerptSelector'] : $excerpt_selector;

        if ($this->device_type  === 'Desktop') {
            $excerpt_length = isset($this->attr['pg_excerptWords']) ? $this->attr['pg_excerptWords'] : $excerpt_length;
        } else if ($this->device_type  === 'Tablet') {
            $excerpt_length = isset($this->attr['pg_excerptWordsTablet']) ? $this->attr['pg_excerptWordsTablet'] : $excerpt_length;
        } else if ($this->device_type  === 'Mobile') {
            $excerpt_length = isset($this->attr['pg_excerptWordsMobile']) ? $this->attr['pg_excerptWordsMobile'] : $excerpt_length;
        }
       
        if ($excerpt) {
            $excerpt_text = wp_trim_words(get_the_excerpt(), $excerpt_length, '');
            $linked_excerpt_selector = '<a class="vb-excerpt_selector" href="' . esc_url($post_permalink) . '">' . $excerpt_selector . '</a>';
            $output .= '<div class="post-grid-excerpt-view">' . $excerpt_text .' '. $linked_excerpt_selector . '</div>';
        }

        return $output;
        
    }
    
    //full content
    private function render_full_content() { 
        $output ='';

        $FullContent = isset($this->attr['fullContent'][$this->device_type]) ? $this->attr['fullContent'][$this->device_type] : false;

        if ($FullContent) {
            // Get the content and strip HTML tags
            $content = get_the_content();
            $stripped_content = wp_strip_all_tags($content);
    
            // Wrap the stripped content in <p> tags
            $wrapped_content = '<p class="post-grid-excerpt-view">' . $stripped_content . '</p>';
    
            // Output the wrapped content
            $output .= $wrapped_content;
        }
        return $output;
    }
    
    //tags
    private function render_tags($tags) {
        $output ='';
        
        $showTags = isset($this->attr['Showtag'][$this->device_type]) ? $this->attr['Showtag'][$this->device_type] : false;

        $numberOfTags = isset($this->attr['pg_numberOfTags']) ? intval($this->attr['pg_numberOfTags']) : 1;
    
        if ($showTags) {
            $output .= '<div class="post-grid-tag-style-conatiner">';
            foreach (array_slice($tags, 0, $numberOfTags) as $tag) {
                $output .= '<a href="' . esc_url($tag['link']) . '" class="post-grid-tag-style-new">' . esc_html($tag['name']) . '</a>';
            }
            $output .= '</div>';
        }
        return $output;
    }
    
    //device type
    private function get_device_type() {
        $tablet_browser = 0;
        $mobile_browser = 0;
        
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }
        
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
        
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
        
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            // Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        
        if ($tablet_browser > 0) {
            return 'Tablet';
        } else if ($mobile_browser > 0) {
            return 'Mobile';
        } else {
            return 'Desktop';
        }
    }
    
}

function post_grid_render($attr) {
    $default_attributes = include('defaultattributes.php'); //attributes Merged
    $attr = array_merge($default_attributes, $attr); 
    $renderer = new VayuBlocksPostGrid($attr);

    return $renderer->render_posts();
}