(function ($) {
    var PortfoliolineLib = {
        init: function (){
            this.bindEvents();
        },
         bindEvents: function (){
            var $this = this;
        if ( jQuery( "#slspeed" ).length ){
                $this.sliderSpeed();
            }
                $this.newsletter();
                $this.thflexSlider();
                $this.thIsotope();
                $this.thPortfolioLoadmore();
                $this.testimonialSlider();
                $this.startParalaxx();
            if ( jQuery( "#animate-css" ).length){
                $this.wowAnimation();
            }
         },
newsletter: function(){
            jQuery(document).ready(function() {
            jQuery("#Link").click(function() {
            jQuery("#form-subscriber").show();
            jQuery("#Link").hide();
        });
    });
},

sliderSpeed: function(){
                    if(jQuery('#slspeed').attr('sliderspeed')>1){
                        var newspeed = jQuery("#txt_slidespeed").val();
                    }else{
                           var newspeed =  false; 
                    }
                jQuery('#slides_full').superslides({
                animation: 'fade',
                slide_easing: 'easeInOutCubic',
                play:newspeed,
            });

              var $slides = jQuery('#slides_full');
            Hammer($slides[0]).on("swipeleft", function(e) {
                $slides.data('superslides').animate('next');
            });
            Hammer($slides[0]).on("swiperight", function(e) {
                $slides.data('superslides').animate('prev');
            });
            $slides.superslides({
                hashchange: false
            });
        },



thflexSlider: function(){
                (function(jquery) {
        jQuery(window).load(function() {
        var newspeed = jQuery("#txt_slidespeed").val();
        jQuery('.flexslider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: false,
            animationSpeed: 1000,
            fadeFirstSlide: false,
            slideshowSpeed: newspeed,

        });
        setTimeout(function() {
            jquery('body').addClass('loaded');
        }, 1000);

          jquery("#arrow-down").click(function(){
              jquery('html, body').animate({
                  scrollTop: jquery("#portfolio-mywork-section").offset().top
              },700);
          });
    
  

    });
})(jQuery);
}, //thflexSlider End
            
thIsotope: function(){
    // isotop-portfolio script
    (function(jquery) {
        jQuery(window).load(function() {
            jquery('.lfb-load-more').css("display", "none");
            var jquerygrid = jquery('.grid').isotope({
                filter: '*'
            });

            jquery(".pl-portfolio").click(function() {
                jquery(".is-checked").removeClass('active');
            });

            jquery(".is-checked").click(function() {
                var $grid = jquery('.grid').isotope({
                    filter: '*'
                });
            });
            jquery(".pl-portfolio").click(function() {
                var filterValue = jQuery( this ).attr('data-filter');
                var jquerygrid = jquery(".grid").isotope({
                    filter: filterValue
                });
            });    

            // change is-checked class on buttons
jQuery('.portfolio-navi').each( function( i, buttonGroup ) {
  var $buttonGroup = jQuery( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    jQuery( this ).addClass('is-checked');
  }); 
});
        });
    })(jQuery);
// isoptop-portfolio script end
}, //thIsotope End

thPortfolioLoadmore: function(){
    (function(jquery) {
         function portfilo_show_gallery($input){
             jquery('.lfb-load-more').css("display", "none");
             var $pl_totalcat = jquery('.portfolio-navi').attr('pfl_perpage');
             var data_filter = $input.attr("data-filter");
             var class_filter = $input.attr("class");
             var $cate_slug = data_filter.replace(".","");
             var $total_post = jquery(data_filter).attr("totalpost");
             var $pagi = Math.round(parseFloat($total_post / $pl_totalcat));
             var $lfb_page = jquery(data_filter).attr('lfb-page');
             if ($pl_totalcat < $total_post || $pagi >= $lfb_page){
                 jquery('.lfb-load-more').css("display", "block");
                 jquery(".lfb-load-more").attr("cate-slug", $cate_slug);
             }
             return data_filter;
         }
    jquery(window).load(function(){
        if (jQuery(".pl-portfolio").length){
             var $input = jquery(".pl-portfolio");
             var data_filter = $input.attr("data-filter");
             jquery('.lfb-load-more').css("display", "none");
             var jquerygrid = jquery('.grid').isotope({
                 filter: data_filter
             });
             portfilo_show_gallery($input);
        }
            jquery(".pl-portfolio").click(function(){
                 jquery(".is-checked").removeClass('active');
             });

             jquery(".is-checked").click(function(){
                 var $grid = jquery('.grid').isotope({
                     filter: data_filter
                 });
             });
             
             jquery(".pl-portfolio").click(function(){
                 var $input = jquery(this);
                 data_filter = portfilo_show_gallery($input);
                 var jquerygrid = jquery(".grid").isotope({
                     filter: data_filter
                 });

             });
             jquery(".lfb-load-more").click(function(){
                 var $cateSlug = jquery('.lfb-load-more').attr('cate-slug');
                 var $lfb_page = jquery('.' + $cateSlug).attr('lfb-page');
                 var $total_post = jquery('.' + $cateSlug).attr('totalpost');
                 var $data_max_pages = jquery('.' + $cateSlug).attr('data-max-pages');
                 var $plf_data = "post_page=" + $lfb_page + "&cate_slug=" + $cateSlug + "&action=portfolioline_portfolio_ajax" + "&nonce=" + frontendajax.portnonce;
                 jquery.ajax({
                     url: frontendajax.ajaxurl,
                     type: 'POST',
                     data: $plf_data,
                     cache: false
                 }).success(function(response){
                     if (response!=''){
                         var $lfb_page_new = parseInt($lfb_page) + 1;
                         jquery('.' + $cateSlug).attr("lfb-page", $lfb_page_new);
                         var $newItems = jquery(response);
                         $newItems.imagesLoaded(function(){
                         $newItems.css({ opacity: 1 });
                         jquery('.portfolio-grid').append($newItems).isotope( 'appended', $newItems );
                         });
                         if($lfb_page==$data_max_pages){
                            jquery('.lfb-load-more').css("display", "none");
                        }     
                     }else{
                         jquery('.lfb-load-more').css("display", "none");
                     }
                 });

             });

         });
    })(jQuery);
}, //thPortfolioLoadmore End

testimonialSlider: function(){
    /*testimonials slider*/
(function(jquery) {
    jQuery(document).ready(function(jQuery) {
        jquery('.bxslider').bxSlider({
            mode: 'fade',
            auto: true,
            autoControls: true,
            adaptiveHeight: true,
        });


    });


}(jQuery));
}, //testimonialSlider

startParalaxx: function(){
            jQuery(function() {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                (function(n) {
                    n.viewportSize = {}, n.viewportSize.getHeight = function() {
                        return t("Height")
                    }, n.viewportSize.getWidth = function() {
                        return t("Width")
                    };
                    var t = function(t) {
                        var f, o = t.toLowerCase(),
                            e = n.document,
                            i = e.documentElement,
                            r, u;
                        return n["inner" + t] === undefined ? f = i["client" + t] : n["inner" + t] != i["client" + t] ? (r = e.createElement("body"), r.id = "vpw-test-b", r.style.cssText = "overflow:scroll", u = e.createElement("div"), u.id = "vpw-test-d", u.style.cssText = "position:absolute;top:-1000px", u.innerHTML = "<style>@media(" + o + ":" + i["client" + t] + "px){body#vpw-test-b div#vpw-test-d{" + o + ":7px!important}}<\/style>", r.appendChild(u), i.insertBefore(r, e.head), f = u["offset" + t] == 7 ? i["client" + t] : n["inner" + t], i.removeChild(r)) : f = n["inner" + t], f
                    }
                })(this);


                (function($) {

                    // Setup variables
                    $window = $(window);
                    $body = $('body');

                    //FadeIn all sections   

                    function adjustWindow() {

                        // Init Skrollr
                        var s = skrollr.init({
                            render: function(data) {

                                //Debugging - Log the current scroll position.
                                //console.log(data.curTop);
                            }
                        });

                        // Get window size
                        winH = $window.height();

                        // Keep minimum height 550
                        if (winH <= 550) {
                            winH = 550;
                        }


                    }

                })(jQuery);
            } else {
                (function(n) {
                    n.viewportSize = {}, n.viewportSize.getHeight = function() {
                        return t("Height")
                    }, n.viewportSize.getWidth = function() {
                        return t("Width")
                    };
                    var t = function(t) {
                        var f, o = t.toLowerCase(),
                            e = n.document,
                            i = e.documentElement,
                            r, u;
                        return n["inner" + t] === undefined ? f = i["client" + t] : n["inner" + t] != i["client" + t] ? (r = e.createElement("body"), r.id = "vpw-test-b", r.style.cssText = "overflow:scroll", u = e.createElement("div"), u.id = "vpw-test-d", u.style.cssText = "position:absolute;top:-1000px", u.innerHTML = "<style>@media(" + o + ":" + i["client" + t] + "px){body#vpw-test-b div#vpw-test-d{" + o + ":7px!important}}<\/style>", r.appendChild(u), i.insertBefore(r, e.head), f = u["offset" + t] == 7 ? i["client" + t] : n["inner" + t], i.removeChild(r)) : f = n["inner" + t], f
                    }
                })(this);


                (function($) {

                    // Setup variables
                    $window = $(window);
                    $body = $('body');

                    //FadeIn all sections   
                    $body.imagesLoaded(function() {
                        setTimeout(function() {

                            // Resize sections
                            adjustWindow();

                            // Fade in sections
                            $body.removeClass('loading').addClass('loaded');

                        }, 800);
                    });

                    function adjustWindow() {

                        // Init Skrollr
                        var s = skrollr.init({
                            render: function(data) {

                                //Debugging - Log the current scroll position.
                                //console.log(data.curTop);
                            }
                        });
                        // Get window size
                        winH = $window.height();
                        // Keep minimum height 550
                        if (winH <= 550) {
                            winH = 550;
                        }
                    }
                })(jQuery);
            }
        });
},

wowAnimation: function(){
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
         // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
},

}
     PortfoliolineLib.init();
})(jQuery);