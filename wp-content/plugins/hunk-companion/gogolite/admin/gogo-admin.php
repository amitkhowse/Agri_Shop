<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function hunk_companion_team_content( $gogo_team_content_id,$default){
//passing the seeting ID and Default Values
$number_of_columns = get_theme_mod('gogo_team_columns', '4');
$i = 1;
	$gogo_team_content= get_theme_mod( $gogo_team_content_id, $default );

		if ( ! empty( $gogo_team_content ) ) :
			
			$gogo_team_content = json_decode( $gogo_team_content );

			if ( ! empty( $gogo_team_content ) ) {
				
				foreach ( $gogo_team_content as $team_item ) :
					$image = ! empty( $team_item->image_url ) ? apply_filters( 'gogo_translate_single_string', $team_item->image_url, 'Team section' ) : '';
					$title = ! empty( $team_item->title ) ? apply_filters( 'gogo_translate_single_string', $team_item->title, 'Team section' ) : '';
					$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'gogo_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
					$text = ! empty( $team_item->text ) ? apply_filters( 'gogo_translate_single_string', $team_item->text, 'Team section' ) : '';
					$link = ! empty( $team_item->link ) ? apply_filters( 'gogo_translate_single_string', $team_item->link, 'Team section' ) : '';
					?>
					<div class="thunk-team-post">
				<div class="thunk-team-img">
					<img src="<?php echo esc_url($image); ?>" />
				<div class="thunk-team-img-overlay">	
					<div class="thunk-team-description">
						<ul class="thunk-team-social">						
<?php 
if ( ! empty( $team_item->social_repeater ) ) :
$icons = html_entity_decode( $team_item->social_repeater );
$icons_decoded = json_decode( $icons, true );
if ( ! empty( $icons_decoded ) ) :
				foreach ($icons_decoded as $key => $value) {
				$social_icon = ! empty( $value['icon'] ) ? apply_filters( '
					gogo_translate_single_string', $value['icon'], 'Team section' ) : '';
					$social_link = ! empty( $value['link'] ) ? apply_filters( 'gogo_translate_single_string', $value['link'], 'Team section' ) : '';	
					if ( ! empty( $social_icon ) ) {
					?>
					<li><a href="<?php echo esc_url($social_link);?>" target="_blank">
						<i class="fa <?php echo esc_attr($social_icon);?>"></i></a></li>
						<?php
					}
						}
						endif;
						endif;
						?>
						</ul>
						<p>
							<?php echo esc_html($text); ?>					
						</p>
					</div> <!--......tthunk-team-description END.....-->
				</div> <!--.......thunk-team-img-overlay END......-->
				</div> <!--.......thunk-team-img END........-->	
				<a href="<?php echo esc_html($link); ?>" class="thunk-team-link">
				<div class="thunk-team-heading">
					<span class="thunk-team-name">
						<?php echo esc_html( $title); ?>
					</span>
					<span class="thunk-team-position">
						<?php echo esc_html($subtitle); ?>
					</span>
				</div><!--......thunk-team-heading END.......-->
			</a>
			</div><!--.......thunk-team-post1 END........-->
				<?php 
				$i++;
			endforeach;
				}
			endif;
} //hunk_companion_team_content END
//Big Image with Typewriter
function hunk_companion_backslider_image($gogo_backslider_image, $default){
//passing the seeting ID and Default Values	
	$gogo_backslider_image1 = get_theme_mod($gogo_backslider_image, $default );	
	if ( ! empty($gogo_backslider_image1 ) ) :
			$gogo_backslider_image2 = json_decode( $gogo_backslider_image1 );		
		if ( ! empty( $gogo_backslider_image2 ) ) {
				foreach ( $gogo_backslider_image2 as $background_item ) {					
			$image = ! empty( $background_item->image_url ) ? apply_filters( 'gogo_translate_single_string', $background_item->image_url, 'Slider section' ) : '';				
				?>				
			<div class="slide-item slide-item-img1" style="background-image: url(<?php echo esc_url($image); ?>);">	
			</div> <!--.......slide-item END..........-->			
			<?php	}			
		}
endif;
} //hunk_companion_backslider_image funtion End
function hunk_companion_ribbon_bg_video(){
 $video=get_theme_mod('gogo_ribbon_bg_video');
 $muted='';
if (get_theme_mod( 'gogo_slider_audio','1')=='1'){
	$muted='muted';
} 
if(get_theme_mod('gogo_big-image-background')=='video'){
if(hunk_companion_mobile_user_agent_switch()==false){?>
<video autoplay="autoplay" playsinline loop="loop" id="bgvid" <?php echo $muted;?>  poster="<?php echo esc_url(get_theme_mod( 'gogo_video_image_upload')); ?>" controls>
<source src="<?php echo esc_url($video); ?>" type="video/mp4" >
</video>

<?php } 
if(hunk_companion_mobile_user_agent_switch()==true){?>
	<video autoplay="autoplay" playsinline loop="loop" <?php echo esc_attr($muted);?> poster="<?php echo esc_url(get_theme_mod( 'gogo_video_image_upload')); ?>">
	<source src="<?php echo esc_url($video); ?>" type="video/mp4" >	
   </video>	
	<?php }
   }
}//hunk_companion_ribbon_bg_video END 
function hunk_companion_features_content( $gogo_features_content_id, $default ) {
//passing the seeting ID and Default Values
$number_of_columns = get_theme_mod('gogo_service_columns', '3');
$i = 1;	
$anchor_onclick = true;
	$gogo_features_content= get_theme_mod( $gogo_features_content_id, $default );
		if ( ! empty( $gogo_features_content ) ) :
			$gogo_features_content = json_decode( $gogo_features_content );
			if ( ! empty( $gogo_features_content ) ) {
				foreach ( $gogo_features_content as $features_item ) :
					$icon   = ! empty( $features_item->icon_value ) ? apply_filters( 'gogo_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
					$title  = ! empty( $features_item->title ) ? apply_filters( 'gogo_translate_single_string', $features_item->title, 'Features section' ) : '';
					$text   = ! empty( $features_item->text ) ? apply_filters( 'gogo_translate_single_string', $features_item->text, 'Features section' ) : '';
					$link   = ! empty( $features_item->link ) ? apply_filters( 'gogo_translate_single_string', $features_item->link, 'Features section' ) : '';
					$color  = ! empty( $features_item->color ) ? $features_item->color : '';
					?>

	<div class="service-holder">
		<div class="service-img">
			<i class="fa <?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($color); ?> ;"></i>
		</div>
		<div class="service-txt">
			<?php if ($link == '') {
					$anchor_onclick = false;
				} 
				else{
					$anchor_onclick = true;
				}
				?>
			<a href="<?php echo esc_url($link); ?>" onclick="return <?php echo esc_js(json_encode($anchor_onclick)); ?>">
				<h4><?php echo esc_html($title); ?></h4></a>
					<p><?php echo esc_html($text); ?></p>
		</div><!--....service-txt END.........-->
	</div><!--....service-holder END.........-->	
				<?php	
				$i++;
				endforeach;			
			}// End if().
		
	endif;	
}
//hunk_companion_features_content END 
function hunk_companion_pricing_content( $gogo_pricing_content_id, $default ) {
//passing the seeting ID and Default Values
$number_of_columns = get_theme_mod('gogo_pricing_columns', '3');
$i = 1;
$pricing_popular ='';
	$gogo_pricing_content= get_theme_mod( $gogo_pricing_content_id, $default );
	if ( ! empty( $gogo_pricing_content ) ) :
		$gogo_pricing_content = json_decode( $gogo_pricing_content );

		if ( ! empty( $gogo_pricing_content ) ) {
			foreach ( $gogo_pricing_content as $pricing_item ) :
	
				$title    = ! empty( $pricing_item->title ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->title, 'Pricing section' ) : '';

				$price    = ! empty( $pricing_item->price ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->price, 'Pricing section' ) : '';
						
				$subtitle = ! empty( $pricing_item->subtitle ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->subtitle, 'Pricing section' ) : '';
						
				$text     = ! empty( $pricing_item->text ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->text, 'Pricing section' ) : '';
						
				$link     = ! empty( $pricing_item->link ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->link, 'Pricing section' ) : '';
				$text2     = ! empty( $pricing_item->text2 ) ? apply_filters( 'gogo_translate_single_string', $pricing_item->text2, 'Pricing section' ) : '';
				?>
				 <div class="pricing-post <?php
					if ($i == get_theme_mod('gogo_pricing_popular', '3') ) {
						echo esc_attr('popular-pricing-post');		
					}?> 
				"> <div class="pricing-inner">
						<h4 class="pricing-post-heading"><?php echo html_entity_decode($title);?></h4>
				<div class="pricing-deatails">
						<h3><?php echo esc_html($price); ?></h3>
						<h4><?php echo esc_html($subtitle); ?></h4>
						<p><?php echo html_entity_decode($text);?></p>
						<a href="<?php echo esc_url($link); ?>" class="type-button"><?php echo esc_html($text2); ?>
						<div class="type-button-overlay"></div>
						</a>
				</div> <!--........pricing-deatails END........-->
				<?php
					if ($i == get_theme_mod('gogo_pricing_popular', '3') ) {?>
				<div class="pricing-post-ribbon">
					<span>
					<?php esc_html_e('POPULAR','hunk-companion'); ?>
					</span>
				</div>
				<?php }?>
			</div>
			</div> <!--........pricing-post END........-->
            <?php
            $i++;
			endforeach;
		}
	endif;
}
//hunk_companion_pricing_content END 
function hunk_companion_testimonials_content( $gogo_testimonials_content_id, $default ) {
//passing the seeting ID and Default Values
	$gogo_testimonials_content= get_theme_mod( $gogo_testimonials_content_id, $default );
	if ( ! empty( $gogo_testimonials_content ) ) :
		$gogo_testimonials_content = json_decode( $gogo_testimonials_content );
		if ( ! empty( $gogo_testimonials_content ) ) {

			foreach ( $gogo_testimonials_content as $testimonials_item ) :

				$image    = ! empty( $testimonials_item->image_url ) ? apply_filters( 'gogo_translate_single_string', $testimonials_item->image_url, 'Testimonials section' ) : '';
						
				$title    = ! empty( $testimonials_item->title ) ? apply_filters( 'gogo_translate_single_string', $testimonials_item->title, 'Testimonials section' ) : '';
						
				$subtitle = ! empty( $testimonials_item->subtitle ) ? apply_filters( 'gogo_translate_single_string', $testimonials_item->subtitle, 'Testimonials section' ) : '';
						
				$text     = ! empty( $testimonials_item->text ) ? apply_filters( 'gogo_translate_single_string', $testimonials_item->text, 'Testimonials section' ) : '';
						
				// $link     = ! empty( $testimonials_item->link ) ? apply_filters( 'gogo_translate_single_string', $testimonials_item->link, 'Testimonials section' ) : '';
				?>
				 <div class="item testimonial-item">
             <div class="testimonial-post">
             	<div class="testimonial-author">
             		<div class="testimonial-author-image">
             			<img src="<?php echo esc_url($image); ?>">
             		</div>
             		<div class="testimonial-author-vcard">
             			<h3 class="testimonial-name"><?php echo esc_html($title); ?>
             			</h3>
             			<h5 class="testimonial-position"><?php echo esc_html($subtitle); ?></h5>
             		</div><!--.........testimonial-author-vcard end......-->
             	</div><!--........testimonial-author.........-->
             		<div class="tetsimonial-content">
             		<p><?php echo esc_html($text); ?></p>
             	</div>
             </div><!--..........testimonial-post END............-->
            </div><!--..........item END............-->

            <?php
			endforeach;
		}// End if().
	endif;
} 
function hunk_companion_clients_content( $gogo_clients_content_id, $default ) {
//passing the seeting ID and Default Values
$i =1;
	$gogo_clients_content= get_theme_mod( $gogo_clients_content_id, $default );

	if ( ! empty( $gogo_clients_content ) ) :

		$gogo_clients_content = json_decode( $gogo_clients_content );
		if ( ! empty( $gogo_clients_content ) ) {

			foreach ( $gogo_clients_content as $clients_item ) :
				$image    = ! empty( $clients_item->image_url ) ? apply_filters( 'gogo_translate_single_string', $clients_item->image_url, 'Clients section' ) : '';

				$link     = ! empty( $clients_item->link ) ? apply_filters( 'gogo_translate_single_string', $clients_item->link, 'Clients section' ) : '';
				?>
				<?php  
				if ($i%6 == 1) {
					echo '<div class="item client-item">';
				}
				?>
				<div class="clients">
						<a href="<?php echo esc_url($link); ?> " class="clients-cursor">
						<img src="<?php echo esc_url($image); ?>">
						</a>
				</div><!-- .......... Clients End.......... -->
					<?php
					if ($i%6 == 0) {
					echo '</div>';
				}
					$i++;
			endforeach;
		}
	endif;
}
//Portfolio Category Filter Function
function hunk_companion_get_category_list($perpage = 6){ 
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
	if (in_array($cat->slug, $select_cat)){
        $categlist .= '<button class="button th-portfolio-cat" data-filter=".' . esc_attr($cat->slug) . '" post_count="'.esc_attr($cat->count).'">' . esc_attr($cat->name) . '</button>'; 
	}
    $i++;
} 
 $return = '<div class="filters-button-group button-group js-radio-button-group" plcatlist="'.esc_attr($i).'" pfl_perpage = "'.esc_attr($perpage).'" >';
 $return .= $categlist;
 $return .= '</div>';
 return $return;
}
add_action('wp_ajax_nopriv_hunk_companion_portfolio_ajax', 'hunk_companion_portfolio_ajax'); // load more
add_action('wp_ajax_hunk_companion_portfolio_ajax', 'hunk_companion_portfolio_ajax');

function hunk_companion_social_content( $gogo_social_content_id, $default ) {
//passing the seeting ID and Default Values
		
	$gogo_social_content= get_theme_mod( $gogo_social_content_id, $default );
		if ( ! empty( $gogo_social_content ) ) :

		$gogo_social_content = json_decode( $gogo_social_content );
			if ( ! empty( $gogo_social_content ) ) {

				foreach ( $gogo_social_content as $social_item ) :
				
				$icon   = ! empty( $social_item->icon_value ) ? apply_filters( 'gogo_translate_single_string', $social_item->icon_value, 'Social section' ) : '';

				$color  = ! empty( $social_item->color ) ? $social_item->color : '';

				$link     = ! empty( $social_item->link ) ? apply_filters( 'gogo_translate_single_string', $social_item->link, 'Social section' ) : '';
				?>
				<div class="thunk-social-box">
					<a href="<?php echo esc_url($link);  ?>" target="_blank">
      				<i class="fa <?php echo esc_attr($icon); ?> " style="color: <?php echo esc_attr($color);  ?> ;border-color:<?php echo esc_attr($color);  ?>; "></i>
     			</a>
     			</div>
					<?php			
			endforeach;
			}

		endif;
}
//Section Ordering
    function hunk_companion_vertical_navigation(){ ?>
    <ul class="vertical-pagi-list">
      <?php
            
            $first   = get_theme_mod('gogo_slider_id','slider');

            $second  = get_theme_mod('gogo_introduction_id','about_us');

            $third   = get_theme_mod('gogo_blog_id','blog');

            $fourth  = get_theme_mod('gogo_service_id','service');

            $eight   = get_theme_mod('gogo_ct_id','clients');

            $eleventh = get_theme_mod('gogo_contact_id','contact');

            $thirthteenth = get_theme_mod('gogo_team_id','team');

            $sixteenth = get_theme_mod('gogo_woocommerce_id','woocommerce');

            $seventeenth = get_theme_mod('gogo_call_to_id','callto');

                $filter_section = array(
    "section_slider-typewriter" =>$first,
    "section_service" => $fourth,
    "section_first"   => $second,
    "section_woocommerce" => $sixteenth,
    "section_thunk-call-to" => $seventeenth,
    "section_team" => $thirthteenth,
    "section_clients-and-testimonials" => $eight,
    "section_blog"    => $third,
    "section_contact-us" => $eleventh
);

               $section = array(
    "section_slider-typewriter",
    "section_service",
    "section_first",
    "section_woocommerce",
    "section_thunk-call-to",
    "section_team",
    "section_clients-and-testimonials",
    "section_blog",
    "section_contact-us"
     
);
            $i = 1;
            $section_number_show = 0;
        foreach($section as $key => $value):
          // echo  $section[$value];
       ?>
    <?php   switch ($value) {
 	case 'section_slider-typewriter':
 if (get_theme_mod( 'gogo_backslider_hide') == '') {
 		 ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-typewriter">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;

 	case 'section_first':
 if (get_theme_mod( 'gogo_introduction_hide') == '') { 
 	$section_number_show++;
 	global $intro;
 	$intro = $section_number_show;  ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-first">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;
 	
 	case 'section_blog':
 if (get_theme_mod( 'gogo_blog_hide') == '') { 
 	$section_number_show++;
 	global $blog;
 	 $blog = $section_number_show;    ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-blog">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;
 		
	case 'section_service':
 if (get_theme_mod( 'gogo_service_hide') == '') { 
 	$section_number_show++;
 	global $service;
 	$service = $section_number_show;    ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-service">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php $i++;	}
 		break;

 	case 'section_clients-and-testimonials':
 if (get_theme_mod( 'gogo_ct_hide') == '') { 
 	$section_number_show++;
 	global $ct;
 	$ct = $section_number_show; ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-ct">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]);?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;

 	case 'section_contact-us':
 if (get_theme_mod( 'gogo_contact_hide') == '') { 
 	$section_number_show++;
 	global $contact;
 	$contact = $section_number_show; ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-contact-us">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;

 	case 'section_team':
 if (get_theme_mod( 'gogo_team_hide') == '') { 
 	$section_number_show++;
 	global $team;
 	$team = $section_number_show; ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-team">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]) ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;

 	case 'section_woocommerce':
 if (get_theme_mod( 'gogo_woocommerce_hide','1') == '') { 
 	$section_number_show++;
 	global $gogo_woocommerce;
 	$gogo_woocommerce = $section_number_show;   ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-woocommerce">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;

 	case 'section_thunk-call-to':
 if (get_theme_mod( 'gogo_call_to_hide') == '') { 
 	     ?>
 		<li>
          <a href="#<?php echo esc_attr($filter_section[$value]);?>" data-number="<?php echo esc_attr($i); ?>" class="vn-call-to">
              <span class="cd-dot"></span>
              <span class="cd-label">
              	<?php echo esc_html($filter_section[$value]); ?>
              	</span>
          </a>
      </li>	
 	<?php	$i++; }
 		break;
 } ?>
     <?php   
       endforeach;
        ?>
    </ul>
 <?php }