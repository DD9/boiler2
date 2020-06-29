/*
Main Scripts File


This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/



// MAIN FUNCTIONS WRAPPER -----------------------------
// Fires on document ready
// Inside of this function, $() will work as an alias for jQuery()
// and other libraries also using $ will not be accessible under this shortcut
// See jQuery noConflict Wrapers
// http://codex.wordpress.org/Function_Reference/wp_enqueue_script
jQuery(document).ready(function($) {


  // Responsive Scripts Skeleton --------------------------------------------
  /* getting viewport width */
  var responsive_viewport = $(window).width();

  /* if is below 481px */
  if (responsive_viewport < 481) {

  } /* end smallest screen */

  /* if is larger than 481px */
  if (responsive_viewport > 481) {

  } /* end larger than 481px */

  /* if is above or equal to 768px */
  if (responsive_viewport >= 768) {

  /* load gravatars */
  $('.comment img[data-gravatar]').each(function(){
      $(this).attr('src',$(this).attr('data-gravatar'));
  });

  }

  /* off the bat large screen actions */
  if (responsive_viewport > 1030) {

  }

	
	// add all your scripts here
	// Initialize owl carousel(s)
  /*
	$(".owl-carousel-standard").each(function(){
		// If there is more than one slide
		 if( $(this).find(".owl-carousel-item").length > 1 ) {
		   $(this).owlCarousel ({
				 loop: true,
				 nav: true,
				 dots: true,
				 navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
				 items:1,
				 autoHeight: false,
				 margin:0,
				 navSpeed: 500,
         autoplay: false,
         autoplaySpeed: 500,
         autoplayTimeout: 4500,
				 autoplayHoverPause: true
			 });
		 // Else, there if there is only one slide	 
		 } else {
			 $(this).owlCarousel ({
				 loop: false,
				 nav : false,
				 dots: false,
				 items:1
			 });
		};
	});	
  */
  
  
  // Flickity
  // hide then show on load
  var $carousel = $('.flickity-carousel').removeClass('load-hidden');
  // trigger redraw for transition
  $carousel[0].offsetHeight;
  // init Flickity
  $carousel.flickity();
  
  $('.flickity-carousel').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    setGallerySize: false,
    bgLazyLoad: true,
    cellSelector: '.carousel-cell'
  });
  

	
	$(".toggle-trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
		return false;
	});
	

});




// OUTSIDE DOCUMENT READY SCRIPTS -----------------------------

// Initialize popovers
$(function () {
  $('[data-toggle="popover"]').popover()
})
// Initialize tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})



// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}



