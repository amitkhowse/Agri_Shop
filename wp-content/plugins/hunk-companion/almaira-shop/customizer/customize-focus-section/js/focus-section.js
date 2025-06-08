/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.almairaShop = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'almaira_shop_slider_section',
                'almaira_shop_product_section',
                'almaira_shop_ribbon_section',
                'almaira_shop_category_section',
                'almaira_shop_sortby_section',
                'almaira_shop_instafeed_section', 
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'almaira-shop-customize-focus-section', element );
                });
            });
        }
    };
    $.almairaShop.init();
});