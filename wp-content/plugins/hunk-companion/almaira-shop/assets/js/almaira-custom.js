jQuery(document).ready(function(){
// ************************
// category slider
// ************************
   if(jQuery('.thunk-category-wrapper').length!=''){
 var owl = jQuery('.thunk-category-section .owl-carousel');
     owl.owlCarousel({
       items:7,
       nav: true,
       navText: ["<i class='fa fa-chevron-left'></i>",
       "<i class='fa fa-chevron-right'></i>"],
       loop: false,
       dots: false,
       smartSpeed: 1800,
       autoHeight: false,
       margin: 30,
       responsive:{
       0:{
           items:3,
       },
       600:{
           items:5,
       },
       1024:{
           items:6,
       },
       1025:{
           items:7,
       }
   }
     })
}
/***************************************/
//Responsive Slide Height on window resize
/***************************************/
function sliderHeight() {

      jQuery('#slideshow').imagesLoaded( function() {
        if ( jQuery(window).width() <= 1024 ){ 
          var slideItemHeight = jQuery('.th-slide-bgimg img').height();
          jQuery('#slideshow, .th-swiper-wrapper, .th-swiper-slide,#th-slider.responsive').height(slideItemHeight);
          jQuery('.th-slide-bgimg').css('height', 'auto');
          // jQuery('#th-slider.responsive').css('transform', 'scale(1)');
        } else {
          jQuery('#slideshow').css('height', 'auto');
          
        }
      });
    }

    if (jQuery('#slideshow').data('mobileslider') === 'responsive') {

      jQuery(document).ready(sliderHeight);
      jQuery(window).resize(function() {   
        setTimeout(function() {
            sliderHeight();
        }, 50);
      });
    }

// Params
var swiper_length= jQuery(".swiper-slide").length;
var swiper_autoplay = true;
if (swiper_length < 2) {
swiper_autoplay = false;
}
if(jQuery('.th-swiper-wrapper').length!=''){
let mainSliderSelector = '.swiper-container',
    interleaveOffset = 0.5;

// Main Slider
let mainSliderOptions = {
      loop:swiper_autoplay,
      speed:1000,
      autoplay:swiper_autoplay,
      loopAdditionalSlides: 10,
      grabCursor: true,
      watchSlidesProgress: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
 	pagination: {
    	el: '.swiper-pagination',
    	type: 'bullets',
    	bulletElement: 'span',
    	clickable: true,

  	  },
      on: {
        init: function(){
          this.autoplay.stop();
        },
        imagesReady: function(){
          this.el.classList.remove('loading');
        },
        slideChangeTransitionEnd: function(){
          let swiper = this,
              captions = swiper.el.querySelectorAll('.th-slider-caption');
          for (let i = 0; i < captions.length; ++i) {
            captions[i].classList.remove('show');
          }
          swiper.slides[swiper.activeIndex].querySelector('.th-slider-caption').classList.add('show');
        },
        progress: function(){
          let swiper = this;
          for (let i = 0; i < this.slides.length; i++) {
            let slideProgress = this.slides[i].progress,
                innerOffset = this.width * interleaveOffset,
                innerTranslate = slideProgress * innerOffset;
  
            this.slides[i].querySelector(".slide-bgimg").style.transform =
              "translateX(" + innerTranslate + "px)";
          }
        },
        touchStart: function() {
          // for (let i = 0; i < this.slides.length; i++) {
          //   this.slides[i].style.transition = "";
          // }
        },
        setTransition: function(speed) {
          for (let i = 0; i < this.slides.length; i++) {
            this.slides[i].style.transition = speed + "ms";
            this.slides[i].querySelector(".slide-bgimg").style.transition =
              speed + "ms";
          }
        }
      }
    };
let mainSlider = new Swiper(mainSliderSelector, mainSliderOptions);
}
if(jQuery(".th-swiper-slide").length == 1) {
    jQuery('.swiper-pagination').addClass( "disabled" );
    jQuery(".swiper-slide .th-slider-content .th-slider-caption").css({"opacity":"1","transform": "none"});
}

});