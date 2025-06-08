/****************************/		
//Above header layout
/****************************/	
( function( $ ) {
//**********************************/
// container hide and show settings
//**********************************/
ZTAControlTrigger.addHook( 'gogo-toggle-control', function( argument, api ) {
		ZTACustomizerToggles ['gogo_big-image-background'] = [
		    {
				controls: [
					'gogo_ribbon_bg_video',
					'gogo_video_image_upload',
					'gogo_slider_audio'
				],
				callback: function(layout){
					if (layout=='image'){
					return false;
					}
					return true;
				   }
			},
            {
				controls: [    
				'gogo_backslider_image'
				
				],
				callback: function(layout){
					if (layout=='video'){
					return false;
					}
					return true;
				}
			},
					
		];
		// Note: You can add multiple toggles below if you require
	

		ZTACustomizerToggles ['gogo_section_blog_post_content'] = [
		    {
				controls: [
					'gogo_section_blog_expt_length'
				],
				callback: function(layout){
					if (layout=='excerpt'){
					return true;
					}
					return false;
				   }
			},
					
		];
		});
})( jQuery );