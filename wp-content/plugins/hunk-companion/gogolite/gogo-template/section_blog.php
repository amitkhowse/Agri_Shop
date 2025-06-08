<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_blog_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
$if_slidercheck = get_theme_mod('gogo_blog_slider','');
if ($if_slidercheck ) {
	$if_slidercheck = 'owl-carousel';
	
}
else{
	 $if_slidercheck = 'no-slider';
}
global $blog;
?>
<section id="<?php  echo esc_attr(get_theme_mod('gogo_blog_id','blog')); ?>" class="thunk-blog cd-section">
	<div class="container">
		<div class="thunk-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$blog); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s">
									<?php 
				if( get_theme_mod( 'gogo_blog_name') != ""){
	 			echo esc_html(get_theme_mod( 'gogo_blog_name',''));
				}
				else{
				esc_html_e('Our Blog','hunk-companion');		
				}
				?>				
				</span>
							</div>	
						</div><!--........index-wrapper END.......-->
						</div><!--....thunk-inner-col END.........-->
			</div><!--....col-1 END.........-->
			<div class="thunk-col-2-1">
				<div class="thunk-inner-col">
					<h2 class="short-heading wow thunk-fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_blog_heading','') != ""){
	 	echo esc_html(get_theme_mod( 'gogo_blog_heading',''));
	}
	else{
		esc_html_e('Lets have a look on Modern Technology ','hunk-companion');	
	}
	?>
	</h2>
			<span class="item-divider"></span>
			<div class="thunk-post-wrapper thunk-three <?php echo esc_attr($if_slidercheck); ?> wow thunk-fadeInRight" data-wow-duration="2.5s">
						<?php 
        $count_post = get_theme_mod('gogo_slider_count','6');
        $cat =  get_theme_mod('gogo_blog_cate');
		$loop = new WP_Query(array(
			'posts_per_page' => $count_post,
			'cat' => $cat,
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
	));	
		if ($loop->have_posts()) :
   			while ($loop->have_posts()) :
      			$loop->the_post();
         		 ?>
   			<div class="post">
   				<?php if(get_theme_mod('gogo_blog_image_hide')!==true){?>
				<div class="post-image"><?php
          if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){ ?>
    <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?></a>
    <?php  } ?></div>

       <?php } ?>
					<div class="post-content">
				<div class="post-meta">
				<?php gogo_blog_get_post_meta();?>
							</div><!--........post-meta END........-->
							<div class="post-title">
						<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							</div><!-- ........post-title END........ -->
								<div class="description"><?php hunk_companion_section_the_excerpt(); ?></div>
						</div><!--........post-content END........-->
					</div><!--............post END.......-->

   		<?php	endwhile;
		endif;
		/* Restore original Post Data */
	wp_reset_postdata();
		?> 
				</div><!--..............thunk-post-wrapper END.........-->
				</div><!--................thunk-inner-col END............-->
			</div><!--............thunk-col-2-1 END........-->
			</div><!--....thunk-content-area END.........-->
	</div><!--....container END.........-->
</section>
<?php }  
