<?php
/*
 *  Testimonial widget
 *
 */
// register widget
add_action('widgets_init', 'portfolioline_testimonial_widget');
function portfolioline_testimonial_widget() {
    register_widget( 'portfolioline_testimonial' );
}
// add admin scripts
add_action('admin_enqueue_scripts', 'portfolioline_testimonial_enqueue');
function portfolioline_testimonial_enqueue() {
    wp_enqueue_media();
   
}
// portfolioline_testimonial widget class
class portfolioline_testimonial extends WP_Widget { 
    function  __construct() {
        $widget_ops = array('classname' => 'th-testimonial',
            'description' => 'Show your testimonial');
        parent::__construct('testimonial-widget', __('Portfoliolite : Testimonial Widget','portfolioline'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        $text = isset($instance['text'])?$instance['text']:'writing your description';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $companyname = isset($instance['companyname'])?$instance['companyname']:'';
        $authpic = isset($instance['authpic'])?$instance['authpic']:'';
?>
     <li><div class="image-test">
        <img src="<?php echo $authpic; ?>">
        </div>
        <div class="test-cont-heading"><h1><?php echo apply_filters('widget_title', $title ); ?></h1></div>
        <div class="test-cont"><a href="<?php echo $companyname; ?>"><p><?php echo $companyname; ?></p></a><p><?php echo $text; ?></p></div></li>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['authpic'] = $new_instance['authpic'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['companyname'] = $new_instance['companyname'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $authpic = strip_tags($instance['authpic']);
        $text = $instance['text'];
        $link = $instance['link'];
        $companyname = $instance['companyname'];
    } else {
        $title = '';
        $authpic = '';
        $text = '';
        $link = '';
        $companyname = '';
    }
    ?>
        <div class="clearfix"></div>
        <label for="<?php echo $this->get_field_id('authpic'); ?>"><?php _e('Author Image','portfolioline'); ?></label>
                <?php
            if ( isset($instance['authpic']) && $instance['authpic'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['authpic'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('authpic'); ?>" id="<?php echo $this->get_field_id('authpic'); ?>" value="<?php  echo $authpic; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('authpic'); ?>_button" name="<?php echo $this->get_field_name('authpic'); ?>" value="Upload Image" style="margin-top:5px;" />

        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Author Short bio','portfolioline'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
        
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author Name','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;">
        
        <label for="<?php echo $this->get_field_id('companyname'); ?>"><?php _e('Company Name','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('companyname'); ?>" id="<?php echo $this->get_field_id('companyname'); ?>" value="<?php  echo $companyname; ?>" style="margin-top:5px;">

        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Company Link','portfolioline'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
        <?php
    }
}
?>