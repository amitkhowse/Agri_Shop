<?php
/*
 *  Social-Icon widget
 *
 */
// register widget
add_action('widgets_init', 'portfolioline_social_widget');
function portfolioline_social_widget() {
    register_widget( 'portfolioline_social' );
}
// add admin scripts
add_action('admin_enqueue_scripts', 'portfolioline_social_enqueue');
function portfolioline_social_enqueue() {
    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker' ); 
   
}
// th_social widget class
class portfolioline_social extends WP_Widget {
    function  __construct() {
        $widget_ops = array('classname' => 'th-social',
            'description' => 'Add social-icon');
        parent::__construct('social-widget', __('Portfolioline : Social-Icon Widget','portfolioline'), $widget_ops);
    }
    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $link = isset($instance['link'])?$instance['link']:'http://';
        $icon = isset($instance['icon'])?$instance['icon']:'';
        $clr = isset($instance['clr'])?$instance['clr']:'#999';
?>
      <li class="social-icon"><a href="<?php echo $link;?>"><i style="color:<?php echo$clr;?>" class="<?php echo $icon; ?>" aria-hidden="true"></i></a></li>
<?php
        echo $after_widget;

    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['icon'] = strip_tags( $new_instance['icon'] );
        $instance['link'] = $new_instance['link'];
        $instance['clr'] = $new_instance['clr'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $icon = esc_attr($instance['icon']);
        $link = $instance['link'];
        $clr = $instance['clr'];
    } else {
        $icon = 'fa fa-facebook';
        $link = 'http://';
        $clr = '#999';

    }
    ?>
        <div class="clearfix"></div>
        <p>        
    <label for="<?php echo $this->get_field_id( 'clr' ); ?>" style="display:block;"><?php _e( 'Icon Color:','portfolioline' ); ?></label> 
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'clr' ); ?>" name="<?php echo $this->get_field_name( 'clr' ); ?>" type="text" value="<?php echo esc_attr( $clr ); ?>" />

</p>
        <label for="<?php echo $this->get_field_id('$icon'); ?>"><?php _e('Font Awesome Icon','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('icon'); ?>" id="<?php echo $this->get_field_id('icon'); ?>" value="<?php  echo $icon; ?>" style="margin-top:5px;">
        
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">

        
        <?php
    }
}