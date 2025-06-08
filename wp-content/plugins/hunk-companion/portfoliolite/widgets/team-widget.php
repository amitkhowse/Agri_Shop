<?php
/*
 * Team widget
 */
// register widget
add_action('widgets_init', 'portfolioline_team_widget');
function portfolioline_team_widget() {
    register_widget( 'portfolioline_team' );
}
// add admin scripts
add_action('admin_enqueue_scripts', 'portfolioline_team_enqueue');
function portfolioline_team_enqueue() {
    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker' );        
    
}
// th_testimonial widget class
class portfolioline_team extends WP_Widget {   
    function  __construct() {
        $widget_ops = array('classname' => 'th-team',
            'description' => 'Show your team');
        parent::__construct('team-widget', __('Portfoliolite : Team Widget','portfolioline'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;    
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
        $deg = isset($instance['deg'])?$instance['deg']:'Designation';
        $fontaws1 = isset($instance['fontaws1'])?$instance['fontaws1']:'';
        $fontaws2 = isset($instance['fontaws2'])?$instance['fontaws2']:'';
        $fontaws3 = isset($instance['fontaws3'])?$instance['fontaws3']:'';
        $fontaws4 = isset($instance['fontaws4'])?$instance['fontaws4']:'';
        $fontaws1link = isset($instance['fontaws1link'])?$instance['fontaws1link']:'';
        $fontaws2link = isset($instance['fontaws2link'])?$instance['fontaws2link']:'';
        $fontaws3link = isset($instance['fontaws3link'])?$instance['fontaws3link']:'';
        $fontaws4link = isset($instance['fontaws4link'])?$instance['fontaws4link']:'';
        $color = isset($instance['color'])?$instance['color']:'';
        $font_color = isset($instance['font_color'])?$instance['font_color']:'';
?>
<li class="team-list">
  <figure class="team-efct"> 
  <?php  if($authpic!=''){
   $img_path = th_image_resize($authpic, 338, 338); ?>
   <img style="border: 10px solid <?php echo $color;?>;" src="<?php echo $img_path['url']; ?>"/>
  <?php } ?>
  
  <figcaption style="background-color:<?php echo $color;?>;">
    <a href="<?php echo $link;?>"><h3><?php echo $title; ?></span></h3></a>
    <p><?php echo $deg; ?></p>
    <div class="team-social-meta">
                  <ul>
                  <li class="team-social"><a href="<?php echo "$fontaws1link" ?>"><i class="<?php echo $fontaws1 ?>"></i></a></li>
                  <li class="team-social"><a href="<?php echo "$fontaws2link" ?>"><i class="<?php echo $fontaws2 ?>"></i></a></li>
                  <li class="team-social"><a href="<?php echo "$fontaws3link" ?>"><i class="<?php echo $fontaws3 ?>"></i></a></li>
                  <li class="team-social"><a href="<?php echo "$fontaws4link" ?>"><i class="<?php echo $fontaws4 ?>"></i></a></li>
                  </ul>
      </div>
  </figcaption>
  <a href="#"></a>
</figure>
</li>
<?php
    echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['authpic'] = $new_instance['authpic'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['deg'] = $new_instance['deg'];
        $instance['fontaws1'] = $new_instance['fontaws1'];
        $instance['fontaws2'] = $new_instance['fontaws2'];
        $instance['fontaws3'] = $new_instance['fontaws3'];
        $instance['fontaws4'] = $new_instance['fontaws4'];
        $instance['fontaws1link'] = $new_instance['fontaws1link'];
        $instance['fontaws2link'] = $new_instance['fontaws2link'];
        $instance['fontaws3link'] = $new_instance['fontaws3link'];
        $instance['fontaws4link'] = $new_instance['fontaws4link'];
        $instance['color'] = $new_instance['color'];
        $instance['bottom_color'] = $new_instance['bottom_color'];
        $instance['font_color'] = $new_instance['font_color'];

        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
        $deg = $instance['deg'];
        $fontaws1 = $instance['fontaws1'];
        $fontaws2 = $instance['fontaws2'];
        $fontaws3 = $instance['fontaws3'];
        $fontaws4 = $instance['fontaws4'];
        $fontaws1link = $instance['fontaws1link'];
        $fontaws2link = $instance['fontaws2link'];
        $fontaws3link = $instance['fontaws3link'];
        $fontaws4link = $instance['fontaws4link'];
        $color = $instance['color'];
        $bottom_color = $instance['bottom_color'];
        $font_color = $instance['font_color'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $deg = '';
        $fontaws1 = 'fa fa-facebook';
        $fontaws2 = 'fa fa-twitter';
        $fontaws3 = 'fa fa-linkedin';
        $fontaws4 = 'fa fa-youtube';
        $fontaws1link = '';
        $fontaws2link = '';
        $fontaws3link = '';
        $fontaws4link = '';
        $color = '';
        $bottom_color = '';
        $font_color = '';
    }

    ?>
<div class="clearfix"></div>
<p>        
<label for="<?php echo $this->get_field_id( 'color' ); ?>" style="display:block;"><?php _e( ' Background Color:','portfolioline' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" type="text" value="<?php echo esc_attr( $color ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'font_color' ); ?>" style="display:block;"><?php _e( ' Font Color:','portfolioline' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'font_color' ); ?>" name="<?php echo $this->get_field_name( 'font_color' ); ?>" type="text" value="<?php echo esc_attr( $font_color ); ?>" />
</p>

<p>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Member Image','portfolioline'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />
</p>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Member Name','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Designation','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('deg'); ?>" id="<?php echo $this->get_field_id('deg'); ?>" value="<?php  echo $deg; ?>">
</p>        


      <p>  <label for="<?php echo $this->get_field_id('fontaws1'); ?>"><?php _e('Social-Icon-1','portfolioline'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1'); ?>" id="<?php echo $this->get_field_id('fontaws1'); ?>" value="<?php  echo $fontaws1; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws1link'); ?>" id="<?php echo $this->get_field_id('fontaws1link'); ?>" value="<?php  echo $fontaws1link; ?>" placeholder="link"   style="margin-top:5px;"></p>


        <p><label for="<?php echo $this->get_field_id('fontaws2'); ?>"><?php _e('Social-Icon-2','portfolioline'); ?></label>


       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2'); ?>" id="<?php echo $this->get_field_id('fontaws2'); ?>" value="<?php  echo $fontaws2; ?>" style="margin-top:5px;">
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws2link'); ?>" id="<?php echo $this->get_field_id('fontaws2link'); ?>" value="<?php  echo $fontaws2link; ?>" placeholder="link"   style="margin-top:5px;"></p>
   <p> <label for="<?php echo $this->get_field_id('fontaws3'); ?>"><?php _e('Social-Icon-3','portfolioline'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3'); ?>" id="<?php echo $this->get_field_id('fontaws3'); ?>" value="<?php  echo $fontaws3; ?>" style="margin-top:5px;">
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws3link'); ?>" id="<?php echo $this->get_field_id('fontaws3link'); ?>" value="<?php  echo $fontaws3link; ?>" placeholder="link"   style="margin-top:5px;">
</p>
 <p> <label for="<?php echo $this->get_field_id('fontaws4'); ?>"><?php _e('Social-Icon-4','portfolioline'); ?></label>
       <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws4'); ?>" id="<?php echo $this->get_field_id('fontaws4'); ?>" value="<?php  echo $fontaws4; ?>" style="margin-top:5px;">
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws4link'); ?>" id="<?php echo $this->get_field_id('fontaws4link'); ?>" value="<?php  echo $fontaws4link; ?>" placeholder="link"   style="margin-top:5px;">
</p>
<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Author Link','portfolioline'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
</p>
<?php
    }
}