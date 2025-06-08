/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.topStore = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'portfoliolite_top_slider_section',
                'sidebar-widgets-portfolio-service-widget',
                'portfoliolite_ribbon_section',
                'portfoliolite_portfolio_section',
                'sidebar-widgets-portfolio-team-widget',
                'sidebar-widgets-portfolio-testimonial-widget',
                'portfoliolite_woocommerce_section',
                'portfoliolite_news_section',
                'portfoliolite_blog_section',
                
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'portfoliolite-customize-focus-section', element );
                });
            });
        }
    };
    $.topStore.init();
});