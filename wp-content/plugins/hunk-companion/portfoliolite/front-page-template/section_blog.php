<?php
if(!portfoliolite_checkbox_filter('blog','section_on_off')) :
?>

<section id="latest-post">
     <?php portfoliolite_display_customizer_shortcut( 'portfoliolite_blog_section' );?>
    <div class="container">
      <div class="page-post">
        <?php if(get_theme_mod( 'blog_head_')!=''){?>
        <h2 class="main-heading wow fadeInRight" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'blog_head_')); ?></h2>
        <?php } else { ?>
        <h2 class="main-heading wow fadeInRight" data-wow-delay="0.3s"><?php esc_html_e('Latest Post','portfolioline'); ?></h2>
        <?php } ?>
        <?php if(get_theme_mod( 'blog_desc_')!=''){?>
        <p class="sub-heading wow fadeInLeft" data-wow-delay="0.3s"><?php echo esc_html(get_theme_mod( 'blog_desc_')); ?></p>
        <?php } else { ?>
        <p class="sub-heading wow fadeInLeft" data-wow-delay="0.3s"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit ','portfolioline'); ?></p>
        <?php } ?>
        <div class="post-block thunk-wrapper">
          <ul class="post-grid wow fadeInLeft">
              <?php 
               $query = new WP_Query(
               array(
               'posts_per_page' => esc_attr(get_theme_mod('slider_count',4)),
               'cat' => esc_attr(get_theme_mod('slider_cate')),
               'order' => 'DESC'
                   )
               );
              if( $query->have_posts()):
                /* Start the Loop */
                while ($query->have_posts()) : $query->the_post();?>
                     <li class="post-list">
              <figure class="blog-efct ">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {?>
                <div class="image"><?php the_post_thumbnail('post_thumbnail_loop'); ?>
                  <div class="icons"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><i><?php esc_html_e('READ MORE','portfolioline');?></i></a></div>
                </div>
                   <?php } ?>
                <figcaption>
                <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
                
                </figcaption><a href="#"></a>
              </figure>
            </li>
            <?php 
            endwhile;
            else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
              
            <?php endif;?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>