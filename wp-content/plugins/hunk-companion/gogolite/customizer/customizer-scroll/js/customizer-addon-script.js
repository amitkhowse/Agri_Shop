/**
 * Script fort the customizer sections scroll function.
 *
 * @since    1.1.43
 * @package hunk_companion
 *
 * @author  themehunk
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
							case'sub-accordion-section-gogo_backslider_section':
							sectionClass = 'section.slider-typewriter';
							break;
							case'sub-accordion-section-gogo_introduction_section':
							sectionClass = 'section.thunk-first';
							break;
							case'sub-accordion-section-gogo_service_section':
							sectionClass = 'section.thunk-service';
							break;
							case'sub-accordion-section-gogo_woocommerce_section':
							sectionClass = 'section.thunk-woocommerce';
							break;
							case'sub-accordion-section-gogo_call_to_section':
							sectionClass = 'section.thunk-call-to';
							break;
							case'sub-accordion-section-gogo_portfolio_section':
							sectionClass = 'section.thunk-portfolio';
							break;
							case'sub-accordion-section-gogo_team_section':
							sectionClass = 'section.thunk-team';
							break;
							case'sub-accordion-section-gogo_pricing_section':
							sectionClass = 'section.thunk-pricing';
							break;
							case'sub-accordion-section-gogo_ct_section':
							sectionClass = 'section.thunk-clients-and-testimonials';
							break;
							case'sub-accordion-section-gogo_video_ribbon_section':
							sectionClass = 'section.thunk-video-ribbon';
							break;
							case'sub-accordion-section-gogo_blog_section':
							sectionClass = 'section.thunk-blog';
							break;
							case'sub-accordion-section-gogo_contact_section':
							sectionClass = 'section.thunk-contact-us';
							break;
							case'sub-accordion-section-gogo_social_section':
							sectionClass = 'section.thunk-social-section';
							break;
	
							default:
							sectionClass = 'section.' + data;
							break;
						}
						if ( $( sectionClass ).length > 0) {
							$( 'html, body' ).animate(
								{
									scrollTop: $(sectionClass).offset().top - 65
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
