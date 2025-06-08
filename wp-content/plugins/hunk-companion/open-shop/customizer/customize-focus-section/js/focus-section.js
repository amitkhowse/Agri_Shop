/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.openShop = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'open_shop_top_slider_section',
                'open_shop_category_tab_section',
                'open_shop_product_slide_section',
                'open_shop_cat_slide_section',
                'open_shop_product_slide_list',
                'open_shop_product_cat_list',
                'open_shop_brand',
                'open_shop_ribbon',
                'open_shop_banner',
                'open_shop_highlight',
                'open_shop_product_big_feature',
                'open_shop_1_custom_sec',
                'open_shop_2_custom_sec',
                'open_shop_3_custom_sec',
                'open_shop_4_custom_sec',
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'open-shop-customize-focus-section', element );
                });
            });
        }
    };
    $.openShop.init();
});