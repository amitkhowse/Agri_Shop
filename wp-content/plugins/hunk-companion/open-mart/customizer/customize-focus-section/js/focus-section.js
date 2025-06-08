/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.openMart = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'open_mart_top_slider_section',
                'open_mart_category_tab_section',
                'open_mart_vt_category_tab_section',
                'open_mart_cat_slide_section',
                'open_mart_product_slide_list',
                'open_mart_product_cat_list',
                'open_mart_ribbon',
                'open_mart_banner',
                'open_mart_highlight', 
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'open-mart-customize-focus-section', element );
                });
            });
        }
    };
    $.openMart.init();
});