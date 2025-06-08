jQuery(document).ready(function(){
/**************************************load more 2*******************/

/**************************************load more 2 END*******************/        
// //SERVICES
var owl = jQuery('.thunk-service .owl-carousel');
      owl.owlCarousel({
        items: 1,
        nav: false,
        navText: ["<i class='fa fa-chevron-left'></i>", 
        "<i class='fa fa-chevron-right'></i>"],
        loop: false,
        dots: true,
        smartSpeed: 1800, 
        autoHeight: false,
        margin: 30,
        responsive:{
        0:{
            items:1,
        },
        490:{
            items:2,
        },
        768:{
            items:3,
        }
    }
        
      })
//PRICING
var owl = jQuery('.thunk-pricing .owl-carousel');
      owl.owlCarousel({
        items: 1,
        nav: false,
        navText: ["<i class='fa fa-chevron-left'></i>", 
        "<i class='fa fa-chevron-right'></i>"],
        loop: false,
        dots: true,
        smartSpeed: 1800, 
        autoHeight: false,
        margin: 30,
        responsive:{
        0:{
            items:1,
        },
        490:{
            items:2,
        },
        768:{
            items:3,
        }
    }
      } )
//TEAM
var owl = jQuery('.thunk-team .owl-carousel');
      owl.owlCarousel({
        items: 1,
        nav: false,
        navText: ["<i class='fa fa-chevron-left'></i>", 
        "<i class='fa fa-chevron-right'></i>"],
        loop: false,
        dots: true,
        smartSpeed: 1800, 
        autoHeight: false,
        margin: 30,
         responsive:{
        0:{
            items:1,
        },
        490:{
            items:2,
        },
        768:{
            items:3,
        }
    }
      })

//TESTIMONIALS
var owl = jQuery('.testimonials .owl-carousel');
      owl.owlCarousel({
        items: 1,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", 
        "<i class='fa fa-chevron-right'></i>"],
        loop: false,
        dots: true,
        smartSpeed: 1800, 
        autoHeight: false,
        margin: 0,
      })
//CLIENTS
var owl = jQuery('.clients-list .owl-carousel');
      owl.owlCarousel({
        items: 1,
        loop: false,
        smartSpeed: 1600, 
        autoplay: true,
        dots: false,
        margin: 0,
      })
//BLOG
var owl = jQuery('.thunk-blog .owl-carousel');
      owl.owlCarousel({
        items: 1,
        nav: false,
        navText: ["<i class='fa fa-chevron-left'></i>", 
        "<i class='fa fa-chevron-right'></i>"],
        loop: false,
        dots: true,
        smartSpeed: 1800, 
        autoHeight: false,
        margin: 30,
        lazyLoad: true,
        responsive:{
        0:{
            items:1,
        },
        490:{
            items:2,
        },
        768:{
            items:3,
        }
    }
      } )
//BACKGROUND SLIDERS
if ( jQuery('.fadein-slider .slide-item').length > 1 ) {
       jQuery('.fadein-slider .slide-item:gt(0)').hide();
       setInterval(function(){
           jQuery('.fadein-slider :first-child').fadeOut(1700).next('.slide-item').fadeIn(1700).end().appendTo('.fadein-slider');
       },4000);
   }  
// Condiition to Show Vertical Navigation on scroll for slider section
 // jQuery('.thunk-vertival-pagination-wrapper').hide();
 // jQuery('.fadein-slider>div:not(:first-child)').css({"height":"100%","visibility": "visible"});
 jQuery(window).scroll(function() {

    if (jQuery(this).scrollTop()<108)
    {
       jQuery('#cd-vertical-nav').css({"opacity":"0","right": "-40px"});
       jQuery('.mhdrrightpan .thunk-vertival-pagination-wrapper #cd-vertical-nav').css({"opacity":"0","left": "-85px"});
    }
   else if(jQuery('.active-frame #cd-vertical-nav').length!=1)
    {
     jQuery('#cd-vertical-nav').css({"opacity":"1","transition": "all 0.2s linear","right": "0px"});
     jQuery('.mhdrrightpan .thunk-vertival-pagination-wrapper #cd-vertical-nav').css({"opacity":"1","transition": "all 0.2s linear","left": "-50px"});
    }
   else
   {
     jQuery('#cd-vertical-nav').css({"opacity":"1","transition": "all 0.2s linear","right": "15px"});
     jQuery('.mhdrrightpan .thunk-vertival-pagination-wrapper #cd-vertical-nav').css({"opacity":"1","transition": "all 0.2s linear","left": "-35px"});
   }
 });

//Wow Animation CSS
 new WOW().init();
})


