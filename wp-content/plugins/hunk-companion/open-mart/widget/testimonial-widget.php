<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 *  Testimonial widget
 *  
 *
 */
// add admin scripts
function open_mart_testimonial_widget_enqueue(){
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'open_mart_testimonial_widget_enqueue');
// register widget
function open_mart_testimonial_widget(){
register_widget( 'OpenMart_testimonial' );
}
add_action('widgets_init','open_mart_testimonial_widget');
class OpenMart_testimonial extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'th-testimonial',
            'description' => 'Displays Testimonial');
        parent::__construct('th-testimonial-widget', __('Open Mart : Testimonial Widget','open-mart'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        // widget content
        echo $before_widget;
        $widgettitle = isset($instance['widgettitle'])?$instance['widgettitle']:'';
        $title1 = isset($instance['title1'])?$instance['title1']:'';
        $title2 = isset($instance['title2'])?$instance['title2']:'';
        $title3 = isset($instance['title3'])?$instance['title3']:'';
        $text1 = isset($instance['text1'])?$instance['text1']:'';
        $text2 = isset($instance['text2'])?$instance['text2']:'';
        $text3 = isset($instance['text3'])?$instance['text3']:'';
        $author_img_uri1 = isset($instance['author_img_uri1'])?$instance['author_img_uri1']:'';
        $author_img_uri2 = isset($instance['author_img_uri2'])?$instance['author_img_uri2']:'';
        $author_img_uri3 = isset($instance['author_img_uri3'])?$instance['author_img_uri3']:'';
        
        ?>

            <div class="th-testimonial-container">
                <h4 class="widget-title">
                <?php echo esc_html($widgettitle); ?>
                </h4>
                <div id="<?php echo $widget_id; ?>" class="th-testimonial-wrapper owl-carousel">
                <?php if($author_img_uri1!=='' || $title1!=='' ){?>    
                <div class="th-testimonial-list">
                    <div class="th-testimonial-img">
                    <img src="<?php echo esc_url($author_img_uri1); ?>" />
                    </div>
                    <h4 class="th-testimonial-title">
                     <?php echo esc_html($title1); ?>
                    </h4>
                    <p class="th-testimonial-content">
                            <?php echo esc_html($text1); ?>
                    </p>
                </div>
              <?php } if($author_img_uri2!=='' || $title2!=='' ){?>
                <div class="th-testimonial-list">
                    <div class="th-testimonial-img">
                    <img src="<?php echo esc_url($author_img_uri2); ?>" />
                    </div>
                    <h4 class="th-testimonial-title">
                     <?php echo esc_html($title2); ?>
                    </h4>
                    <p class="th-testimonial-content">
                     <?php echo esc_html($text2); ?>
                    </p>
                </div>
            <?php } if($author_img_uri3!=='' || $title3!=='' ){?>
                <div class="th-testimonial-list">
                    <div class="th-testimonial-img">
                    <img src="<?php echo esc_url($author_img_uri3); ?>" />
                    </div>
                    <h4 class="th-testimonial-title">
                     <?php echo esc_html($title3); ?>
                    </h4>
                    <p class="th-testimonial-content">
                        <?php echo esc_html($text3); ?>
                    </p>
                </div>
            <?php }?>
            </div>
            </div>
<script>
 ///-----------------------///
// Testimonial script
///-----------------------///
jQuery(document).ready(function(){
var wdgetid = '<?php echo $widget_id; ?>'; 

jQuery('#'+wdgetid+'.owl-carousel').owlCarousel({  
    items:1,
    loop:true,
    nav: true,
    margin:0,
    autoplay:false,
    autoplaySpeed:500,
    autoplayTimeout:2000,
    smartSpeed:500,
    fluidSpeed:true,
    responsiveClass:true,
    dots: false,  
    navText: ["<i class='slick-nav fa fa-angle-left'></i>",
       "<i class='slick-nav fa fa-angle-right'></i>"],
  });
});
</script>
<?php
        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['widgettitle'] = $new_instance['widgettitle'];
        $instance['text1'] = $new_instance['text1'];
        $instance['title1'] = strip_tags( $new_instance['title1'] );
        $instance['author_img_uri1'] = strip_tags( $new_instance['author_img_uri1'] );
        $instance['text2'] = $new_instance['text2'];
        $instance['title2'] = strip_tags( $new_instance['title2'] );
        $instance['author_img_uri2'] = strip_tags( $new_instance['author_img_uri2'] );
        $instance['text3'] = $new_instance['text3'];
        $instance['title3'] = strip_tags( $new_instance['title3'] );
        $instance['author_img_uri3'] = strip_tags( $new_instance['author_img_uri3'] );
        
        return $instance;
    }

    function form($instance) {
    if( $instance) {
        $widgettitle = esc_attr($instance['widgettitle']);
        $title1 = esc_attr($instance['title1']);
        $text1 = esc_attr($instance['text1']);
        $author_img_uri1 = esc_attr($instance['author_img_uri1']);
        $title2 = esc_attr($instance['title2']);
        $text2 = esc_attr($instance['text2']);
        $author_img_uri2 = esc_attr($instance['author_img_uri2']);
        $title3 = esc_attr($instance['title3']);
        $text3 = esc_attr($instance['text3']);
        $author_img_uri3 = esc_attr($instance['author_img_uri3']);
        
        
    } else {
        $widgettitle = 'Testimonial';
        $title1 = '';
        $text1 = '';
        $author_img_uri1 = '';
        $title2 = '';
        $text2 = '';
        $author_img_uri2 = '';
        $title3 = '';
        $text3 = '';
        $author_img_uri3 = '';
        
    }


    ?>
<div class="clearfix"></div>
    <p> 
        <label for="<?php echo $this->get_field_id('widgettitle'); ?>"><?php _e('Widget Title','open-mart'); ?></label> 
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('widgettitle'); ?>" id="<?php echo $this->get_field_id('widgettitle'); ?>" value="<?php  echo $widgettitle; ?>" style="margin-top:5px;">
     </p>

    <p>
        <label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title','open-mart'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php  if(isset($instance["title1"])){ echo $instance['title1']; } ?>" style="margin-top:5px;">
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('author_img_uri1'); ?>"><?php _e('Image','open-mart'); ?></label>
        <?php
            if ( isset($instance['author_img_uri1']) && $instance['author_img_uri1'] != '' ) :
                echo '<img id="'.$this->get_field_id('author_img_uri1').'" class="custom_media_image" src="' . $instance['author_img_uri1'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('author_img_uri1'); ?>" id="<?php echo $this->get_field_id('author_img_uri1'); ?>" value="<?php if(isset($instance["author_img_uri1"])){ echo $instance['author_img_uri1']; } ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('author_img_uri1'); ?>" name="<?php echo $this->get_field_name('author_img_uri1'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Description','open-mart'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text1'); ?>" id="<?php echo $this->get_field_id('text1'); ?>"  class="widefat" >
        <?php if(isset($instance["text1"])){ echo $instance['text1']; } ?></textarea>
    </p>



    <p>
        <label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title','open-mart'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php  if(isset($instance["title2"])){ echo $instance['title2']; } ?>" style="margin-top:5px;">
    </p>
    
<p>
        <label for="<?php echo $this->get_field_id('author_img_uri2'); ?>"><?php _e('Image','open-mart'); ?></label>
        <?php
            if ( isset($instance['author_img_uri2']) && $instance['author_img_uri2'] != '' ) :
                echo '<img id="'.$this->get_field_id('author_img_uri2').'" class="custom_media_image" src="' . $instance['author_img_uri2'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('author_img_uri2'); ?>" id="<?php echo $this->get_field_id('author_img_uri2'); ?>" value="<?php if(isset($instance["author_img_uri2"])){ echo $instance['author_img_uri2']; } ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('author_img_uri2'); ?>" name="<?php echo $this->get_field_name('author_img_uri2'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Description','open-mart'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>"  class="widefat" >
        <?php if(isset($instance["text2"])){ echo $instance['text2']; } ?></textarea>
    </p>




    <p>
        <label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title','open-mart'); ?></label>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php  if(isset($instance["title3"])){ echo $instance['title3']; } ?>" style="margin-top:5px;">
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id('author_img_uri3'); ?>"><?php _e('Image','open-mart'); ?></label>
        <?php
            if ( isset($instance['author_img_uri3']) && $instance['author_img_uri3'] != '' ) :
                echo '<img id="'.$this->get_field_id('author_img_uri3').'" class="custom_media_image" src="' . $instance['author_img_uri3'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?>
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('author_img_uri3'); ?>" id="<?php echo $this->get_field_id('author_img_uri3'); ?>" value="<?php if(isset($instance["author_img_uri3"])){ echo $instance['author_img_uri3']; } ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="<?php echo $this->get_field_id('author_img_uri3'); ?>" name="<?php echo $this->get_field_name('author_img_uri3'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Description','open-mart'); ?></label>
        <textarea  name="<?php echo $this->get_field_name('text3'); ?>" id="<?php echo $this->get_field_id('text3'); ?>"  class="widefat" >
        <?php if(isset($instance["text3"])){ echo $instance['text3']; } ?></textarea>
    </p>
<?php
    }
}