/********************************/
// OpenMartWooLib Custom Function
/********************************/
(function ($) {
    var OpenMartWooLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
            var $this = this;
            $this.CategoryTabFilter();
            $this.CategoryTabVerticalFilter();
            $this.CategorySlider();  
            $this.VerticalBannerSlider();
            $this.ProductListSlide();
            $this.belowfooter();
           
          },
          /***********************/        
// Front Page Function
/***********************/  
      CategoryTabFilter:function(){
                         
                    // slide autoplay
                            if(openmart.open_mart_cat_slider_optn == true){
                            var cat_atply = true;
                            }else{
                            var cat_atply = false; 
                            } 

                     //product slider 
                         if (openmart.open_mart_cat_adimg == ''){
                           $('.thunk-product-cat-slide').owlCarousel({
                                       items:5,
                                       nav: true,
                                       owl2row: false, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: false,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       autoplayHoverPause: true, // Stops autoplay
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       1025:{
                                           items:5,
                                       }
                                   }
                          });
                         }
                         else{
                          $('.thunk-product-cat-slide').owlCarousel({
                                       items:4,
                                       nav: true,
                                       owl2row: false, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: false,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       autoplayHoverPause: true, // Stops autoplay
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       1025:{
                                           items:4,
                                       }
                                   }
                          });
                         }
                      
                          $('#thunk-cat-tab li a:first').addClass('active');
                          $(document).on('click', '#thunk-cat-tab li a', function(e){
                          $('#thunk-cat-tab .tab-content').append('<div class="thunk-loadContainer"> <div class="loader"></div></div>');
                          $(".thunk-product-tab-section .thunk-loadContainer").css("display", "block");
                          $('#thunk-cat-tab li a.active').removeClass("active");
                          $(this).addClass('active');
                                  var data_term_id = $( this ).attr( 'data-filter' );
                                  $.ajax({
                                      type: 'POST',
                                      url: openmart.ajaxUrl,
                                      data: {
                                        action :'open_mart_cat_filter_ajax',
                                        'data_cat_slug':data_term_id,
                                        'nonce':openmart.opmrtnonce,
                                       },
                                dataType: 'html'
                              }).done( function( response ){
                                if ( response ){
                                 $('#thunk-cat-tab .tab-content').html('<div class="thunk-slide thunk-product-cat-slide owl-carousel"></div> <div class="thunk-loadContainer"> <div class="loader"></div></div>');
                                 $(".thunk-slide.thunk-product-cat-slide.owl-carousel").append(response);
                                 if (openmart.open_mart_cat_adimg == '') {
                           $('.thunk-product-cat-slide').owlCarousel({
                                       items:5,
                                       nav: true,
                                       owl2row: false, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: false,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       autoplayHoverPause: true, // Stops autoplay
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       1025:{
                                           items:5,
                                       }
                                   }
                          });
                         }
                         else{
                          $('.thunk-product-cat-slide').owlCarousel({
                                       items:4,
                                       nav: true,
                                       owl2row: false, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: false,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       autoplayHoverPause: true, // Stops autoplay
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       1025:{
                                           items:4,
                                       }
                                   }
                          });
                         }
                         productexrptajax.modalexcerpt.init();
                            $(".thunk-product-tab-section .thunk-loadContainer").css("display", "none");

                              $(".thunk-product").hover(function() { 
                                $('.thunk-slide .owl-stage-outer').css("margin", "-6px -6px -100px"); 
                                $('.thunk-slide .owl-stage-outer').css("padding", "6px 6px 100px");
                                $('.thunk-slide .owl-nav').css("top", "-52px");
                              }, function() { 
                                $('.thunk-slide .owl-stage-outer').css("margin", "0"); 
                                $('.thunk-slide .owl-stage-outer').css("padding", "0"); 
                                $('.thunk-slide .owl-nav').css("top", "-58px");
                             }); 
             
                            } 
                          } );
                              e.preventDefault();
                           });

              },
              CategoryTabVerticalFilter:function(){
                         //product slider 
                          if(openmart.open_mart_single_row_slide_cat_vt == true){
                          var sliderow = false;
                          }else{
                          var sliderow = true;
                          }
                          
                    // slide autoplay
                            if(openmart.open_mart_vt_cat_slider_optn == true){
                            var cat_atply = true;
                            }else{
                            var cat_atply = false; 
                            } 

                         
                          var owl = $('.thunk-product-vertical-cat-slide1');
                                     owl.owlCarousel({
                                       items:4,
                                       nav: false,
                                       owl2row:sliderow, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: true,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       991:{
                                           items:3,
                                       },
                                       1024:{
                                           items:3,
                                       },
                                       1025:{
                                           items:4,
                                       },
                                   }
                                });

                          $('#thunk-vertical-cat-tab1 li a:first').addClass('active');
                          $(document).on('click', '#thunk-vertical-cat-tab1 li a', function(e){
                          $('#thunk-vertical-cat-tab1 .tab-content').append('<div class="thunk-loadContainer"> <div class="loader"></div></div>');
                          $(".thunk-vertical-product-tab-section .thunk-loadContainer").css("display", "block");
                          $('#thunk-vertical-cat-tab1 li a.active').removeClass("active");
                          $(this).addClass('active');
                                  var data_term_id = $( this ).attr( 'data-filter' );
                                  $.ajax({
                                      type: 'POST',
                                      url: openmart.ajaxUrl,
                                      data: {
                                        action :'open_mart_cat_filter_ajax',
                                        'data_cat_slug':data_term_id,
                                        'nonce':openmart.opmrtnonce,
                                       },
                                dataType: 'html'
                              }).done( function( response ){
                                if ( response ){
                                 $('#thunk-vertical-cat-tab1 .tab-content').html('<div class="thunk-slide thunk-product-vertical-cat-slide1 owl-carousel"></div> <div class="thunk-loadContainer"> <div class="loader"></div></div>');
                                 $(".thunk-slide.thunk-product-vertical-cat-slide1.owl-carousel").append(response);
                              
                         var owl = $('.thunk-product-vertical-cat-slide1');
                                     owl.owlCarousel({
                                       items:4,
                                       nav: false,
                                       owl2row:sliderow, 
                                       owl2rowDirection: 'ltr',
                                       owl2rowTarget: 'thunk-woo-product-list',
                                       navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                       "<i class='slick-nav fa fa-angle-right'></i>"],
                                       loop:cat_atply,
                                       dots: true,
                                       smartSpeed: 1800,
                                       autoHeight: false,
                                       margin: 15,
                                       autoplay:cat_atply,
                                       responsive:{
                                       0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       990:{
                                           items:4,
                                       },
                                       991:{
                                           items:3,
                                       },
                                       1024:{
                                           items:3,
                                       },
                                       1025:{
                                           items:4,
                                       },
                                   }
                                });
                            productexrptajax.modalexcerpt.init();
                            $(".thunk-vertical-product-tab-section .thunk-loadContainer").css("display", "none");

                              $(".thunk-product").hover(function() { 
                                $('.thunk-slide .owl-stage-outer').css("margin", "-6px -6px -100px"); 
                                $('.thunk-slide .owl-stage-outer').css("padding", "6px 6px 100px");
                                $('.thunk-vertical-cat-tab1 .thunk-slide .owl-nav').css("top", "207px!important");
                              }, function() { 
                                $('.thunk-slide .owl-stage-outer').css("margin", "0"); 
                                $('.thunk-slide .owl-stage-outer').css("padding", "0"); 
                                $('.thunk-vertical-cat-tab1 .thunk-slide .owl-nav').css("top", "200px!important");
                             }); 
             
                            } 
                          } );
                              e.preventDefault();
                           });

              },
               CategorySlider:function(){
                     // slide autoplay
                     if(openmart.open_mart_category_slider_optn == true){
                      var cat_atply_c = true;
                      }else{
                      var cat_atply_c = false; 
                      }
                      if(openmart.open_mart_cat_slider_heading == ''){
                      var cate_dots = true;
                      var cate_nav = false;
                      }else{
                      var cate_dots = false;
                      var cate_nav = true;
                      }
                  var column_no = parseInt(openmart.open_mart_cat_item_no);
                      var owl = $('.thunk-cat-slide');
                           owl.owlCarousel({
                             items:8,
                             nav: cate_nav,
                             navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                             "<i class='slick-nav fa fa-angle-right'></i>"],
                             loop:cat_atply_c,
                             dots: cate_dots,
                             smartSpeed: 1800,
                             autoHeight: false,
                             margin:15,
                             autoplay:cat_atply_c,
                              autoplayHoverPause: true, // Stops autoplay
                             responsive:{
                             0:{
                                           items:3,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:5,
                                       },
                                       900:{
                                           items:6,
                                       },
                                       1025:{
                                           items:column_no,
                                       }
                         }
              });

       }, 
         VerticalBannerSlider:function(){
                       // slide autoplay
              var is_item_single = $(".thunk-vt1-banner .thunk-vt-banner-img").length;
                      if(openmart.open_mart_vt_banner_atply == true && is_item_single > 1){
                      var brd_atply = true;
                      }else{
                      var brd_atply = false; 
                      }
                      var owl = $('.thunk-vt1-banner');
                           owl.owlCarousel({
                             items:5,
                             nav: false,
                             navText: ["<i class='brand-nav fa fa-angle-left'></i>",
                             "<i class='brand-nav fa fa-angle-right'></i>"],
                             loop:brd_atply,
                             dots: true,
                             smartSpeed: 1800,
                             autoHeight: false,
                             margin:15,
                             autoplay:brd_atply,
                             responsive:{
                             0:{
                                 items:1,
                                 margin:7.5,
                             },
                             600:{
                                 items:1,
                             },
                             1024:{
                                 items:1,
                             },
                             1025:{
                                 items:1,
                             }
                         }
                 });
                          
        },

        belowfooter:function(){
            jQuery("footer .below-footer,footer .below-footer-bar,.below-footer-col1,footer .container,.footer-copyright").attr('style', 'display: block !important');
            jQuery(".footer-copyright a,.footer-copyright span").attr('style', 'display: inline-block !important');
            jQuery(".below-footer-bar").attr('style', 'display: flex !important');
        },

        ProductListSlide:function(){
                     
                          if(openmart.open_mart_single_row_prdct_list == true){
                            var sliderow_l = false;
                            }else{
                            var sliderow_l = true;
                            }
                            // slide autoplay
                            if(openmart.open_mart_product_list_slide_optn == true){
                            var cat_atply_l = true;
                            }else{
                            var cat_atply_l = false; 
                            }
                        if (openmart.open_mart_pl_image == '') {
                           
                            var owl = $('.thunk-product-list');
                                 owl.owlCarousel({
                                   items:4,
                                   nav: true,
                                   owl2row:sliderow_l,
                                   owl2rowDirection: 'ltr',
                                   owl2rowTarget: 'thunk-woo-product-list',
                                   navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                   "<i class='slick-nav fa fa-angle-right'></i>"],
                                   loop:cat_atply_l,
                                   dots: false,
                                   smartSpeed: 1800,
                                   autoHeight: false,
                                   margin: 15,
                                   autoplay:cat_atply_l,
                                    autoplayHoverPause: true, // Stops autoplay
                                   responsive:{
                                   0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       900:{
                                           items:4,
                                       },
                                       1025:{
                                           items:5,
                                       }
                               }
                            });
                      
                         }
                         else{
                           
                           var owl = $('.thunk-product-list');
                                 owl.owlCarousel({
                                   items:5,
                                   nav: true,
                                   owl2row:sliderow_l,
                                   owl2rowDirection: 'ltr',
                                   owl2rowTarget: 'thunk-woo-product-list',
                                   navText: ["<i class='slick-nav fa fa-angle-left'></i>",
                                   "<i class='slick-nav fa fa-angle-right'></i>"],
                                   loop:cat_atply_l,
                                   dots: false,
                                   smartSpeed: 1800,
                                   autoHeight: false,
                                   margin: 15,
                                   autoplay:cat_atply_l,
                                    autoplayHoverPause: true, // Stops autoplay
                                   responsive:{
                                   0:{
                                           items:2,
                                           margin:7.5,
                                       },
                                       768:{
                                           items:3,
                                       },
                                       900:{
                                           items:4,
                                       },
                                       1025:{
                                           items:4,
                                       }
                               }
                            });
                      
                         }

                            
      },
      
      }
      var productexrptajax = productexrptajax || {};
          productexrptajax.modalexcerpt = {
  init: function(){
    this.product_descr_excerpt_ajax();
  },  
          product_descr_excerpt_ajax:function(){
        $('.os-product-excerpt *').each(function(){
            var truncated = $(this).text().substr(0, 54);
            //Updating with ellipsis if the string was truncated
            $(this).text(truncated+(truncated.length<54?'':' ..'));
          
          $(".os-product-excerpt *").not(":first-child").hide();
        });
        }, 
};
    OpenMartWooLib.init();
})(jQuery);