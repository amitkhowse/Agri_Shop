<?php if ( ! defined( 'ABSPATH' ) ) exit; 

/* Set the image size by cropping the image */
    add_image_size( 'portfoliolite-standard-thumb', 800, 450, true );
    add_image_size( 'portfoliolite-portfolio-thumbnail', 350, 260, true );
    add_image_size( 'portfoliolite-custom-two-grid-thumb', 660, 350, true );
    add_image_size( 'portfoliolite-custom-three-grid-thumb', 350, 260, true );
    add_image_size( 'portfoliolite-custom-four-grid-thumb', 321, 238, true );
    add_image_size( 'portfoliolite-custom-three-gutr-grid-thumb', 450, 335, true );
    add_image_size( 'portfoliolite-custom-four-gutr-grid-thumb', 338, 250, true );


function portfoliolite_grid_thumb($grid_layout, $thumb_crop=true){
    if($thumb_crop):
switch($grid_layout){
        case 'two-grid':
             the_post_thumbnail('portfoliolite-custom-two-grid-thumb');
            break;
        case 'standard-layout':
             the_post_thumbnail('portfoliolite-custom-three-grid-thumb');
            break;
        case 'four-grid':
             the_post_thumbnail('portfoliolite-custom-four-grid-thumb');
            break;
        case 'three-grid-zero-padding':
             the_post_thumbnail('portfoliolite-custom-three-gutr-grid-thumb');
            break;
        case 'four-grid-zero-padding':
             the_post_thumbnail('portfoliolite-custom-four-gutr-grid-thumb');
            break;
        
}   
else:
switch($grid_layout){
        case 'two-grid':
            echo portfoliolite_post_image(660, 350);
            break;
        case 'standard-layout':
            echo portfoliolite_post_image(350, 260);
            break;
        case 'four-grid':
             echo portfoliolite_post_image(321, 238);
            break;
        case 'three-grid-zero-padding':
             echo portfoliolite_post_image(450, 335);
            break;
        case 'four-grid-zero-padding':
             echo portfoliolite_post_image(338, 250);
            break;        
}  
endif;
}

// full thumb get post content
function portfoliolite_full_post_image(){
$img_source = '';
global $post;
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
     if($img_source!=''){
         $permalink = get_permalink($post->ID);
        print "<a href='$permalink'><img src='$img_source' class='postimg' alt='Post Image'/></a>";
        }
}
// post content image thumbnail
function portfoliolite_post_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post;
    //This is required to set to Null
    $img_source = '';
    $permalink = get_permalink($post->ID);
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if($img_source!=''){
    $img_path = th_image_resize($img_source, $w, $h);
    if (!empty($img_path['url'])) {
        print "<a href='$permalink'><img src='$img_path[url]' class='postimg' alt='Post Image'/></a>";
    }
  }
}

global $grid_layout;
$grid_layout = get_theme_mod('dynamic_grid','standard-layout');

function portfolioline_get_category_list($perpage = 8){ 
$select_cat = get_theme_mod('our_port_category','0');
$args = array(
  'taxonomy' => 'portfolio-cate',
  'child_of'                 => 0,
  'parent'                   => '',
  'orderby'                  => 'name',
  'order'                    => 'ASC',
  'hide_empty'               => 1,
  'exclude'                  => '',
  );
$cats = get_categories($args);
$i=1;
$categlist = '';
foreach ($cats as $cat){
    if (is_array($select_cat)) {
    if (in_array($cat->slug, $select_cat)){
    $categlist .= '<li><button class="pl-portfolio filter'.$i.'" data-filter=".' . esc_attr($cat->slug) . '" post_count="'.esc_attr($cat->count).'">' . esc_attr($cat->name) . '</button></li>'; 
}
    $i++;
}
} 
 $return = '<ul class="portfolio-navi" plcatlist="'.esc_attr($i).'" pfl_perpage = "'.esc_attr($perpage).'" >';
 $return .= $categlist;
 $return .= '</ul>';
 return $return;
}
function portfolioline_portfolio_ajax(){

    if ( ! current_user_can( 'administrator' ) ) {
  
        wp_die( - 1, 403 );
        
    } 

    check_ajax_referer('portfoliolite_nonce','nonce');


          $layout = get_theme_mod('dynamic_grid','standard-layout');
          $cat_slug = esc_attr($_POST['cate_slug']);
           $perpage_post = get_theme_mod('our_port_default_images',8);
          $loop = new WP_Query( array(
          'post_type' => 'portfolio',
          'tax_query' => array(
                array(
                  'taxonomy' => 'portfolio-cate',
                  'field'    => 'slug',
                  'terms'    =>  esc_attr($cat_slug),
                )),
          'posts_per_page' => $perpage_post,
          'paged'     => absint($_POST['post_page']),
          'pagination'     => true,
          'meta_query'     => array(array( 'key' => '_thumbnail_id')),
          ));
          // $total_post = $loop->found_posts; 
           if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
            echo '<li class="element-item post '.esc_attr($cat_slug).'" lfb-page = "2" totalpost = "'.esc_attr($total_post).'" data-category="transition" data-max-pages="'. esc_attr($loop->max_num_pages).'" >'?>
            <div class="portfolio-image">
                <figure class="protfolio-img-efc">
        <?php if ( $layout =='four-Masnory' || $layout =='three-Masnory' ){ 
                  if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <?php the_post_thumbnail(); ?>
                    </a>
            <?php endif; 
                }
                  else{
                    global $grid_layout; ?>
                  <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php portfoliolite_grid_thumb($grid_layout,true); ?>
                  </a>
                  <?php } }?>
                  <figcaption>
                  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                  <p><?php the_category(', '); ?></p>
                  </figcaption>
                </figure>
              </div>
            </li> 
           <?php endwhile; }
