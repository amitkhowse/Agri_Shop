/**
 * Script fort the customizer sections scroll function.
 *
 * @since    1.1.43
 * @package Portfolioline
 *
 * @author  ThemeHunk
 */
/* global wp */
jQuery(document).ready(function() {
var thunk_customizer_section_scroll = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;

				customize.preview.bind('clicked-customizer', function( data ) {

						var sectionClass = '';
						   switch (data) {
							case'sub-accordion-section-portfoliolite_top_slider_section':
							sectionClass = 'div.slider-top';
							break;
							case'sub-accordion-section-portfoliolite_portfolio_section':
							sectionClass = 'div.portfolio-mywork-section';
							break;
							case'sub-accordion-section-sidebar-widgets-portfolio-service-widget':
							sectionClass = 'section.thunk-service';
							break;
							case'sub-accordion-section-portfoliolite_news_section':
							sectionClass = 'section#new-letter';
							break;
							case'sub-accordion-section-sidebar-widgets-portfolio-team-widget':
							sectionClass = 'section#team-info';
							break;
							case'sub-accordion-section-sidebar-widgets-portfolio-testimonial-widget':
							sectionClass = 'section#testimonials';
							break;
							case'sub-accordion-section-portfoliolite_woocommerce_section':
							sectionClass = 'section#th-woocommerce';
							break;
							case'sub-accordion-section-portfoliolite_ribbon_section':
							sectionClass = 'section#call-ribbon';
							break;
							case'sub-accordion-section-portfoliolite_blog_section':
							sectionClass = 'section#latest-post';
							break;
							case'sub-accordion-panel-cnt_panel':
							sectionClass = 'section#contact-info';
							break;
							default:
							sectionClass = 'section.' + data;
							break;
						}
						if ( $( sectionClass ).length > 0) {
							$( 'html, body' ).animate(
								{
									scrollTop: $(sectionClass).offset().top - 0
								}, 1000
							);
						}
					}
				);
		}
	);
};

thunk_customizer_section_scroll( jQuery );
});
