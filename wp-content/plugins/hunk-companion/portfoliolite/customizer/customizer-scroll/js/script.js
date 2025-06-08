/**
 * Script for the customizer auto scrolling.
 *
 * Sends the section name to the preview.
 *

 * @package Portfolioline
 *
 * @author   ThemeHunk
 */

/* global wp */
jQuery(document).ready(function() {
var thunk_customize_scroller = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;
				
				$('ul[id*="portfoliolite-panel-frontpage"] .accordion-section').each(
					function (){
						
						$( this ).on(
							'click', function(){
								var section = $( this ).attr( 'aria-owns' );
								customize.previewer.send( 'clicked-customizer', section );
							}
						);
					}
				);
		}
	);
};
thunk_customize_scroller( jQuery );
//Disable select option
jQuery('#_customize-input-dynamic_grid option[value="two-grid"],#_customize-input-dynamic_grid option[value="standard-layout"],#_customize-input-dynamic_grid option[value="four-grid"],#_customize-input-dynamic_grid option[value="three-grid-zero-padding"],#_customize-input-dynamic_grid option[value="three-Masnory"],#_customize-input-dynamic_grid option[value="four-Masnory"]').attr("disabled", true);
});