wp_reset_postdata();
die();
}
add_action('wp_ajax_nopriv_portfolioline_portfolio_ajax', 'portfolioline_portfolio_ajax'); // load more
add_action('wp_ajax_portfolioline_portfolio_ajax', 'portfolioline_portfolio_ajax');

/**
 * Augmentation to the $_SERVER['DOCUMENT_ROOT'] functionality, because it cannot be relied on to provide the right path
 * in cases where there is URL rewriting at play.
 *
 * @param  $path
 * @return mixed|string
 */
function portfolioline_upload_dir($path) {
    // If the file exists under DOCUMENT_ROOT, return DOCUMENT_ROOT
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    // Get the path of the current script, then compare it with DOCUMENT_ROOT. Then check for the file in each folder.
    $parts = array_diff(explode('/', $_SERVER['SCRIPT_FILENAME']), explode('/', $_SERVER['DOCUMENT_ROOT']));
    $new_path = $_SERVER['DOCUMENT_ROOT'];
    foreach ($parts as $part) {
        $new_path .= '/' . $part;
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    // Microsoft Servers
    if (!isset($_SERVER['DOCUMENT_ROOT'])) {
        $new_path = str_replace("/", "\\", $_SERVER['ORIG_PATH_INFO']);
        $new_path = str_replace($new_path, "", $_SERVER['SCRIPT_FILENAME']);
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    return false;
}

/**
 * This function resizes images It takes image source,
 * width height and quality as a parameter
 * This function is based on the approach described by
 * Victor Teixeira here: http://core.trac.wordpress.org/ticket/15311.
 * @param  $img_url
 * @param  $width
 * @param  $height
 * @param bool $crop
 * @param  $quality
 * @return array with image URL, width and height
 */
if ((function_exists('is_multisite') && is_multisite()) || ($single_site = true)) {

    function th_image_resize($img_url, $width, $height, $crop = true, $quality = 100) {
        $upload_dir = wp_upload_dir();
        // This used to be the directory for the image cache prior to 3.7.2, so we will leave it that way...
        //echo "</br uploadbase=>".
        $newfile = $upload_dir['basedir']; // base directory
        $newsubdir = '/thumb-cache'; //subdirectory like:2012/11  
        $upload_path = $newfile . $newsubdir;

        //echo $upload_path = $upload_dir['path'];
        if (!file_exists($upload_path)) { // Create the directory if it is missing
            wp_mkdir_p($upload_path);
        }
        $file_path = parse_url($img_url);
        if (isset($file_path['host']) && $_SERVER['HTTP_HOST'] != $file_path['host'] && $file_path['host'] != '') {  // The image is not locally hosted
            $remote_file_info = pathinfo($file_path['path']); // Can't use $img_url as the parameter because pathinfo includes the 'query' for the URL
            if (isset($remote_file_info['extension'])) {
                $remote_file_extension = $remote_file_info['extension'];
            } else {
                $remote_file_extension = 'jpg';
            }
            $remote_file_extension = strtolower($remote_file_extension); // Not doing this creates multiple copies of a remote image.
            $file_base = md5($img_url) . '.' . $remote_file_extension;
            // We will try to copy the file over locally. Otherwise WP's native image_resize() breaks down.
            $copy_to_file = $upload_dir['path'] . '/' . $file_base;
            if (!file_exists($copy_to_file)) {
                $unique_filename = wp_unique_filename($upload_dir['path'], $file_base);
                // Using the HTTP API instead of our own CURL calls...
                $remote_content = wp_remote_request($img_url, array('sslverify' => false)); // Setting the sslverify argument, to prevent errors on HTTPS calls. A user embedding images in a post knows where he is pulling them from
                if (is_wp_error($remote_content)) {
                    $copy_to_file = '';
                } else {
                    // Not using file open functions, so you have to find your way around by using wp_upload_bits...
                    wp_upload_bits($unique_filename, null, $remote_content['body']);
                    $copy_to_file = $upload_dir['path'] . '/' . $unique_filename;
                }
            }
            $file_path = $copy_to_file;
        } else {
            $expath = $file_path['path'];
            $string = $expath;
            $find = '/files/';
            $findit = strpos($string, $find);
            //echo "</br> Findit=>".$findit;
            if ($findit === false) {
                $file_path = portfolioline_upload_dir($file_path['path']) . $file_path['path'];
            } else {
                $expath = $file_path['path'];
                $nefilepath = explode("/files", $expath);
                $newpathdir = $nefilepath[1];
                $filepath1 = $newfile . $newpathdir;
                $file_path = $filepath1;   // add to mainpath in $file_path
            }
        }
        if (!file_exists($file_path)) {
            $resized_image = array(
                'url' => $img_url,
                'width' => $width,
                'height' => $height
            );
            return $resized_image;
        }
        $extension = '.jpg';
        $orig_size = @getimagesize($file_path);
        $source[0] = $img_url;
        $source[1] = $orig_size[0];
        $source[2] = $orig_size[1];
        $file_info = pathinfo($file_path);
        if (isset($file_info['extension'])) {
            $extension = '.' . $file_info['extension'];
            //Image quality is scaled down in case of PNGs, because PNG image creation uses a different scale for quality.
            if ($extension == '.png' && $quality != null) {
                $quality = floor(0.09 * $quality);
            }
        }
        $crop_str = $crop ? '-crop' : '-nocrop';
        $quality_str = $quality != null ? '-' . $quality : '';
        $cropped_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str . $extension;

        $suffix = md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str;
        //$img_path=str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
        // Checking if the file size is larger than the target size
        // If it is smaller or the same size, stop right here and return
        if ($source[1] > $width || $source[2] > $height) {
            // Source file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
            if (file_exists($cropped_img_path)) {
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $width,
                    'height' => $height
                );
                return $resized_image;
            }
            if ($crop == false) {
                // Calculate the size proportionally
                $proportional_size = wp_constrain_dimensions($source[1], $source[2], $width, $height);
                $resized_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str . $extension;
                $suffix = md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str;
                // Checking if the file already exists
                if (file_exists($resized_img_path)) {
                    $resized_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $resized_img_path);
                    $resized_image = array(
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    return $resized_image;
                }
            }
            $img = wp_get_image_editor($file_path);

            if (is_wp_error($img)) {
                $resized_image = array(
                    'url' => $source[0],
                    'width' => $source[1],
                    'height' => $source[2]
                );
            } else {
                $old_size = $img->get_size();
                $resize = $img->resize($width, $height, $crop);
                if ($resize !== FALSE) {
                    $new_size = $img->get_size();
                }
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $img->save($cropped_img_path);
                // resized output
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $new_size['width'],
                    'height' => $new_size['height']
                );
            }


            return $resized_image;

            // No cache files - let's finally resize it using WP's inbuilt resizer
            /*  $new_img_path = image_resize($file_path, $width, $height, $crop, $suffix, $upload_path, $quality);
              if (is_wp_error($new_img_path)) {
              // We hit some errors. Let's just return the original image
              $resized_image = array(
              'url' => $source[0],
              'width' => $source[1],
              'height' => $source[2]
              );
              } else {echo "real image";
              $new_img_size = getimagesize($new_img_path);
              $new_img = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $new_img_path);
              // resized output
              $resized_image = array(
              'url' => $new_img,
              'width' => $new_img_size[0],
              'height' => $new_img_size[1]
              );
              } */
        }
        // default output - without resizing
        $resized_image = array(
            'url' => $source[0],
            'width' => $source[1],
            'height' => $source[2]
        );
        return $resized_image;
    }

} //multisite ends


// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function portfoliolite_display_customizer_shortcut( $class_name ){
  if ( ! is_customize_preview() ) {
    return;
  }
  $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
  echo'<span class="portfoliolite-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}