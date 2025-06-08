<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function portfoliolite_plug_widgets_init() {
register_sidebar(array(
'name' => __('Testimonial', 'portfolioline'),
'id' => 'portfolio-testimonial-widget',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
register_sidebar(array(
'name' => __('Team', 'portfolioline'),
'id' => 'portfolio-team-widget',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));

register_sidebar(array(
'name' => __('Service', 'portfolioline'),
'id' => 'portfolio-service-widget',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
}
add_action('widgets_init', 'portfoliolite_plug_widgets_init');