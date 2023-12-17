


;(function ($) {

	'use strict';

	  /**
   * Animation on scroll function and init
   */
	//   function aos_init() {
	// 	AOS.init({
	// 	  duration: 1000,
	// 	  easing: 'ease-in-out',
	// 	  once: true,
	// 	  mirror: false
	// 	});
	//   }
	//   window.addEventListener('load', () => {
	// 	aos_init();
	//   });

	// $('.portfolio-single-slider').slick({
	// 	infinite: true,
	// 	arrows: false,
	// 	autoplay: true,
	// 	autoplaySpeed: 2000

	// });

	// $('.clients-logo').slick({
	// 	infinite: true,
	// 	arrows: false,
	// 	autoplay: true,
	// 	autoplaySpeed: 2000
	// });

// 	$('.testimonial-wrap').slick({
// 		slidesToShow: 2,
// 		slidesToScroll: 2,
// 		infinite: true,
// 		dots: true,
// 		arrows: false,
// 		autoplay: true,
// 		autoplaySpeed: 6000,
// 		responsive: [
// 		    {
// 		      breakpoint: 1024,
// 		      settings: {
// 		        slidesToShow: 3,
// 		        slidesToScroll: 3,
// 		        infinite: true,
// 		        dots: true
// 		      }
// 		    },
// 		    {
// 		      breakpoint: 900,
// 		      settings: {
// 		        slidesToShow: 2,
// 		        slidesToScroll: 2
// 		      }
// 		    },{
// 		      breakpoint: 600,
// 		      settings: {
// 		        slidesToShow: 1,
// 		        slidesToScroll: 1
// 		      }
// 		    },
// 		    {
// 		      breakpoint: 480,
// 		      settings: {
// 		        slidesToShow: 1,
// 		        slidesToScroll: 1
// 		      }
// 		    }
		  
//   		]
// 	});


//    $('.portfolio-gallery').each(function () {
//         $(this).find('.popup-gallery').magnificPopup({
//             type: 'image',
//             gallery: {
//                 enabled: true
//             }
//         });
//     });


	// var map;

	// function initialize() {
	// 	var mapOptions = {
	// 		zoom: 13,
	// 		center: new google.maps.LatLng(50.97797382271958, -114.107718560791)
	// 		// styles: style_array_here
	// 	};
	// 	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	// }

	// var google_map_canvas = $('#map-canvas');

	// if (google_map_canvas.length) {
	// 	google.maps.event.addDomListener(window, 'load', initialize);
	// }

	// Counter

	// $('.counter-stat').counterUp({
	//       delay: 10,
	//       time: 1000
	//   });

	 /**
   * Preloader
   */
	 const preloader = document.querySelector('#preloader');
	  if (preloader) {
		window.addEventListener('load', () => {
		  preloader.remove();
		});
	  }
	  console.log($('.slider-carousel'));
	    //Hero Slider
		$('.slider-carousel').slick({
			autoplay: true,
			infinite: true,
			arrows: true,
			dots: true,
			responsive: [{
				breakpoint: 576,
				settings: {
					arrows: false
				}
			}]
		});

		$('slider-carousel').slickAnimation();
	
		// // hero slider without pagination
		// $('.slider-carousel-2').slick({
		// 	autoplay: true,
		// 	infinite: true,
		// 	arrows: false,
		// 	dots: false
		// });
		// $('.slider-carousel-2').slickAnimation();
		


		/* 2. sticky And Scroll UP */
		// $(window).on('scroll', function () {
		// 	var scroll = $(window).scrollTop();
		// 	if (scroll < 400) {
		// 	  $(".header-sticky").removeClass("sticky-bar");
		// 	  $('#back-top').fadeOut(500);
		// 	} else {
		// 	  $(".header-sticky").addClass("sticky-bar");
		// 	  $('#back-top').fadeIn(500);
		// 	}
		//   });


  /**
   * Sticky header on scroll
   */
   /* const selectHeader = document.querySelector('#header');
   if (selectHeader) {
	 document.addEventListener('scroll', () => {
	   window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
	 });
   }
 
   /**
	* Navbar links active state on scroll
	*/
  /*  let navbarlinks = document.querySelectorAll('#navbar .scrollto');
 
   function navbarlinksActive() {
	 navbarlinks.forEach(navbarlink => {
 
	   if (!navbarlink.hash) return;
 
	   let section = document.querySelector(navbarlink.hash);
	   if (!section) return;
 
	   let position = window.scrollY;
	   if (navbarlink.hash != '#header') position += 200;
 
	   if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
		 navbarlink.classList.add('active');
	   } else {
		 navbarlink.classList.remove('active');
	   }
	 })
   }
   window.addEventListener('load', navbarlinksActive);
   document.addEventListener('scroll', navbarlinksActive);*/
 
   // Smooth scroll for the navigation and links with .scrollto classes
 /* $('.main-nav a, .mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (! $('#header').hasClass('header-scrolled')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.main-nav, .mobile-nav').length) {
          $('.main-nav .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });*/

    // Navigation active state on scroll
/*	var nav_sections = $('section');
	var main_nav = $('.main-nav, .mobile-nav');
	var main_nav_height = $('#header').outerHeight();
  
	$(window).on('scroll', function () {
	  var cur_pos = $(this).scrollTop();
	
	  nav_sections.each(function() {
		var top = $(this).offset().top - main_nav_height,
			bottom = top + $(this).outerHeight();
	
		if (cur_pos >= top && cur_pos <= bottom) {
		  main_nav.find('li').removeClass('active');
		  main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('active');
		}
	  });
	});*/

   /**
	* Function to scroll to an element with top ofset
	*/
   /* function scrollto(el) {
	 const selectHeader = document.querySelector('#header');
	 let offset = 0;
 
	 if (selectHeader.classList.contains('sticked')) {
	   offset = document.querySelector('#header.sticked').offsetHeight;
	 } else if (selectHeader.hasAttribute('data-scrollto-offset')) {
	   offset = selectHeader.offsetHeight - parseInt(selectHeader.getAttribute('data-scrollto-offset'));
	 }
	 window.scrollTo({
	   top: document.querySelector(el).offsetTop - offset,
	   behavior: 'smooth'
	 });
   }*/


		  // banner-carousel
		// function sliderCarouselOne() {
		// 	$('.slider_area').slick({
		// 		slidesToShow: 1,
		// 		slidesToScroll: 1,
		// 		autoplay: true,
		// 		dots: true,
		// 		speed: 600,
		// 		arrows: true,
		// 		prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
		// 		nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
		// 	});
		// 	$('.banner-carousel.banner-carousel-1').slickAnimation();
		// }
		// sliderCarouselOne();


		// // banner Carousel Two
		// function sliderCarouselTwo() {
		// 	$('.slider-carousel.slider-carousel-2').slick({
		// 		fade: false,
		// 		slidesToShow: 1,
		// 		slidesToScroll: 1,
		// 		autoplay: true,
		// 		dots: false,
		// 		speed: 600,
		// 		arrows: true,
		// 		prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
		// 		nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
		// 	});
		// }
		// sliderCarouselTwo();

		// // banner Carousel Two
		// function sliderCarouselThree() {
		// 	$('.slider-carousel.slider-carousel-3').slick({
		// 		fade: false,
		// 		slidesToShow: 1,
		// 		slidesToScroll: 1,
		// 		autoplay: true,
		// 		dots: false,
		// 		speed: 600,
		// 		arrows: true,
		// 		prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
		// 		nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
		// 	});
		// }
		// sliderCarouselThree();

		// // pageSlider
		function pageSlider() {
			$('.page-slider').slick({
				fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				dots: false,
				speed: 600,
				arrows: true,
				prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
				nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
			});
		}
		pageSlider();

})(jQuery);
