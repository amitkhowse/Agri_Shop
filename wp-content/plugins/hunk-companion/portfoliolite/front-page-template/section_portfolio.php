<?php
if(!portfoliolite_checkbox_filter('portfolio','section_on_off')) :
$heading = get_theme_mod('our_port_heading','');
$subheading = get_theme_mod('our_port_subheading','');
$perpage_post = get_theme_mod('our_port_default_images',8);
$layout = 'four-grid-zero-padding';
global $grid_layout;

?>
  <div id="portfolio-mywork-section" class="portfolio-mywork-section ">

    <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_portfolio_section' );?>
    <div class="profolio-page">
      <div class="container">
        <div class="portfolio-heading">
          <?php if($heading !=''){ ?>
          <h2 class="main-heading wow fadeInLeft" data-wow-delay="0.3s"><?php echo esc_html($heading) ;?></h2>
          <?php } else { ?>
          <h2 class="main-heading wow fadeInLeft" data-wow-delay="0.3s"><?php esc_html_e('Our Portfolio','portfolioline'); ?></h2>
          <?php } ?>
          <?php if($subheading !=''){?>
          <p class="sub-heading wow fadeInRight" data-wow-delay="0.3s"><?php echo esc_html($subheading);?></p>
          <?php } else { ?>
          <p class="sub-heading wow fadeInRight" data-wow-delay="0.3s"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit ','portfolioline'); ?></p>
          <?php } ?>
        </div>
        <div class=" thunk-wrapper">
         <?php  echo portfolioline_get_category_list($perpage_post); ?>
        <div class="portfolio-block <?php echo esc_attr($layout);?>">

          <ul class="portfolio-grid grid ">
            <?php
            $our_port_category = get_theme_mod('our_port_category',0);
            if(is_array($our_port_category)):
              foreach ($our_port_category as $key => $cat_slug){
                $loop = new WP_Query( array(
          'post_type' => 'portfolio',
          'tax_query' => array(
                array(
                  'taxonomy' => 'portfolio-cate',
                  'field'    => 'slug',
                  'terms'    =>  esc_attr($cat_slug),
                )),
          'posts_per_page' => $perpage_post,
          'paged'          => 1,
          'pagination'     => true,
          'meta_query'     => array(array( 'key' => '_thumbnail_id')),
          ));
          $total_post = $loop->found_posts; 
           if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
            echo '<li class="element-item post '.esc_attr($cat_slug).'" lfb-page = "2" totalpost = "'.esc_attr($total_post).'" data-category="transition" data-max-pages="'. esc_attr($loop->max_num_pages).'" >'?>
            <div class="portfolio-image">
                <figure class="protfolio-img-efc">
                  <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php portfoliolite_grid_thumb($grid_layout,true); ?>
                  </a>
                  <?php } ?>
                  <figcaption>
                  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                  <p><?php the_category(', '); ?></p>
                  </figcaption>
                </figure>
              </div>
            </li>
           <?php endwhile; }
        } endif;
         wp_reset_postdata(); ?>
         </ul>
        </div>
      </div>
        </div>
        <button class ="load-more lfb-load-more"><?php esc_html_e('Load More','portfolioline'); ?></button>
      </div>
    </div>
  </div>
  <?php endif; 