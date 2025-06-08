<?php
/*
 *  Multi-Service Widget
 *
 */

// register widget
add_action('widgets_init', 'portfolioline_services_column_widget');
function portfolioline_services_column_widget() {
    register_widget( 'portfolioline_services_column' );
}

// portfolioline_services_column widget class
class Portfolioline_services_column extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'portfolioline-services-column',
            'description' => 'Show your services provided');
        parent::__construct('portfolioline-services-column-widget', __('Portfoliolite : Service Widget','portfolioline'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;

        $text = isset($instance['text'])?$instance['text']:'writing your description';
        $link = isset($instance['link'])?$instance['link']:'http://';
        $title = isset($instance['title'])?$instance['title']:'New Title';
        $fontaws = isset($instance['fontaws'])?$instance['fontaws']:'fa fa-taxi';
        $icon_clr = isset($instance['icon_clr'])?$instance['icon_clr']:'#111';
        $title_clr = isset($instance['title_clr'])?$instance['title_clr']:'#111';
        $text_clr = isset($instance['text_clr'])?$instance['text_clr']:'#666';
        $hovr_clr = isset($instance['hovr_clr'])?$instance['hovr_clr']:'#666';
        $choose = isset($instance['choose'])?$instance['choose']:'icon';
        $service_img = isset($instance['service_img'])?$instance['service_img']:'';
?>
<style>
    .thunk-service-icon i{ color:<?php echo $icon_clr;?>;}
    .thunk-service-icon i:hover{ color:<?php echo $hovr_clr;?>;}
</style>
            <div class="thunk-service-post">
            <div class="thunk-service-icon">
                <?php if($choose=='icon') { ?>
                <i  class="<?php echo esc_attr($fontaws); ?>"></i>
                <?php } ?>
            <?php
                    if($choose=='image'){
                    if($service_img!=''){
                        ?>
                        <img src="<?php echo esc_url($service_img); ?>"/>
                    <?php } } ?>
            </div>
            <?php 
            $anchor_onclick = true;
            if ($link == '') {
                    $anchor_onclick = false;
                } 
                else{
                    $anchor_onclick = true;
                }
                ?>
                <a href="<?php echo esc_url($link); ?>" onclick="return <?php echo esc_js(json_encode($anchor_onclick)); ?>" style="color:<?php echo $title_clr;?>">
                    <h2 class="thunk-service-title" style="color:<?php echo esc_attr($title_clr);?>">
                       <?php echo apply_filters('widget_title', $title ); ?>
                    </h2> 
                </a>
                    <p class="thunk-service-description" style="color:<?php echo esc_attr($text_clr);?>">
                        <?php echo esc_html($text); ?>
                    </p>
        </div> <!-- thunk-service-post End -->  

<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fontaws'] = $new_instance['fontaws'];
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['icon_clr'] = $new_instance['icon_clr'];
        $instance['title_clr'] = $new_instance['title_clr'];
        $instance['text_clr'] = $new_instance['text_clr'];
        $instance['hovr_clr'] = $new_instance['hovr_clr'];
        $instance['choose'] = $new_instance['choose'];
        $instance['service_img'] = $new_instance['service_img'];
        return $instance;
    }

    function form($instance) {
         if( $instance) {
        $title = esc_attr($instance['title']);
        $fontaws = esc_attr($instance['fontaws']);
        $text = $instance['text'];
        $link = $instance['link'];
        $icon_clr = $instance['icon_clr'];
        $title_clr = $instance['title_clr'];
        $text_clr = $instance['text_clr'];
        $hovr_clr = $instance['hovr_clr'];
        $choose = $instance['choose'];
        $service_img = $instance['service_img'];


    } else {
        $title = '';
        $fontaws = 'fa fa-taxi';
        $text = '';
        $link = 'http://';
        $icon_clr = '#111';
        $title_clr = '#111';
        $text_clr = '#666';
        $hovr_clr ='#666';
        $choose = 'icon';
        $service_img = '';
    }
    ?>
        <div class="clearfix"></div>
      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php  echo $title; ?>" style="margin-top:5px;">
     </p>
     <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description','portfolioline'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"  class="widefat" ><?php echo $text; ?></textarea>
     </p>
     <p>
        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','portfolioline'); ?> ex: http://www.abc.com</label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php  echo $link; ?>" style="margin-top:5px;">
    </p>
        <p><label for="<?php echo $this->get_field_id('choose'); ?>"><?php _e('Choose Option','portfolioline'); ?></label><br/>
       <input <?php if($choose=='icon'){ ?>checked <?php } ?> style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('choose'); ?>"  value="icon" <?php checked( $choose, 'icon' ); ?> >Icon
       <input style="margin-right:5px;margin-left:5px;" type="radio" id="role_info" class="widefat" name="<?php echo $this->get_field_name('choose'); ?>"  value="image" <?php checked( $choose, 'image' ); ?> >image
       </p>
          <p><label for="<?php echo $this->get_field_id('service_img'); ?>"><?php _e('Image','portfolioline'); ?></label>
                <?php
            if ( isset($instance['service_img']) && $instance['service_img'] != '' ) :
                echo '<img class="'.$this->get_field_id('service_img').'" src="' . $instance['service_img'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('service_img'); ?>" id="<?php echo $this->get_field_id('service_img'); ?>" value="<?php  echo $service_img; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('service_img'); ?>_button" name="<?php echo $this->get_field_name('service_img'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p> 
         <p>
        <label for="<?php echo $this->get_field_id('fontaws'); ?>"><?php _e('Font Awesome Icon','portfolioline'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('fontaws'); ?>" id="<?php echo $this->get_field_id('fontaws'); ?>" value="<?php  echo $fontaws; ?>" style="margin-top:5px;">
         </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'icon_clr' ); ?>" style="display:block;"><?php _e( 'Icon Color','portfolioline' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_clr' ); ?>" name="<?php echo $this->get_field_name( 'icon_clr' ); ?>" type="text" value="<?php echo esc_attr( $icon_clr ); ?>" />
  </p>
  <p>
       <label for="<?php echo $this->get_field_id( 'hovr_clr' ); ?>" style="display:block;"><?php _e( 'Icon Hover Color','portfolioline' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'hovr_clr' ); ?>" name="<?php echo $this->get_field_name( 'hovr_clr' ); ?>" type="text" value="<?php echo esc_attr( $hovr_clr); ?>" />
  </p>
  <p>
     <label for="<?php echo $this->get_field_id( 'title_clr' ); ?>" style="display:block;"><?php _e( 'Title Text Color','portfolioline' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_clr' ); ?>" name="<?php echo $this->get_field_name( 'title_clr' ); ?>" type="text" value="<?php echo esc_attr( $title_clr ); ?>" />
  </p>
  <p>
     <label for="<?php echo $this->get_field_id( 'text_clr' ); ?>" style="display:block;"><?php _e( 'Description Text Color','portfolioline' ); ?></label> 
      <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'text_clr' ); ?>" name="<?php echo $this->get_field_name( 'text_clr' ); ?>" type="text" value="<?php echo esc_attr( $text_clr ); ?>" />
  </p>
        
        

        <?php
    }
}