jQuery(document).ready(function(){
wp.customize.bind( 'ready', function() {
  wp.customize.previewer.bind( 'open-shop-customize-focus-section', function (data1) {
     wp.customize.section(data1).focus();
  } );
} );
});