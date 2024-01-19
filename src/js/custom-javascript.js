// Add your custom JS here.
jQuery(document).ready(function($) {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 70) {
        $("body").addClass("scrolled");
      } else {
        $("body").removeClass("scrolled");
      }  
    });
  
  });