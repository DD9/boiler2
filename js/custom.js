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
  
  // Flickity
  // hide then show on load
  var $carousel = $('.flickity-carousel').removeClass('is-hidden');
  // trigger redraw for transition
  $carousel[0].offsetHeight;
  // init Flickity
  $carousel.flickity({
    // options
    //bgLazyLoad: 1,
    cellSelector: '.carousel-cell',
    cellAlign: 'left',
    contain: true,
    setGallerySize: false,
  });
  
  //Transision in the first slide opacity after imagesLoaded
  $('.flickity-carousel .carousel-cell-first').imagesLoaded( { background: true }, function() {    
    $('.flickity-carousel .carousel-cell-first').addClass('bg-image-loaded');
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



